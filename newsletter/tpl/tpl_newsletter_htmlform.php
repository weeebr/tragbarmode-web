<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');


    echo "<form action=\"".$FORM_URL."\" method=\"post\">\n";

    echo "<table>";


	/* show javascript toggle value or not */

    if(empty($_POST['mail']) || empty($mail))
    {
        $mail = $lang['onl_formemail'];
        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">\n
        <input class=\"output\" type=\"text\" name=\"mail\" value=\"".$mail."\" onfocus=\"if(this.value=='".$mail."') this.value=''\" onblur=\"if(this.value=='')this.value='".$mail."'\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n
        </td></tr>\n";
    }
    else
    {
        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">\n
        <input class=\"output\" type=\"text\" name=\"mail\" value=\"".$mail."\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n
        </td></tr>\n";
    }


	/* if name input is activated, show textfield for user title input */

    if($CHECK_SHOW_TITLE)
    {

    	/* select chosen title if form had an error */

    	if(!empty($title))
    	{
            if($title = "0")
                $selectMr = "selected";
            else
                $selectMrs = "selected";
    	}

        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">\n";

        	echo "<select name=\"title\"  style=\"".$STYLE_FONT." width:".$STYLE_TEXTFIELDWIDTH."px;\">\n";
        	echo "<option value=\"0\" ".$selectMr.">".$lang['onl_form_mr']."</option>\n";
        	echo "<option value=\"1\" ".$selectMrs.">".$lang['onl_form_mrs']."</option>\n";
        	echo "</select>\n";

		echo "</td></tr>\n";
    }


	/* if name input is activated, show textfield for user forename input */

    if($CHECK_SHOW_FORENAME)
    {
        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">\n";

        if(empty($forename))
        	echo "<input class=\"output\" type=\"text\" name=\"forename\" value=\"".$lang['onl_form_forename']."\" onfocus=\"if(this.value=='".$lang['onl_form_forename']."') this.value=''\" onblur=\"if(this.value=='')this.value='".$lang['onl_form_forename']."'\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n";

        else
        	echo "<input class=\"output\" type=\"text\" name=\"forename\" value=\"".$forename."\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n";

        echo "</td></tr>\n";
    }


	/* if name input is activated, show textfield for user surname input */

    if($CHECK_SHOW_SURNAME)
    {

        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">\n";

        if(empty($surname))
        	echo "<input class=\"output\" type=\"text\" name=\"surname\" value=\"".$lang['onl_form_surname']."\" onfocus=\"if(this.value=='".$lang['onl_form_surname']."') this.value=''\" onblur=\"if(this.value=='')this.value='".$lang['onl_form_surname']."'\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n";

        else
        	echo "<input class=\"output\" type=\"text\" name=\"surname\" value=\"".$surname."\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n";

        echo "</td></tr>\n";

    }


	/* if group choice is activated, show group checkboxes */

    if($CHECK_SHOW_GROUP_CHOICE)
    {

		if($GROUP_RADIO == 0)
			$type = "checkbox";
		else
			$type = "radio";


        echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>\n";
        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">".$lang['onl_group'].":</td></tr>\n";


        if($GROUP_SELECT == 1 && $GROUP_RADIO == 1)
        {
        	echo "<tr><td style=\"".$STYLE_PADDING." ".$STYLE_FONT."\"><select name=\"group_id\" class=\"output\">";
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
                    echo "<tr><td class=\"output\" style=\"padding-left:0; ".$STYLE_FONT."\"><input class=\"output\" id=\"selgroup{$i}\" type=\"checkbox\" name=\"group_id[".$i."]\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>\n";

                }
                else
                {
                    echo "<tr><td class=\"output\" style=\"padding-left:0; ".$STYLE_FONT."\"><input class=\"output\" id=\"selgroup{$i}\" type=\"radio\" name=\"group_id\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>\n";
                }
			}

			$i++;
        }

        if($GROUP_SELECT == 1 && $GROUP_RADIO == 1)
        {
        	echo "</select></td></tr>";
        }

        echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>\n";
    }


	/* if captcha is activated, show captcha image */
	
    if($CHECK_SHOW_CAPTCHA)
    {

        echo "
        <tr><td class=\"output\" style=\"".$STYLE_PADDING."\">". $lang['osendin_captcha'] .":</td></tr>
        <tr><td class=\"output\" style=\"".$STYLE_PADDING."\"><img src=\"". $file_root ."/inc/captcha/server.php\" onclick=\"javasript:this.src='".$file_root."/inc/captcha/server.php?'+Math.random();\" alt=\"Captcha\" style=\"border: 1px solid #000000;\" /></td></tr>
        <tr><td class=\"output\" style=\"".$STYLE_PADDING."\"><input class=\"output\" name=\"captcha\" type=\"text\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" /></td>
        </tr>

        <tr><td><input type=\"hidden\" name=\"validate\" value=\"1\" /></td></tr>
        ";

    }


	/* if instant activation is activated, show both radio buttons */

    if($CHECK_SHOW_RADIOBUTTONS)
    {
    	if(empty($action))			$checked_ein = "checked=\"checked\"";
    	elseif($action == "ein")	$checked_ein = "checked=\"checked\"";
    	else						$checked_aus = "checked=\"checked\"";

        echo "<tr><td class=\"output\" style=\"padding-left:0; ".$STYLE_FONT."\"><input class=\"output\" type=\"radio\" id=\"selein\" name=\"action\" value=\"ein\" ".$checked_ein." /><label for=\"selein\">".$lang['onl_subscribe']."</label></td></tr>\n";


        echo "<tr><td class=\"output\" style=\"padding-left:0; ".$STYLE_FONT."\"><input class=\"output\" type=\"radio\" id=\"selaus\" name=\"action\" value=\"aus\" ".$checked_aus." /><label for=\"selaus\">".$lang['onl_unsubscrib']."</label></td></tr>\n";
    }
    else
    {
        echo "<tr><td class=\"output\"><input type=\"hidden\" name=\"action\" value=\"ein\" /></td></tr>\n";
    }




    echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>\n";
    echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\"><input class=\"submit\" type=\"submit\" name=\"newsletter_ok\" value=\"&nbsp;&nbsp;&nbsp;&nbsp;".$lang['onl_ok']."&nbsp;&nbsp;&nbsp;&nbsp;\" /></td></tr>\n";

    echo "</table>\n";

    echo "</form>\n";
?>