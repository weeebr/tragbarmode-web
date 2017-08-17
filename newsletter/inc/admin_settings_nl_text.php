<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('logincheck')) die('Error!');
if(defined('enter_settings'))
{

	function escapeString($stringValue)
	{
		if(get_magic_quotes_gpc())
		{
            $stringValue        = stripslashes($stringValue);
        }


		if(function_exists(mysql_real_escape_string))
		{
			$stringValue = mysql_real_escape_string($stringValue);
		}
		else
			$stringValue = addslashes($stringValue);

		return $stringValue;
	}

	if($_POST['sender_ok'])
	{
        $sender_name			= escapeString($_POST['sender_name']);
        $sender_email			= escapeString($_POST['sender_email']);

        if(strstr($sender_email, "usolved") == true)
        {
        	echo $lang['settings_nltext_alert_address']; exit();
		}

        if(!empty($sender_name) && !empty($sender_email))
        {
            $get_sender = $mysql->query("SELECT * FROM {$prefix}_senderaddress");
            if($mysql->numRows($get_sender) == 0)
            {
                $mysql->query("INSERT INTO {$prefix}_senderaddress (sender_name, sender_email, sender_default) VALUES ('{$sender_name}', '{$sender_email}', '1')");
            }
            else
            {
                $mysql->query("INSERT INTO {$prefix}_senderaddress (sender_name, sender_email) VALUES ('{$sender_name}', '{$sender_email}')");
            }

            $sender_output = $lang['settings_nltext_alert_success'];
            unset($sender_name, $sender_email);

		}
		else
			$sender_output = $lang['settings_nltext_alert_nameemail'];

	}

	if($_POST['sender_as_default'])
	{
		$sender_id			= escapeString($_POST['sender_id']);
		$mysql->query("UPDATE {$prefix}_senderaddress SET sender_default='0'");

		$mysql->query("UPDATE {$prefix}_senderaddress SET sender_default='1' WHERE id='{$sender_id}'");

		$sender_output = $lang['settings_nltext_alert_defaultset'];
	}

	if($_POST['sender_delete'])
	{
		$sender_id			= escapeString($_POST['sender_id']);
		$mysql->query("DELETE FROM {$prefix}_senderaddress WHERE id='{$sender_id}'");

		$sender_output = $lang['settings_nltext_alert_addresserdelete'];
	}

	if($_POST['sig_ok'])
	{

        $sig_write	= escapeString($_POST['sig_write']);
        //$abs_write	= escapeString($_POST['abs_write']);
        $betr_write	= escapeString($_POST['betr_write']);

        $default_subscribe			= escapeString($_POST['default_subscribe']);
        $default_welcome			= escapeString($_POST['default_welcome']);
        $default_alternatetext		= escapeString($_POST['default_alternatetext']);
        //$default_email				= $_POST['default_email'];

        $replace_form_expression_title	= escapeString($_POST['replace_form_expression_title']);
        $replace_form_expression_name	= escapeString($_POST['replace_form_expression_name']);
        $replace_form_title_mr			= escapeString($_POST['replace_form_title_mr']);
        $replace_form_title_mrs			= escapeString($_POST['replace_form_title_mrs']);
        $replace_form_ifempty_forename	= escapeString($_POST['replace_form_ifempty_forename']);
        $replace_form_ifempty_surname	= escapeString($_POST['replace_form_ifempty_surname']);
        $replace_form_alt_titlecheck	= escapeString($_POST['replace_form_alt_titlecheck']);
        $replace_form_alt_title			= escapeString($_POST['replace_form_alt_title']);

        $charsetid=$_POST['charsetid'];
        $mysql->query("UPDATE $prefix"."_charset SET active=0");
		$mysql->query("UPDATE $prefix"."_charset SET active=1 WHERE id={$charsetid}");

		$mysql->query("UPDATE $prefix"."_settings SET default_subscribe='$default_subscribe', default_welcome='$default_welcome', betreff='$betr_write', sig='$sig_write', replace_form_expression_title='$replace_form_expression_title', replace_form_expression_name='$replace_form_expression_name', replace_form_title_mr='$replace_form_title_mr', replace_form_title_mrs='$replace_form_title_mrs', replace_form_ifempty_forename='$replace_form_ifempty_forename', replace_form_ifempty_surname='$replace_form_ifempty_surname', replace_form_alt_titlecheck='$replace_form_alt_titlecheck', replace_form_alt_title='$replace_form_alt_title', default_alternatetext='{$default_alternatetext}'");


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

	$sig_write				= $aus_settings->sig;
	//$abs_write				= $aus_settings->absender;
	$betr_write				= $aus_settings->betreff;

	$default_subscribe		= $aus_settings->default_subscribe;
	$default_welcome		= $aus_settings->default_welcome;
	//$default_email			= $aus_settings->default_email;
	$default_alternatetext	= $aus_settings->default_alternatetext;

	$twidth					= 690;
    $tdwidth				= 5;
    $tdcolorwidth			= 4;
    $eingerueckt			= 7;
    $tdcolor1				= "#FCE99A";
    $tdcolor2				= "#FCE99A";
    $tdcolor3				= "#FCE99A";


    echo "<form action=\"$php_self\" method=\"post\">";



/***************************/
echo "<table>";
echo "<tr><td style=\"background-color:".$tdcolor1.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/

	echo "<table>";

		echo "<tr><td style=\"font-size:13pt;\"><b>".$lang['settings_nltext_headline']."</b></td></tr>";
		echo "<tr><td style=\"height:10px;\"></td></tr>";

	echo "</table>";



        ##########################################################################################

        echo "<br><table><tr><td style=\"padding-left:".$eingerueckt."px;\">";
		###################################################



            echo "<table>";
            echo "<tr><td><b><u>".$lang['settings_nltext_addresser']."</u></b></td></tr>";
            echo "<tr><td height=\"8\"></td><td></td></tr>";

            echo "

            <tr><td>
            <table cellpadding=\"0\" cellspacing=\"0\">
            	<tr><td width=\"190\"><u>".$lang['settings_nltext_definename']."</u></td><td width=\"190\"><u>".$lang['settings_nl_email']."</td></tr>
            	<tr><td height=\"8\"></td><td></td></tr>
            	<tr><td><input type=\"text\" name=\"sender_name\" value=\"$sender_name\" size=\"26\" maxlength=\"250\"></td><td><input type=\"text\" name=\"sender_email\" value=\"$sender_email\" size=\"26\" maxlength=\"250\"></td><td><input type=\"submit\" name=\"sender_ok\" value=\"Ok\" size=\"10\"></td></tr>
            </table>
            </td></tr>
			<tr><td height=\"10\"></td><td></td></tr>
            ";


            $get_sender = $mysql->query("SELECT * FROM {$prefix}_senderaddress");
            if($mysql->numRows($get_sender) != 0)
            {
                echo "
                <tr>
                <td>
                <select name=\"sender_id\">
                ";

                while($aus_sender = $mysql->fetchObject($get_sender))
                {
                    if($aus_sender->sender_default == 1)
                        $default_output = " (".$lang['settings_nltext_isdefault'].")";


                    echo "<option value=\"".$aus_sender->id."\">".$aus_sender->sender_name." &lt;".$aus_sender->sender_email."&gt;{$default_output}</option>";

                    unset($default_output);
                }

                echo "
                </select>
                </td>
                </tr>

                <tr>
                <td>
                <table cellpadding=\"0\" cellspacing=\"0\">
                    <td width=\"180\">
                    <input type=\"submit\" name=\"sender_as_default\" value=\"".$lang['settings_nltext_setasdefault']."\">
                    </td>

                    <td>
                    <input type=\"submit\" name=\"sender_delete\" value=\"".$lang['settings_nltext_delete']."\">
                    </td>
                </table>
                </td>
                </tr>
                ";

            }

            if(!empty($sender_output))
            	echo "<tr><td height=\"8\"></td><td></td></tr><tr><td>{$sender_output}</td></tr>";



            echo "<tr><td height=\"20\"></td><td></td></tr>";


            echo "<tr><td><b><u>".$lang['settings_nl_default']."</u></b></td></tr>";
            echo "<tr><td height=\"8\"></td><td></td></tr>";
            echo "<tr><td><u>".$lang['settings_nl_charset'].":</u></td></tr>";
            echo "<tr><td height=\"3\"></td><td></td></tr>";
            echo "<tr><td><select name=\"charsetid\">";
            $get_charset=$mysql->query("SELECT * FROM {$prefix}_charset");
            while($aus_charset=$mysql->fetchObject($get_charset))
            {
            	if($aus_charset->active==1)
            		echo "<option value=\"".$aus_charset->id."\" selected>".$aus_charset->charset_name." (".$aus_charset->charset.")</option>";
            	else
            		echo "<option value=\"".$aus_charset->id."\">".$aus_charset->charset_name." (".$aus_charset->charset.")</option>";
            }
            echo "</select></td></tr>";
            echo "<tr><td height=\"6\"></td></tr>";

            /*
            echo "<tr><td><u>".$lang['settings_nl_addresser'].":</u></td></tr>";
            echo "<tr><td height=\"3\"></td><td></td></tr>";
            echo "<tr><td><input type=\"text\" name=\"abs_write\" value=\"$abs_write\" size=\"26\" maxlength=\"250\"></td></tr>";
            echo "<tr><td height=\"6\"></td></tr>";
            echo "<tr><td><u>".$lang['settings_nl_email'].":</u></td></tr>";
            echo "<tr><td height=\"3\"></td><td></td></tr>";
            echo "<tr><td><input type=\"text\" name=\"default_email\" value=\"$default_email\" size=\"26\" maxlength=\"250\"></td></tr>";
            */
            echo "<tr><td height=\"6\"></td></tr>";
            echo "<tr><td><u>".$lang['settings_nl_subject'].":</u></td></tr>";
            echo "<tr><td height=\"3\"></td><td></td></tr>";
            echo "<tr><td><input type=\"text\" name=\"betr_write\" value=\"$betr_write\" size=\"26\" maxlength=\"250\"></td></tr>";
            echo "<tr><td style=\"height:8px;\"></td></tr>";

			$textarea_w=320;
			$textarea_h=120;

                echo "<tr><td>";
                echo "<table cellspacing=\"0\" cellpadding=\"0\">";

                	echo "<tr><td style=\"width:370px;\">";
					echo "<table cellspacing=\"0\" cellpadding=\"0\">";

                        echo "<tr><td height=\"6\"></td></tr>";
                        echo "<tr><td><u>".$lang['settings_nl_sig'].":</u></td></tr>";
                        echo "<tr><td height=\"3\"></td><td></td></tr>";
                        echo "<tr><td><textarea name=\"sig_write\" style=\"width:".$textarea_w."px;height:".$textarea_h."px;\">$sig_write</textarea></td></tr>";

					echo "</table>";
					echo "</td><td>";
					echo "<table cellspacing=\"0\" cellpadding=\"0\">";

                        echo "<tr><td height=\"6\"></td></tr>";
                        echo "<tr><td><u>".$lang['settings_nl_default_welcome'].":</u></td></tr>";
                        echo "<tr><td height=\"3\"></td><td></td></tr>";
                        echo "<tr><td><textarea name=\"default_welcome\" style=\"width:".$textarea_w."px;height:".$textarea_h."px;\">$default_welcome</textarea></td></tr>";

					echo "</table>";
					echo "</td></tr>";

					echo "<tr><td>";
					echo "<table cellspacing=\"0\" cellpadding=\"0\">";

                        echo "<tr><td height=\"6\"></td></tr>";
                        echo "<tr><td><u>".$lang['settings_nl_default_subscribe'].":</u></td></tr>";
                        echo "<tr><td height=\"3\"></td><td></td></tr>";
                        echo "<tr><td><textarea name=\"default_subscribe\" style=\"width:".$textarea_w."px;height:".$textarea_h."px;\">$default_subscribe</textarea></td></tr>";

					echo "</table>";
					echo "</td><td>";
					echo "<table cellspacing=\"0\" cellpadding=\"0\">";

                        echo "<tr><td height=\"6\"></td></tr>";
                        echo "<tr><td><u>".$lang['settings_nl_default_alternatetext'].":</u></td></tr>";
                        echo "<tr><td height=\"3\"></td><td></td></tr>";
                        echo "<tr><td><textarea name=\"default_alternatetext\" style=\"width:".$textarea_w."px;height:".$textarea_h."px;\">$default_alternatetext</textarea></td></tr>";

					echo "</table>";
					echo "</td></tr>";

                echo "</td></tr>";
                echo "</table>";

            echo "</table>";

		###################################################
        echo "</td></tr></table>";
        ###################################################


        echo "<table style=\"padding-left:".$eingerueckt."px;\">";
        echo "<tr><td style=\"height:25px;\"></td></tr>";
        echo "<tr><td><div style=\"background-image:url(images/menu_line.gif); width:".$twidth."px; height:1px;\"></div></td></tr>";
        echo "<tr><td style=\"height:25px;\"></td></tr>";
        echo "</table>";

        ##########################################################################################

        echo "<table><tr><td style=\"padding-left:".$eingerueckt."px;\">";
		###################################################


            $width = "200";

            echo "<table>";
            echo "<tr><td><b><u>".$lang['settings_nltext_placeholdertoplacerholder']."</u></b></td></tr>";
            echo "<tr><td height=\"8\"></td><td></td></tr>";

            /* EBNF HEAD EXPRESSION */
            echo "<tr><td><b>{TITLE_EXPRESSION}</b></td><td></td></tr>";
            echo "<tr><td height=\"2\"></td><td></td></tr>";
            echo "<tr>
            <td>{TITLE_EXPRESSION} ".$lang['settings_nltext_getsreplacedwith'].":</td>
            <td>";

            $title_expression_options = array("{TITLE} {NAME_EXPRESSION}", "{TITLE}", "{NAME_EXPRESSION}");

            echo "<select name=\"replace_form_expression_title\" style=\"width:".$width."px; font-size:7pt;\">";
            	foreach($title_expression_options AS $value)
            	{
            		if($value == $aus_settings->replace_form_expression_title)
            		    echo "<option value=\"".$value."\" selected>".$value."</option>";
            		else
            		    echo "<option value=\"".$value."\">".$value."</option>";
            	}
            echo "</select>";

            echo "</td>
            </tr>";


            echo "<tr><td height=\"20\"></td><td></td></tr>";

            /* EBNF NAME */
            echo "<tr><td><b>{NAME_EXPRESSION}</b></td><td></td></tr>";
            echo "<tr><td height=\"2\"></td><td></td></tr>";
            echo "<tr>
            <td>{NAME_EXPRESSION} ".$lang['settings_nltext_getsreplacedwith'].":</td>
            <td>";

            $name_expression_options = array("{FORENAME}", "{SURNAME}", "{SURNAME} {FORENAME}", "{FORENAME} {SURNAME}");

            echo "<select name=\"replace_form_expression_name\" style=\"width:".$width."px;font-size:7pt;\">";
            	foreach($name_expression_options AS $value)
            	{
            		if($value == $aus_settings->replace_form_expression_name)
            		    echo "<option value=\"".$value."\" selected>".$value."</option>";
            		else
            		    echo "<option value=\"".$value."\">".$value."</option>";
            	}
            echo "</select>";

            echo "</td>
            </tr>";

			echo "<tr><td height=\"40\"></td><td></td></tr>";
            echo "<tr><td><b><u>".$lang['settings_nltext_placeholdertoexpr']."</u></b></td></tr>";

            echo "<tr><td height=\"8\"></td><td></td></tr>";

            /* EBNF TITLE */
            echo "<tr><td><b>{TITLE}</b></td><td></td></tr>";
            echo "<tr><td height=\"2\"></td><td></td></tr>";
            echo "<tr>
            <td>".$lang['settings_nltext_ifplaceholder']." {TITLE} = ".$lang['settings_nltext_ifmale'].":</td>
            <td><input type=\"text\" name=\"replace_form_title_mr\" value=\"".$aus_settings->replace_form_title_mr."\" style=\"width:".$width."px;\"></td>
            </tr>";

            echo "<tr>
            <td>".$lang['settings_nltext_ifplaceholder']." {TITLE} = ".$lang['settings_nltext_iffemale'].":</td>
            <td><input type=\"text\" name=\"replace_form_title_mrs\" value=\"".$aus_settings->replace_form_title_mrs."\" style=\"width:".$width."px;\"></td>
            </tr>";

			if($aus_settings->replace_form_alt_titlecheck == 1)
				$titlechecked = "checked";

            echo "<tr>
            <td><input type=\"checkbox\" name=\"replace_form_alt_titlecheck\" value=\"1\" {$titlechecked}>".$lang['settings_nltext_alttitle'].":</td>
            <td><input type=\"text\" name=\"replace_form_alt_title\" value=\"".$aus_settings->replace_form_alt_title."\" style=\"width:".$width."px;\"></td>
            </tr>";

            echo "<tr><td style=\"height:25px;\"></td></tr>";

            echo "<tr><td><b>{FORENAME} ".$lang['settings_nltext_and']."  {SURNAME}</b></td><td></td></tr>";
            echo "<tr><td height=\"2\"></td><td></td></tr>";
            echo "<tr>
            <td>".$lang['settings_nltext_ifplaceholder']." {FORENAME} = ".$lang['settings_nltext_empty'].":</td>
            <td><input type=\"text\" name=\"replace_form_ifempty_forename\" value=\"".$aus_settings->replace_form_ifempty_forename."\" style=\"width:".$width."px;\"></td>
            </tr>";
            echo "<tr>
            <td>".$lang['settings_nltext_ifplaceholder']." {SURNAME} = ".$lang['settings_nltext_empty'].":</td>
            <td><input type=\"text\" name=\"replace_form_ifempty_surname\" value=\"".$aus_settings->replace_form_ifempty_surname."\" style=\"width:".$width."px;\"></td>
            </tr>";

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