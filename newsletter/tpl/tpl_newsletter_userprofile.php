<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');


    echo "<form action=\"".$FORM_URL."?profile_id=".$PROFILE_ID."\" method=\"post\">\n";

    echo "<table>\n";

	echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."font-weight:bold; text-decoration:underline;\">".$lang['profile_edit_headline']."</td></tr>\n";
	echo "<tr><td class=\"output\" style=\"height:12px;\"></td></tr>\n";

	echo "</table>\n";
	echo "<table>\n";

	/* show email field */

    echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">".$lang['onl_formemail'].":</td><td class=\"output\">\n
    <input class=\"output\" type=\"text\" name=\"mail\" value=\"".$aus_profile->mail."\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n
    </td></tr>\n";



	/* if name input is activated, show textfield for user title input */

    if($CHECK_SHOW_TITLE)
    {
    	if($aus_profile->title == 0) $selected_mr = "selected";
    	else  $selected_mrs = "selected";

        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">".$lang['onl_form_title'].":</td><td class=\"output\">\n";

        	echo "<select name=\"title\"  style=\"".$STYLE_FONT." width:".$STYLE_TEXTFIELDWIDTH."px;\">\n";
        	echo "<option value=\"0\" ".$selected_mr.">".$lang['onl_form_mr']."</option>\n";
        	echo "<option value=\"1\" ".$selected_mrs.">".$lang['onl_form_mrs']."</option>\n";
        	echo "</select>\n";

		echo "</td></tr>\n";
    }


	/* if name input is activated, show textfield for user forename input */

    if($CHECK_SHOW_FORENAME)
    {
        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">".$lang['onl_form_forename'].":</td><td class=\"output\">\n
        <input class=\"output\" type=\"text\" name=\"forename\" value=\"".$aus_profile->forename."\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n
        </td></tr>\n";
    }


	/* if name input is activated, show textfield for user surname input */

    if($CHECK_SHOW_SURNAME)
    {
        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\">".$lang['onl_form_surname'].":</td><td class=\"output\">\n
        <input class=\"output\" type=\"text\" name=\"surname\" value=\"".$aus_profile->surname."\" style=\"width:".$STYLE_TEXTFIELDWIDTH."px;\" />\n
        </td></tr>\n";
    }


	/* if group choice is activated, show group checkboxes */

    if($CHECK_SHOW_GROUP_CHOICE)
    {

        echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>\n";
        echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">".$lang['onl_group'].":</td>\n";

        $i=1;
        $get_groups=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' AND hidden<>'1' ORDER BY groupname");
        while($aus_groups=$mysql->fetchObject($get_groups))
        {
        	if($i == 1)
            	echo "<td class=\"output\" style=\"padding-left:0; ".$STYLE_FONT."\">\n";
            else
            	echo "<tr><td></td><td class=\"output\" style=\"padding-left:0; ".$STYLE_FONT."\">";

			// get group definitations according to the user
        	$get_group_check = $mysql->query("SELECT * FROM {$prefix}_group_def WHERE id_user='".$aus_profile->id."' AND id_group='".$aus_groups->id."'");

			if($GROUP_RADIO == 0)
			{
                // if not defined group for user, uncheck
                if($mysql->numRows($get_group_check)==0)
                    echo "<input class=\"output\" id=\"selgroup{$i}\" type=\"checkbox\" name=\"group_id[".$i."]\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>\n";
                else
                    echo "<input class=\"output\" id=\"selgroup{$i}\" type=\"checkbox\" name=\"group_id[".$i."]\" value=\"".$aus_groups->id."\" checked=\"checked\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>\n";
			}
			else
			{
				if($mysql->numRows($get_group_check)==0)
					echo "<input class=\"output\" id=\"selgroup{$i}\" type=\"radio\" name=\"group_id\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>\n";    				
				else
					echo "<input class=\"output\" id=\"selgroup{$i}\" type=\"radio\" name=\"group_id\" value=\"".$aus_groups->id."\" checked=\"checked\"/><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>\n"; 			
			}


            $i++;
        }


        echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>\n";
    }




    echo "<tr><td class=\"output\" style=\"height:8px;\"></td></tr>\n";
    echo "<tr><td class=\"output\"><input type=\"hidden\" name=\"action\" value=\"edit\" /></td></tr>\n";
    echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING."\"><input class=\"output\" type=\"submit\" name=\"newsletter_ok\" value=\"&nbsp;&nbsp;&nbsp;&nbsp;".$lang['profile_edit']."&nbsp;&nbsp;&nbsp;&nbsp;\" /></td></tr>\n";
    echo "<tr><td class=\"output\" style=\"height:4px;\"></td></tr>\n";


    echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">NLetter  v".$VERSION_INFO."</td></tr>\n";

    echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">&copy; <a onclick=\"window.open(this.href,'_blank');return false;\" href=\"http://www.usolved.net\" class=\"output\" style=\"".$STYLE_FONT." font-weight: bold;\">USOLVED</a></td></tr>\n";


    echo "</table>\n";

    echo "</form>\n";
?>