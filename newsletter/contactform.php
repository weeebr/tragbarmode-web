<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

include(dirname(__FILE__)."/settings/connect.php");


$get_set=$mysql->query("SELECT * FROM $prefix"."_settings");
$aus_settings=$mysql->fetchObject($get_set);

if($get_language=$mysql->query("SELECT * FROM $prefix"."_language WHERE language_aktiv='1'"))
$aus_language=$mysql->fetchObject($get_language);
require(dirname(__FILE__)."/settings/".$aus_language->language_file);

###########################################################

if($_POST['sendin_ok'])
{
    $badStrings = array("Content-Type:",
                         "MIME-Version:",
                         "Content-Transfer-Encoding:",
                         "bcc:",
                         "cc:");

    foreach($_POST as $k => $v)
    {
       foreach($badStrings as $v2)
       {
           if(strpos($v, $v2) !== false)
           {
               header("HTTP/1.0 403 Forbidden");
                   exit;
           }
       }
    }

	$title		= $_POST['title'];
    $name		= $_POST['name'];
    $surname	= $_POST['surname'];
    $city		= $_POST['city'];
    $mail		= $_POST['mail'];
    $topic		= $_POST['topic'];
    $message	= $_POST['message'];
    $tel		= $_POST['tel'];

    if(empty($mail))
    {
        $error_mail1=$lang['osendin_check_email'];
        $error=true;
    }
    else
    {
        if(!(strstr($mail, "@") and strstr($mail, ".")))
        {
            $error_mail2=$lang['osendin_check_emailcorrect'];
            $error=true;
        }
    }

    if($aus_settings->sendin_captcha == 1)
    {

        require_once (dirname(__FILE__)."/inc/captcha/class.captcha_x.php");

        $captcha = &new captcha_x ();
        if ( ! $captcha->validate ( $_POST['captcha']))
        {
            $error=true;
            $error_captcha=$lang['osendin_check_captcha'];
        }

    }

	if($aus_settings->sendin_firstname==1)
	{
        if(empty($name))
        {
            $error_name=$lang['osendin_check_name'];
            $error=true;
        }
	}
	if($aus_settings->sendin_surname==1)
	{
        if(empty($surname))
        {
            $error_surname=$lang['osendin_check_surname'];
            $error=true;
        }
    }
	if($aus_settings->sendin_city==1)
	{
        if(empty($city))
        {
            $error_city=$lang['osendin_check_city'];
            $error=true;
        }
    }
	if($aus_settings->sendin_topic==1)
	{
        if(empty($topic))
        {
            $error_topic=$lang['osendin_check_subject'];
            $error=true;
        }
    }

	if(empty($message))
	{
        $error_message=$lang['osendin_check_msg'];
        $error=true;
	}
	if($aus_settings->sendin_tel==1)
	{
        if(empty($tel))
        {
            $error_tel=$lang['osendin_check_telephone'];
            $error=true;
        }
	}

	if($error!=true)
	{
		$message=strip_tags($message);
        $message=str_replace("\n", "<BR>",$message);
        $time=time();
        $mysql->query("INSERT INTO {$prefix}_send_in (name,surname,city,tel,mail,topic,message,date, title) VALUES ('$name','$surname','$city','$tel','$mail','$topic','$message','$time', '$title')");

        $success=$lang['osendin_success'];

        $get_settings=$mysql->query("SELECT * FROM $prefix"."_settings");
        $aus_settings=$mysql->fetchObject($get_settings);
        if($aus_settings->sendin_sendmail==1)
        {

			$message=str_replace("<BR>", "\n",$message);
            $zieladdi=$aus_settings->newentrie_mail_address;
            $subject=$lang['osendin_email_new'];
            $message="
".$lang['osendin_email_name'].": $name $surname
".$lang['osendin_email_address'].": $mail
".$lang['osendin_email_msg'].": $message

".$lang['osendin_email_info']."
";

			if(!preg_match( '/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/' , $zieladdi)) die("ungültiges mailformat");

            $header="From: NLetter";
            @mail($zieladdi, $subject, $message, $header);
        }
	}
}


###########################################################
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<?php
$aus_info	 			= $mysql->fetchObject($mysql->query("SELECT * FROM $prefix"."_info"));
$VERSION_INFO			= $aus_info->version;
$DOMAIN					= $aus_info->licencedomain;
$VALID					= $aus_info->licencevalid;
$COPYRIGHT_TAG			= $aus_info->licencecopyright;


$COPYRIGHT  = "<!-- NLetter v{$VERSION_INFO}- Copyright by www.usolved.net -->\n";
if( $VALID && !empty($DOMAIN))
	$COPYRIGHT .= "<!-- Licensed for {$DOMAIN} -->\n";
else
	$COPYRIGHT .= "<!-- This licence is for non-commercial use only -->\n";

echo $COPYRIGHT;

echo "<html>";
echo "<head>";
echo "<title>NLetter</title>";
echo "<link rel=\"stylesheet\" href=\"".$file_root."/settings/styles.css\" type=\"text/css\" />";
echo "</head>";
echo "<body class=\"output\">";


## 1.0 ##################################################################
//------------------------- Formular ----------------------------

if(empty($error_name))$style_name=$aus_settings->layout_s_font_color;
else $style_name=$aus_settings->layout_s_font_color_error;

if(empty($error_surname))$style_surname=$aus_settings->layout_s_font_color;
else $style_surname=$aus_settings->layout_s_font_color_error;

if(empty($error_city))$style_city=$aus_settings->layout_s_font_color;
else $style_city=$aus_settings->layout_s_font_color_error;

if(empty($error_mail1) && empty($error_mail2))$style_mail=$aus_settings->layout_s_font_color;
else $style_mail=$aus_settings->layout_s_font_color_error;

if(empty($error_topic))$style_topic=$aus_settings->layout_s_font_color;
else $style_topic=$aus_settings->layout_s_font_color_error;

if(empty($error_message))$style_message=$aus_settings->layout_s_font_color;
else $style_message=$aus_settings->layout_s_font_color_error;

if(empty($error_tel))$style_tel=$aus_settings->layout_s_font_color;
else $style_tel=$aus_settings->layout_s_font_color_error;

if(empty($error_captcha))$style_captcha=$aus_settings->layout_s_font_color;
else $style_captcha=$aus_settings->layout_s_font_color_error;

//---------

if(empty($success))
{

    echo "<form action=\"$php_self\" method=\"post\">";

    echo "<table style=\"width:".$aus_settings->layout_s_width."px;";

    if(!empty($aus_settings->layout_s_height))
    echo "height:".$aus_settings->layout_s_height."px;";

    if(!empty($aus_settings->layout_s_bgcolor))
    echo "background-color:".$aus_settings->layout_s_bgcolor.";";

    echo "background-image:url(".$aus_settings->layout_s_background.");\">";

    echo "<tr><td class=\"output\" style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$aus_settings->layout_s_font_color.";\"><b>".$lang['osendin_contactform'].":</b></td></tr>";
    echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>";

	if($aus_settings->sendin_title==1)
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_name.";\">".$lang['osendin_title'].":</td>
    <td><select class=\"output\" name=\"title\" /><option value=\"0\">".$lang['osendin_title_male']."</option><option value=\"1\">".$lang['osendin_title_female']."</option></select></td>
    </tr>";
	if($aus_settings->sendin_firstname==1)
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_name.";\">".$lang['osendin_name'].":</td>
    <td><input class=\"output\" type=\"text\" name=\"name\" value=\"".$name."\" size=\"14\" /></td>
    </tr>";
    if($aus_settings->sendin_surname==1)
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_surname.";\">".$lang['osendin_surname'].":</td>
    <td><input class=\"output\" type=\"text\" name=\"surname\" value=\"".$surname."\" size=\"14\" /></td>
    </tr>";
    if($aus_settings->sendin_city==1)
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_city.";\">".$lang['osendin_city'].":</td>
    <td><input class=\"output\" type=\"text\" name=\"city\" value=\"".$city."\" size=\"14\" /></td>
    </tr>";
    if($aus_settings->sendin_tel==1)
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_tel.";\">".$lang['osendin_telephone'].":</td>
    <td><input class=\"output\" type=\"text\" name=\"tel\" value=\"".$tel."\" size=\"14\" /></td>
    </tr>";
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_mail.";\">".$lang['osendin_email'].":</td>
    <td><input class=\"output\" type=\"text\" name=\"mail\" value=\"".$mail."\" size=\"14\" /></td>
    </tr>";
    if($aus_settings->sendin_topic==1)
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_topic.";\">".$lang['osendin_subject'].":</td>
    <td><input class=\"output\" type=\"text\" name=\"topic\" value=\"".$topic."\" size=\"14\" /></td>
    </tr>";
    echo "<tr>
    <td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_message.";\" valign=\"top\">".$lang['osendin_msg'].":</td>
    <td><textarea class=\"output\" name=\"message\" style=\"width:200px;height:100px;\">".$message."</textarea></td>
    </tr>";


    if($aus_settings->sendin_captcha == 1)
    {

        echo '
        <tr><td style="padding-left:0px; font-family:'.$aus_settings->layout_s_font_face.'; font-size:'.$aus_settings->layout_s_font_size.'pt; color:'.$style_captcha.';" valign="top">'. $lang['osendin_captcha'] .':</td><td><img src="'. $file_root .'/inc/captcha/server.php" onclick="javasript:this.src=\''. $file_root .'/inc/captcha/server.php?\'+Math.random();" alt="Captcha" style="border: 1px solid #000000;" /></td></tr>
        <tr><td></td><td><input maxlength="4" name="captcha" type="text" class="captcha"/></td>
        </tr>

        <tr><td><input type="hidden" name="validate" value="1" /></td></tr>
        ';

    }


    echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>";
    echo "<tr><td></td><td class=\"output\"><input class=\"output\" type=\"submit\" name=\"sendin_ok\" value=\"&nbsp;&nbsp;&nbsp;&nbsp;".$lang['osendin_button_send']."&nbsp;&nbsp;&nbsp;&nbsp;\" /></td></tr>";

	echo "</table>";
	
	if( (!$VALID && !$COPYRIGHT_TAG) || (!$VALID && $COPYRIGHT_TAG) || ($VALID && $COPYRIGHT_TAG)  )
	{	
		echo "<table>";

		echo "<tr><td class=\"output\" style=\"height:4px;\"></td></tr>";
		echo "<tr><td class=\"output\" style=\"padding-left:4px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$aus_settings->layout_s_font_color.";\">NLetter v".$aus_info->version." &copy; <a onclick=\"window.open(this.href,'_blank');return false;\" href=\"http://www.usolved.net\" class=\"output\" style=\"font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$aus_settings->layout_s_font_color.";font-weight:bold;\">USOLVED</a></td></tr>";

		echo "</table>";
	}
	

    echo "</form>";

}
else
{
   	echo "<table style=\"width:".$aus_settings->layout_s_width."px;";

    if(!empty($aus_settings->layout_s_height))
    echo "height:".$aus_settings->layout_s_height."px;";

    if(!empty($aus_settings->layout_s_bgcolor))
    echo "background-color:".$aus_settings->layout_s_bgcolor.";";

    echo "background-image:url(".$aus_settings->layout_s_background.");\">";
	echo "<tr><td style=\"padding-left:0px; font-family:".$aus_settings->layout_s_font_face."; font-size:".$aus_settings->layout_s_font_size."pt; color:".$style_message.";\">".$success."</td></tr></table>";
}
###########################################################################



echo "</body>";
echo "</html>";

?>