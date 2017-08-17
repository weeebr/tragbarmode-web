<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

		$mail = addslashes($mail);
        $get_email_check=$mysql->query("SELECT mail FROM $prefix"."_entries WHERE mail='$mail'");
        if($mysql->numRows($get_email_check)==0)
        {
            if($aus_settings->message_type==1)
            {
                if($aus_language->language_name=="English")
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("E-Mail address not found!");
                    //-->
                    </script>
                <?php
                }
                else
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("Mail Adresse nicht vorhanden!");
                    //-->
                    </script>
                <?php
                }
            }
            else
            {
            	if($aus_settings->newsletter_form==0)
            		$unsubscribe_message = $lang['onl_nomail'];
        		else
        			$flash_message = $lang['onl_nomail'];
        	}
        }
        else
        {
        	$get_id=$mysql->query("SELECT id FROM $prefix"."_entries WHERE mail='".$mail."'");
        	$aus_id=$mysql->fetchObject($get_id);
       		$mysql->query("DELETE FROM $prefix"."_entries WHERE mail='".$mail."'");
       		$mysql->query("DELETE FROM $prefix"."_group_def WHERE id_user='".$aus_id->id."'");

            $get_settings=$mysql->query("SELECT * FROM $prefix"."_settings");
            $aus_settings=$mysql->fetchObject($get_settings);
            if($aus_settings->newentrie_mail==1)
            	echo sendRemEMailNotification($aus_settings->newentrie_mail_address, $mail);


            if($aus_settings->message_type==1)
            {
                if($aus_language->language_name=="English")
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("Unsubscribed!");
                    //-->
                    </script>
                <?php
                }
                else
                {
                ?>
                    <script type="text/javascript">
                    <!--
                    alert("Ausgetragen!");
                    //-->
                    </script>
                <?php
                }
            }
            else
            {
            	if($aus_settings->newsletter_form==0)
        			$unsubscribe_message = $lang['onl_unsubscribed'];
        		else
        			$flash_message = $lang['onl_unsubscribed'];
        	}
        }
?>