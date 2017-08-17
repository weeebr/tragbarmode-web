<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


@set_time_limit(0);
@session_start();


###############################################################
###############################################################

include(dirname(__FILE__)."/settings/connect.php");
require(dirname(__FILE__)."/inc/user_check.php");
include(dirname(__FILE__)."/inc/admin_dbimport.php");
include(dirname(__FILE__)."/inc/json_encode.php");


if($user_group == "-1")
{
    session_destroy();
    setcookie("usolved_nletter", "", time() - 3600);

	die('Tell your admin to set a user group for you!');
}

if($_POST['export_start'])
{
    include(dirname(__FILE__)."/inc/admin_dbexport_groups.php");
}
elseif($_POST['export_start_emails'])
{
    include(dirname(__FILE__)."/inc/admin_dbexport_emails.php");
}

$logout=$_GET['logout'];
if($logout=="ok")
{
    $get_settings=$mysql->query("SELECT * FROM {$prefix}_settings");
    $aus_settings=$mysql->fetchObject($get_settings);

	$mysql->query("DELETE FROM {$prefix}_intern_login WHERE id_user='{$user_id}'");


    if($aus_settings->loginsave==0)
    {
        session_start();
        session_destroy();
    }
    else
    {
        setcookie("usolved_nletter", "", time() - 3600);
    }

    header("location: ".$file_root."/admin.php");
}




if(empty($inclusion_path))
{
	$inclusion_path=$file_root."/admin.php?";
}

###########################################################

$lang_ok=$_POST['lang_ok'];
$lang_id=$_POST['lang_id'];
if($_POST['lang_ok'])
{
    //$mysql->query("UPDATE {$prefix}_language SET language_aktiv='1' WHERE id='$lang_id'");
    //$mysql->query("UPDATE {$prefix}_language SET language_aktiv='0' WHERE id<>'$lang_id'");

    $mysql->query("UPDATE {$prefix}_intern_users SET id_language='{$lang_id}' WHERE id='{$user_id}'");


    //da lang schon in check eingebunden

	$get_language=$mysql->query("SELECT * FROM {$prefix}_language WHERE id='{$lang_id}'");
	$aus_language=$mysql->fetchObject($get_language);

	require("settings/$aus_language->language_file");

	$user_language = $lang_id;
}





################ Gruppen definieren die der User hat #####################


    $get_access=$mysql->query("SELECT * FROM {$prefix}_intern_groups WHERE id='{$user_group}'");

	if($user_group == 1)
	{
		define('admin', 1);

    	$get_access_name=$mysql->query("SELECT * FROM {$prefix}_intern_permission_name");
    	while($out_access_name=$mysql->fetchObject($get_access_name))
    	{
    		define($out_access_name->perm_name, 1);
    	}
	}
	else
	{

        $get_access=$mysql->query("SELECT * FROM {$prefix}_intern_permission WHERE id_group='{$user_group}'");
        while($out_access=$mysql->fetchObject($get_access))
        {

            $get_access_name=$mysql->query("SELECT * FROM {$prefix}_intern_permission_name WHERE perm_name='{$out_access->id_permission_name}'");
            $out_access_name=$mysql->fetchObject($get_access_name);

            if($user_group == "1")
                define($out_access_name->perm_name, 1);
            else if($out_access->perm_flag == "1")
                define($out_access_name->perm_name, 1);
        }

    }



################### Login Methode ändern ####################

$c_login=$_GET['c_login'];
if($c_login=="ok")
{
	$c_into=$_GET['c_into'];


    if(defined('admin'))
    {
    	$mysql->query("UPDATE {$prefix}_settings SET loginsave='$c_into'");
		$mysql->query("DELETE FROM {$prefix}_intern_login WHERE id_user='{$user_id}'");

    	if($c_into=="0")
    	{
            setcookie("usolved_nletter", "", time() - 3600);
    	}
    	else
    	{
            session_start();
            session_destroy();
    	}

		header("location: ".$file_root."/admin.php");
    }
}


############# Newsletter Script deinstallieren ##############

$deinstall=$_GET['deinstall'];
if($deinstall=="ok")
{
    $get_axxs=$mysql->query("SELECT id,userlevel FROM {$prefix}_intern_users WHERE user='$user_name'");
    $aus_axxs=$mysql->fetchObject($get_axxs);

    if($aus_axxs->userlevel== 1)
    {
        $mysql->query("DROP TABLE {$prefix}_intern_login");
        $mysql->query("DROP TABLE {$prefix}_intern_users");
        $mysql->query("DROP TABLE {$prefix}_entries");
        $mysql->query("DROP TABLE {$prefix}_resume");
        $mysql->query("DROP TABLE {$prefix}_send_in");
        $mysql->query("DROP TABLE {$prefix}_send_out");
        $mysql->query("DROP TABLE {$prefix}_archiv");
        $mysql->query("DROP TABLE {$prefix}_settings");
        $mysql->query("DROP TABLE {$prefix}_plugin_cron");
        $mysql->query("DROP TABLE {$prefix}_language");
        $mysql->query("DROP TABLE {$prefix}_savedemails");
        $mysql->query("DROP TABLE {$prefix}_charset");
        $mysql->query("DROP TABLE {$prefix}_info");
        $mysql->query("DROP TABLE {$prefix}_mailjobs");
        $mysql->query("DROP TABLE {$prefix}_intern_permission");
        $mysql->query("DROP TABLE {$prefix}_intern_groups");
        $mysql->query("DROP TABLE {$prefix}_intern_permission_name");

        header("location: ".$file_root."/inc/deinstall_info.php");
	}
}

#############################################################
/* Adressen exportieren*/


if(isset($_POST['dl_file']))
{
    $get_mails=$mysql->query("SELECT mail FROM {$prefix}_entries ORDER BY mail");
    while($aus_mails=$mysql->fetchObject($get_mails))
    {
    $data.=$aus_mails->mail."\r\n";
    }

    header("Content-Disposition: atachment; filename=nletter_mails.bak");
    header("Content-Type: text/text");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $data;

    exit();
}

#############################################################



if(!empty($_GET['delitem']))		// aufruf aus admin_filebrowser.php
{
    $item = $_GET['delitem'];

    if(strstr($item, "../") == false && $item != "index.htm")
    	unlink("upload/".$item);
    else
    	echo "Error";
}


#############################################################

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
echo "<html>";
echo "<head>";
echo "<title>NLetter - Admin</title>";
echo "<link rel=\"stylesheet\" href=\"".$file_root."/settings/styles.css\" type=\"text/css\">";


/* Menu Hack CSS */
?>

<!--[if IE]>
<style type="text/css" media="screen">
 #menu ul li {float: left; width: 100%;}
</style>
<![endif]-->

<!--[if lt IE 7]>
<style type="text/css" media="screen">
body {
behavior: url(settings/csshover.htc);
font-size: 100%;
}

#menu ul li a {height: 1%;}

#menu a, #menu h2 {
/*font: bold 0.7em/1.4em arial, helvetica, sans-serif;*/
}
</style>
<![endif]-->

<?php

$s=$_GET['s'];
$set=$_GET['set'];

echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/divtools.js\"></script>";
echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/tooltip.js\"></script>";
echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/htmlcode.js\"></script>";
echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/menu.js\"></script>";
echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/fileupload.js\"></script>";
//echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/prototype.js\"></script>";
echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/jquery.min.js\"></script>";
echo "<script language=\"javascript\" src=\"".$file_root."/inc/js/jquery.functions.js\"></script>";

if($aus_settings->wysiwyg==1 && $aus_settings->mailformat==1)
	echo "<script type=\"text/javascript\" src=\"".$file_root."/inc/ckeditor/ckeditor.js\"></script>";

if (!$s) {
  echo '<script type="text/javascript" src="inc/js/xmlhttp.js"></script>';
  echo '<script type="text/javascript" src="inc/js/jobtable.js"></script>';
}

echo "</head>";

if (!$s)
  echo "<body bgcolor=\"#E7EBEE\" onload=\"getMailJobs()\">";
else
  echo "<body bgcolor=\"#E7EBEE\">";

include(dirname(__FILE__)."/inc/admin_tooltips.php");



################################################

if($_GET['groupedit_id'])
{
	include(dirname(__FILE__)."/inc/admin_useredit.php");

    echo "</body></html>";
    exit;
}

###################################

if($_GET['blacklist']=="ok")
{

	include(dirname(__FILE__)."/inc/admin_blacklist.php");

    echo "</body></html>";
    exit;
}

###################################

$archivid=$_GET['archivid'];
if($archivid)
{

    $get_archiv=$mysql->query("SELECT id,id_group,absender,betreff,msg,empf,date_format(date, '%d.%m.%Y') as date, views FROM {$prefix}_archiv WHERE id='$archivid'");
    $aus_archiv=$mysql->fetchObject($get_archiv);

    $get_groupname=$mysql->query("SELECT groupname FROM {$prefix}_groups WHERE id='$aus_archiv->id_group'");
    $aus_groupname=$mysql->fetchObject($get_groupname);

	$text=str_replace("<br>", "\n", $aus_archiv->msg);
	echo "<table>";
    echo "<tr><td width=\"80\"><b>".$lang['admin_archive_addr'].":</b></td><td>".$aus_archiv->absender."</td></tr>";
    echo "<tr><td><b>".$lang['admin_archive_subject'].":</b></td><td>".$aus_archiv->betreff."</td></tr>";
    echo "<tr><td><b>".$lang['admin_archive_date'].":</b></td><td>".$aus_archiv->date."</td></tr>";
    echo "<tr><td valign=\"top\"><b>".$lang['admin_archive_group'].":</b></td><td>".$aus_groupname->groupname."</td></tr>";

    if($aus_settings->attach_viewcount==1 && $aus_settings->send_oldway==0)
    	echo "<tr><td valign=\"top\"><b>".$lang['admin_archive_views'].":</b></td><td>".$aus_archiv->views."</td></tr>";

    echo "<tr><td valign=\"top\"><b>".$lang['admin_archive_msg'].":</b></td><td>".$text."</td></tr>";
	echo "</table>";
	echo "<br>";
	echo "<table>";
    echo "<tr><td>".$lang['admin_archive_t1']." ".$aus_archiv->empf." ".$lang['admin_archive_t2']."!</td></tr>";
	echo "</table>";

    echo "</body></html>";
    exit;
}

################################################

if($aus_language->language_name=="German")
{
    $icon_adminindex="icon_de_adminindex.gif";
    $icon_newsletterindex="icon_de_newsletterindex.gif";
    $icon_sendinindex="icon_de_sendinindex.gif";
    $icon_newsletter="icon_de_newsletter.gif";
    $icon_sendinnew="icon_de_sendin_new.gif";
    $icon_sendin="icon_de_sendin.gif";
    $icon_setuser="icon_de_setuser.gif";
    $icon_settings="icon_de_settings.gif";
    $icon_eximport="icon_de_ex_import.gif";


}
else if($aus_language->language_name=="English")
{
    $icon_adminindex="icon_en_adminindex.gif";
    $icon_newsletterindex="icon_en_newsletterindex.gif";
    $icon_sendinindex="icon_en_sendinindex.gif";
    $icon_newsletter="icon_en_newsletter.gif";
    $icon_sendinnew="icon_en_sendin_new.gif";
    $icon_sendin="icon_en_sendin.gif";
    $icon_setuser="icon_en_setuser.gif";
    $icon_settings="icon_en_settings.gif";
    $icon_eximport="icon_en_ex_import.gif";

}
else if($aus_language->language_name=="French")
{
    $icon_adminindex="icon_fr_adminindex.gif";
    $icon_newsletterindex="icon_fr_newsletterindex.gif";
    $icon_sendinindex="icon_fr_sendinindex.gif";
    $icon_newsletter="icon_fr_newsletter.gif";
    $icon_sendinnew="icon_fr_sendin_new.gif";
    $icon_sendin="icon_fr_sendin.gif";
    $icon_setuser="icon_fr_setuser.gif";
    $icon_settings="icon_fr_settings.gif";
    $icon_eximport="icon_fr_ex_import.gif";

}
else if($aus_language->language_name=="Danish")
{
    $icon_adminindex="icon_dk_adminindex.gif";
    $icon_newsletterindex="icon_dk_newsletterindex.gif";
    $icon_sendinindex="icon_dk_sendinindex.gif";
    $icon_newsletter="icon_dk_newsletter.gif";
    $icon_sendinnew="icon_dk_sendin_new.gif";
    $icon_sendin="icon_dk_sendin.gif";
    $icon_setuser="icon_dk_setuser.gif";
    $icon_settings="icon_dk_settings.gif";
    $icon_eximport="icon_dk_ex_import.gif";

}
else if($aus_language->language_name=="Dutch")
{
    $icon_adminindex="icon_nl_adminindex.gif";
    $icon_newsletterindex="icon_nl_newsletterindex.gif";
    $icon_sendinindex="icon_nl_sendinindex.gif";
    $icon_newsletter="icon_nl_newsletter.gif";
    $icon_sendinnew="icon_nl_sendin_new.gif";
    $icon_sendin="icon_nl_sendin.gif";
    $icon_setuser="icon_nl_setuser.gif";
    $icon_settings="icon_nl_settings.gif";
    $icon_eximport="icon_nl_ex_import.gif";

}



echo "<table cellpadding=\"0\" cellspacing=\"0\"border=\"0\">";
echo "<tr align=\"right\"><td height=\"16\"></td></tr>";
echo "</table>";


echo "<table cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\" width=\"800\">";
echo "<tr align=\"right\">";

echo "<td width=\"512\"></td>";
echo "<td background=\"".$file_root."/images/icon_above.gif\">
<a href=\"".substr($inclusion_path,0,-1)."\"><img src=\"".$file_root."/images/".$icon_adminindex."\" border=\"0\"></a>
<a href=\"".$inclusion_path."nletter_preview=ok\"><img src=\"".$file_root."/images/".$icon_newsletterindex."\" border=\"0\"></a>
<a href=\"".$inclusion_path."sendin_preview=ok\"><img src=\"".$file_root."/images/".$icon_sendinindex."\" border=\"0\"></a>
</td>";


echo "</tr>";
echo "</table>";

echo "<table cellpadding=\"0\" cellspacing=\"1\" align=\"center\" border=\"0\" bgcolor=\"#000000\" width=\"800\">";
echo "<tr><td>";

echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"  bgcolor=\"#FFFFFF\">";
echo "<tr><td>";

//--------------------------


echo "<table cellpadding=\"0\" cellspacing=\"0\"  background=\"".$file_root."/images/tab_o1.jpg\" width=\"100%\">";
echo "<tr><td>";

echo "<table cellpadding=\"0\" cellspacing=\"0\"><tr>";

echo "<td style=\"width:200px;\">";
/* MODULE LOADED */
if(empty($_GET['module']))echo "<img src=\"".$file_root."/images/logo.jpg\">";
else echo "<img src=\"images/tab_o0.jpg\">";
/*###############*/
echo "</td>";

echo "<td style=\"width:330px;\">
<a href=\"".$inclusion_path."s=newsletter\"><img src=\"".$file_root."/images/".$icon_newsletter."\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;
<a href=\"".$inclusion_path."s=sendin\">";


	$view_ids=explode(",",$user_viewed);

	$z=0;
    $get_ids=$mysql->query("SELECT id FROM {$prefix}_send_in ORDER BY id");
    while($aus_ids=$mysql->fetchObject($get_ids))
    {
        $all_ids[$z]=$aus_ids->id;
        $z++;
    }


	$get_send_in=$mysql->query("SELECT count(id) AS send_in_id FROM {$prefix}_send_in");
	$aus_send_in=$mysql->fetchObject($get_send_in);

	$view_ids=explode(",",$user_viewed);
	$new_msgs=$aus_send_in->send_in_id-(count($view_ids)-1);

    if($new_msgs>0)
    	echo "<img src=\"".$file_root."/images/".$icon_sendinnew."\" border=\"0\">";
    else
    	echo "<img src=\"".$file_root."/images/".$icon_sendin."\" border=\"0\">";


echo "</a></td><td>
<a href=\"".$inclusion_path."s=setuser\"><img src=\"".$file_root."/images/".$icon_setuser."\"border=\"0\"></a>&nbsp;&nbsp;&nbsp;
<a href=\"javascript:showPart('settingsTab');\"><img src=\"".$file_root."/images/".$icon_settings."\" border=\"0\"></a>&nbsp;&nbsp;&nbsp;
<a href=\"".$inclusion_path."s=import\"><img src=\"".$file_root."/images/".$icon_eximport."\" border=\"0\"></a>&nbsp;&nbsp;&nbsp";
echo "</td>";

echo "</tr></table>";

echo "</td></tr>";
echo "</table>";


    /* sichtarbeitsregeln */
    if($set=="ok")
    {
        $settingsTabVisibility = "visible";
        $settingsTabDisplay    = "block";
    }
    else
    {
        $settingsTabVisibility = "hidden";
        $settingsTabDisplay    = "none";
    }


	echo "<div id=\"item_settingsTab\" style=\"visibility:".$settingsTabVisibility."; display:".$settingsTabDisplay.";\">";

    echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">";
    echo "<tr><td height=\"3\"></td></tr>";
    echo "<tr bgcolor=\"#666666\"><td background=\"".$file_root."/images/icon_bar.jpg\" class=\"settingsmenu\">";

	echo "<b>".$lang['admin_menu_headline'].":</b>&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<a href=\"".$inclusion_path."set=ok&s=nl\" class=\"white\">".$lang['admin_menu_newsletter']."</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
	echo "<a href=\"".$inclusion_path."set=ok&s=nl_text\" class=\"white\">".$lang['admin_menu_newslettertext']."</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
	echo "<a href=\"".$inclusion_path."set=ok&s=cont\" class=\"white\">".$lang['admin_menu_contactform']."</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
	echo "<a href=\"".$inclusion_path."set=ok&s=other\" class=\"white\">".$lang['admin_menu_misc']."</a>";


    echo "</td></tr>";
    echo "</table>";

    echo "</div>";



        if($s=="newsletter") $padding=0;
		else $padding=8;

echo "<br><br><table cellpadding=\"".$padding."\" cellspacing=\"0\" width=\"100%\"><tr><td>";


	if(!empty($_GET['nletter_preview']))
	{
		echo "<table width=\"100%\"><tr><td><center><b>".$lang['admin_output_newsletter']."</b></center></td></tr></table>";
	}
	elseif(!empty($_GET['sendin_preview']))
	{
		echo "<table width=\"100%\"><tr><td><center><b>".$lang['admin_output_contactform']."</b></center></td></tr></table>";
	}
	else
	{

        ## 2.1 #########################################################################
        //------------------- Überprüfen der Angaben und Senden ------------------------

        /* NEWSolved Plugin - Die letzten X News schicken */
        if(!empty($_POST['newsolved_send_type']))
        {
     		include(dirname(__FILE__)."/inc/admin_newsolved.php");
        }

		if($aus_settings->send_oldway==0)
		{
      		include(dirname(__FILE__)."/inc/admin_dispatchjob.php");
		}
		else
		{
			include(dirname(__FILE__)."/inc/admin_sendmails.php");
		}

        ## 2.0 #########################################################################
        //------------------------- Start -----------------------------

        if(!$s)
        	include(dirname(__FILE__)."/inc/admin_start.php");


        ################################################################################
        ## 3.0 #########################################################################
        //-------------------------- Formular zum Absenden ------------------------------

        else if($s=="newsletter")
        	include(dirname(__FILE__)."/inc/admin_sendform.php");

        ## 4.0 #########################################################################
        //------------------------- Formular zum Absenden -----------------------------

        else if($s=="sendin")
        	include(dirname(__FILE__)."/inc/admin_sendin.php");


        ################################################################################
        ## 5.0 #########################################################################
        //-------------------------- Benutzer Verwaltung ------------------------------

        else if($s=="setuser")
        	include(dirname(__FILE__)."/inc/admin_setuser.php");



        ################################################################################
        ## 6.0 #########################################################################
        //----------------------------- Einstellungen ---------------------------------

        else if($s=="nl")
        	include(dirname(__FILE__)."/inc/admin_settings_nl.php");
        else if($s=="nl_text")
        	include(dirname(__FILE__)."/inc/admin_settings_nl_text.php");
        else if($s=="cont")
        	include(dirname(__FILE__)."/inc/admin_settings_contact.php");
        else if($s=="other")
        	include(dirname(__FILE__)."/inc/admin_settings_misc.php");

        ################################################################################
        ## 7.0 #########################################################################
        //----------------------------- Importieren ---------------------------------

        else if($s=="import")
        	include(dirname(__FILE__)."/inc/admin_ex_import.php");
    	else if($s == "licence")
    	     include("inc/admin_licence.php");
	}


echo "<br></td></tr></table>";



echo "</td></tr></table>";
echo "</td></tr></table>";

################################################################################

echo "<form action=\"\" method=\"post\" style=\"margin: 0; padding: 0;\">";

    if(!empty($_GET['nletter_preview']))
    {

        echo "<br><br>";
		echo "<table cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\">";
		echo "<tr align=\"right\"><td>";
		
        echo "<iframe src=\"".$file_root."/newsletter.php\" width=\"798\" height=\"300\" marginheight=\"10\" marginwidth=\"10\" frameborder=\"0\" align=\"center\" style=\"border: 1px solid #000000; background:#FFFFFF;\">";
        echo "</iframe>";
		
		echo "</td></tr></table>";
    }
    elseif(!empty($_GET['sendin_preview']))
    {

        echo "<br><br>";

		echo "<table cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\">";
		echo "<tr align=\"right\"><td>";
		
        echo "<iframe src=\"".$file_root."/contactform.php\" width=\"798\" height=\"320\" marginheight=\"10\" marginwidth=\"10\" frameborder=\"0\" align=\"center\" style=\"border: 1px solid #000000; background:#FFFFFF;\">";
        echo "</iframe>";
		
        echo "</td></tr></table>";
    }
    elseif(!empty($_POST['preview_ok']))	// html mail vorschau
    {

        echo "<br><br><b>".$lang['sendform_button_preview'].":</b>";
        echo "<table width=\"800\" align=\"center\" frameborder=\"0\" style=\"border: 1px solid #000000; background:#FFFFFF;\"><tr><td valign=\"top\">";
        	echo $text;
        echo "</td></tr></table>";
        echo "<br>";
    }



	echo "<br><table width=\"100%\"><tr><td align=\"center\">";

	if(defined('admin'))
    {
        echo "<img src=\"".$file_root."/images/bottombar_deinstall.gif\"> <a href=\"".$inclusion_path."deinstall=ok\" onClick=\"return confirm('".$lang['admin_deinstall_info']."')\">".$lang['admin_deinstall']."</a>&nbsp;&nbsp;";
        
		echo "<img src=\"".$file_root."/images/bottombar_changelogin.png\"> ";
		if($aus_settings->loginsave=="0"){echo "<a href=\"".$inclusion_path."c_login=ok&c_into=1\">".$lang['admin_to_cookies'];}
        else{echo "<a href=\"".$inclusion_path."c_login=ok&c_into=0\">".$lang['admin_to_sessions'];}
        
		echo $lang['admin_to_change']."</a>&nbsp;&nbsp;";
	}


    echo "<img src=\"".$file_root."/images/bottombar_logout.png\"> <a href=\"".$inclusion_path."logout=ok\">".$lang['admin_logout']."</a>&nbsp;&nbsp;";


	if(defined('admin'))
		echo "<img src=\"".$file_root."/images/bottombar_licence.png\"> <a href=\"admin.php?s=licence\" class=\"green\">Licence Management</a>&nbsp;&nbsp;";
	
    echo "<select name=\"lang_id\" style=\"font-family: arial; font-size: 9; width:100px;\">";
    $get_language_new=$mysql->query("SELECT * FROM {$prefix}_language ORDER BY language_name");
    while($aus_language_new=$mysql->fetchObject($get_language_new))
    {
        if($aus_language_new->id == $user_language)
        {
        echo "<option value=\"$aus_language_new->id\" selected>$aus_language_new->language_name</option>";
        }
        else
        {
        echo "<option value=\"$aus_language_new->id\">$aus_language_new->language_name</option>";
        }
    }
    echo "</select>&nbsp;<input type=\"submit\" name=\"lang_ok\" value=\"".$lang['admin_lang_button']."\">";

	
	
	echo "</td></tr>";

    $get_info	= $mysql->query("SELECT * FROM {$prefix}_info");
    $aus_info	= $mysql->fetchObject($get_info);
	$VALID		= $aus_info->licencevalid;

	echo "<tr><td align=\"center\">NLetter v".$aus_info->version;
	
	if($VALID)
		echo " (licensed)";
	
	echo " &copy by <a href=\"http://www.usolved.net\" target=\"_blank\">USOLVED</a>";
	

	echo "</td></tr></table>";

echo "</form>";



echo "</body>";
echo "</html>";

?>