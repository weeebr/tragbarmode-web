<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('logincheck')) die('Error!');


function replaceUmlaute($stringToReplace)
{
    $stringToReplace	= str_replace("ä", "&auml;", $stringToReplace);
    $stringToReplace	= str_replace("ö", "&ouml;", $stringToReplace);
    $stringToReplace	= str_replace("ü", "&uuml;", $stringToReplace);
    $stringToReplace	= str_replace("Ä", "&Auml;", $stringToReplace);
    $stringToReplace	= str_replace("Ö", "&Ouml;", $stringToReplace);
    $stringToReplace	= str_replace("Ü", "&Uuml;", $stringToReplace);
    $stringToReplace	= str_replace("ß", "&szlig;", $stringToReplace);

    return $stringToReplace;
}


if(($_POST['ok_s']=="" || $_POST['ok_test']=="") && ($_GET['ok_s']!="" || $_GET['ok_test']!=""))
{
	$ok_s = $_GET['ok_s'];
	$ok_test = $_GET['ok_test'];
}
else
{
	unset($_SESSION['db_number'],$_GET['step'],$_GET['all_adr'],$_GET['adr_counter'],$_GET['cmail'],$_GET['ok_s'],$_GET['error_new']);

	$ok_s = $_POST['ok_s'];
	$ok_test = $_POST['ok_test'];
}

if(($ok_s || $ok_test) || $_GET['resume']=="ok")
{
    $get_set = $mysql->query("SELECT * FROM $prefix"."_settings");
    $aus_settings = $mysql->fetchObject($get_set);
	
	$aus_info	 	= $mysql->fetchObject($mysql->query("SELECT * FROM {$prefix}_info"));
	$VALID			= $aus_info->licencevalid;
	$COPYRIGHT_TAG	= $aus_info->licencecopyright;
	
	
	if(empty($_GET['resume']))
	{
        $error_new		= $_GET['error_new'];
        $all_adr		= $_GET['all_adr'];
        $adr_counter	= $_GET['adr_counter'];
        $step			= $_GET['step'];
        $db_limit_new	= $_GET['db_limit_new'];

        //zeit zum abbruch nehmen, falls in der zwischenzeit neue adresse hinzukamen
        if(empty($_SESSION['db_number']))
        	$time_limit = time();
        else
        {
            $get_resume = $mysql->query("SELECT * FROM $prefix"."_resume");
            $aus_resume = $mysql->fetchObject($get_resume);
            $time_limit = $aus_resume->date;
        }
	}
	else
	{
        $get_resume = $mysql->query("SELECT * FROM $prefix"."_resume");
        $aus_resume = $mysql->fetchObject($get_resume);

        $error_new		= "ok";
        $all_adr		= $aus_resume->db_all_adr;
        $adr_counter	= $aus_resume->db_adr_counter;
        $step			= $aus_resume->db_step;
        $db_limit_new	= $aus_resume->db_limit;
        $time_limit		= $aus_resume->date;

		$_SESSION['db_number']		= $aus_resume->db_number;
        $_SESSION['nl_msg']			= $aus_resume->msg;
        $_SESSION['nl_subject']		= $aus_resume->betreff;
        //$_SESSION['nl_emailname']	= $aus_resume->emailname;

        $from_tmp 		= $aus_resume->emailname;
        $from_tmp 		= explode(";", $from_tmp);
        if(is_array($from_tmp))
        {
        	$_SESSION['nl_from_name']	= $from_tmp[0];
        	$_SESSION['nl_from_email']	= $from_tmp[1];
        }

        $_SESSION['nl_id_group']	= $aus_resume->id_group;
        $_SESSION['nl_id_archive']	= $aus_resume->id_archive;

        $attachments = $aus_resume->attachments;
        $attachments = explode(";", $attachments);

        if(is_array($attachments))
        {
            $i = 0;
            foreach($attachments as $value)
            {
                $value_output = explode(":", $value);

                # Speicher Dateiinhalt und Name
                $file = fopen(dirname(__FILE__)."/../upload/".$value_output[0], 'rb');
                $data = fread($file, filesize(dirname(__FILE__)."/../upload/".$value_output[0]));
                fclose($file);

                $file_array_content[$i]['data'] = $data;
                $file_array_content[$i]['name'] = $value_output[0];
                $file_array_content[$i]['type'] = $value_output[1];

                $i++;
            }
            $_SESSION['nl_file_array_content']  = $file_array_content;
        }


	}


	if($error_new!="ok") //nur beim ersten mal
	{
        $emailname		= $_POST['emailname'];

        $get_sender 	= $mysql->query("SELECT * FROM {$prefix}_senderaddress WHERE id='{$emailname}'");
        $aus_sender 	= $mysql->fetchObject($get_sender);
		$from_name		= $aus_sender->sender_name;
		$from_email		= $aus_sender->sender_email;
		$from_tmp		= $from_name.";".$from_email;

        $subject	= $_POST['subject'];
        $id_group	= $_POST['id_group'];
        $text		= str_replace("\r\n","\n",$_POST['text']);
        $file_array	= unserialize(stripslashes($_POST['file_array_post']));

		if(is_array($file_array))
		{
			$i = 0;
			foreach($file_array as $value)
			{
				$value_output = explode(":", $value);

				# Speicher Dateiinhalt und Name
				$file = fopen(dirname(__FILE__)."/../upload/".$value_output[0],'rb');
                $data = fread($file, filesize(dirname(__FILE__)."/../upload/".$value_output[0]));
                fclose($file);

				$file_array_content[$i]['data'] = $data;
				$file_array_content[$i]['name'] = $value_output[0];
				$file_array_content[$i]['type'] = $value_output[1];

				$attachments .= $value.";";

				$i++;
			}
		}



        $_SESSION['nl_id_group'] = $id_group;

        if($aus_settings->mailformat=="1")
        {
            //$subject    = replaceUmlaute($subject);
            $text       = replaceUmlaute($text);
        }

        if($emailname=="")  {$error="1";}
        if($subject=="")    {$error="1";}
        if($text=="")       {$error="1";}

		if($id_group!=1)
        	$get_all_adr=$mysql->query("SELECT count(id_user) AS all_adr FROM $prefix"."_group_def g, $prefix"."_entries u WHERE g.id_user=u.id AND id_group='$id_group' AND u.flag<>'1'");
        else
        	$get_all_adr=$mysql->query("SELECT count(id) AS all_adr FROM $prefix"."_entries WHERE flag<>'1'");

        $aus_all_adr=$mysql->fetchObject($get_all_adr);

        $all_adr = $aus_all_adr->all_adr;
        $adr_counter = "1";


        ## Archiv ##
        $datum_n    	= date("Y-m-d H:i:s");
        $text_tmp   	= str_replace("\n", "<BR>", $text);
        $text_tmp  		= str_replace("'", "\'", $text_tmp);
        $subject_tmp	= str_replace("'", "\'", $subject);

        $mysql->query("INSERT INTO $prefix"."_archiv (id_group, absender, betreff, msg, empf, date, attachments, flag) VALUES ('".$id_group."','".$from_tmp."','".$subject_tmp."','".$text_tmp."','".$all_adr."','".$datum_n."','{$attachments}', '1')");
		$id_archive = mysql_insert_id();
	}

    if($error != "1")
    {

        $usermail=$aus_settings->newentrie_mail_address;
		//$fromemail=$aus_settings->default_email;

        $id_group=$_SESSION['nl_id_group'];
        if($id_group!=1)
        	$get_countmail=$mysql->query("SELECT count(id_user) AS cmail FROM $prefix"."_group_def g, $prefix"."_entries u WHERE g.id_user=u.id AND id_group='$id_group' AND u.flag<>'1'");
        else
        	$get_countmail=$mysql->query("SELECT count(id) AS cmail FROM $prefix"."_entries WHERE flag<>'1'");
        $aus_countmail=$mysql->fetchObject($get_countmail);

        $datum=date("d.m.Y  - G:i");
        if(!$step)
        {
        	$step="0";
        }

		#########################################################################

		## Nur ohne Resume, sonst wird limit aus DB genommen
		if(empty($_GET['resume']))
		{
			if(empty($_SESSION['db_number']))
			{
        		$user_pro_intervall=$aus_settings->user_pro_intervall;
        		$limit=$user_pro_intervall*$step;
        	}
        	else
        	{
        		$user_pro_intervall=$_SESSION['db_number'];
        		$step--;
                $limit=($user_pro_intervall*$step)+$db_limit_new;
                $step++;
        	}

		}
		else
		{
			$user_pro_intervall=$_SESSION['db_number'];
			$limit=($user_pro_intervall*$step)+$db_limit_new;
			$step++;
			$adr_counter=$adr_counter-($user_pro_intervall-$db_limit_new);
		}

		#########################################################################

        if($aus_countmail->cmail!=0)
        {
            # charset auslesen
            $get_charset=$mysql->query("SELECT * FROM {$prefix}_charset WHERE active=1");
            $aus_charset=$mysql->fetchObject($get_charset);

            if($error_new!="ok") //nur beim ersten mal
            {
                $_SESSION['nl_msg']					= $text;
                $_SESSION['nl_subject']				= $subject;
                //$_SESSION['nl_emailname']			= $emailname;
                $_SESSION['nl_from_name']			= $from_name;
                $_SESSION['nl_from_email']			= $from_email;
                $_SESSION['nl_file_array_content']	= $file_array_content;
                $_SESSION['nl_id_archive']			= $id_archive;
            }

            $message			= $_SESSION['nl_msg'];
            $subject			= $_SESSION['nl_subject'];
            //$emailname			= $_SESSION['nl_emailname'];
            $from_name			= $_SESSION['nl_from_name'];
            $from_email			= $_SESSION['nl_from_email'];
            $file_array_content	= $_SESSION['nl_file_array_content'];
            $id_archive			= $_SESSION['nl_id_archive'];

			if(!empty($file_array_content) && is_array($file_array_content))
  				$attachment = true;

			# Boundary string generieren
            $semi_rand = md5(time());
            $grenze = "==Multipart_Boundary_x{$semi_rand}x";

            $timezone=date("Z");
            $timezone_vorz=($timezone < 0) ? "-" : "+";
            $timezone=abs($timezone);
            $timezone=($timezone/3600)*100 + ($timezone%3600)/60;

            $headerdate=sprintf("%s %s%04d", date("D, j M Y H:i:s"), $timezone_vorz, $timezone);

            $header="";
            $header.="Return-Path: <$from_email>\n";
            $header.="Date: $headerdate\n";
            $header.="From: $from_name <$from_email>\n";
            $header.="X-Priority: 3\n";
            $header.="X-Mailer: PHPmailer [version 1.72]\n";
            $header.="MIME-Version: 1.0\n";

            if($attachment == false)
            {
            	
                $header .= "Content-Transfer-Encoding: 8bit\n";
                $header .= $aus_settings->mailformat
                           ? "Content-type: text/html; charset=\"{$aus_charset->charset}\"\n"
                           : "Content-type: text/plain; charset=\"{$aus_charset->charset}\"\n";
				
				/*
                if($aus_settings->mailformat == 1)
                {
                	$default_alternatetext = str_replace("{SHOWEMAIL_LINK}", "{$aus_settings->activation_url}/newsletter.php?showemail={$id_archive}", $aus_settings->default_alternatetext);

                    $header .= "Content-Type: multipart/alternative;\n\tboundary=\"$grenze\"\n";

                    $message_before .= "\n--$grenze\n";
                    $message_before .= "Content-type: text/plain; charset=\"{$aus_charset->charset}\"\n";
                    $message_before .= "Content-Transfer-Encoding: 8bit\n";
                    $message_before .= $default_alternatetext; //text nachricht variabel
                    $message_before .= "\n--$grenze\n";
                    $message_before .= "Content-type: text/html; charset=\"{$aus_charset->charset}\"\n";
                    $message_before .= "Content-Transfer-Encoding: 8bit\n";
                        //html nachricht variabel
                    $message_after   = "\n\n--".$grenze."--";
                }
                else
                {
                    $header .= "Content-Transfer-Encoding: 8bit\n";
                    $header .= "Content-type: text/plain; charset=\"{$aus_charset->charset}\"\n";
                }
				*/

            }
            else
            {
                $header .= "Content-Type: multipart/mixed;\n\tboundary=\"$grenze\"\n";

                # Erstellen der Attachments

                $message_before .= "\n--$grenze\n";
                //$message_before .= "Content-transfer-encoding: 8bit\r\n";
                $message_before .= $aus_settings->mailformat
                               ? "Content-type: text/html; charset={$aus_charset->charset}\n"
                               : "Content-type: text/plain; charset={$aus_charset->charset}\n";
                $message_before .= "Content-transfer-encoding: 8bit\n\n";


                $message_after = "\n\n";
				$attachments = "";
                foreach($file_array_content as $key=>$value)
                {
                	if(!empty($file_array_content[$key]['name']))
                	{
                        $data = chunk_split(base64_encode($file_array_content[$key]['data']));

                        if(empty($file_array_content[$key]['type']))
                            $mimetype = "application/octetstream";
                        else
                            $mimetype = $file_array_content[$key]['type'];

                        $message_after .= "\n--$grenze\n";
                        $message_after .= "Content-Type: ".$mimetype.";\n\tname=\"".$file_array_content[$key]['name']."\"\n";
                        $message_after .= "Content-Transfer-Encoding: base64\n";
                        $message_after .= "Content-Disposition: attachment;\n\tfilename=\"".$file_array_content[$key]['name']."\"\n\n";
                        $message_after .= $data;
                        $message_after .= "\n\n";

                        $attachments .= $file_array_content[$key]['name'].":".$file_array_content[$key]['type'].";";
                    }
                }

                $message_after .= "--".$grenze."--";

            }

			$message = str_replace('\"', '"', $message);

			if( (!$VALID && !$COPYRIGHT_TAG) || (!$VALID && $COPYRIGHT_TAG) || ($VALID && $COPYRIGHT_TAG)  )
			{	
				if($aus_settings->mailformat == 1)
				{
					if(strstr($message, $lang['sendmails_sentwithnletter'])==false)
						$message.="<br><br>--------------------------<br>".$lang['sendmails_sentwithnletter'].".";
				}
				else
				{
					if(strstr($message, $lang['sendmails_sentwithnletter'])==false)
						$message.="\n\n--------------------------\n".$lang['sendmails_sentwithnletter'].".";
				}
			}

            $get_set = $mysql->query("SELECT * FROM $prefix"."_settings");
            $aus_settings = $mysql->fetchObject($get_set);
			$activation_url = $aus_settings->activation_url;


            $message = str_replace('{TITLE_EXPRESSION}', $aus_settings->replace_form_expression_title, $message);
			$message = str_replace('{NAME_EXPRESSION}', $aus_settings->replace_form_expression_name, $message);
			$message = str_replace('{SHOWEMAIL_LINK}', "{$aus_settings->activation_url}/newsletter.php?showemail={$id_archive}", $message);

            # Abfragen welche Platzhalter im Text vorkommen
            /*
            if(strstr($message, "{GROUPS}") == true)
            	$replace_groups = true;
            */

            if(strstr($message, "{TITLE}") == true)
            	$replace_title = true;

            if(strstr($message, "{FORENAME}") == true)
            	$replace_forename = true;

            if(strstr($message, "{SURNAME}") == true)
            	$replace_surname = true;

            if(strstr($message, "{GROUPS}") == true)
            	$replace_groups = true;

            if(strstr($message, "{EMAIL}") == true)
            	$replace_email = true;

            if(strstr($message, "{UNSUBSCRIBE_LINK}") == true)
            	$replace_unsubscribe_link = true;

            if(strstr($message, "{PROFILE_LINK}") == true)
            	$replace_profile_link = true;

            if( $aus_settings->replace_form_alt_titlecheck == 1)
            	$alternative_title = true;

			if($id_group!=1)
				$get_id_user=$mysql->query("SELECT id_user FROM $prefix"."_group_def g, $prefix"."_entries u WHERE g.id_user=u.id AND u.flag<>'1' AND g.id_group='$id_group' AND regdate_t<='".$time_limit."' LIMIT $limit,$user_pro_intervall");
			else
				$get_id_user=$mysql->query("SELECT id, id_unique, mail, title, forename, surname FROM $prefix"."_entries WHERE flag<>'1' AND regdate_t<='".$time_limit."' LIMIT $limit,$user_pro_intervall");

			$db_limit=0;
			$message_original = $message;
			while($aus_id_user = $mysql->fetchObject($get_id_user))
			{//if($step==1)die();

				$message = $message_original;

				/* ################################# */
				/* ## Mail, Name und ID speichern ## */
				if($id_group!=1)
				{
                    $get_mailaddi=$mysql->query("SELECT id, id_unique, mail, title, forename, surname FROM $prefix"."_entries WHERE id='".$aus_id_user->id_user."'");
                    $aus_mailaddi=$mysql->fetchObject($get_mailaddi);

                    $zieladdi		 	= $aus_mailaddi->mail;
                    $nletter_title		= $aus_mailaddi->title;
                    $nletter_forename	= $aus_mailaddi->forename;
                    $nletter_surname	= $aus_mailaddi->surname;
                    $id_unique			= $aus_mailaddi->id_unique;
                    $id					= $aus_mailaddi->id;
				}
				else
				{
					$zieladdi			= $aus_id_user->mail;
                    $nletter_title		= $aus_id_user->title;
                    $nletter_forename	= $aus_id_user->forename;
                    $nletter_surname	= $aus_id_user->surname;
					$id_unique			= $aus_id_user->id_unique;
					$id					= $aus_id_user->id;
				}
				/* ################################# */


				/* ###### Ersetzungregeln ##### */

                # Gruppen des Users rausfinden
                if($replace_groups == true)
                {
                    unset($nletter_groups);
                    $get_usergroups = $mysql->query("SELECT id_group FROM {$prefix}_group_def WHERE id_user={$id}");
                    while($aus_usergroups = $mysql->fetchObject($get_usergroups))
                    {
                        $get_usergroups_name = $mysql->query("SELECT groupname FROM {$prefix}_groups WHERE id={$aus_usergroups->id_group}");
                        $aus_usergroups_name = $mysql->fetchObject($get_usergroups_name);

                        $nletter_groups .= $aus_usergroups_name->groupname.", ";
                    }
                    $nletter_groups = substr($nletter_groups, 0, -2);

                    $message = str_replace('{GROUPS}', $nletter_groups, $message);
                }

				if( $alternative_title == true && ( empty($nletter_forename) && empty($nletter_surname) ) )
				{
					$message = str_replace("{TITLE} ", $aus_settings->replace_form_alt_title, $message);
				}
				else
				{
                    if($replace_title == true)
                    {
                        # Wenn Anrede männlich, dann...
                        if($nletter_title == 0)
                            $nletter_title_string = $aus_settings->replace_form_title_mr;
                        else
                            $nletter_title_string = $aus_settings->replace_form_title_mrs;

                        $message = str_replace('{TITLE}', $nletter_title_string, $message);
                    }
				}

                if($replace_forename == true)
                {
                    # Wurde kein Vorname angegeben
                    if(empty($nletter_forename))
                        $nletter_forename = $aus_settings->replace_form_ifempty_forename;

                    $message = str_replace('{FORENAME}', $nletter_forename, $message);
                }

                if($replace_surname == true)
                {
                    # Wurde kein Nachname angegeben
                    if(empty($nletter_surname))
                        $nletter_surname = $aus_settings->replace_form_ifempty_surname;

                    $message = str_replace('{SURNAME}', $nletter_surname, $message);
                }


                if($replace_email == true)
                    $message = str_replace('{EMAIL}', $zieladdi, $message);

                if($replace_unsubscribe_link == true)
                {
                    $unsublink      = "{$activation_url}/newsletter.php?unlink_mail={$id_unique}";
                    $message = str_replace("{UNSUBSCRIBE_LINK}", $unsublink,  $message);
                }

                if($replace_profile_link == true)
                {
                    $profilelink    = "{$activation_url}/newsletter.php?profile_id={$id_unique}";
                    $message = str_replace("{PROFILE_LINK}", $profilelink, $message);
                }

                if($attachment == true || $aus_settings->mailformat == 1)
                	$message = $message_before.$message.$message_after;


				/* ###### Verschicken der Mail ##### */
				if(empty($ok_test))
				{
            		mail($zieladdi, $subject, $message, $header);
            	}
            	/* ################################# */


				if($all_adr==$adr_counter)
				{
                    $finished = "ok";
                    break;
				}

            	$adr_counter++;


            	### Speichern des Fortschritts für Resume ###

            	$db_limit++;
            	if(empty($ok_test))
            	{
            		$from_tmp	= $from_name.";".$from_email;

            		$mysql->query("UPDATE $prefix"."_resume SET db_step='".$step."', db_limit='".$db_limit."', db_number='".$user_pro_intervall."', db_all_adr='".$all_adr."', db_adr_counter='".$adr_counter."', db_cmail='".$cmail."', id_group='".$id_group."', emailname='".$from_tmp."', betreff='".$subject."', msg='".$message_original."', date='".time()."', attachments='{$attachments}', id_archive='{$id_archive}', success='0'");
				}
            	#############################################

            } //while
            $step++;

			### Solange Intervalle senden bis Variable finisched gesetzt ###
            if($finished!="ok")
            {
            	$intervall = round(($aus_settings->intervall / 1000),2);
                echo "<meta http-equiv=\"refresh\" content=\"$intervall; url=".$file_root."/admin.php?s=$s&ok_s=ok&error_new=ok&all_adr=$all_adr&adr_counter=$adr_counter&step=$step&db_limit_new=$db_limit_new&ok_test=$ok_test\">";
                $adr_counter_a=$adr_counter-1;              //durch while schon eins höher als es eigentlich ist
                $adr_counter_b=$all_adr-$adr_counter_a;     //verbleibende ausrechnen
                $step_max=$all_adr/$user_pro_intervall;
                $step_max=ceil($step_max);


                echo "<table>";
                echo "<tr><td>".$lang['sendmails_sendmsg1']." $adr_counter_a ".$lang['sendmails_sendmsg2']."! ".$lang['sendmails_sendmsg3']." $adr_counter_b ".$lang['sendmails_sendmsg4']."!</td></tr>";
                echo "<tr><td>".$lang['sendmails_sendmsg5']." ".$intervall." ".$lang['sendmails_sendmsg6']." (".$lang['sendmails_sendmsg7']." $step/$step_max)</td></tr>";
                echo "</table>";
            }

			### Nur beim ersten Mal ###
            if($error_new!="ok" && empty($ok_test))
            {
                unset($emailname);
                unset($subject);
                unset($text);
            }
            elseif($error_new!="ok" && !empty($ok_test))
            {
                $_SESSION['test_msg']="$text";
                $_SESSION['test_subject']="$subject";
                $_SESSION['test_emailname']="$emailname";
            }

            ### Wenn alle erfolgreich verschickt ###
            if($finished=="ok" && empty($ok_test))
            {
				## Archiv ##
                $datum_n			= date("Y-m-d H:i:s");
                $message_original	= str_replace("\n", "<BR>", $message_original);
                $message_original 	= str_replace("'", "\'", $message_original);
                $nl_subject			= str_replace("'", "\'", $_SESSION['nl_subject']);

                if(!empty($_SESSION['nl_file_array_content']) && is_array($_SESSION['nl_file_array_content']))
                {
                	$file_array_content = $_SESSION['nl_file_array_content'];
                }

                $mysql->query("UPDATE $prefix"."_archiv SET flag=0 WHERE id='{$id_archive}'");

                ## Markieren als erfolgreich ##
                $mysql->query("UPDATE $prefix"."_resume SET db_step='0',db_limit='0',db_number='0',db_all_adr='0',db_adr_counter='0',db_cmail='0',attachments='0',id_group='0',emailname='0',betreff='0',msg='0',date='".time()."',success='1'");

                echo "<table>";
                echo "<tr><td>".$lang['sendmails_success1']." ".$aus_countmail->cmail." ".$lang['sendmails_success2']."!</td></tr>";
                echo "<tr><td><b>&#187; <font style=\"color:#7BBD42;\">".$lang['sendmails_finished']."!</font></b><b></b></td></tr>";
                echo "</table>";
            }
            elseif($finished=="ok" && !empty($ok_test))
            {
                echo "<table>";
                echo "<tr><td>".$lang['sendmails_success1']." ".$aus_countmail->cmail." ".$lang['sendmails_success2']."!</td></tr>";
                echo "<tr><td><b>&#187; <font style=\"color:#7BBD42;\">".$lang['sendmails_simfinished']."!</font></b><b></b></td></tr>";
                echo "</table>";
            }
        }
        else
        {
            echo "<table>";
            echo "<tr><td>".$lang['sendmails_error']."!</td></tr>";
            echo "</table>";
        }

        echo "<table><tr><td>";
        for($i=1;$i<160;$i++)
        {
        echo ".";
        }
        echo "</td></tr></table><br>";
    }
    else
    {
        echo "<br>";
        unset($ok_s);
        unset($ok_test);
    }
}

$ok_try = $_POST['ok_try'];
if($ok_try)
{
	$emailname	= $_POST['emailname'];

    $get_sender     = $mysql->query("SELECT * FROM {$prefix}_senderaddress WHERE id='{$emailname}'");
    $aus_sender     = $mysql->fetchObject($get_sender);
    $from_name      = $aus_sender->sender_name;
    $from_email     = $aus_sender->sender_email;
    $from_tmp       = $from_name.";".$from_email;

	$subject	= $_POST['subject'];
	$id_group	= $_POST['id_group'];
	$text		= str_replace("\r\n", "\n", $_POST['text']);
    $file_array  = unserialize(stripslashes($_POST['file_array_post']));

    if(is_array($file_array))
    {
        $i = 0;
        foreach($file_array as $value)
        {
            $value_output = explode(":", $value);

            # Speicher Dateiinhalt und Name
            $file = fopen(dirname(__FILE__)."/../upload/".$value_output[0],'rb');
            $data = fread($file, filesize(dirname(__FILE__)."/../upload/".$value_output[0]));
            fclose($file);

            $file_array_content[$i]['data'] = $data;
            $file_array_content[$i]['name'] = $value_output[0];
            $file_array_content[$i]['type'] = $value_output[1];

            $attachments .= $value.";";

            $i++;
        }
    }


	$get_set=$mysql->query("SELECT * FROM $prefix"."_settings");
	$aus_settings=$mysql->fetchObject($get_set);

    if($aus_settings->mailformat=="1")
    {
    	//$subject	= replaceUmlaute($subject);
    	$text		= replaceUmlaute($text);
	}

	if($emailname=="")	{$error="1";}
	if($subject=="")	{$error="1";}
	if($text=="")		{$error="1";}


    if($error!="1")
    {
        $_SESSION['nl_msg']					= $text;
        $_SESSION['nl_subject']				= $subject;
        //$_SESSION['nl_emailname']			= $emailname;
        $_SESSION['nl_from_name']			= $from_name;
        $_SESSION['nl_from_email']			= $from_email;
        $_SESSION['nl_file_array_content']	= $file_array_content;

        $usermail=$aus_settings->newentrie_mail_address;
        //$fromemail=$aus_settings->default_email;


        $datum=date("d.m.Y  - G:i");

        $zieladdi	= $usermail;
        $message	= $text;

			if(!empty($file_array_content) && is_array($file_array_content))
  				$attachment = true;

			# Boundary string generieren
            $semi_rand = md5(time());
            $grenze = "==Multipart_Boundary_x{$semi_rand}x";

            $timezone=date("Z");
            $timezone_vorz=($timezone < 0) ? "-" : "+";
            $timezone=abs($timezone);
            $timezone=($timezone/3600)*100 + ($timezone%3600)/60;

            $headerdate=sprintf("%s %s%04d", date("D, j M Y H:i:s"), $timezone_vorz, $timezone);

            $header="";
            $header.="Return-Path: <$from_email>\n";
            $header.="Date: $headerdate\n";
            $header.="From: $from_name <$from_email>\n";
            $header.="X-Priority: 3\n";
            $header.="X-Mailer: PHPmailer [version 1.72]\n";
            $header.="MIME-Version: 1.0\n";

            if($attachment == false)
            {
            	
                $header .= "Content-Transfer-Encoding: 8bit\n";
                $header .= $aus_settings->mailformat
                           ? "Content-type: text/html; charset=\"{$aus_charset->charset}\"\n"
                           : "Content-type: text/plain; charset=\"{$aus_charset->charset}\"\n";
                

				/*
                if($aus_settings->mailformat == 1)
                {
                    $header .= "Content-Type: multipart/alternative;\n\tboundary=\"$grenze\"\n";

                    $message_before .= "\n--$grenze\n";
                    $message_before .= "Content-type: text/plain; charset=\"{$aus_charset->charset}\"\n";
                    $message_before .= "Content-Transfer-Encoding: 8bit\n";
                    $message_before .= $aus_settings->default_alternatetext; //text nachricht variabel
                    $message_before .= "\n--$grenze\n";
                    $message_before .= "Content-type: text/html; charset=\"{$aus_charset->charset}\"\n";
                    $message_before .= "Content-Transfer-Encoding: 8bit\n";
                        //html nachricht variabel
                    $message_after   = "\n\n--".$grenze."--";
                }
                else
                {
                    $header .= "Content-Transfer-Encoding: 8bit\n";
                    $header .= "Content-type: text/plain; charset=\"{$aus_charset->charset}\"\n";
                }
				*/
            }
            else
            {
                $header .= "Content-Type: multipart/mixed;\n\tboundary=\"$grenze\"\n";

                # Erstellen der Attachments

                $message_before .= "\n--$grenze\n";
                $message_before .= "Content-transfer-encoding: 8bit\r\n";
                $message_before .= $aus_settings->mailformat
                               ? "Content-type: text/html; charset=\"{$aus_charset->charset}\"\n\n"
                               : "Content-type: text/plain; charset=\"{$aus_charset->charset}\"\n\n";


                $message_after = "\n\n";

                foreach($file_array_content as $key=>$value)
                {
                    $data = chunk_split(base64_encode($file_array_content[$key]['data']));

                    if(empty($file_array_content[$key]['type']))
                        $mimetype = "application/octetstream";
                    else
                        $mimetype = $file_array_content[$key]['type'];

                    $message_after .= "\n--$grenze\n";
                    $message_after .= "Content-Type: ".$mimetype.";\n\tname=\"".$file_array_content[$key]['name']."\"\n";
                    $message_after .= "Content-Transfer-Encoding: base64\n";
                    $message_after .= "Content-Disposition: attachment;\n\tfilename=\"".$file_array_content[$key]['name']."\"\n\n";
                    $message_after .= $data;
                    $message_after .= "\n\n";
                }

                $message_after .= "--".$grenze."--";

            }


            $message = str_replace('\"', '"', $message);
            $message = str_replace('{TITLE_EXPRESSION}', $aus_settings->replace_form_expression_title, $message);
            $message = str_replace('{NAME_EXPRESSION}', $aus_settings->replace_form_expression_name, $message);
            $message = str_replace('{SHOWEMAIL_LINK}', "{$aus_settings->activation_url}/newsletter.php?showemail=...", $message);
            $message = str_replace('{TITLE}', 'Neutrum', $message);
            $message = str_replace('{FORENAME}', 'Admin', $message);
            $message = str_replace('{SURNAME}', 'Admin', $message);
            $message = str_replace("{EMAIL}", $zieladdi, $message);
            $message = str_replace("{GROUPS}", "Admingruppe", $message);
            $message = str_replace("{UNSUBSCRIBE_LINK}", $activation_url."/newsletter.php?unlink_mail=...", $message);
            $message = str_replace("{PROFILE_LINK}", $activation_url."/newsletter.php?profile_id=...", $message);
            $message = str_replace("{SHOWEMAIL_LINK}", $activation_url."/newsletter.php?showemail=...", $message);


            if($attachment == true || $aus_settings->mailformat == 1)
            	$message = $message_before.$message.$message_after;

        	mail($zieladdi, $subject, $message, $header);

        	echo "<table><tr><td><b>&#187; <font style=\"color:#7BBD42;\">".$lang['sendmails_own1']." ($usermail) ".$lang['sendmails_own2']."!</font></b></td></tr></table>";


    }
    else
    {
        echo "<br>";
        unset($ok_s);
        unset($ok_test);
    }
}

?>