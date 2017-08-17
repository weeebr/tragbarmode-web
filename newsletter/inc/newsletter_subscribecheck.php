<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


    	$datum=date("Y-m-d");
		$mail = addslashes(strip_tags(htmlentities($mail)));

        $get_sender		= $mysql->query("SELECT * FROM {$prefix}_senderaddress WHERE sender_default=1");
        $aus_sender		= $mysql->fetchObject($get_sender);
        $sender_email	= $aus_sender->sender_email;
        $sender_name	= $aus_sender->sender_name;

        $get_email_check=$mysql->query("SELECT mail FROM $prefix"."_entries WHERE mail='$mail'");

        $blackaddress_found     = false;
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

        if($mysql->numRows($get_email_check) == 0 && $blackaddress_found == false)
        {

        	if($aus_settings->newsletter_captcha == "1")
        	{
                require_once (dirname(__FILE__)."/captcha/class.captcha_x.php");
                $captcha = &new captcha_x ();
        	}

        	//----

            $mail=trim($mail);
            if(!preg_match( '/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/' , $mail))
            {
                if($aus_settings->message_type==1)
                {
                	if($aus_language->language_name=="German")
                	{
                	?>
                        <script type="text/javascript">
                        <!--
                        alert("Mail Adresse auf Richtigkeit &uuml;berpr&uuml;fen!");
                        //-->
                        </script>
                    <?php
                	}
                	else
                	{
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Please verify the E-Mail address!");
                        //-->
                        </script>
                    <?php
                    }
                }
                else
                {
                	if($aus_settings->newsletter_form==0)
                		$subscribe_message = $lang['onl_checkemail'];
                	else
                		$flash_message = $lang['onl_checkemail'];
                }
            }
            else if($aus_settings->group_choice=="1" && empty($_POST['group_id']) && $aus_settings->newsletter_form==0)
            {
                if($aus_settings->message_type==1)
                {
                	if($aus_language->language_name=="German")
                	{
                	?>
                        <script type="text/javascript">
                        <!--
                        alert("Bitte eine Gruppe ausw&auml;hlen!");
                        //-->
                        </script>
                	<?php
                	}
                	else
                	{
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Please select a group!");
                        //-->
                        </script>
                    <?php
                    }
                }
                else
                {
                	if($aus_settings->newsletter_form==0)
                		$subscribe_message = $lang['onl_checkgroup'];
                	else
                		$flash_message = $lang['onl_checkgroup'];
                }
            }
            else if($aus_settings->newsletter_captcha == "1" && !$captcha->validate ( $_POST['captcha']))
            {

                if($aus_settings->message_type==1)
                {
                    if($aus_language->language_name=="German")
                    {
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Captcha Code falsch wiederholt!");
                        //-->
                        </script>
                    <?php
                    }
                    else
                    {
                    ?>
                        <script type="text/javascript">
                        <!--
                        alert("Wrong captcha code!");
                        //-->
                        </script>
                    <?php
                    }
                }
                else
                {
                    if($aus_settings->newsletter_form==0)
                        $subscribe_message = $lang['onl_checkcaptcha'];
                    else
                        $flash_message = $lang['onl_checkcaptcha'];
                }

            }
            else
            {
                $get_settings = $mysql->query("SELECT * FROM $prefix"."_settings");
    			$aus_settings = $mysql->fetchObject($get_settings);

            	if($aus_settings->activation == 0)
            	{
            		#EINTRAG #

            		$id_unique = substr(md5(microtime()), 1, 12);
            		$mysql->query("INSERT INTO $prefix"."_entries (id_unique, mail, title, forename, surname, regdate, regdate_t) VALUES ('$id_unique', '$mail', '$title', '$forename', '$surname', '$datum', '".time()."')");

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
                        $group_id	= $_POST['group_id'];

                        $i=1;
                        $get_groups=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' ORDER BY groupname");
                        while($aus_groups=$mysql->fetchObject($get_groups))
                        {
                            $id_group=$group_id[$i];
                            if(!empty($id_group))
                            $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$id_group."')");

                            $i++;
                        }
                    }
                    else if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 1)
                    {
                    	$id_user	= mysql_insert_id();
                    	$group_id	= $_POST['group_id'];

                    	$mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$group_id."')");

                    }


					//new
    				$get_idunique=$mysql->query("SELECT * FROM {$prefix}_entries WHERE id='{$id_user}'");
    				$aus_idunique=$mysql->fetchObject($get_idunique);

  					$profilelink = $aus_settings->mailformat ? "<a href=\"{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}\">{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}</a>" : "{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}";

					$default_welcome = $aus_settings->default_welcome;
					$default_welcome = str_replace("{PROFILE_LINK}", $profilelink, $default_welcome);


                    if($aus_settings->welcome == 1)
                    	echo sendWelcomeNotification($mail, $sender_name, $sender_email, $default_welcome);

                    if($aus_settings->newentrie_mail == 1)
                    	echo sendNewEMailNotification($aus_settings->newentrie_mail_address, $mail);


                    if($aus_settings->message_type == 1)
                    {
                        if($aus_language->language_name=="English")
                        {
                        ?>
                            <script type="text/javascript">
                            <!--
                            alert("Successfully subscribed!");
                            //-->
                            </script>
                        <?php
                        }
                        else
                        {
                        ?>
                            <script type="text/javascript">
                            <!--
                            alert("Erfolgreich angemeldet!");
                            //-->
                            </script>
                        <?php
                        }
                    }
                    else
                    {
                    	if($aus_settings->newsletter_form==0)
                    		$subscribe_message = $lang['onl_success'];
                    	else
                    		$flash_message=$lang['onl_success'];
                    }

                    $hide_form = true;
            	}
            	else
            	{
            	# TEMPEINTRAG #

                    $activation_url=$aus_settings->activation_url;
                    $get_usermail=$mysql->query("SELECT mail FROM $prefix"."_intern_users WHERE id='1'");
                    $aus_usermail=$mysql->fetchObject($get_usermail);
                    $usermail=$aus_usermail->mail;
                    $subject=$lang['onl_newsletterunlock'];
                    $zieladdi=$mail;

                    srand((double)microtime()*1000000);
                    $mail_id=md5(uniqid(rand()));
                    $timestamp=time();

                    $id_unique = substr(md5(microtime()), 1, 12);
                    $mysql->query("INSERT INTO $prefix"."_entries (id_unique, mail_id, mail, title, forename, surname, regdate, regdate_t, flag) VALUES ('$id_unique', '$mail_id', '$mail', '$title', '$forename', '$surname', '$datum', '$timestamp','1')");

/*
                    if($aus_settings->group_choice=="1")
                    {
                        $id_user = mysql_insert_id();
                        $group_id = $_POST['group_id'];

                        $i = 1;
                        $get_groups=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' ORDER BY groupname");
                        while($aus_groups=$mysql->fetchObject($get_groups))
                        {
                            $id_group=$group_id[$i];
                            if(!empty($id_group))
                            $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$id_group."')");

                            $i++;
                        }
                    }
*/
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
                        $group_id	= $_POST['group_id'];

                        $i=1;
                        $get_groups=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' ORDER BY groupname");
                        while($aus_groups=$mysql->fetchObject($get_groups))
                        {
                            $id_group=$group_id[$i];
                            if(!empty($id_group))
                            $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$id_group."')");

                            $i++;
                        }
                    }
                    else if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 1)
                    {
                    	$id_user	= mysql_insert_id();
                    	$group_id	= $_POST['group_id'];

                    	$mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$group_id."')");

                    }


                    $act_url = $activation_url."/newsletter.php?mail_id=$mail_id";
                    $message = str_replace("\r\n","\n",str_replace("{SUBSCRIBE_LINK}",$act_url,$aus_settings->default_subscribe));

					echo sendUnlockEMailNotification($zieladdi, $sender_name, $sender_email, $message);


                    if($aus_settings->message_type==1)
                    {
                        if($aus_language->language_name=="English")
                        {
                        ?>
                            <script type="text/javascript">
                            <!--
                            alert("The E-Mail address will be activated after clicking the link in the recently sent E-Mail!");
                            //-->
                            </script>
                        <?php
                        }
                        else
                        {
                        ?>
                            <script type="text/javascript">
                            <!--
                            alert("Nach Klicken auf die URL der soeben geschickten Mail wird die Mail Adresse aktiviert!");
                            //-->
                            </script>
                        <?php
                        }
                    }
                    else
                    {
                    	if($aus_settings->newsletter_form==0)
                    		$subscribe_message = $lang['onl_mailavtivation'];
            			else
            				$flash_message=$lang['onl_mailavtivation'];
            		}

            		$hide_form = true;
            	}

                unset($mail);
            }
        }

        else
        {
            if($aus_settings->message_type==1)
            {
                if($aus_language->language_name=="English")
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("Already signed in or forbidden by the admin!");
                    //-->
                    </script>
                <?php
                }
                else
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("Schon eingetragen oder wurde vom Admin verboten!");
                    //-->
                    </script>
                <?php
                }
            }
            else
            {
            	if($aus_settings->newsletter_form==0)
            		$subscribe_message = $lang['onl_error'];
        		else
        			$flash_message=$lang['onl_error'];
        	}
        }
?>