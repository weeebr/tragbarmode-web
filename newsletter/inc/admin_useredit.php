<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


    $get_settings=$mysql->query("SELECT * FROM {$prefix}_settings");
    $aus_settings=$mysql->fetchObject($get_settings);


	echo "<form action=\"$php_self\" method=\"post\">";

	if($_POST['editgroup_ok'])
	{
		$id_user=$_POST['id_user'];
		$email=$_POST['email'];
		$forename=htmlentities($_POST['forename']);
		$surname=htmlentities($_POST['surname']);
		$title=$_POST['title'];
		$radio_check=$_POST['radio_check'];

		$mysql->query("UPDATE {$prefix}_entries SET mail='$email',forename='$forename',surname='$surname',title='$title' WHERE id='$id_user'");

        $get_groupname=$mysql->query("SELECT * FROM {$prefix}_groups WHERE groupname<>'Standard' ORDER BY groupname");
        while($aus_groupname=$mysql->fetchObject($get_groupname))
        {
    		$get_group_check=$mysql->query("SELECT * FROM {$prefix}_group_def WHERE id_user='".$id_user."' AND id_group='".$aus_groupname->id."'");
    		if($mysql->numRows($get_group_check)==0 && $radio_check[$aus_groupname->id]==1)
    		{
    			$mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$aus_groupname->id."')");
    		}
    		else
    		{
    			if($radio_check[$aus_groupname->id]==0)
    				$mysql->query("DELETE FROM {$prefix}_group_def WHERE id_user='".$id_user."' AND id_group='".$aus_groupname->id."'");
    		}
    	}

	}
	
	if($_POST['unlock_user'])
	{
		$id_user = $_POST['id_user'];
		$mysql->query("UPDATE {$prefix}_entries SET flag='0' WHERE id='{$id_user}'");
		echo "<table><tr><td>".$lang['admin_group_unlock_success']."</td></tr></table>";
	}

	########################################

    $groupedit_id=$_GET['groupedit_id'];
    $get_mail=$mysql->query("SELECT * FROM {$prefix}_entries WHERE id='".$groupedit_id."'");
    $aus_mail=$mysql->fetchObject($get_mail);

	echo "<table>";
	echo "<tr><td><b>".$lang['admin_group_email'].":</b></td></tr>";
	echo "<tr><td><input type=\"text\" name=\"email\" value=\"".$aus_mail->mail."\" style=\"width:216px;\"></td></tr>";
	echo "<tr><td height=\"10\"></td></tr>";

	if($aus_mail->flag == 1)
	{
        echo "<tr><td><b>".$lang['admin_group_unlock'].":</b></td></tr>";
        echo "<tr><td><input type=\"submit\" name=\"unlock_user\" value=\"".$lang['admin_group_unlock_button']."\"></td></tr>"; 
        echo "<tr><td height=\"10\"></td></tr>";   
	}
	
	echo "</table>";

    if($aus_settings->form_title==1)
    {
    	if($aus_mail->title == 0) $selected_mr = "selected";
    	else  $selected_mrs = "selected";

        echo "<table>";
        echo "<tr><td><b>".$lang['onl_form_title'].":</b></td></tr>";
        echo "<tr><td>";

        	echo "<select name=\"title\">\n";
        	echo "<option value=\"0\" ".$selected_mr.">".$lang['onl_form_mr']."</option>\n";
        	echo "<option value=\"1\" ".$selected_mrs.">".$lang['onl_form_mrs']."</option>\n";
        	echo "</select>\n";

        echo "</td></tr>";
        echo "<tr><td height=\"10\"></td></tr>";
    	echo "</table>";

    }
	if($aus_settings->form_forename==1)
	{
        echo "<table>";
        echo "<tr><td><b>".$lang['admin_group_forename'].":</b></td></tr>";
        echo "<tr><td><input type=\"text\" name=\"forename\" value=\"".$aus_mail->forename."\" style=\"width:216px;\"></td></tr>";
        echo "<tr><td height=\"10\"></td></tr>";
    	echo "</table>";
	}
	if($aus_settings->form_surname==1)
	{
        echo "<table>";
        echo "<tr><td><b>".$lang['admin_group_surname'].":</b></td></tr>";
        echo "<tr><td><input type=\"text\" name=\"surname\" value=\"".$aus_mail->surname."\" style=\"width:216px;\"></td></tr>";
        echo "<tr><td height=\"10\"></td></tr>";
    	echo "</table>";
	}

        echo "<table>";
        echo "<tr><td width=\"130\"><b>".$lang['admin_group_groupname'].":</b></td><td><b>".$lang['admin_group_rel'].":</b></td></tr>";
        $get_groupname=$mysql->query("SELECT * FROM {$prefix}_groups WHERE groupname<>'Standard' ORDER BY groupname");
        if($mysql->numRows($get_groupname)!=0)
        {
            while($aus_groupname=$mysql->fetchObject($get_groupname))
            {
                echo "<tr><td>".$aus_groupname->groupname."</td><td>";

                    $get_group_check=$mysql->query("SELECT * FROM {$prefix}_group_def WHERE id_user='".$groupedit_id."' AND id_group='".$aus_groupname->id."'");
                    if($mysql->numRows($get_group_check)==0)
                    echo "<input type=\"checkbox\" name=\"radio_check[".$aus_groupname->id."]\" value=\"1\">";
                    else
                    echo "<input type=\"checkbox\" name=\"radio_check[".$aus_groupname->id."]\" value=\"1\" checked>";

                echo "</td></tr>";
            }
        }
        else
        	echo "<tr><td>".$lang['admin_group_none']."</td></tr>";
        echo "</table>";


	echo "<table>";
	echo "<tr><td height=\"14\"></td></tr>";
    echo "<tr><td><input type=\"hidden\" name=\"id_user\" value=\"".$groupedit_id."\"><input type=\"submit\" name=\"editgroup_ok\" value=\"".$lang['admin_group_edit']."\" style=\"width:120;\"></td></tr>";
    echo "</table>";

	echo "</form>";
?>