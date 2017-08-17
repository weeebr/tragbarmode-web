<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');

echo "<form id=\"form_data\" name=\"form_data\" style=\"margin: 0px;\">\n";
echo "<div>";

	$mail = $lang['onl_formemail'];
	echo "<p><input class=\"output\" type=\"text\" name=\"mail\" id=\"mail\" value=\"".$mail."\" onfocus=\"if(this.value=='".$mail."') this.value=''\" onblur=\"if(this.value=='')this.value='".$mail."'\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n</p>";



	/* if name input is activated, show textfield for user title input */

    if($CHECK_SHOW_TITLE)
    {
        echo "<p style=\"padding-top: 5px;\">\n";

        	echo "<select name=\"title\" id=\"title\" style=\"".$STYLE_FONT." width:".$STYLE_TEXTFIELDWIDTH."px;\">\n";
        	echo "<option value=\"0\" ".$selectMr.">".$lang['onl_form_mr']."</option>\n";
        	echo "<option value=\"1\" ".$selectMrs.">".$lang['onl_form_mrs']."</option>\n";
        	echo "</select>\n";

		echo "</p>\n";
    }


	/* if name input is activated, show textfield for user forename input */

    if($CHECK_SHOW_FORENAME)
    {
        echo "<p style=\"padding-top: 5px;\">\n";

        echo "<input class=\"output\" type=\"text\" name=\"forename\" id=\"forename\" value=\"".$lang['onl_form_forename']."\" onfocus=\"if(this.value=='".$lang['onl_form_forename']."') this.value=''\" onblur=\"if(this.value=='')this.value='".$lang['onl_form_forename']."'\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n";

        echo "</p>\n";
    }


	/* if name input is activated, show textfield for user surname input */

    if($CHECK_SHOW_SURNAME)
    {

        echo "<p style=\"padding-top: 5px;\">\n";

        echo "<input class=\"output\" type=\"text\" name=\"surname\" id=\"surname\" value=\"".$lang['onl_form_surname']."\" onfocus=\"if(this.value=='".$lang['onl_form_surname']."') this.value=''\" onblur=\"if(this.value=='')this.value='".$lang['onl_form_surname']."'\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n";

        echo "</p>\n";

    }


	/* if group choice is activated, show group checkboxes */

    if($CHECK_SHOW_GROUP_CHOICE)
    {

		if($GROUP_RADIO == 0)
			$type = "checkbox";
		else
			$type = "radio";


        echo "<p style=\"padding-top: 14px;\">".$lang['onl_group'].":</p>\n";


        if($GROUP_SELECT == 1 && $GROUP_RADIO == 1)
        {
        	echo "<p><select name=\"group_id\" id=\"group_id\" class=\"output\">";
        }

        $i=1;
        $get_groups=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' AND hidden<>'1' ORDER BY groupname");
        while($aus_groups=$mysql->fetchObject($get_groups))
        {
        	if($GROUP_SELECT == 1 && $GROUP_RADIO == 1)
        	{
        		if($aus_groups->id == $_POST['group_id'])
        			echo "<option value=\"".$aus_groups->id."\" selected>".$aus_groups->groupname."</option>";
        		else
        			echo "<option value=\"".$aus_groups->id."\">".$aus_groups->groupname."</option>";
        	}
        	else
        	{
                if($GROUP_RADIO == 0)
                {
                    echo "<p><input class=\"output\" id=\"selgroup{$i}\" type=\"checkbox\" name=\"group_id[".$i."]\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></p>\n";

                }
                else
                {
                    echo "<p><input class=\"output\" id=\"selgroup{$i}\" type=\"radio\" name=\"group_id\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></p>\n";
                }
			}

			$i++;
        }

        if($GROUP_SELECT == 1 && $GROUP_RADIO == 1)
        {
        	echo "</select></p>";
        }

    }
    
	/* if captcha is activated, show captcha image */
	
    if($CHECK_SHOW_CAPTCHA)
    {

        echo "
        <p style=\"padding-top: 10px;\">". $lang['osendin_captcha'] .":</p>
        <p style=\"padding-top: 5px;\"><img src=\"". $file_root ."/inc/captcha/server.php\" onclick=\"javasript:this.src='".$file_root."/inc/captcha/server.php?'+Math.random();\" alt=\"Captcha\" style=\"border: 1px solid #000000;\" /></p>
        <p style=\"padding-top: 5px;\"><input class=\"output\" name=\"captcha\" id=\"captcha\" type=\"text\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" /></p>

        <p><input type=\"hidden\" name=\"validate\" value=\"1\" /></p>
        ";

    }

	/* if instant activation is activated, show both radio buttons */

    if($CHECK_SHOW_RADIOBUTTONS)
    {
        echo "<p style=\"padding-top: 8px;\"><input class=\"output\" type=\"radio\" id=\"selein\" name=\"action\" value=\"ein\" checked=\"checked\" /><label for=\"selein\">".$lang['onl_subscribe']."</label></p>\n";

        echo "<p><input class=\"output\" type=\"radio\" id=\"selaus\" name=\"action\" value=\"aus\" /><label for=\"selaus\">".$lang['onl_unsubscrib']."</label></p>\n";
    }
    else
    {
        echo "<p><input type=\"hidden\" name=\"action\" id=\"action\" value=\"ein\" /></p>\n";
    }


	echo "<p style=\"padding-top: 16px;\">";
	echo "<div style=\"float: left;\"><input class=\"submit\" type=\"button\" onclick=\"xajax_subscribe(xajax.getFormValues('form_data'));\" value=\"".$lang['onl_ok']."\" /></div><div id=\"loading\">&nbsp;&nbsp;<img src=\"".$file_root."/images/ajaxloader.gif\" /></div>";
	echo "</p>";



echo "</div>";
echo "</form>";



echo "<div id=\"formOutput\">&#160;</div>";

?>