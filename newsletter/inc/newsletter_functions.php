<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################




    # Charset speichern
    $get_charset	= $mysql->query("SELECT * FROM {$prefix}_charset WHERE active=1");
    $aus_charset	= $mysql->fetchObject($get_charset);
    $header_charset	= $aus_charset->charset;


	function removeEMailFromDB($id)
	{
		global $mysql, $prefix;

		$mysql->query("DELETE FROM {$prefix}_entries WHERE id='{$id}'");
        $mysql->query("DELETE FROM {$prefix}_group_def WHERE id_user='{$id}'");
	}

	function sendRemEMailNotification($targetEMail, $removedEMail)
	{
		global $lang;

        $subject	= $lang['onl_newunsubscribe'];
        $message	= $lang['onl_newunsubscribe'].": ".$removedEMail;
        $header		= "From: NLetter <{$targetEMail}>";

        if(!@mail($targetEMail, $subject, $message, $header))
        	return "There was Problem with the removed E-Mail notification!";
	}

	function sendNewEMailNotification($targetEMail, $newEMail)
	{
		global $lang;

        $subject	= $lang['onl_newsubscriber'];
        $message	= $lang['onl_newsubscriber'].": ".$newEMail;
        $header		= "From: NLetter <{$targetEMail}>";

        if(!@mail($targetEMail, $subject, $message, $header))
        	return "There was Problem with the new E-Mail notification!";
	}

	function sendWelcomeNotification($targetEMail, $adminName, $adminEMail, $welcomeMessage)
	{
		global $lang, $header_charset;

        $subject	= $lang['onl_subscribed_mail'];
        $message	= $welcomeMessage;
        //$header		= "From: {$adminName} <{$adminEMail}>";

        $headerdate = sprintf('%s %s%04d', date('D, j M Y H:i:s'), (date('Z') < 0) ? '-' : '+', $timezone);
        $header  = "";
        $header .= "Return-Path: <{$adminEMail}>\n";
        $header .= "Date: {$headerdate}\n";
        $header .= "From: {$adminName} <{$adminEMail}>\n";
        $header .= "X-Priority: 3\n";
        $header .= "X-Mailer: PHPmailer [version 1.8]\n";
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 8bit\n";
        $header .= "Content-type: text/plain; charset=\"{$header_charset}\"\n";


        if(!@mail($targetEMail, $subject, $message, $header))
        	return "There was Problem with the welcome E-Mail notification!";
	}

	function sendUnlockEMailNotification($targetEMail, $adminName, $adminEMail, $unlockMessage)
	{
		global $lang, $header_charset;

        $subject	= $lang['onl_newsletterunlock'];
        $message	= $unlockMessage;
        //$header		= "From: {$adminName} <{$adminEMail}>";

        $headerdate = sprintf('%s %s%04d', date('D, j M Y H:i:s'), (date('Z') < 0) ? '-' : '+', $timezone);
        $header  = "";
        $header .= "Return-Path: <{$adminEMail}>\n";
        $header .= "Date: {$headerdate}\n";
        $header .= "From: {$adminName} <{$adminEMail}>\n";
        $header .= "X-Priority: 3\n";
        $header .= "X-Mailer: PHPmailer [version 1.8]\n";
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-Transfer-Encoding: 8bit\n";
        $header .= "Content-type: text/plain; charset=\"{$header_charset}\"\n";

        if(!@mail($targetEMail, $subject, $message, $header))
        	return "There was Problem with the unlock E-Mail!";
	}



	/* Ajax Functions */

	//function subscribe($action, $mail, $title, $forename, $surname, $group_id, $captcha_post)
	function subscribe($form_data)
	{
		global $prefix, $mysql, $lang;
		$objResponse = new xajaxResponse();

		$action			= $form_data['action'];
		$mail			= strip_tags(htmlentities($form_data['mail']));
		$title			= $form_data['title'];
		$forename		= $form_data['forename'];
		$surname		= $form_data['surname'];
		$group_id		= $form_data['group_id'];
		$captcha_post	= $form_data['captcha'];

		/*
		if(is_array($form_data))
		{
			foreach($form_data as $key => $value)
				$output .= $key." => ".$value."<br>";
		}
		$objResponse->assign("debug","innerHTML", $output);
		*/

        $get_settings	= $mysql->query("SELECT * FROM {$prefix}_settings");
        $aus_settings	= $mysql->fetchObject($get_settings);

        $get_sender		= $mysql->query("SELECT * FROM {$prefix}_senderaddress WHERE sender_default=1");
        $aus_sender		= $mysql->fetchObject($get_sender);
        $sender_email	= $aus_sender->sender_email;
        $sender_name	= $aus_sender->sender_name;


		if($aus_settings->newsletter_captcha == 1)
		{
            require_once (dirname(__FILE__)."/captcha/class.captcha_x.php");
            $captcha = &new captcha_x ();
        }

		$error = false;

		/* ---------------------------------------------------------- */
		/* Subscribe Checks */

		if($action == "ein")
		{
            $get_email_check		= $mysql->query("SELECT mail FROM {$prefix}_entries WHERE mail='$mail'");

			$blackaddress_found		= false;
            $get_blacklist_check    = $mysql->query("SELECT mail FROM {$prefix}_blacklist");
            if($mysql->numRows($get_blacklist_check)!=0)
            {
                while($aus_blacklist_check = $mysql->fetchObject($get_blacklist_check))
                {
                    if(strstr($mail, $aus_blacklist_check->mail))
                    {
                        $blackaddress_found = true;
                        break;
                    }
                }
            }

			if($mysql->numRows($get_email_check) == 0 && $blackaddress_found == false) //wenn email noch nicht in db und nicht gesperrt
			{

                $mail = trim($mail);
                if(empty($mail) || !preg_match( '/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/' , $mail))
                {
                    $error = true;
                    $output_message[] = $lang['onl_checkemail'];
                }
                if($aus_settings->group_choice == 1 && empty($group_id))
                {
                    $error = true;
                    $output_message[] = $lang['onl_checkgroup'];
                }
                if($aus_settings->newsletter_captcha == 1 && !$captcha->validate ($captcha_post) )
                {
                    $error = true;
                    $output_message[] = $lang['onl_checkcaptcha'];
                }

                /* Eintragung */
                if($error == false)
                {
                    if($aus_settings->activation == 0)
                    	$flag = 0;
                    else
                    	$flag = 1;

                	$datum		= date("Y-m-d");
            		$id_unique	= substr(md5(microtime()), 1, 12);

            		srand((double)microtime()*1000000);
                    $mail_id	= md5(uniqid(rand()));

            		$mysql->query("INSERT INTO $prefix"."_entries (id_unique, mail_id, mail, title, forename, surname, regdate, regdate_t, flag) VALUES ('$id_unique', '$mail_id', '$mail', '$title', '$forename', '$surname', '$datum', '".time()."', '{$flag}')");


            		//standardgruppe in die user getan wird, sofern keine manuelle gruppenwahl und nicht standardgruppe
            		if($aus_settings->group_choice == 0 && $aus_settings->default_entry_group != 1)
            		{
                    	$id_user	= mysql_insert_id();
                    	$group_id	= $aus_settings->default_entry_group;

                    	$mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$group_id."')");
            		}
                    else if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 0)
                    {
                        $id_user	= mysql_insert_id();

                        $i=1;
                        $get_groups = $mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' ORDER BY groupname");
                        while($aus_groups = $mysql->fetchObject($get_groups))
                        {
                            $id_group = $group_id[$i];
                            if(!empty($id_group))
                            $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$id_group."')");

                            $i++;
                        }
                    }
                    else if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 1)
                    {
                    	$id_user	= mysql_insert_id();

                    	$mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$group_id."')");

                    }


					// Profillink umsetzen, Willkommensmail und Admin Notification
                    if($aus_settings->activation == 0)
                    {
                        $get_idunique=$mysql->query("SELECT * FROM {$prefix}_entries WHERE id='{$id_user}'");
                        $aus_idunique=$mysql->fetchObject($get_idunique);

                        $profilelink = $aus_settings->mailformat ? "<a href=\"{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}\">{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}</a>" : "{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}";

                        $default_welcome = $aus_settings->default_welcome;
                        $default_welcome = str_replace("{PROFILE_LINK}", $profilelink, $default_welcome);


                        if($aus_settings->welcome == 1)
                            $output_message[] = sendWelcomeNotification($mail, $sender_name, $sender_email, $default_welcome);

                        if($aus_settings->newentrie_mail == 1)
                            $output_message[] = sendNewEMailNotification($aus_settings->newentrie_mail_address, $mail);


                        $output_message[] = $lang['onl_success'];
					}
					else
					{
                        $activation_url	= $aus_settings->activation_url;
                        $get_usermail	= $mysql->query("SELECT mail FROM {$prefix}_intern_users WHERE id='1'");
                        $aus_usermail	= $mysql->fetchObject($get_usermail);
                        $usermail		= $aus_usermail->mail;
                        $subject		= $lang['onl_newsletterunlock'];
                        $zieladdi		= $mail;


                        $act_url = $activation_url."/newsletter.php?mail_id=$mail_id";
                        $message = str_replace("\r\n","\n",str_replace("{SUBSCRIBE_LINK}",$act_url,$aus_settings->default_subscribe));

                        $output_message[] = sendUnlockEMailNotification($zieladdi, $sender_name, $sender_email, $message);

						$output_message[] = $lang['onl_mailavtivation'];
					}

                }
			}
			else
				$output_message[] = $lang['onl_error'];
		}

		/* ---------------------------------------------------------- */
		/* Unsubscribe Checks */

		else
		{
            $get_email_check=$mysql->query("SELECT mail FROM {$prefix}_entries WHERE mail='$mail'");
            if($mysql->numRows($get_email_check) == 0)
            {
            	$output_message[] = $lang['onl_nomail'];
            }
            else
            {
                $get_id	= $mysql->query("SELECT id FROM {$prefix}_entries WHERE mail='".$mail."'");
                $aus_id	= $mysql->fetchObject($get_id);

                $mysql->query("DELETE FROM {$prefix}_entries WHERE mail='".$mail."'");
                $mysql->query("DELETE FROM {$prefix}_group_def WHERE id_user='".$aus_id->id."'");

                $get_settings	= $mysql->query("SELECT * FROM {$prefix}_settings");
                $aus_settings	= $mysql->fetchObject($get_settings);
                if($aus_settings->newentrie_mail == 1)
                    $output_message[] = sendRemEMailNotification($aus_settings->newentrie_mail_address, $mail);


                $output_message[] = $lang['onl_unsubscribed'];
            }
		}

		/* Output Messages in a Div */
		foreach($output_message as $value)
		{
			if(!empty($value))
				$output_message_formated .= $value."<br /><br />";
		}


		$objResponse->assign("formOutput","style.display", "block");
		$objResponse->assign("formOutput","innerHTML", $output_message_formated);

		return $objResponse;
	}
?>