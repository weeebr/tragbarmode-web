<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


echo "<html>";
echo "<head>";
echo "<title>NLetter Setup</title>";
echo "<link rel=\"stylesheet\" href=\"settings/styles.css\" type=\"text/css\">";
echo "<script language=\"javascript\" src=\"inc/js/tooltip.js\"></script>";
echo "</head>";
echo "<body bgcolor=\"#E7EBEE\">";


//----------------- Abfragen über Usereingaben - Form 0 -----------------

$inst0=$_POST['inst0'];
if($inst0)
{
    $language_name=$_POST['language_name'];
    if($language_name=="German")
    {
        $language_file="lang_de.php";
        $language_aktiv="1";
        require("settings/$language_file");
    }
    else if($language_name=="English")
    {
        $language_file="lang_en.php";
        $language_aktiv="1";
        require("settings/$language_file");
    }
    else if($language_name=="French")
    {
        $language_file="lang_fr.php";
        $language_aktiv="1";
        require("settings/$language_file");
    }
    else if($language_name=="Danish")
    {
        $language_file="lang_dk.php";
        $language_aktiv="1";
        require("settings/$language_file");
    }
    else if($language_name=="Dutch")
    {
        $language_file="lang_nl.php";
        $language_aktiv="1";
        require("settings/$language_file");
    }
}




$back_0=$_POST['back_0'];
if($back_0)
{
    unset($inst0);
    unset($inst1);
    $language_name=$_POST['language_name'];
    $language_file=$_POST['language_file'];
    $language_aktiv=$_POST['language_aktiv'];
    require("settings/$language_file");
}

$inst1=$_POST['inst1'];
if($inst1)
{
$prefix=$_POST['prefix'];
$db_type=$_POST['db_type'];

$host=$_POST['host'];
$db=$_POST['db'];
$dbuser=$_POST['dbuser'];
$dbpasswd=$_POST['dbpasswd'];

$language_name=$_POST['language_name'];
$language_file=$_POST['language_file'];
$language_aktiv=$_POST['language_aktiv'];
require("settings/$language_file");


echo "<div id=\"box1\">";


	if($host=="")
	{
	$error_log1.="<tr><td>".$lang['inst_error_host']."!</td></tr>";
	unset($inst1);
	$inst0_ok=1;
	}

	if($db=="")
	{
	$error_log1.="<tr><td>".$lang['inst_error_dbname']."!</td></tr>";
	unset($inst1);
	$inst0_ok=1;
	}

	if($dbuser=="")
	{
	$error_log1.="<tr><td>".$lang['inst_error_dbuser']."!</td></tr>";
	unset($inst1);
	$inst0_ok=1;
	}

    if($host!="" && $dbuser!="")
    {
    	include(dirname(__FILE__)."/settings/sql.class.php");
        $mysql=&new myMySQL($db_type);
        $mysql->connect($host,$dbuser,$dbpasswd,$db);

        $get_prefixcheck = $mysql->query("SHOW TABLES LIKE '%{$prefix}_%'");

        if($mysql->numRows($get_prefixcheck) > 0)
        {
        	echo "<tr><td><b>".$lang['inst_error_prefix1']."</b><br>".$lang['inst_error_prefix2']."</td></tr>";
    	}

    }

/*
    if($host!="" && $dbuser!="")
    {
        $connID=@mysql_pconnect($host, $dbuser, $dbpasswd);
        if($connID)
        {
        if(mysql_select_db($db)==false){$error_log1.="<tr><td>".$lang['inst_error_dbno']."!</td></tr>";unset($inst1);}
        $inst0_ok=1;
        }
        else
        {
        $error_log1.="<tr><td>".$lang['inst_error_dbset']."!</td></tr>";
        unset($inst1);
        $inst0_ok=1;
        }
    }
*/
echo "</div>";

}


//----------------- Abfragen über Usereingaben - Form 2 -----------------

$back=$_POST['back'];
if($back)
{
    $inst0_ok=1;
    unset($inst1);
    unset($inst2);
    $language_name=$_POST['language_name'];
    $language_file=$_POST['language_file'];
    $language_aktiv=$_POST['language_aktiv'];
    require("settings/$language_file");
}

$inst2=$_POST['inst2'];
if($inst2)
{
    $prefix=$_POST['prefix'];
    $db_type=$_POST['db_type'];

    $host=$_POST['host'];
    $db=$_POST['db'];
    $dbuser=$_POST['dbuser'];
    $dbpasswd=$_POST['dbpasswd'];

    $name=$_POST['name'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    $mail=$_POST['mail'];
    $loginsave=$_POST['loginsave'];
    $activation_url=$_POST['activation_url'];

    $language_name=$_POST['language_name'];
    $language_file=$_POST['language_file'];
    $language_aktiv=$_POST['language_aktiv'];
    require("settings/$language_file");

	echo "<div id=\"box2\">";

	if($name=="")
	{
	$error_log2.="<tr><td>".$lang['inst_error_user']."!</td></tr>";
	$inst1_ok=1;
	$inst_check_f=1;
	}

	if($password1=="")
	{
	$error_log2.="<tr><td>".$lang['inst_error_pw']."!</td></tr>";
	$inst1_ok=1;
	$inst_check_f=1;
	}

	if($password2=="")
	{
	$error_log2.="<tr><td>".$lang['inst_error_pwr']."!</td></tr>";
	$inst1_ok=1;
	$inst_check_f=1;
	}

	if($password1!=$password2)
	{
	$error_log2.="<tr><td>".$lang['inst_error_pwsame']."!</td></tr>";
	$inst1_ok=1;
	$inst_check_f=1;
	}

	if($mail=="")
	{
	$error_log2.="<tr><td>".$lang['inst_error_mail']."!</td></tr>";
	$inst1_ok=1;
	$mail_check=ok;
	$inst_check_f=1;
	}

	$mail=trim($mail);
	if (!(strstr($mail, "@") and strstr($mail, ".")) && empty($mail_check))
	{
	$error_log2.="<tr><td>".$lang['inst_error_mailcheck']."!</td></tr>";
	$inst1_ok=1;
	$inst_check_f=1;
	}

	if ($inst_check_f!="1")
	{
	$ready=1;
	}
	else
	{
    $inst0="set";
    $inst1="set";
    unset($inst2);
	}

echo "</div>";
}
//------------------------------------------------------------------------------
echo "<br><br><br><br>";
//------------------------------------------------------------------------------

if($ready==1)
{

		//----------------- Anlegen der config.php -----------------

		if($host!="" && $db!="" && $dbuser!="")
		{

		$datei = fopen("settings/config.php","w+");
		fwrite($datei, "<?php\n" . "\$prefix=\"".$prefix."\";\n" . "\$file_root=\"".$activation_url."\";\n". "\$db_type=\"".$db_type."\";\n\n" . "\$host=\"".$host."\";\n" . "\$db=\"".$db."\";\n" . "\$dbuser=\"".$dbuser."\";\n" . "\$dbpasswd=\"".$dbpasswd."\";" .  "\n?>" );
		fclose($datei);


		//----------------- DB Tabellen erstellen -----------------

		include("settings/connect.php");


		$mysql->query("drop table if exists $prefix"."_intern_login");
		$mysql->query("create table $prefix"."_intern_login(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "id_user int(10) NOT NULL,".
                    "userhash varchar(100) NOT NULL,".
                    "userip varchar(15) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_intern_login", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_intern_users");
		$mysql->query("create table $prefix"."_intern_users(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
        			"id_group int(10) NOT NULL,".						## NEW 1.9.5 ##
        			"id_language int(10) NOT NULL,".					## NEW 1.9.5 ##
                    "user varchar(30) NOT NULL,".
                    "pw varchar(50) NOT NULL,".
                    "mail varchar(50) NOT NULL,".
                    "viewed text NOT NULL,".
                    "regdate date NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_intern_users", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_intern_groups");	## NEW 1.9.5 ##
		$mysql->query("create table $prefix"."_intern_groups(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "groupname varchar(250) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_intern_groups", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_intern_permission");	## NEW 1.9.5 ##
		$mysql->query("create table $prefix"."_intern_permission(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "id_group int(10) NOT NULL,".
                    "id_permission_name varchar(250) NOT NULL,".
                    "perm_flag int(1) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_intern_permission", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_intern_permission_name");	## NEW 1.9.5 ##
		$mysql->query("create table $prefix"."_intern_permission_name(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "perm_name varchar(250) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_intern_permission_name", mysql_error());

		$mysql->query("drop table if exists  {$prefix}_captcha");				## NEW 1.9.5 ##
		$mysql->query("create table {$prefix}_captcha(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "ip varchar(15) NOT NULL UNIQUE,".
                    "code varchar(32) NOT NULL,".
                    "time varchar(25) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table {$prefix}_captcha", mysql_error());


		$mysql->query("drop table if exists $prefix"."_language");
		$mysql->query("create table $prefix"."_language(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "language_name varchar(100) NOT NULL,".
                    "language_file varchar(50) NOT NULL,".
                    "language_aktiv int(1) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_language", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_entries");
		$mysql->query("create table $prefix"."_entries(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "id_unique varchar(12) NOT NULL,".
                    "mail varchar(50) NOT NULL,".
                    "mail_id varchar(80) NOT NULL,".
                    "title int(1) NOT NULL,".							## NEW 1.8.9 ##
                    "forename varchar(50) NOT NULL,".					## NEW 1.8.9 renamed ##
                    "surname varchar(50) NOT NULL,".					## NEW 1.8.9 ##
                    "regdate date DEFAULT '0000-00-00' NOT NULL,".
                    "regdate_t int(30) NOT NULL,".
                    "flag int(1) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_entries", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_groups");
		$mysql->query("create table $prefix"."_groups(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "groupname varchar(250) NOT NULL,".
                    "hidden int(1) NOT NULL,".
                    "default_group int(1) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_groups", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_group_def");
		$mysql->query("create table $prefix"."_group_def(".
        			"id_user int(10) NOT NULL,".
                    "id_group int(10) NOT NULL,".
                    "INDEX group_def_id (id_user)".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_group_def", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_blacklist");
		$mysql->query("create table $prefix"."_blacklist(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
                    "mail varchar(250) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_blacklist", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_archiv");
		$mysql->query("create table $prefix"."_archiv(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
        			"id_group int(10) NOT NULL,".
        			"views int(10) NOT NULL,".							## new 1.9.4 ##
        			"attachments text NOT NULL,".						## new 1.9.1 ##
                    "absender varchar(250) NOT NULL,".
                    "betreff varchar(250) NOT NULL,".
                    "msg text NOT NULL,".
                    "empf int(10) NOT NULL,".
                    "flag int(1) NOT NULL,".
                    "date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,".
                    "mailjobTimestamp bigint(20) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_archiv", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_settings");
		$mysql->query("create table $prefix"."_settings(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".

        			"message_type int(1) NOT NULL,".

        			"layout_bgcolor varchar(7) NOT NULL,".
        			"layout_background varchar(250) NOT NULL,".
        			"layout_width varchar(3) NOT NULL,".
        			"layout_textfieldwidth varchar(3) NOT NULL,".	## NEW 1.8.9 ##
        			"layout_font_face varchar(20) NOT NULL,".
        			"layout_font_color varchar(7) NOT NULL,".
        			"layout_font_size varchar(2) NOT NULL,".

        			"layout_s_bgcolor varchar(7) NOT NULL,".
        			"layout_s_background varchar(250) NOT NULL,".
        			"layout_s_width varchar(3) NOT NULL,".
        			"layout_s_height varchar(3) NOT NULL,".
        			"layout_s_font_face varchar(20) NOT NULL,".
        			"layout_s_font_color varchar(7) NOT NULL,".
        			"layout_s_font_color_error varchar(7) NOT NULL,".
        			"layout_s_font_size varchar(2) NOT NULL,".

					"sendin_title int(1) NOT NULL,".
        			"sendin_firstname int(1) NOT NULL,".
        			"sendin_surname int(1) NOT NULL,".
        			"sendin_city int(1) NOT NULL,".
        			"sendin_topic int(1) NOT NULL,".
        			"sendin_tel int(1) NOT NULL,".
        			"sendin_sendmail int(1) NOT NULL,".
        			"sendin_captcha int(1) NOT NULL,".			## new 1.9.5 ##

        			"sendin_sig text NOT NULL,".				## NEW 1.9.4 ##

					"newsletter_captcha int(1) NOT NULL,".			## new 1.9.6 ##
					"newsletter_ajax int(1) NOT NULL,".				## new 1.9.6 ##
        			//"absender varchar(250) NOT NULL,".
        			"betreff varchar(250) NOT NULL,".
                    "sig text NOT NULL,".
                    "intervall int(4) NOT NULL,".
                    "user_pro_intervall int(4) NOT NULL,".
                    "activation_url varchar(250) NOT NULL,".
                    "activation int(1) NOT NULL,".
                    "deactivation int(1) NOT NULL,".
                    "showlimit int(10) NOT NULL,".
                    "mailformat int(1) NOT NULL,".
                    "newentrie_mail int(1) NOT NULL,".
                    "newentrie_mail_address varchar(250) NOT NULL,".
                    "form_title int(1) NOT NULL,".											## NEW 1.8.9 ##
                    "form_forename int(1) NOT NULL,".										## NEW 1.8.9 renamed ##
                    "form_surname int(1) NOT NULL,".										## NEW 1.8.9 ##

                    "replace_form_expression_title varchar(250) NOT NULL,".					## NEW 1.8.9 ##
                    "replace_form_expression_name varchar(250) NOT NULL,".					## NEW 1.8.9 ##

                    "replace_form_title_mr varchar(250) NOT NULL,".							## NEW 1.8.9 ##
                    "replace_form_title_mrs varchar(250) NOT NULL,".						## NEW 1.8.9 ##

					"replace_form_ifempty_forename varchar(250) NOT NULL,".					## NEW 1.8.9 ##
					"replace_form_ifempty_surname varchar(250) NOT NULL,".					## NEW 1.8.9 ##

					"replace_form_alt_titlecheck int(1) NOT NULL,".							## NEW 1.9.5 ##
					"replace_form_alt_title varchar(250) NOT NULL,".						## NEW 1.9.5 ##


                    "group_choice int(1) NOT NULL,".
                    "group_choice_radio int(1) NOT NULL,".									## NEW 1.9.3
                    "default_entry_group int(1) NOT NULL,".									## NEW 1.9.6 ##
                    "loginsave int(1) NOT NULL,".
                    "welcome int(1) NOT NULL,".
                    "newsolved_plugin_prefix varchar(20) NOT NULL,".
                    "newsolved_plugin_activate int(1) NOT NULL,".
                    //"default_email varchar(250) NOT NULL,".
                    "default_welcome text NOT NULL,".
                    "default_alternatetext text NOT NULL,".									## NEW 1.9.6 ##
                    "default_subscribe text NOT NULL,".


                    "send_type int(1) NOT NULL,".
                    "send_oldway int(1) NOT NULL,".

                    "smtp_user varchar(50) NOT NULL,".
                    "smtp_pw varchar(50) NOT NULL,".
                    "smtp_relay varchar(250) NOT NULL,".
                    "smtp_port int(6) NOT NULL,".

                    "newsletter_form int(1) NOT NULL,".
                    "newsletter_profile int(1) NOT NULL,".							## NEW 1.8.9 ##
                    "wysiwyg int(1) NOT NULL,".
                    "image_upload int(1) NOT NULL,".
                    "attachment_upload int(1) NOT NULL,".							## new 1.9.1 ##
                    "attach_viewcount int(1) NOT NULL,".							## NEW 1.9.4 ##
                    "group_select int(1) NOT NULL".									## new 1.9.5 ##

                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_settings", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_senderaddress");
		$mysql->query("create table $prefix"."_senderaddress(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
        			"sender_name varchar(250) NOT NULL,".
        			"sender_email varchar(250) NOT NULL,".
        			"sender_default int(1) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_senderaddress", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_resume");
		$mysql->query("create table $prefix"."_resume(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".

        			"db_step int(10) NOT NULL,".
        			"db_limit int(10) NOT NULL,".
                    "db_number int(10) NOT NULL,".
                    "db_all_adr int(10) NOT NULL,".
                    "db_adr_counter int(10) NOT NULL,".
                    "db_cmail int(10) NOT NULL,".

                    "id_group int(10) NOT NULL,".
                    "id_archive int(10) NOT NULL,".						## new 1.9.6 ##

                    "emailname varchar(250) NOT NULL,".
                    "betreff varchar(250) NOT NULL,".
                    "msg text NOT NULL,".

                    "date int(25) NOT NULL,".
                    "attachments text NOT NULL,".						## new 1.9.1 ##
                    "success int(1) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_resume", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_send_in");
		$mysql->query("create table $prefix"."_send_in(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
        			"answered int(1) NOT NULL,".
        			"title int(1) NOT NULL,".						## new 1.9.4 ##
                    "name varchar(250) NOT NULL,".
                    "tel varchar(30) NOT NULL,".
                    "surname varchar(250) NOT NULL,".
                    "city varchar(250) NOT NULL,".
                    "mail varchar(250) NOT NULL,".
                    "topic varchar(250) NOT NULL,".
                    "message text NOT NULL,".
                    "date int(20) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_send_in", mysql_error());

		$mysql->query("drop table if exists  $prefix"."_send_out");
		$mysql->query("create table $prefix"."_send_out(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
        			"id_in int(10) NOT NULL,".
        			"id_user int(10) NOT NULL,".
        			"topic varchar(250) NOT NULL,".
                    "message text NOT NULL,".
                    "date int(20) NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_send_out", mysql_error());

		$mysql->query("drop table if exists  {$prefix}_mailjobs");
		$mysql->query("create table {$prefix}_mailjobs(".
		            "timestamp bigint(20) NOT NULL PRIMARY KEY,".
		            "mailSent int(11) NOT NULL,".
		            "mailTotal int(11) NOT NULL,".
		            "finished int(11) NOT NULL,".
		            "lastID int(11) NOT NULL,".		 				## NEW 1.8.6 ##
		            "lastTimestamp bigint(20) NOT NULL".			## NEW 1.8.6 ##
		            ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_mailjobs", mysql_error());

		$mysql->query("drop table if exists  {$prefix}_info");
		$mysql->query("create table {$prefix}_info(".
		            "version varchar(20) NOT NULL,".
		            "licencedomain varchar(100) NOT NULL,".
		            "licencekey varchar(100) NOT NULL".
		            ")")or error(__LINE__,__FILE__,"An error occurred while creating the table $prefix"."_info", mysql_error());

		$mysql->query("drop table if exists  {$prefix}_charset"); ## NEW 1.8.1 ##
		$mysql->query("create table {$prefix}_charset(".
					"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
		            "charset_name varchar(20) NOT NULL,".
		            "charset varchar(20) NOT NULL,".
		            "active int(1) NOT NULL".
		            ")")or error(__LINE__,__FILE__,"An error occurred while creating the table {$prefix}_charset", mysql_error());

		$mysql->query("drop table if exists  {$prefix}_savedemails"); ## NEW 1.8.1 ##
		$mysql->query("create table {$prefix}_savedemails(".
        			"id int(10) not null AUTO_INCREMENT PRIMARY KEY,".
        			"savedemails_name varchar(250) NOT NULL,".
        			"id_group int(10) NOT NULL,".
        			"id_sender int(10) NOT NULL,".						## new 1.9.6 ##
                    "absender varchar(250) NOT NULL,".
                    "betreff varchar(250) NOT NULL,".
                    "msg text NOT NULL".
                    ")")or error(__LINE__,__FILE__,"An error occurred while creating the table {$prefix}_savedemails", mysql_error());


		//--------------- Tabellen Inhalte erstellen ---------------

		if(ini_get('safe_mode'))
			$oldway = 1;
		else
			$oldway = 0;

		if($language_name=="German")
		{

			$default_subscribe="Hallo,\nklicken Sie auf folgenden Link um Ihre Mail Adresse freizuschalten:\n{SUBSCRIBE_LINK}\nSollten Sie die Adresse nicht innerhalb von 3 Tagen aktiviert haben, wird die Adresse gelöscht und Sie müssen sich neu anmelden.\n\nMit freundlichen Grüßen";

			$default_welcome="Hallo,\nSie haben sich erfolgreich für den Newsletter Service angemeldet.";

			$default_alternatetext = "Dies ist ein HTML Newsletter. Sollte dieser nicht korrekt dargestellt werden, klicken Sie auf folgenden Link um diesen anzuzeigen:\n{SHOWEMAIL_LINK}";

			$replace_form_title_mr="Sehr geehrter Herr";
			$replace_form_title_mrs="Sehr geehrte Frau";
		}
		else
		{

			$default_subscribe = "Hallo,\nclick the link below to activate your E-Mail address:\n{SUBSCRIBE_LINK}\nThe address will be deleted within 3 days without activation.\n\nBest regards";

			$default_welcome = "Hallo,\nyou have successfully subscribed to the newsletter service.";

			$default_alternatetext = "This is a HTML newsletter. If this E-Mail can't be displayed, click on the fallowing link to view the newsletter:\n{SHOWEMAIL_LINK}";

			$replace_form_title_mr = "Dear Mr.";
			$replace_form_title_mrs = "Dear Mrs.";
		}


		$replace_form_expression_title	= "{TITLE} {NAME_EXPRESSION}";
		$replace_form_expression_name	= "{SURNAME}";



		$password=md5($password1);
		$date=date("Y-m-d H:i:s");

		$mysql->query("INSERT INTO $prefix"."_groups (groupname) VALUES ('Standard')");
		$mysql->query("INSERT INTO $prefix"."_resume (id) VALUES ('1')");
		$mysql->query("INSERT INTO $prefix"."_info (version) VALUES ('1.9.6')");

		$mysql->query("INSERT INTO $prefix"."_intern_groups (groupname) VALUES ('Admin')");

		$mysql->query("INSERT INTO $prefix"."_intern_permission_name (perm_name) VALUES ('enter_newsletter')");
		$mysql->query("INSERT INTO $prefix"."_intern_permission_name (perm_name) VALUES ('enter_contact')");
		$mysql->query("INSERT INTO $prefix"."_intern_permission_name (perm_name) VALUES ('enter_usersettings')");
		$mysql->query("INSERT INTO $prefix"."_intern_permission_name (perm_name) VALUES ('enter_settings')");
		$mysql->query("INSERT INTO $prefix"."_intern_permission_name (perm_name) VALUES ('enter_eximport')");

		$mysql->query("INSERT INTO $prefix"."_settings (layout_bgcolor,layout_background,layout_width,layout_textfieldwidth,layout_font_face,layout_font_color,layout_font_size,layout_s_bgcolor,layout_s_background,layout_s_width,layout_s_height,layout_s_font_face,layout_s_font_color,layout_s_font_size,layout_s_font_color_error,intervall,user_pro_intervall,activation_url,activation,showlimit,mailformat,form_forename,group_choice,loginsave,sendin_firstname,sendin_surname,sendin_topic,sendin_sendmail,default_subscribe,default_welcome,welcome,smtp_port,send_oldway,wysiwyg,image_upload,replace_form_title_mr,replace_form_title_mrs,replace_form_expression_title, replace_form_expression_name, deactivation, group_choice_radio, default_entry_group, default_alternatetext, newsletter_captcha, newsletter_ajax) VALUES ('','','','120','Arial','#000000','8','','','400','','Arial','#000000','8','#FF0000','120','50','$activation_url','1','30','0','0','0','$loginsave','1','1','1','0','$default_subscribe','$default_welcome','1','25','$oldway','1','1','$replace_form_title_mr','$replace_form_title_mrs','$replace_form_expression_title','$replace_form_expression_name', '1', '1', '1', '{$default_alternatetext}', '0', '0')");

		$mysql->query("INSERT INTO $prefix"."_plugin_cron (id) VALUES ('1')");

		if($language_name=="German"){$lang_active_de="1";$lang_id="1";}else{$lang_active_de="0";}
		if($language_name=="English"){$lang_active_en="1";$lang_id="2";}else{$lang_active_en="0";}
		if($language_name=="French"){$lang_active_fr="1";$lang_id="3";}else{$lang_active_fr="0";}
		if($language_name=="Danish"){$lang_active_dk="1";$lang_id="4";}else{$lang_active_dk="0";}
		if($language_name=="Dutch"){$lang_active_nl="1";$lang_id="5";}else{$lang_active_nl="0";}

		$mysql->query("INSERT INTO $prefix"."_language (language_name,language_file,language_aktiv) VALUES ('German','lang_de.php','$lang_active_de')");
		$mysql->query("INSERT INTO $prefix"."_language (language_name,language_file,language_aktiv) VALUES ('English','lang_en.php','$lang_active_en')");
		$mysql->query("INSERT INTO $prefix"."_language (language_name,language_file,language_aktiv) VALUES ('French','lang_fr.php','$lang_active_fr')");
		$mysql->query("INSERT INTO $prefix"."_language (language_name,language_file,language_aktiv) VALUES ('Danish','lang_dk.php','$lang_active_dk')");
		$mysql->query("INSERT INTO $prefix"."_language (language_name,language_file,language_aktiv) VALUES ('Dutch','lang_nl.php','$lang_active_nl')");

		$mysql->query("INSERT INTO $prefix"."_intern_users (user,pw,mail,regdate,id_group,id_language) VALUES ('$name','$password','$mail','$date','1', '{$lang_id}')");

		$mysql->query("INSERT INTO {$prefix}_charset (charset_name,charset) VALUES ('UTF-8','utf-8')");
		$mysql->query("INSERT INTO {$prefix}_charset (charset_name,charset,active) VALUES ('Western','iso-8859-1','1')");
		$mysql->query("INSERT INTO {$prefix}_charset (charset_name,charset) VALUES ('Western','iso-8859-15')");
		$mysql->query("INSERT INTO {$prefix}_charset (charset_name,charset) VALUES ('Simplified Chinsese','gb2312')");
		$mysql->query("INSERT INTO {$prefix}_charset (charset_name,charset) VALUES ('Japanese','euc-jp')");

		//----------------- Installationsformular 3 ----------------

        $inst0="set";
        $inst1="set";
        $inst2="set";

        echo "<form action=\"$php_self\" method=\"post\">";

        echo "<table cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\" width=\"500\">";
        echo "<tr><td><img src=\"images/nletter_b.jpg\"></td></tr>";
        echo "<tr><td height=\"14\"></td></tr>";
        echo "<tr><td><b>".$lang['inst_s4_headline']."</b></td></tr>";
        echo "</table>";

        echo "<table cellpadding=\"0\" cellspacing=\"1\" align=\"center\" border=\"0\" bgcolor=\"#000000\" width=\"500\">";
        echo "<tr><td>";

        echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"  bgcolor=\"#FFFFFF\">";
        echo "<tr><td>";

            echo "<table>";
            echo "<tr><td height=\"10\"></td></tr>";

            echo "<tr><td>".$lang['inst_s4_headline']."!</td></tr>";
            echo "<tr><td height=\"20\"></td></tr>";

            echo "<tr><td>".$lang['inst_s4_output1'].":</td></tr>";
            echo "<tr><td><a href=\"newsletter.php\"><b>&#187; ".$lang['inst_s4_output2']."</b></a></td></tr>";
            echo "<tr><td height=\"10\"></td></tr>";
            echo "<tr><td>".$lang['inst_s4_admin1'].":</td></tr>";
            echo "<tr><td><a href=\"admin.php\"><b>&#187; ".$lang['inst_s4_admin2']."</b></a></td></tr>";

            echo "<tr><td height=\"10\"></td></tr>";
            echo "</table>";

        echo "</td></tr></table>";
        echo "</td></tr></table>";

        echo "</form>";

		}
}

//------ Tooltips -------

include("inc/admin_tooltips.php");


//----------------- Installationsformular 2 -----------------

if(($inst1 || $inst1_ok==1) && empty($inst2))
{
$inst0="set";
$inst1="set";

echo "<form action=\"$php_self\" method=\"post\">";

echo "<table cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\" width=\"500\">";
echo "<tr><td><img src=\"images/nletter_b.jpg\"></td></tr>";
echo "<tr><td height=\"14\"></td></tr>";
echo "<tr><td><b>".$lang['inst_s3_headline']."</b></td></tr>";
echo "</table>";

echo "<table cellpadding=\"0\" cellspacing=\"1\" align=\"center\" border=\"0\" bgcolor=\"#000000\" width=\"500\">";
echo "<tr><td>";

echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"  bgcolor=\"#FFFFFF\">";
echo "<tr><td>";

    echo "<table>";
    echo "<tr><td height=\"10\" width=\"200\"></td></tr>";

	if(!empty($error_log2))
	{
        echo "</table>";
        echo "<table>";
        echo "<tr><td class=\"error\">".$lang['inst_s3_error'].":</td></tr>";
        echo $error_log2;
        echo "<tr><td height=\"10\"></td></tr>";
        echo "<tr><td background=\"images/td_u.gif\" width=\"500\"></td></tr>";
        echo "<tr><td height=\"10\"></td></tr></table><table>";
	}

	if(empty($activation_url))
	{
        $activation_url=str_replace("\\","/",dirname(__FILE__));
        $activation_url=$_SERVER["SERVER_NAME"]."/".str_replace($_SERVER["DOCUMENT_ROOT"],"",$activation_url);
        $activation_url="http://".str_replace("//","/",$activation_url);
    }

    echo "<tr><td>".$lang['inst_s3_user'].":</td><td><input type=\"text\" name=\"name\" value=\"$name\" style=\"width:176;\"></td><td valign=\"bottom\"><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('inst_user')\" onMouseOut=\"hideTIP()\"></td></tr>";
    echo "<tr><td>".$lang['inst_s3_email'].":</td><td><input type=\"text\" name=\"mail\" value=\"$mail\" style=\"width:176;\"></td></tr>";
    echo "<tr><td>".$lang['inst_s3_password'].":</td><td><input type=\"password\" name=\"password1\" value=\"$password1\" style=\"width:176;\"></td></tr>";
    echo "<tr><td>".$lang['inst_s3_rpassword'].":</td><td><input type=\"password\" name=\"password2\" value=\"$password2\" style=\"width:176;\"></td></tr>";
	echo "<tr><td>".$lang['inst_s3_scriptpath'].":</td><td><input type=\"text\" name=\"activation_url\" value=\"$activation_url\" style=\"width:176;\"></td><td valign=\"bottom\"><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('inst_url')\" onMouseOut=\"hideTIP()\"></td></tr>";

    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td>".$lang['inst_s3_usecockies'].":</td><td><input type=\"radio\" name=\"loginsave\" value=\"1\" checked> (".$lang['inst_s3_permanentlogin'].")</td><td valign=\"bottom\"><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('inst_cookie')\" onMouseOut=\"hideTIP()\"></td></tr>";
    echo "<tr><td>".$lang['inst_s3_usesessions'].":</td><td><input type=\"radio\" name=\"loginsave\" value=\"0\"> (".$lang['inst_s3_limitedtime'].")</td></tr>";
    echo "<tr><td height=\"12\"></td></tr>";

	echo "<input type=\"hidden\" name=\"prefix\" value=\"$prefix\">";
	echo "<input type=\"hidden\" name=\"db_type\" value=\"$db_type\">";
    echo "<input type=\"hidden\" name=\"host\" value=\"$host\">";
    echo "<input type=\"hidden\" name=\"db\" value=\"$db\">";
    echo "<input type=\"hidden\" name=\"dbuser\" value=\"$dbuser\">";
    echo "<input type=\"hidden\" name=\"dbpasswd\" value=\"$dbpasswd\">";
    echo "<input type=\"hidden\" name=\"language_name\" value=\"$language_name\">";
    echo "<input type=\"hidden\" name=\"language_file\" value=\"$language_file\">";
    echo "<input type=\"hidden\" name=\"language_aktiv\" value=\"$language_aktiv\">";

    echo "<tr><td></td><td><input type=\"submit\" name=\"back\" value=\"&lt; ".$lang['inst_s3_back']."\" class=\"inst\"> <input type=\"submit\" name=\"inst2\" value=\"".$lang['inst_s3_install']."\" class=\"inst\"></td></tr>";


    echo "<tr><td height=\"10\"></td></tr>";
    echo "</table>";

echo "</td></tr></table>";
echo "</td></tr></table>";

echo "</form>";

}

//----------------- Installationsformular 1 -----------------

if(($inst0 || $inst0_ok==1) && empty($inst1))
{
$inst0="set";

echo "<form action=\"$php_self\" method=\"post\">";

echo "<table cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\" width=\"500\">";
echo "<tr><td><img src=\"images/nletter_b.jpg\"></td></tr>";
echo "<tr><td height=\"14\"></td></tr>";
echo "<tr><td><b>".$lang['inst_s2_headline']."</b></td></tr>";
echo "</table>";

echo "<table cellpadding=\"0\" cellspacing=\"1\" align=\"center\" border=\"0\" bgcolor=\"#000000\" width=\"500\">";
echo "<tr><td>";

echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"  bgcolor=\"#FFFFFF\">";
echo "<tr><td>";

    echo "<table>";
    echo "<tr><td height=\"10\"></td></tr>";

	if(!empty($error_log1))
	{
        echo "</table>";
        echo "<table>";
        echo "<tr><td class=\"error\">".$lang['inst_s2_error'].":</td></tr>";
        echo $error_log1;
        echo "<tr><td height=\"10\"></td></tr>";
        echo "<tr><td background=\"images/td_u.gif\" width=\"500\"></td></tr>";
        echo "<tr><td height=\"10\"></td></tr></table><table>";
	}

	echo "<tr><td>".$lang['inst_s2_dbtype'].":</td><td><select name=\"db_type\" style=\"width:159px; font-weight:bold; font-size:8pt;font-family: Arial;\"><option value=\"mysql\">MySQL</option><option value=\"mysqli\">MySQLi</option><option value=\"sqlite\">SQLite</option></td></tr>";
	echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td>".$lang['inst_s2_host'].":</td><td><input type=\"text\" name=\"host\" value=\"localhost\" style=\"width:158;\"></td><td valign=\"bottom\"><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('inst_db')\" onMouseOut=\"hideTIP()\"></td></tr>";
    echo "<tr><td>".$lang['inst_s2_dbname'].":</td><td><input type=\"text\" name=\"db\" value=\"$db\" style=\"width:158;\"></td></tr>";
    echo "<tr><td>".$lang['inst_s2_user'].":</td><td><input type=\"text\" name=\"dbuser\" value=\"$dbuser\" style=\"width:158;\"></td></tr>";
    echo "<tr><td>".$lang['inst_s2_password'].":</td><td><input type=\"password\" name=\"dbpasswd\" value=\"$dbpasswd\" style=\"width:158;\"></td></tr>";
    echo "<tr><td>".$lang['inst_s2_prefix'].":</td><td><input type=\"text\" name=\"prefix\" value=\"nletter\" style=\"width:158;\"></td><td valign=\"bottom\"><img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('inst_prefix')\" onMouseOut=\"hideTIP()\"></td></tr>";

    echo "<tr><td height=\"12\"></td></tr>";

    echo "<input type=\"hidden\" name=\"language_name\" value=\"$language_name\">";
    echo "<input type=\"hidden\" name=\"language_file\" value=\"$language_file\">";
    echo "<input type=\"hidden\" name=\"language_aktiv\" value=\"$language_aktiv\">";

    echo "<tr><td></td><td><input type=\"submit\" name=\"back_1\" value=\"&lt; ".$lang['inst_s2_back']."\" class=\"inst\"> <input type=\"submit\" name=\"inst1\" value=\"".$lang['inst_s2_cont']." &gt;\" class=\"inst\"></td></tr>";

    echo "<tr><td height=\"10\"></td></tr>";
    echo "</table>";

echo "</td></tr></table>";
echo "</td></tr></table>";

echo "</form>";

}


//----------------- Installationsformular 0 -----------------

if(empty($inst0))
{
echo "<form action=\"$php_self\" method=\"post\">";

echo "<table cellpadding=\"0\" cellspacing=\"0\" align=\"center\" border=\"0\" width=\"500\">";
echo "<tr><td><img src=\"images/nletter_b.jpg\"></td></tr>";
echo "<tr><td height=\"14\"></td></tr>";
echo "<tr><td><b>Language - Configuration: Step 1</b></td></tr>";
echo "</table>";

echo "<table cellpadding=\"0\" cellspacing=\"1\" align=\"center\" border=\"0\" bgcolor=\"#000000\" width=\"500\">";
echo "<tr><td>";

echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"100%\"  bgcolor=\"#FFFFFF\">";
echo "<tr><td>";

    echo "<table>";
    echo "<tr><td height=\"10\"></td></tr>";

    echo "<tr><td><input type=\"radio\" name=\"language_name\" value=\"German\" checked></td><td><img src=\"images/flag_de.gif\"> <b>German</b></td></tr>";
    echo "<tr><td><input type=\"radio\" name=\"language_name\" value=\"English\"></td><td><img src=\"images/flag_en.gif\"> <b>English</b></td></tr>";
    echo "<tr><td><input type=\"radio\" name=\"language_name\" value=\"French\"></td><td><img src=\"images/flag_fr.gif\"> <b>French</b></td></tr>";
    echo "<tr><td><input type=\"radio\" name=\"language_name\" value=\"Danish\"></td><td><img src=\"images/flag_dk.gif\"> <b>Danish</b></td></tr>";
    echo "<tr><td><input type=\"radio\" name=\"language_name\" value=\"Dutch\"></td><td><img src=\"images/flag_nl.gif\"> <b>Dutch</b></td></tr>";

	echo "<tr><td height=\"6\"></td></tr>";


    //--------------------------------------------------------------------------------------------------

    $file_config="settings/config.php";
    @system("chmod 777 ".$file_config);

    ###############################

    $file_bin=substr(decbin(fileperms($file_config)), -9);
    $file_arr=explode(".", substr(chunk_split($file_bin, 1, "."), 0, 17));
    $perms_config="";
    $i=0;

    foreach ($file_arr as $this_arr)
    {
    $file_char=($i%3==0 ? "r" : ($i%3==1 ? "w" : "x" ));
    $perms_config.=($this_arr=="1" ? $file_char : "-") . ($i%3==2 ? " " : "");
    $i++;
    }
    unset($file_bin);unset($file_arr);unset($file_char);


    #######################################################################################

    if(substr($perms_config,1,1)!="w" || substr($perms_config,5,1)!="w" || substr($perms_config,9,1)!="w")
    {
        echo "<tr><td><img src=\"images/false.gif\"></td><td>CHMOD for file ".$file_config." have to be set on \"777\"!</td></tr>";
        $error_chmod="ok";
    }
    else
    {
    	echo "<tr><td><img src=\"images/correct.gif\"></td><td>CHMOD for file ".$file_config." is correct!<td></tr>";
    }

    //--------------------------------------------------------------------------------------------------

	if(ini_get('safe_mode'))
	{
		echo "<tr><td><img src=\"images/warning.gif\"></td><td>To use real-time sending, turn php safe mode off or set the php time limit to \"0\" if this is allowed by your provider.<br>Otherwise you have to use the sending type from version 1.7 by default.";
		echo "</td></tr>";
	}
	else
	{
		echo "<tr><td><img src=\"images/correct.gif\"></td><td>PHP Safe Mode is off, so you can use the new real-time sending!<td></tr>";
	}

	echo "<tr><td height=\"12\"></td></tr>";
	echo "<tr><td></td><td>";
    if($error_chmod!="ok")
    {
    	echo "<input type=\"submit\" name=\"inst0\" value=\"Continue &gt;\" class=\"inst\">";
    }
    else
    {
    	echo "<b>You have to set the correct CHMODs to continue installation. Explanation in the Readme.</b>";
    }
    echo "</td></tr>";

    echo "<tr><td height=\"10\"></td></tr>";
    echo "</table>";

echo "</td></tr></table>";
echo "</td></tr></table>";

echo "</form>";
}

##############################################################

echo "<center>NLetter &copy 2003-".date("Y")." by <a href=\"http://www.usolved.net\" target=\"_blank\">USOLVED</a></center>";

echo "</body>";
echo "</html>";

?>
