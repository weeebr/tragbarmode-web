<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################



	@session_start();

	$result=$_GET['result'];
	$result="";
	$UID=$_GET['UID'];
	$UID="";
	$id_user="";


	########## Session oder Cookie verwenden ##########

	if($get_settings = $mysql->query("SELECT * FROM $prefix"."_settings"))
	{
        $aus_settings = $mysql->fetchObject($get_settings);
        if($aus_settings->loginsave == 0)
        {
        	$UID = $_SESSION['usolved_nletter'];
        }
        else
        {
        	$UID = $_COOKIE['usolved_nletter'];
        }
/*
        if($get_language = $mysql->query("SELECT * FROM $prefix"."_language WHERE language_aktiv='1'"))
        {
            $aus_language = $mysql->fetchObject($get_language);
            require(dirname(__FILE__)."/../settings/".$aus_language->language_file);
        }
        else
        {
            echo "<b>You may have an older version than 1.8. Please download the update package for an update from 1.7 to the latest version.</b>";
            exit;
        }
*/
	}
	else
	{
		echo "<b>The Script wasn't installed yet. Please execute <a href=\"install.php\">install.php</a>!</b>";
		exit;
	}

	//------------------------------------------------

	$ip = $_SERVER['REMOTE_ADDR'];

	//------------------------------------------------



	$UID	= mysql_real_escape_string($UID);
	
	$result = $mysql->query("SELECT id_user FROM {$prefix}_intern_login WHERE userhash='{$UID}' AND userip='{$ip}'");
	if($result)
	{
        if($mysql->numRows($result)==0)
        {
        	require(dirname(__FILE__)."/user_login.php");
        }
        else
        {
            $user_id = mysql_result($result,0,0);

            $get_userinfo = $mysql->query("SELECT user, mail, viewed, id_group, id_language FROM {$prefix}_intern_users WHERE id='{$user_id}'");
            $out_userinfo = $mysql->fetchObject($get_userinfo);

            $user_mail = $out_userinfo->mail;
            $user_group = $out_userinfo->id_group;
            $user_language = $out_userinfo->id_language;
            $user_name = $out_userinfo->user;
            $user_viewed = $out_userinfo->viewed;

			if(!defined('logincheck')) define('logincheck', 1);


            if($get_language = $mysql->query("SELECT * FROM $prefix"."_language WHERE id='{$user_language}'"))
            {
                $aus_language = $mysql->fetchObject($get_language);
                require(dirname(__FILE__)."/../settings/".$aus_language->language_file);
            }
        }
	}
	else
		require(dirname(__FILE__)."/user_login.php");

?>