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
        $layout_s_bgcolor			= $_POST['layout_s_bgcolor'];
        $layout_s_background		= $_POST['layout_s_background'];
        $layout_s_width				= $_POST['layout_s_width'];
        $layout_s_height			= $_POST['layout_s_height'];
        $layout_s_font_face			= $_POST['layout_s_font_face'];
        $layout_s_font_color		= $_POST['layout_s_font_color'];
        $layout_s_font_color_error	= $_POST['layout_s_font_color_error'];
        $layout_s_font_size			= $_POST['layout_s_font_size'];

		$sendin_title		= $_POST['sendin_title'];
        $sendin_firstname	= $_POST['sendin_firstname'];
        $sendin_surname		= $_POST['sendin_surname'];
        $sendin_city		= $_POST['sendin_city'];
        $sendin_topic		= $_POST['sendin_topic'];
        $sendin_tel			= $_POST['sendin_tel'];
        $sendin_sendmail	= $_POST['sendin_sendmail'];
        $sendin_captcha	= $_POST['sendin_captcha'];

        $sendin_sig = str_replace("'", "\'", $_POST['sendin_sig']);


		$mysql->query("UPDATE $prefix"."_settings SET layout_s_bgcolor='$layout_s_bgcolor',layout_s_background='$layout_s_background',layout_s_width='$layout_s_width',layout_s_height='$layout_s_height',layout_s_font_face='$layout_s_font_face',layout_s_font_color='$layout_s_font_color',layout_s_font_color_error='$layout_s_font_color_error',layout_s_font_size='$layout_s_font_size',sendin_firstname='$sendin_firstname',sendin_surname='$sendin_surname',sendin_city='$sendin_city',sendin_topic='$sendin_topic',sendin_tel='$sendin_tel',sendin_sendmail='$sendin_sendmail', sendin_title='{$sendin_title}', sendin_sig='{$sendin_sig}', sendin_captcha='{$sendin_captcha}'");




        echo "<table><tr><td><b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_edited']."!</font></b><br>";

        for($i=1;$i<160;$i++)
        {
        echo ".";
        }
        echo "</td></tr></table><br>";
	}

	############################################################

	$get_set=$mysql->query("SELECT * FROM $prefix"."_settings");
	$aus_settings=$mysql->fetchObject($get_set);

	$twidth=640;
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


        ###################################################
		echo "<table>";
		###################################################


		echo "<tr><td style=\"font-size:13pt;\"><b>".$lang['settings_cf_headline']."</b></td></tr>";
		echo "<tr><td style=\"height:10px;\"></td></tr>";
		echo "<tr>";
		echo "<td valign=\"top\" style=\"padding-left:".$eingerueckt."px;\">";

			echo "<table><tr><td>";
                echo "<table>";
                echo "<tr><td><b><u>".$lang['settings_cf_layout']."</u></b></td></tr>";
                echo "<tr><td height=\"8\"></td><td></td></tr>";
                echo "<tr><td>".$lang['settings_cf_width'].":</td><td><input type=\"text\" name=\"layout_s_width\" value=\"".$aus_settings->layout_s_width."\" maxlength=\"3\" style=\"width:30;\"></td></tr>";
                echo "<tr><td>".$lang['settings_cf_height'].":</td><td><input type=\"text\" name=\"layout_s_height\" value=\"".$aus_settings->layout_s_height."\" maxlength=\"3\" style=\"width:30;\"></td></tr>";

                echo "<tr><td>".$lang['settings_cf_bgcolor'].":</td><td><input type=\"text\" name=\"layout_s_bgcolor\" value=\"".$aus_settings->layout_s_bgcolor."\" style=\"width:140;\" maxlength=\"7\"></td></tr>";
                echo "<tr><td>".$lang['settings_cf_background'].":</td><td><input type=\"text\" name=\"layout_s_background\" value=\"".$aus_settings->layout_s_background."\" style=\"width:140;\"></td></tr>";

                echo "<tr><td>".$lang['settings_cf_fontcolor'].":</td><td><input type=\"text\" name=\"layout_s_font_color\" value=\"".$aus_settings->layout_s_font_color."\" style=\"width:140;\" maxlength=\"7\"></td></tr>";
                echo "<tr><td>".$lang['settings_cf_fontcolorerror'].":</td><td><input type=\"text\" name=\"layout_s_font_color_error\" value=\"".$aus_settings->layout_s_font_color_error."\" style=\"width:140;\" maxlength=\"7\"></td></tr>";
                echo "<tr><td>".$lang['settings_cf_fontsize'].":</td><td><input type=\"text\" name=\"layout_s_font_size\" value=\"".$aus_settings->layout_s_font_size."\" style=\"width:140;\" maxlength=\"2\"></td></tr>";

				unset($c_1,$c_2,$c_3,$c_4,$c_5,$c_6);
                if($aus_settings->layout_s_font_face=="Arial")$c_1="selected";
                if($aus_settings->layout_s_font_face=="Verdana")$c_2="selected";
                if($aus_settings->layout_s_font_face=="Tahoma")$c_3="selected";
                if($aus_settings->layout_s_font_face=="Times New Roman")$c_4="selected";
                if($aus_settings->layout_s_font_face=="Courier New")$c_5="selected";
                if($aus_settings->layout_s_font_face=="Comic Sans MS")$c_6="selected";
                echo "<tr><td>".$lang['settings_cf_fonttype'].":</td><td><select name=\"layout_s_font_face\">
            <option value=\"Arial\" $c_1>Arial</option>
            <option value=\"Verdana\" $c_2>Verdana</option>
            <option value=\"Tahoma\" $c_3>Tahoma</option>
            <option value=\"Times New Roman\" $c_4>Times New Roman</option>
            <option value=\"Courier New\" $c_5>Courier New</option>
            <option value=\"Comic Sans MS\" $c_6>Comic Sans MS</option>
            </select></td></tr>";

                echo "</table>";
			echo "</td></tr></table>";

		echo "</td>";
		echo "<td width=\"40\"></td>";
		echo "<td valign=\"top\">";
			echo "<table><tr><tr><td>";

				if($aus_settings->sendin_title=="1")$title_c1="checked";else $title_c0="checked";
                if($aus_settings->sendin_firstname=="1")$firstname_c1="checked";else $firstname_c0="checked";
                if($aus_settings->sendin_surname=="1")$surname_c1="checked";else $surname_c0="checked";
                if($aus_settings->sendin_city=="1")$city_c1="checked";else $city_c0="checked";
                if($aus_settings->sendin_topic=="1")$topic_c1="checked";else $topic_c0="checked";
                if($aus_settings->sendin_tel=="1")$tel_c1="checked";else $tel_c0="checked";
                if($aus_settings->sendin_sendmail=="1")$sendmail_c1="checked";else $sendmail_c0="checked";
                if($aus_settings->sendin_captcha=="1")$captcha_c1="checked";else $captcha_c0="checked";

                echo "<table>";
                echo "<tr><td><b><u>".$lang['settings_cf_settings']."</u></b></td></tr>";
                echo "<tr><td height=\"8\"></td><td></td></tr>";
                echo "<tr><td>".$lang['settings_cf_title'].":</td><td><input type=\"radio\" name=\"sendin_title\" value=\"1\" $title_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_title\" value=\"0\" $title_c0>".$lang['settings_no']."</td></tr>";
                echo "<tr><td>".$lang['settings_cf_showname'].":</td><td><input type=\"radio\" name=\"sendin_firstname\" value=\"1\" $firstname_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_firstname\" value=\"0\" $firstname_c0>".$lang['settings_no']."</td></tr>";
                echo "<tr><td>".$lang['settings_cf_showsurname'].":</td><td><input type=\"radio\" name=\"sendin_surname\" value=\"1\" $surname_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_surname\" value=\"0\" $surname_c0>".$lang['settings_no']."</td></tr>";
                echo "<tr><td>".$lang['settings_cf_showcity'].":</td><td><input type=\"radio\" name=\"sendin_city\" value=\"1\" $city_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_city\" value=\"0\" $city_c0>".$lang['settings_no']."</td></tr>";
                echo "<tr><td>".$lang['settings_cf_showsubject'].":</td><td><input type=\"radio\" name=\"sendin_topic\" value=\"1\" $topic_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_topic\" value=\"0\" $topic_c0>".$lang['settings_no']."</td></tr>";
                echo "<tr><td>".$lang['settings_cf_showtel'].":</td><td><input type=\"radio\" name=\"sendin_tel\" value=\"1\" $tel_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_tel\" value=\"0\" $tel_c0>".$lang['settings_no']."</td></tr>";
                echo "<tr><td>".$lang['settings_cf_sendmail'].":</td><td><input type=\"radio\" name=\"sendin_sendmail\" value=\"1\" $sendmail_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_sendmail\" value=\"0\" $sendmail_c0>".$lang['settings_no']." <img src=\"images/helpicon.gif\" onMouseOver=\"showTIP('admin_sendmail')\" onMouseOut=\"hideTIP()\"></td></tr>";
                echo "<tr><td>".$lang['settings_cf_captcha'].":</td><td><input type=\"radio\" name=\"sendin_captcha\" value=\"1\" $captcha_c1>".$lang['settings_yes']." <input type=\"radio\" name=\"sendin_captcha\" value=\"0\" $captcha_c0>".$lang['settings_no']."</td></tr>";

				echo "<tr><td height=\"18\"></td></tr>";
				echo "<tr><td valign=\"top\">".$lang['settings_cf_sig'].":</td><td><textarea name=\"sendin_sig\" style=\"width: 220px; height: 100px;\">".$aus_settings->sendin_sig."</textarea></td></tr>";

                echo "</table>";

			echo "</td></tr></table>";
		echo "</td>";
		echo "</tr>";

		###################################################
		echo "</table>";
        ###################################################


/***************************/
echo "</td></tr>";
echo "</table>";


	 echo "<br><br><table align=\"center\"><tr><td><input type=\"submit\" name=\"sig_ok\" value=\"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$lang['settings_savesettings']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\" class=\"button\"></td></tr></table>";

	echo "</form>";
}
else
	echo "No Access!";
?>