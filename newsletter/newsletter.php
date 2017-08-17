<?php

##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

require_once(dirname(__FILE__)."/settings/connect.php");


/* Copyrights for Template and Script */

$aus_info	 				= $mysql->fetchObject($mysql->query("SELECT * FROM $prefix"."_info"));
$VERSION_INFO				= $aus_info->version;
$DOMAIN						= $aus_info->licencedomain;
$VALID						= $aus_info->licencevalid;
$COPYRIGHT_TAG				= $aus_info->licencecopyright;
$LANGUAGE_ID				= "";
$HTMLFORM_AFTER_SUBSCRIBE 	= true;

$COPYRIGHT  = "<!-- NLetter v{$VERSION_INFO}- Copyright by www.usolved.net -->\n";
if( $VALID && !empty($DOMAIN))
	$COPYRIGHT .= "<!-- Licensed for {$DOMAIN} -->\n";
else
	$COPYRIGHT .= "<!-- This licence is for non-commercial use only -->\n";

if($get_set=$mysql->query("SELECT * FROM $prefix"."_settings"))
	$aus_settings = $mysql->fetchObject($get_set);
else
{
	echo "<b>The Script wasn't installed yet. Please execute <a href=\"install.php\">install.php</a>!</b>";
	exit;
}

if(empty($LANGUAGE_ID))
{
    if($get_language=$mysql->query("SELECT * FROM $prefix"."_language WHERE language_aktiv='1'"))
    {
        $aus_language=$mysql->fetchObject($get_language);
        require(dirname(__FILE__)."/settings/".$aus_language->language_file);
    }
}
else
{
    if($get_language=$mysql->query("SELECT * FROM $prefix"."_language WHERE id='{$LANGUAGE_ID}'"))
    {
        $aus_language=$mysql->fetchObject($get_language);
        require(dirname(__FILE__)."/settings/".$aus_language->language_file);
    }
}



/* Get some variables from post, get or server internal stuff */
$FORM_URL				= $_SERVER['PHP_SELF'];
$NEWSLETTER_OK			= $_POST['newsletter_ok'];
$PROFILE_OK				= $_POST['profile_ok'];
$UNLINK_MAIL			= addslashes($_GET['unlink_mail']);
$MAIL_ID				= addslashes($_GET['mail_id']);
$PROFILE_ID				= addslashes($_GET['profile_id']);
$ARCHIVEID				= addslashes($_GET['archiveid']);
$SHOWEMAILID			= addslashes($_GET['showemail']);

/* Get some style variables that has been defined in the admin menu */
$STYLE_FONT_FACE		= $aus_settings->layout_font_face;
$STYLE_FONT_SIZE		= $aus_settings->layout_font_size;
$STYLE_FONT_COLOR		= $aus_settings->layout_font_color;
$STYLE_WIDTH			= $aus_settings->layout_width;
$STYLE_WIDTH_PROFILE	= "300";
$STYLE_TEXTFIELDWIDTH	= $aus_settings->layout_textfieldwidth;
$STYLE_BGCOLOR			= $aus_settings->layout_bgcolor;
$STYLE_BACKGROUND		= $aus_settings->layout_background;

$GROUP_RADIO			= $aus_settings->group_choice_radio;
$GROUP_SELECT			= $aus_settings->group_select;
$AJAX					= $aus_settings->newsletter_ajax;

$STYLE_FONT      		= "font-family: ".$STYLE_FONT_FACE."; font-size: ".$STYLE_FONT_SIZE."pt; color: ".$STYLE_FONT_COLOR.";";
$STYLE_PADDING			= "padding-left: 0px;";



if($aus_settings->form_title == 1)
	$CHECK_SHOW_TITLE = true;

if($aus_settings->form_forename == 1)
	$CHECK_SHOW_FORENAME = true;

if($aus_settings->form_surname == 1)
	$CHECK_SHOW_SURNAME = true;

if($aus_settings->group_choice == 1)
	$CHECK_SHOW_GROUP_CHOICE = true;

if($aus_settings->deactivation == 0)
	$CHECK_SHOW_RADIOBUTTONS = true;

if($aus_settings->newsletter_captcha == 1)
	$CHECK_SHOW_CAPTCHA = true;

define('template', 1);


/* Xajax Framework */
if($AJAX)
{
	require_once(dirname(__FILE__)."/inc/xajax/xajax_core/xajax.inc.php");
    $xajax = new xajax();
    $xajax->configure('javascript URI', 'inc/xajax/');

}
/* --------------- */

require_once(dirname(__FILE__)."/inc/newsletter_functions.php");

/* --------------- */
if($AJAX)
{
    $xajax->registerFunction('subscribe');
    $xajax->processRequest();
}

## 5.0 ##################################################################
//--- Delete E-Mails that are 3 days old and hasnt been unlocked ---

    $zeit_v		= time();
    $zeitdel_d	= $zeit_v-259200;

    $get_delcheck=$mysql->query("SELECT * FROM {$prefix}_entries $prefix"."_entries WHERE flag='1' AND regdate_t<='$zeitdel_d'");
    while($aus_delcheck=$mysql->fetchObject($get_delcheck))
    {
    	removeEMailFromDB($aus_delcheck->id);
    }


## 4.0 ##################################################################
//--- Delete E-Mail address after user clicked the link in his E-Mail ---

if(!empty($_POST['unlink_ok']))
{
	$unlink_value	= $_POST['unlink_value'];

	$get_email_check = $mysql->query("SELECT id, id_unique, mail FROM $prefix"."_entries WHERE id_unique='{$unlink_value}'");
	if($mysql->numRows($get_email_check) != 0)
	{
        $aus_email_check = $mysql->fetchObject($get_email_check);

        /* Remove E-Mail from the Database */
        removeEMailFromDB($aus_email_check->id);

        /* Send an E-Mail to the admin after user unsubscribed */
        if($aus_settings->newentrie_mail == 1)
            sendRemEMailNotification($aus_settings->newentrie_mail_address, $aus_email_check->mail);

        $SET_UNLINKED = "success";
    }
}

if(!empty($UNLINK_MAIL))
{
    $get_email_check = $mysql->query("SELECT id, id_unique, mail FROM $prefix"."_entries WHERE id_unique='{$UNLINK_MAIL}'");
    if($mysql->numRows($get_email_check) == 0)
    	$SET_UNLINKED = "failure";
    else
    	$SET_UNLINKED = "form";
}


## 3.0 ##################################################################
//--- Unlock E-Mail address after user clicked the link in his E-Mail ---

if(!empty($MAIL_ID))
{
    $get_mail_id=$mysql->query("SELECT * FROM $prefix"."_entries WHERE flag='1' AND mail_id='{$MAIL_ID}'");
    if($mysql->numRows($get_mail_id)!="0")
    {
    	$aus_mail_id	= $mysql->fetchObject($get_mail_id);
		$adminEmail		= $aus_settings->newentrie_mail_address;
		$welcomeMessage	= $aus_settings->default_welcome;
		$userEMail		= $aus_mail_id->mail;

        $get_sender		= $mysql->query("SELECT * FROM {$prefix}_senderaddress WHERE sender_default=1");
        $aus_sender		= $mysql->fetchObject($get_sender);
        $sender_email	= $aus_sender->sender_email;
        $sender_name	= $aus_sender->sender_name;

	    $mysql->query("UPDATE $prefix"."_entries SET flag='0' WHERE flag='1' AND mail_id='{$MAIL_ID}'");

		/* Send an E-Mail to the user who subscribed */


        //new
        $get_idunique=$mysql->query("SELECT * FROM {$prefix}_entries WHERE mail_id='{$MAIL_ID}'");
        $aus_idunique=$mysql->fetchObject($get_idunique);

        $profilelink = $aus_settings->mailformat ? "<a href=\"{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}\">{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}</a>" : "{$aus_settings->activation_url}/newsletter.php?profile_id={$aus_idunique->id_unique}";

        $welcomeMessage = str_replace("{PROFILE_LINK}", $profilelink, $welcomeMessage);


        if($aus_settings->welcome == 1)
        	sendWelcomeNotification($userEMail, $sender_name, $sender_email, $welcomeMessage);

		/* Send an E-Mail to the admin after user subscribed */
        if($aus_settings->newentrie_mail == 1)
        	sendNewEMailNotification($adminEmail, $userEMail);

		$SET_UNLOCKED = "success";

    }
    else
    	$SET_UNLOCKED = "failure";
}


## 2.0 ##################################################################
//------------------- Queries after html form submit --------------------


if(!empty($NEWSLETTER_OK))
{
    $mail		= $_POST['mail'];
    $title		= $_POST['title'];
    $forename	= htmlentities($_POST['forename']);
    $surname	= htmlentities($_POST['surname']);
    $action		= $_POST['action'];

    if($forename == $lang['onl_form_forename'])
    	$forename = "";

    if($surname == $lang['onl_form_surname'])
    	$surname = "";

    if($action == "ein")
    {
 		include(dirname(__FILE__)."/inc/newsletter_subscribecheck.php");
    }

    else if($action == "aus")
    {
 		include(dirname(__FILE__)."/inc/newsletter_unsubscribesubcheck.php");
    }

    else if($action == "edit")
    {
 		include(dirname(__FILE__)."/inc/newsletter_editcheck.php");
    }
}

## 1.0 ##################################################################
//---------------------------- Output data -----------------------------


	$get_profile = $mysql->query("SELECT * FROM {$prefix}_entries WHERE id_unique='{$PROFILE_ID}'");

	/* Template - Header */
	require(dirname(__FILE__)."/tpl/tpl_global_header.php");

	/* Template - Notifications */
	if($showArchive == false)
		require(dirname(__FILE__)."/tpl/tpl_newsletter_notifications.php");

	/* Template - Archive */
	if($showArchive == true || !empty($ARCHIVEID))
	{
		require(dirname(__FILE__)."/tpl/tpl_newsletter_archive.php");
	}
	else if(!empty($SHOWEMAILID))
	{
		require(dirname(__FILE__)."/tpl/tpl_newsletter_showemail.php");
	}
	else
	{
		if(!empty($NEWSLETTER_OK) && $HTMLFORM_AFTER_SUBSCRIBE == false && $hide_form == true);
		else
		{
            /* Template - Form */
            if($aus_settings->newsletter_form == 0 && empty($PROFILE_ID) && $showform!="muh")
            	if(!$AJAX)
                	require(dirname(__FILE__)."/tpl/tpl_newsletter_htmlform.php");
                else
                	require(dirname(__FILE__)."/tpl/tpl_newsletter_ajaxform.php");
            elseif($aus_settings->newsletter_form == 1 && empty($PROFILE_ID))
                require(dirname(__FILE__)."/tpl/tpl_newsletter_flashform.php");
            elseif($aus_settings->newsletter_profile == 1 && !empty($PROFILE_ID) && $mysql->numRows($get_profile) != 0)
            {
                $aus_profile = $mysql->fetchObject($get_profile);
                require(dirname(__FILE__)."/tpl/tpl_newsletter_userprofile.php");
            }
        }

	}

	/* Template - Footer */
	require(dirname(__FILE__)."/tpl/tpl_global_footer.php");

?>