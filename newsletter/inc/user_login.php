<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################





## 2.0 ######################################################################
//-------------------------- Passwort zusenden -----------------------------

$pwsend=$_GET['pwsend'];
if($pwsend=="ok")
{

    if($get_language = $mysql->query("SELECT * FROM $prefix"."_language WHERE language_aktiv='1'"))
    {
        $aus_language = $mysql->fetchObject($get_language);
        require(dirname(__FILE__)."/../settings/".$aus_language->language_file);
    }

    if($_POST['pwsend_ok'])
    {
    	$mail	= $_POST['mail'];

        if(empty($mail))
        {
			echo $lang['login_check_email1']."!<br>";
			$error = "ok";
        }
        else if(!eregi("^[_a-z0-9!#$%&\\'*+-\/=?^_`.{|}~]+(\.[_a-z0-9!#$%&\'*+-\\/=?^_`.{|}~]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$", trim($mail)) )
        {
            echo $lang['login_check_email2']."!<br>";
            $error = "ok";
        }
		
		
		if($error!="ok")
		{

			$get_mailcheck=$mysql->query("SELECT * FROM {$prefix}_intern_users WHERE mail='$mail'");
			if($mysql->numRows($get_mailcheck)!=0)
			{
				$out_mailcheck=$mysql->fetchObject($get_mailcheck);

                $subject=$lang['login_subject'];
                $zieladdi=$mail;
                $password=substr(md5(time()),1,6);

                $message="
                ".$lang['login_mail1']." $out_mailcheck->user,
                ".$lang['login_mail2']."
                ".$lang['login_mail3'].": $out_mailcheck->user
                ".$lang['login_mail4'].": $password

                ";
				//echo "mail($zieladdi, $subject, $message, From: NLetter $mail)";
                if(mail($zieladdi, $subject, $message, "From: NLetter <$mail>"))
                {
                    $password = md5($password);
                    $mysql->query("UPDATE {$prefix}_intern_users SET pw='$password' WHERE mail='$mail'");

                    echo $lang['login_mailsent1']." ".$mail." ".$lang['login_mailsent2']."!";

                    exit;
                }

            }
            else
            {
            	echo $lang['login_wrongdata']."!";
            }
        }
    }

	################################################

	echo "<html>";
    echo "<head>";
    echo "<title>NLetter - Admin</title>";
    echo "<link rel=\"stylesheet\" href=\"".$file_root."/settings/styles.css\" type=\"text/css\">";
    echo "</head>";
    echo "<body>";

	echo "<br><br><center>";

	echo "<table>";
	echo "<tr><td><img src=\"".$file_root."/images/nletter_w.jpg\"></td></tr>";
	echo "</table>";
	echo "<br><br>";
	
	echo "<form action=\"\" method=\"post\">";
	
	echo "<table>";
    echo "<tr><td><b>&laquo;</b> <a href=\"javascript:history.back()\">".$lang['login_back']."</a></td></tr>";
    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td>".$lang['login_email'].":</td><td><input type=\"text\" name=\"mail\" value=\"$mail\" class=\"login\" style=\"width:150\"></td></tr>";
    echo "<tr><td height=\"6\"></td></tr>";
    echo "<tr><td></td><td><input type=\"submit\" name=\"pwsend_ok\" value=\"".$lang['login_requestpw']."!\" class=\"inst\" style=\"width:150\"></td></tr>";
	echo "</table>";
	echo "</form>";
	
	echo "</center>";

	echo "</body>";
	echo "</html>";

exit;
}



## 1.0 ######################################################################
//------------------- Überprüfungen und Formularanzeige --------------------




$user_login = mysql_real_escape_string($_POST["user_login"]);
$user_pw = md5(mysql_real_escape_string($_POST["user_pw"]));


if($_POST['login_ok'])
{
    $get_user=$mysql->query("SELECT id, id_group, id_language FROM {$prefix}_intern_users WHERE user='{$user_login}' AND pw='{$user_pw}'");
    if($mysql->numRows($get_user)==0)
    {
        if($get_language = $mysql->query("SELECT * FROM $prefix"."_language WHERE language_aktiv='1'"))
        {
            $aus_language = $mysql->fetchObject($get_language);
            require(dirname(__FILE__)."/../settings/".$aus_language->language_file);
        }
        
        echo $lang['login_error1']." - <a href=\"".$file_root."/admin.php\">".$lang['login_error2']."</a>";
        exit;
    }
    else
    {
		$out_user=mysql_fetch_object($get_user);

        srand((double)microtime()*1000000);
        $userhash=md5(uniqid(rand()));


        ####### Session aktivieren oder Cookie setzen #######
        $get_settings=$mysql->query("SELECT * FROM $prefix"."_settings");
        $aus_settings=$mysql->fetchObject($get_settings);
        if($aus_settings->loginsave==0)
        {
        	$_SESSION['usolved_nletter'] = $userhash;
        }
        else
        {
        	setcookie("usolved_nletter", "", time() - 3600);
        	setcookie("usolved_nletter", $userhash, time()+31536000, "/");
        }


        $ip=$_SERVER['REMOTE_ADDR'];

        //Lösche bisherige Eintraege vom User in der Tabelle login
        $mysql->query("DELETE FROM {$prefix}_intern_login WHERE id_user='{$out_user->id}'");

        //Füge neuen Eintrag mit den Daten (User,UIN,Expire,IP,Browser) hinzu
        $mysql->query("INSERT INTO {$prefix}_intern_login (id_user,userhash,userip) VALUES ('{$out_user->id}','$userhash','$ip')");


		$user_id = $out_user->id;
		$user_group = $out_user->id_group;
		$user_language = $out_user->id_language;
		$user_name = $user_login;
		define('logincheck', 1);

        if($get_language = $mysql->query("SELECT * FROM $prefix"."_language WHERE id='{$user_language}'"))
        {
            $aus_language = $mysql->fetchObject($get_language);
            require(dirname(__FILE__)."/../settings/".$aus_language->language_file);
        }

        unset($user_pw);

    }

}
else
{
    if($get_language = $mysql->query("SELECT * FROM $prefix"."_language WHERE language_aktiv='1'"))
    {
        $aus_language = $mysql->fetchObject($get_language);
        require(dirname(__FILE__)."/../settings/".$aus_language->language_file);
    }
    else
		die('please install the script first!');

    echo "<html>";
    echo "<head>";
    echo "<title>NLetter - Admin</title>";
    echo "<link rel=\"stylesheet\" href=\"".$file_root."/settings/styles.css\" type=\"text/css\">";
    echo "</head>";
    echo "<body>";

	echo "<form action=\"admin.php\" method=\"post\">";

    echo "<br><br>";
    echo "<center>";


	echo "<table>";
	echo "<tr><td><img src=\"".$file_root."/images/nletter_w.jpg\"></td></tr>";
	echo "</table>";

    echo "<br><br>";
    echo "<table>";

    echo "<tr><td><img src=\"".$file_root."/images/arrow.gif\"> ".$lang['login_user'].":</td><td><input name=\"user_login\" class=\"login\" style=\"width:150\"></td></tr>";
    echo "<tr><td><img src=\"".$file_root."/images/arrow.gif\"> ".$lang['login_pw'].":</td><td><input type=\"password\" name=\"user_pw\" class=\"login\" style=\"width:150\"></td></tr>";
    echo "<tr><td></td><td><br><input type=\"submit\" name=\"login_ok\" value=\"".$lang['login_login']."\" class=\"inst\"  style=\"width:150\"></td></tr>";

	echo "<tr><td></td><td><img src=\"".$file_root."/images/arrow.gif\"> <a href=\"".$file_root."/admin.php?pwsend=ok\">".$lang['login_forgotpw']."</a></td></tr>";

    echo "</table>";


    echo "</center>";
	echo "</form>";

    echo "</body>";
    echo "</html>";

    exit;
}



?>