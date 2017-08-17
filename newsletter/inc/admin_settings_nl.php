<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('logincheck')) die('Error!');
if(defined('enter_settings'))
{

	if($_POST['sig_ok'])
	{
		$newsletter_form		= $_POST['newsletter_form'];
		$newsletter_profile		= $_POST['newsletter_profile'];
        $form_title				= $_POST['form_title'];
        $form_forename			= $_POST['form_forename'];
        $form_surname			= $_POST['form_surname'];
        $group_choice			= $_POST['group_choice'];
        $group_choice_radio		= $_POST['group_choice_radio'];
        $intv_write				= $_POST['intv_write'];
        $acturl_write			= $_POST['acturl_write'];
        $act_write				= $_POST['act_write'];
        $act_mailformat			= $_POST['act_mailformat'];
        $deactivation			= $_POST['deactivation'];
        $newentrie_mail			= $_POST['newentrie_mail'];
        $newentrie_mail_address	= $_POST['newentrie_mail_address'];
        $newsletter_captcha		= $_POST['newsletter_captcha'];
        $newsletter_ajax		= $_POST['newsletter_ajax'];


        $layout_bgcolor			= $_POST['layout_bgcolor'];
        $layout_background		= $_POST['layout_background'];
        $layout_width			= $_POST['layout_width'];
        $layout_textfieldwidth	= $_POST['layout_textfieldwidth'];
        $layout_font_face		= $_POST['layout_font_face'];
        $layout_font_color		= $_POST['layout_font_color'];
        $layout_font_size		= $_POST['layout_font_size'];

        $message_type			= $_POST['message_type'];

        $newsolved_plugin_prefix	= $_POST['newsolved_plugin_prefix'];
        $newsolved_plugin_activate	= $_POST['newsolved_plugin_activate'];

        $welcome					= $_POST['welcome'];

        $send_type		= $_POST['send_type'];
        $send_oldway	= $_POST['send_oldway'];
        //$send_exe		= $_POST['send_exe'];
        $smtp_user		= $_POST['smtp_user'];
        $smtp_pw		= $_POST['smtp_pw'];
        $smtp_relay		= $_POST['smtp_relay'];
        $smtp_port		= $_POST['smtp_port'];
        $wysiwyg		= $_POST['wysiwyg'];
        $image_upload	= $_POST['image_upload'];
        $attachment_upload	= $_POST['attachment_upload'];
        $attach_viewcount	= $_POST['attach_viewcount'];
        $group_select		= $_POST['group_select'];

		$lang_id	= $_POST['lang_id'];

    	$mysql->query("UPDATE {$prefix}_language SET language_aktiv='1' WHERE id='$lang_id'");
    	$mysql->query("UPDATE {$prefix}_language SET language_aktiv='0' WHERE id<>'$lang_id'");


		$mysql->query("UPDATE $prefix"."_settings SET newsletter_profile='$newsletter_profile', intervall='$intv_write', activation_url='$acturl_write', activation='$act_write', mailformat='$act_mailformat', newentrie_mail='$newentrie_mail', newentrie_mail_address='$newentrie_mail_address', layout_bgcolor='$layout_bgcolor', layout_background='$layout_background', layout_width='$layout_width', layout_font_face='$layout_font_face', layout_font_color='$layout_font_color', layout_font_size='$layout_font_size', message_type='$message_type', form_title='$form_title', form_forename='$form_forename', form_surname='$form_surname', group_choice='$group_choice', group_choice_radio='$group_choice_radio', newsolved_plugin_prefix='$newsolved_plugin_prefix', newsolved_plugin_activate='$newsolved_plugin_activate', welcome='$welcome', send_type='$send_type', send_oldway='$send_oldway', smtp_user='$smtp_user', smtp_pw='$smtp_pw', smtp_relay='$smtp_relay', smtp_port='$smtp_port', newsletter_form='$newsletter_form', wysiwyg='$wysiwyg', image_upload='$image_upload', deactivation='$deactivation', layout_textfieldwidth='$layout_textfieldwidth', attachment_upload='$attachment_upload', attach_viewcount='$attach_viewcount', group_select='$group_select', newsletter_ajax='{$newsletter_ajax}', newsletter_captcha='{$newsletter_captcha}'");




        echo "<table><tr><td><b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_edited']."!</font></b><br>";

        for($i=1;$i<182;$i++)
        {
        	echo ".";
        }

        echo "</td></tr></table><br>";
	}

	############################################################

	$get_set=$mysql->query("SELECT * FROM $prefix"."_settings");
	$aus_settings=$mysql->fetchObject($get_set);

	$sig_write					= $aus_settings->sig;
	$form_title					= $aus_settings->form_title;
	$form_forename				= $aus_settings->form_forename;
	$form_surname				= $aus_settings->form_surname;
	$group_choice				= $aus_settings->group_choice;
	$group_choice_radio			= $aus_settings->group_choice_radio;
	$abs_write					= $aus_settings->absender;
	$betr_write					= $aus_settings->betreff;
	$intv_write					= $aus_settings->intervall;
	$acturl_write				= $aus_settings->activation_url;
	$act_write					= $aus_settings->activation;
	$newentrie_mail_address		= $aus_settings->newentrie_mail_address;
	$act_mailformat				= $aus_settings->mailformat;
	$deactivation				= $aus_settings->deactivation;
	$newentrie_mail				= $aus_settings->newentrie_mail;
	$message_type				= $aus_settings->message_type;
	$newsolved_plugin_activate	= $aus_settings->newsolved_plugin_activate;
	$newsolved_plugin_prefix	= $aus_settings->newsolved_plugin_prefix;

	$welcome					= $aus_settings->welcome;
	$newsletter_form			= $aus_settings->newsletter_form;
	$newsletter_profile			= $aus_settings->newsletter_profile;

	$smtp_user					= $aus_settings->smtp_user;
	$smtp_pw					= $aus_settings->smtp_pw;
	$smtp_relay					= $aus_settings->smtp_relay;
	$smtp_port					= $aus_settings->smtp_port;
	//$send_exe=$aus_settings->send_exe;
	$send_type					= $aus_settings->send_type;
	$send_oldway				= $aus_settings->send_oldway;
	$wysiwyg					= $aus_settings->wysiwyg;
	$image_upload				= $aus_settings->image_upload;
	$attachment_upload			= $aus_settings->attachment_upload;
	$attach_viewcount			= $aus_settings->attach_viewcount;
	$group_select				= $aus_settings->group_select;
	$newsletter_captcha			= $aus_settings->newsletter_captcha;
	$newsletter_ajax			= $aus_settings->newsletter_ajax;


	if($act_write=="0"){$act_write_c0="checked";}
	else{$act_write_c1="checked";}

	if($form_title=="0"){$form_title_c0="checked";}
	else{$form_title_c1="checked";}

	if($form_forename=="0"){$form_forename_c0="checked";}
	else{$form_forename_c1="checked";}

	if($form_surname=="0"){$form_surname_c0="checked";}
	else{$form_surname_c1="checked";}

	if($group_choice=="0"){$group_choice_c0="checked";}
	else{$group_choice_c1="checked";}

	if($group_choice_radio=="0"){$group_choice_radio_c0="checked";}
	else{$group_choice_radio_c1="checked";}

	if($act_mailformat=="0"){$act_format_c0="checked";}
	else{$act_format_c1="checked";}

	if($deactivation=="0"){$deactivation_c0="checked";}
	else{$deactivation_c1="checked";}

	if($newentrie_mail=="0"){$act_newentrie_mail_c0="checked";}
	else{$act_newentrie_mail_c1="checked";}

	if($message_type=="0"){$message_type_c0="checked";}
	else{$message_type_c1="checked";}

	if($newsolved_plugin_activate=="0"){$newsolved_plugin_activate_c0="checked";}
	else{$newsolved_plugin_activate_c1="checked";}

	if($welcome=="0"){$welcome_c0="checked";}
	else{$welcome_c1="checked";}

	if($send_type=="0"){$send_type_c0="checked";}
	else{$send_type_c1="checked";}

	if($newsletter_form=="0"){$newsletter_form_c0="checked";}
	else{$newsletter_form_c1="checked";}

	if($newsletter_profile=="0"){$newsletter_profile_c0="checked";}
	else{$newsletter_profile_c1="checked";}

	if($newsletter_form=="0"){$newsletter_form_c0="checked";}
	else{$newsletter_form_c1="checked";}

	if($wysiwyg=="0"){$wysiwyg_c0="checked";}
	else{$wysiwyg_c1="checked";}

	if($image_upload=="0"){$image_upload_c0="checked";}
	else{$image_upload_c1="checked";}

	if($attachment_upload=="0"){$attachment_upload_c0="checked";}
	else{$attachment_upload_c1="checked";}

	if($attach_viewcount=="0"){$attach_viewcount_c0="checked";}
	else{$attach_viewcount_c1="checked";}

	if($newsletter_captcha=="0"){$newsletter_captcha_c0="checked";}
	else{$newsletter_captcha_c1="checked";}

	if($newsletter_ajax=="0"){$newsletter_ajax_c0="checked";}
	else{$newsletter_ajax_c1="checked";}

	if($send_oldway=="1"){$send_oldway_c0="checked";}

	$twidth=690;
    $tdwidth=5;
    $tdcolorwidth=4;
    $eingerueckt=7;
    $tdcolor1="#FCE99A";
    $tdcolor2="#FCE99A";
    $tdcolor3="#FCE99A";


    echo "<form action=\"$php_self\" method=\"post\">";



/***************************/
echo "<table>";
echo "<tr><td style=\"background-color:".$tdcolor1.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/

	echo "<table>";

		echo "<tr><td style=\"font-size:13pt;\"><b>".$lang['settings_nl_headline']."</b></td></tr>";
		echo "<tr><td style=\"height:10px;\"></td></tr>";

	echo "</table>";



        ##########################################################################################

        echo "<br><table><tr><td style=\"padding-left:".$eingerueckt."px;\">";
		###################################################


                echo "<table>";
                echo "<tr><td><b><u>".$lang['settings_nl_settings']."</u></b></td></tr>";
                echo "<tr><td height=\"8\"></td><td></td></tr>";
                echo "</table>";

                echo "<table>";

                    echo "<tr><td valign=\"top\" style=\"width:360px;\">";
                    echo "<table cellspacing=\"0\" cellpadding=\"0\">";

                    ##############################
					$between=4;

                    echo "<tr><td><u>".$lang['settings_nl_general'].":</u></td></tr>";
                    echo "<tr><td height=\"14\"></td></tr>";

                    //echo "<tr><td>".$lang['settings_nl_nlform'].":</td><td><input type=\"radio\" name=\"newsletter_form\" value=\"0\" $newsletter_form_c0>".$lang['settings_nl_nlform_html']." <input type=\"radio\" name=\"newsletter_form\" value=\"1\" $newsletter_form_c1>".$lang['settings_nl_nlform_flash']."</td></tr>";
					echo "<tr><td height=\"".$between."\"></td></tr>";
					
                    echo "<tr><td>".$lang['settings_nl_ajax'].":</td><td><input type=\"radio\" name=\"newsletter_ajax\" value=\"0\" $newsletter_ajax_c0>".$lang['settings_no']." <input type=\"radio\" name=\"newsletter_ajax\" value=\"1\" $newsletter_ajax_c1>".$lang['settings_yes']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_ajax')\" onMouseOut=\"hideTIP()\"></td></tr>";
					echo "<tr><td height=\"".$between."\"></td></tr>";
					
                    echo "<tr><td>".$lang['settings_nl_nlprofile'].":</td><td><input type=\"radio\" name=\"newsletter_profile\" value=\"0\" $newsletter_profile_c0>".$lang['settings_no']." <input type=\"radio\" name=\"newsletter_profile\" value=\"1\" $newsletter_profile_c1>".$lang['settings_yes']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_profile')\" onMouseOut=\"hideTIP()\"></td></tr>";
					echo "<tr><td height=\"".$between."\"></td></tr>";

					echo "<tr><td height=\"18\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_useractivation'].":</td><td><input type=\"radio\" name=\"act_write\" value=\"0\" $act_write_c0>".$lang['settings_nl_instand']." <input type=\"radio\" name=\"act_write\" value=\"1\" $act_write_c1>".$lang['settings_nl_viaemail']."</td></tr>";
					echo "<tr><td height=\"".$between."\"></td></tr>";




                    echo "<tr><td>".$lang['settings_nl_unsubscribeinmail'].":</td><td><input type=\"radio\" name=\"deactivation\" value=\"0\" $deactivation_c0>".$lang['settings_no']." <input type=\"radio\" name=\"deactivation\" value=\"1\" $deactivation_c1>".$lang['settings_yes']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_unsubscribeinmail')\" onMouseOut=\"hideTIP()\"></td></tr>";
					echo "<tr><td height=\"".$between."\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_welcome'].":</td><td><input type=\"radio\" name=\"welcome\" value=\"0\" $welcome_c0>".$lang['settings_no']." <input type=\"radio\" name=\"welcome\" value=\"1\" $welcome_c1>".$lang['settings_yes']."</td></tr>";
					echo "<tr><td height=\"".$between."\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_usergroup'].":</td><td><input type=\"radio\" name=\"group_choice\" value=\"0\" $group_choice_c0>".$lang['settings_no']." <input type=\"radio\" name=\"group_choice\" value=\"1\" $group_choice_c1>".$lang['settings_yes']."</td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";


                    echo "<tr><td>".$lang['settings_nl_usergroup_radio'].":</td><td><input type=\"radio\" name=\"group_choice_radio\" value=\"0\" $group_choice_radio_c0>".$lang['settings_no']." <input type=\"radio\" name=\"group_choice_radio\" value=\"1\" $group_choice_radio_c1>".$lang['settings_yes']."</td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";

                    if($group_choice_radio == 1)
                    {
                        echo "<tr><td>".$lang['settings_nl_userselect'].":</td><td style=\"padding-left: 6px;\">";

                        echo "<select name=\"group_select\" style=\"font-family: arial; font-size: 9; width:100px;\">";

       						if($group_select==0) $group_select_c0 = "selected";
       						else $group_select_c1 = "selected";


                            echo "<option value=\"0\" {$group_select_c0}>Radio Buttons</option>";
                            echo "<option value=\"1\" {$group_select_c1}>Drop Down</option>";

                        echo "</select>";

                        echo "</td></tr>";
                        echo "<tr><td height=\"".$between."\"></td></tr>";
					}

                    echo "<tr><td>".$lang['settings_nl_captcha'].":</td><td><input type=\"radio\" name=\"newsletter_captcha\" value=\"0\" $newsletter_captcha_c0>".$lang['settings_no']." <input type=\"radio\" name=\"newsletter_captcha\" value=\"1\" $newsletter_captcha_c1>".$lang['settings_yes']."</td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_titleinput'].":</td><td><input type=\"radio\" name=\"form_title\" value=\"0\" $form_title_c0>".$lang['settings_no']." <input type=\"radio\" name=\"form_title\" value=\"1\" $form_title_c1>".$lang['settings_yes']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_titleinfo')\" onMouseOut=\"hideTIP()\"></td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_forenameinput'].":</td><td><input type=\"radio\" name=\"form_forename\" value=\"0\" $form_forename_c0>".$lang['settings_no']." <input type=\"radio\" name=\"form_forename\" value=\"1\" $form_forename_c1>".$lang['settings_yes']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_forenameinfo')\" onMouseOut=\"hideTIP()\"></td></tr>";
                        echo "<tr><td height=\"".$between."\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_surnameinput'].":</td><td><input type=\"radio\" name=\"form_surname\" value=\"0\" $form_surname_c0>".$lang['settings_no']." <input type=\"radio\" name=\"form_surname\" value=\"1\" $form_surname_c1>".$lang['settings_yes']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_surnameinfo')\" onMouseOut=\"hideTIP()\"></td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";

                    echo "<tr><td height=\"18\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_mailtoadmin'].":</td><td><input type=\"radio\" name=\"newentrie_mail\" value=\"0\" $act_newentrie_mail_c0>".$lang['settings_no']." <input type=\"radio\" name=\"newentrie_mail\" value=\"1\" $act_newentrie_mail_c1>".$lang['settings_yes']."</td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";
					
					if($newsletter_ajax == 0)
					{
                    echo "<tr><td>".$lang['settings_nl_popup_msgs'].":</td><td><input type=\"radio\" name=\"message_type\" value=\"0\" $message_type_c0>".$lang['settings_no']." <input type=\"radio\" name=\"message_type\" value=\"1\" $message_type_c1>".$lang['settings_yes']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_popup')\" onMouseOut=\"hideTIP()\"></td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";
                    }

                    echo "<tr><td>".$lang['settings_nl_plugin_activate'].":</td><td><input type=\"radio\" name=\"newsolved_plugin_activate\" value=\"0\" $newsolved_plugin_activate_c0>".$lang['settings_no']." <input type=\"radio\" name=\"newsolved_plugin_activate\" value=\"1\" $newsolved_plugin_activate_c1>".$lang['settings_yes']."</td></tr>";
                    echo "<tr><td height=\"".$between."\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_language'].":</td><td style=\"padding-left: 6px;\">";

                    echo "<select name=\"lang_id\" style=\"font-family: arial; font-size: 9; width:100px;\">";
                    $get_language_new=$mysql->query("SELECT * FROM {$prefix}_language ORDER BY language_name");
                    while($aus_language_new=$mysql->fetchObject($get_language_new))
                    {
                        if($aus_language_new->language_aktiv == 1)
                        {
                        echo "<option value=\"$aus_language_new->id\" selected>$aus_language_new->language_name</option>";
                        }
                        else
                        {
                        echo "<option value=\"$aus_language_new->id\">$aus_language_new->language_name</option>";
                        }
                    }
                    echo "</select>";

                    echo "</td></tr>";

					echo "</table>";
					echo "</td><td>";

					##############################

					echo "<td valign=\"top\">";

					################
                    echo "<table>";
                    echo "<tr><td><u>".$lang['settings_nl_mailsending'].":</u></td></tr>";
                    echo "<tr><td height=\"6\"></td></tr>";

                    echo "<tr><td width=\"120\">".$lang['settings_nl_mailencoding'].":</td><td width=\"190\"><input type=\"radio\" name=\"act_mailformat\" value=\"0\" $act_format_c0>".$lang['settings_nl_text']." <input type=\"radio\" name=\"act_mailformat\" value=\"1\" $act_format_c1>".$lang['settings_nl_html']."</td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_encoding')\" onMouseOut=\"hideTIP()\"></td></tr>";

                    echo "<tr><td width=\"120\">".$lang['settings_nl_wysiwyg'].":</td><td width=\"190\"><input type=\"radio\" name=\"wysiwyg\" value=\"0\" $wysiwyg_c0>".$lang['settings_no']." <input type=\"radio\" name=\"wysiwyg\" value=\"1\" $wysiwyg_c1>".$lang['settings_yes']."</td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_wysiwyg')\" onMouseOut=\"hideTIP()\"></td></tr>";

                    echo "<tr><td width=\"120\">".$lang['settings_nl_image_upload'].":</td><td width=\"190\"><input type=\"radio\" name=\"image_upload\" value=\"0\" $image_upload_c0>".$lang['settings_no']." <input type=\"radio\" name=\"image_upload\" value=\"1\" $image_upload_c1>".$lang['settings_yes']."</td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_image_upload')\" onMouseOut=\"hideTIP()\"></td></tr>";

                    echo "<tr><td width=\"120\">".$lang['settings_nl_attachment_upload'].":</td><td width=\"190\"><input type=\"radio\" name=\"attachment_upload\" value=\"0\" $attachment_upload_c0>".$lang['settings_no']." <input type=\"radio\" name=\"attachment_upload\" value=\"1\" $attachment_upload_c1>".$lang['settings_yes']."</td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_attachment_upload')\" onMouseOut=\"hideTIP()\"></td></tr>";

                    echo "<tr><td width=\"120\">".$lang['settings_nl_attach_viewcount'].":</td><td width=\"190\"><input type=\"radio\" name=\"attach_viewcount\" value=\"0\" $attach_viewcount_c0>".$lang['settings_no']." <input type=\"radio\" name=\"attach_viewcount\" value=\"1\" $attach_viewcount_c1>".$lang['settings_yes']."</td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_attach_viewcount')\" onMouseOut=\"hideTIP()\"></td></tr>";

                    echo "</table>";

/*
                    echo "<table>";


                    echo "<tr><td width=\"120\">".$lang['settings_nl_sendtype'].":</td><td width=\"190\"><input type=\"radio\" name=\"send_type\" value=\"0\" $send_type_c0 onClick=\"swapOptions('hide','smtp',false);\">".$lang['settings_nl_sendtype_type1']." ";
                    //echo "<input type=\"radio\" name=\"send_type\" value=\"1\" $send_type_c1 onClick=\"swapOptions('show','smtp',false);\">".$lang['settings_nl_sendtype_type2']."</td>";
                    //echo " / [] ".$lang['settings_nl_sendtype_type2']." nicht implementiert";
                    echo "</td>";
                    echo "<td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_sendmail_info')\" onMouseOut=\"hideTIP()\"></td></tr>";

                    echo "</table>";
*/
                    echo "<table cellpadding=\"0\" cellspacing=\"0\">";
                    echo "<tr><td>";

                    echo "<div id=\"smtp_settings_show\">";

                        echo "<table>";
                        echo "<tr><td height=\"6\" width=\"120\"></td><td width=\"190\"></td></tr>";

                        echo "<tr><td>".$lang['settings_nl_sendtype_relay'].":</td><td><input type=\"text\" name=\"smtp_relay\" value=\"$smtp_relay\" maxlength=\"250\" style=\"width:100px;\"> ".$lang['settings_nl_sendtype_port'].": <input type=\"text\" name=\"smtp_port\" value=\"$smtp_port\" maxlength=\"5\" style=\"width:42px;\"></td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_smtp')\" onMouseOut=\"hideTIP()\"></td></tr>";


                        echo "<tr><td>".$lang['settings_nl_sendtype_user'].":</td><td><input type=\"text\" name=\"smtp_user\" value=\"$smtp_user\" maxlength=\"250\" style=\"width:178px;\"></td></tr>";
                        echo "<tr><td>".$lang['settings_nl_sendtype_pw'].":</td><td><input type=\"text\" name=\"smtp_pw\" value=\"$smtp_pw\" maxlength=\"250\" style=\"width:178px;\"></td></tr>";
                        echo "</table>";

                    echo "</div>";
                    echo "</td></tr>";


                    if($send_type_c1!="checked")
                    {
					?>
						<script language="JavaScript" type="text/javascript">
						<!--
						swapOptions('hide','smtp',false);
						// -->
						</script>
					<?php
					}


                    echo "</table>";

                    ################

                    echo "<table>";
                    echo "<tr><td width=\"120\">".$lang['settings_nl_interval'].":</td><td width=\"190\"><input type=\"text\" name=\"intv_write\" value=\"$intv_write\" maxlength=\"5\" style=\"width:38px;\"> ".$lang['settings_nl_sec']."</td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_intervall')\" onMouseOut=\"hideTIP()\"></td></tr>";
                    echo "<tr><td width=\"120\">".$lang['settings_nl_oldway'].":</td><td width=\"190\"><input type=\"checkbox\" name=\"send_oldway\" value=\"1\" $send_oldway_c0></td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_oldway')\" onMouseOut=\"hideTIP()\"></td></tr>";
					echo "</table>";

					################
                    echo "<table>";

                    echo "<tr><td height=\"30\" width=\"120\"></td><td width=\"190\"></td></tr>";

                    echo "<tr><td>".$lang['settings_nl_plugin_prefix'].":</td><td><input type=\"text\" name=\"newsolved_plugin_prefix\" value=\"$newsolved_plugin_prefix\" size=\"24\" maxlength=\"250\"></td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_prefix')\" onMouseOut=\"hideTIP()\"></td></tr>";
                    echo "<tr><td>".$lang['settings_nl_mailaddress'].":</td><td><input type=\"text\" name=\"newentrie_mail_address\" value=\"$newentrie_mail_address\" size=\"24\" maxlength=\"250\"></td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_email')\" onMouseOut=\"hideTIP()\"></td></tr>";
                    echo "<tr><td>".$lang['settings_nl_scriptpath'].":</td><td><input type=\"text\" name=\"acturl_write\" value=\"$acturl_write\" size=\"24\" maxlength=\"250\"></td><td><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_scriptpath')\" onMouseOut=\"hideTIP()\"></td></tr>";
                    echo "</table>";

                    ################



				echo "</td></tr>";
                echo "</table>";


 		###################################################
		echo "</td></tr></table>";

        ##########################################################################################


        echo "<table style=\"padding-left:".$eingerueckt."px;\">";
        echo "<tr><td style=\"height:25px;\"></td></tr>";
        echo "<tr><td><div style=\"background-image:url(images/menu_line.gif); width:".$twidth."px; height:1px;\"></div></td></tr>";
        echo "<tr><td style=\"height:25px;\"></td></tr>";
        echo "</table>";

        ##########################################################################################

        echo "<table><tr><td style=\"padding-left:".$eingerueckt."px;\">";
		###################################################


            echo "<table>";
            echo "<tr><td><b><u>".$lang['settings_nl_layout']."</u></b></td></tr>";
            echo "<tr><td height=\"8\"></td><td></td></tr>";
            echo "<tr><td>".$lang['settings_nl_width'].":</td><td><input type=\"text\" name=\"layout_width\" value=\"".$aus_settings->layout_width."\" maxlength=\"3\" style=\"width:30;\"></td></tr>";

		    echo "<tr><td>".$lang['settings_nl_tfwidth'].":</td><td><input type=\"text\" name=\"layout_textfieldwidth\" value=\"".$aus_settings->layout_textfieldwidth."\" maxlength=\"3\" style=\"width:30;\"></td></tr>";

            echo "<tr><td>".$lang['settings_nl_bgcolor'].":</td><td><input type=\"text\" name=\"layout_bgcolor\" value=\"".$aus_settings->layout_bgcolor."\" style=\"width:140;\" maxlength=\"7\"></td></tr>";
            echo "<tr><td>".$lang['settings_nl_background'].":</td><td><input type=\"text\" name=\"layout_background\" value=\"".$aus_settings->layout_background."\" style=\"width:140;\"></td></tr>";

            echo "<tr><td>".$lang['settings_nl_fontcolor'].":</td><td><input type=\"text\" name=\"layout_font_color\" value=\"".$aus_settings->layout_font_color."\" style=\"width:140;\" maxlength=\"7\"></td></tr>";
            echo "<tr><td>".$lang['settings_nl_fontsize'].":</td><td><input type=\"text\" name=\"layout_font_size\" value=\"".$aus_settings->layout_font_size."\" style=\"width:140;\" maxlength=\"2\"></td></tr>";

            if($aus_settings->layout_font_face=="Arial")$c_1="selected";
            if($aus_settings->layout_font_face=="Verdana")$c_2="selected";
            if($aus_settings->layout_font_face=="Tahoma")$c_3="selected";
            if($aus_settings->layout_font_face=="Times New Roman")$c_4="selected";
            if($aus_settings->layout_font_face=="Courier New")$c_5="selected";
            if($aus_settings->layout_font_face=="Comic Sans MS")$c_6="selected";
            echo "<tr><td>".$lang['settings_nl_fonttype'].":</td><td><select name=\"layout_font_face\">
            <option value=\"Arial\" $c_1>Arial</option>
            <option value=\"Verdana\" $c_2>Verdana</option>
            <option value=\"Tahoma\" $c_3>Tahoma</option>
            <option value=\"Times New Roman\" $c_4>Times New Roman</option>
            <option value=\"Courier New\" $c_5>Courier New</option>
            <option value=\"Comic Sans MS\" $c_6>Comic Sans MS</option>
            </select></td></tr>";

            echo "</table>";



		###################################################
		echo "</td></tr></table>";


/***************************/
echo "</td></tr>";
echo "</table>";


echo "<br><br><table align=\"center\"><tr><td><input type=\"submit\" name=\"sig_ok\" value=\"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang['settings_savesettings']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\" class=\"button\"></td></tr></table>";

echo "</form>";

}
else
	echo "No Access!";
?>