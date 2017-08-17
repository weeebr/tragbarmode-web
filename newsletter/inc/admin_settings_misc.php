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

	$edituser = $_GET['edituser'];

	if($_POST['sig_ok'] || $_POST['edituser_ok'])
	{
		if($_POST['sig_ok'])
		{
            $user_oldpw     = $_POST['user_oldpw'];
            $user_newpw     = $_POST['user_newpw'];
            $user_newpwr    = $_POST['user_newpwr'];
            $user_mail      = $_POST['user_mail'];
            $user_name      = escapeString($_POST['user_name']);
            $user_group     = $_POST['id_group_new'];

            $user_id_tmp	= $user_id;
		}
		else
		{
            $user_oldpw     = $_POST['new_user_oldpw'];
            $user_newpw     = $_POST['new_user_newpw'];
            $user_newpwr    = $_POST['new_user_newpwr'];
            $user_mail      = $_POST['new_user_mail'];
            $user_name      = escapeString($_POST['new_user_name']);
            $user_group     = $_POST['id_group_new'];

            $user_id_tmp	= $user_id;
            $user_id		= $edituser;
		}

		if($user_oldpw!="" || $user_newpw!="" || $user_newpwr!="")
		{
            $user_oldpw_n=md5($user_oldpw);
            $user_newpw_n=md5($user_newpw);
            $user_newpwr_n=md5($user_newpwr);

            $get_axxs_new1=$mysql->query("SELECT pw FROM $prefix"."_intern_users WHERE id='{$user_id}'");
            $aus_axxs_new1=$mysql->fetchObject($get_axxs_new1);
			if($aus_axxs_new1->pw==$user_oldpw_n)
			{
				$oldpw_ok="ok";
			}
			else
			{
				$msg_oldpwok=$lang['settings_oldpw_notcorrect'];
			}

			if($user_newpw!="" || $user_newpwr!="")
			{
				$blank_ok="ok";
			}
			else
			{
				$msg_blankok=$lang['settings_notfilledout'];
			}

			if(($user_newpw_n==$user_newpwr_n) && $user_newpw_n!="" && $user_newpwr_n!="")
			{
				$newpw_ok="ok";
			}
			else
			{
				$msg_newpwok=$lang['settings_pwmatch'];
			}

			//------------------------------------

			if($newpw_ok=="ok" && $oldpw_ok=="ok" && $blank_ok=="ok")
			{

                $mysql->query("UPDATE $prefix"."_intern_users SET user='$user_name',mail='$user_mail',pw='$user_newpw_n',id_group='{$user_group}' WHERE id='$user_id'");
                $msg_pwok=$lang['settings_pwchange1']." ".$user_oldpw." ".$lang['settings_pwchange2']." ".$user_newpw." ".$lang['settings_pwchange3']."!";

                unset($user_oldpw, $user_newpw, $user_newpwr);
			}
		}
		else
		{
            $mysql->query("UPDATE $prefix"."_intern_users SET user='$user_name',mail='$user_mail',id_group='{$user_group}' WHERE id='$user_id'");
        }

		$user_id	= $user_id_tmp;

        echo "<table><tr><td><b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_edited']."!</font></b><br>";
        if(!empty($msg_oldpwok))echo "<b>&#187; ".$msg_oldpwok."</b><br>";
        if(!empty($msg_pwok))echo "<b>&#187; ".$msg_pwok."</b><br>";
        if(!empty($msg_newpwok))echo "<b>&#187; ".$msg_newpwok."</b><br>";
        if(!empty($msg_blankok))echo "<b>&#187; ".$msg_blankok."</b><br>";

        for($i=1;$i<160;$i++)
        {
        	echo ".";
        }
        echo "</td></tr></table><br>";
	}

	if($_POST['newgroup_ok'])
	{
		$groupname = escapeString($_POST['groupname']);

		$mysql->query("INSERT INTO {$prefix}_intern_groups (groupname) VALUES ('{$groupname}')");
		$lastid = $mysql->insertId();

        $get_access_name=$mysql->query("SELECT * FROM {$prefix}_intern_permission_name");
        while($out_access_name=$mysql->fetchObject($get_access_name))
        {
        	$mysql->query("INSERT INTO {$prefix}_intern_permission (id_group, id_permission_name, perm_flag) VALUES ('{$lastid}', '{$out_access_name->perm_name}', '{$_POST[$out_access_name->perm_name]}' )");
        }

        echo "<table><tr><td>";
        echo "<b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_misc_newgroupcreated']."!</font></b><br>";
        for($i=1;$i<160;$i++) echo ".";
        echo "</td></tr></table><br>";

        unset($groupname);
	}

	if($_POST['newuser_ok'])
	{
        $new_user_name		=	escapeString($_POST['new_user_name']);
        $new_user_mail		=	$_POST['new_user_mail'];
        $new_user_group		=	$_POST['new_user_group'];
        $user_pw			=	$_POST['new_user_pw'];
        $user_pwrepeat		=	$_POST['new_user_pwrepeat'];

		if(!empty($user_pw) && !empty($user_pwrepeat))
		{
			if($user_pw != $user_pwrepeat)
				$newuser_error .= "<b>&#187; ".$lang['settings_pwmatch']."!</b><br>";
		}
		else
			$newuser_error .= "<b>&#187; ".$lang['settings_misc_typepw']."!</b><br>";

		if(empty($new_user_name))
			$newuser_error .= "<b>&#187; ".$lang['settings_misc_typeuser']."!</b><br>";

		if(!preg_match( '/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/' , $new_user_mail))
			$newuser_error .= "<b>&#187; ".$lang['settings_misc_typeemail']."!</b><br>";



        echo "<table><tr><td>";
        if(!empty($newuser_error))
        	echo $newuser_error;
        else
        {
            $user_pw        =   md5($user_pw);
            $date           =   date("Y-m-d H:i:s");

            $mysql->query("INSERT INTO {$prefix}_intern_users (user,pw,mail,regdate,id_group,id_language) VALUES ('$new_user_name','$user_pw','$new_user_mail','$date','{$new_user_group}', '1')");

        	echo "<b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_edited']."!</font></b><br>";
        	unset($new_user_name, $new_user_mail, $new_user_group);
		}

        for($i=1;$i<160;$i++) echo ".";

        echo "</td></tr></table><br>";
        
        

	}


	$delgroup = $_GET['delgroup'];
	if(!empty($delgroup))
	{
		$mysql->query("UPDATE {$prefix}_intern_users SET id_group='-1' WHERE id_group='{$delgroup}'");
		$mysql->query("DELETE FROM {$prefix}_intern_groups WHERE id='{$delgroup}'");
		$mysql->query("DELETE FROM {$prefix}_intern_permission WHERE id_group='{$delgroup}'");

        echo "<table><tr><td>";
        echo "<b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_misc_groupdeleted']."</font></b><br>";
        for($i=1;$i<160;$i++) echo ".";
        echo "</td></tr></table><br>";
	}

	$deluser = $_GET['deluser'];
	if(!empty($deluser))
	{

		$mysql->query("DELETE FROM {$prefix}_intern_users WHERE id='{$deluser}' AND id<>'1'");

        echo "<table><tr><td>";
        echo "<b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_misc_userdeleted']."</font></b><br>";
        for($i=1;$i<160;$i++) echo ".";
        echo "</td></tr></table><br>";
	}

	if(!empty( $_POST['groupedit_ok'] ))
	{
		$editgroup_new = $_POST['editgroup_new'];
		$groupname_new = $_POST['groupname_new'];

		if(!empty($groupname_new))
			$mysql->query("UPDATE {$prefix}_intern_groups SET groupname='{$groupname_new}' WHERE id='{$editgroup_new}'");

        $get_access_name=$mysql->query("SELECT * FROM {$prefix}_intern_permission_name");
        while($out_access_name=$mysql->fetchObject($get_access_name))
        {
        	$tmp = $out_access_name->perm_name."_new";
        	$mysql->query("UPDATE {$prefix}_intern_permission SET perm_flag='{$_POST[$tmp]}' WHERE id_permission_name='{$out_access_name->perm_name}' AND id_group='{$editgroup_new}'");
        }

        echo "<table><tr><td>";
        echo "<b>&#187; <font style=\"color:#7BBD42;\">".$lang['settings_misc_groupedited']."!</font></b><br>";
        for($i=1;$i<160;$i++) echo ".";
        echo "</td></tr></table><br>";

	}

	############################################################


	$twidth=640;
    $tdwidth=5;
    $tdcolorwidth=4;
    $eingerueckt=7;
    $tdcolor1="#FCE99A";
    $tdcolor2="#FCE99A";
    $tdcolor3="#FCE99A";


    echo "<form action=\"$php_self\" method=\"post\">";


		echo "<table><tr><td valign=\"top\" width=\"400\">";

/***************************/
echo "<table>";
echo "<tr><td style=\"background-color:".$tdcolor1.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/


        ###################################################
		echo "<table>";
		###################################################


		echo "<tr><td style=\"font-size:13pt;\"><b>".$lang['settings_misc_usermanagement']."</b></td></tr>"; //".$lang['settings_ot_headline']."
		echo "<tr><td style=\"height:10px;\"></td></tr>";
		echo "<tr>";
		echo "<td valign=\"top\" style=\"padding-left:".$eingerueckt."px;\">";

			echo "<table><tr><td>";
                $get_axxs_new=$mysql->query("SELECT * FROM $prefix"."_intern_users WHERE id='$user_id'");
                $aus_axxs_new=$mysql->fetchObject($get_axxs_new);

                echo "<table>";
                echo "<tr><td><b><u>".$lang['settings_misc_owndata']."</u></b></td></tr>";	//".$lang['settings_ot_userdata']."
                echo "<tr><td height=\"8\"></td><td></td></tr>";
                echo "<tr><td width=\"124\">".$lang['settings_ot_username'].":</td><td><input type=\"text\" name=\"user_name\" value=\"".$aus_axxs_new->user."\"></td></tr>";
                echo "<tr><td>".$lang['settings_ot_mailaddress'].":</td><td><input type=\"text\" name=\"user_mail\" value=\"".$aus_axxs_new->mail."\"></td></tr>";
                echo "<tr><td height=\"12\"></td><td></td></tr>";
                echo "<tr><td>".$lang['settings_ot_oldpw'].":</td><td><input type=\"password\" name=\"user_oldpw\" value=\"$user_oldpw\"></td></tr>";
                echo "<tr><td>".$lang['settings_ot_newpw'].":</td><td><input type=\"password\" name=\"user_newpw\" value=\"$user_newpw\"></td></tr>";
                echo "<tr><td>".$lang['settings_ot_rnewpw'].":</td><td valign=\"top\"><input type=\"password\" name=\"user_newpwr\" value=\"$user_newpwr\"></td></tr>";

                echo "<tr><td>".$lang['settings_misc_group'].":</td><td valign=\"top\">";

                if($user_id == "1")
                {
                	echo "Admin";
                	echo "<input type=\"hidden\" name=\"id_group_new\" value=\"1\">";
                }
                else
                {
                	echo "<select name=\"id_group_new\">";

                	//if admin login, then show all groups to chose
                	if($user_group == "1")
                		$query = "SELECT * FROM {$prefix}_intern_groups";
                	else
                		$query = "SELECT * FROM {$prefix}_intern_groups WHERE id<>'1'";

                    $get_access=$mysql->query($query);
                    if($mysql->numRows($get_access) != 0)
                    {
                        while($out_access=$mysql->fetchObject($get_access))
                        {
                        	if($out_access->id == $user_group)
                        		echo "<option value=\"{$out_access->id}\" selected>{$out_access->groupname}</option>";
                        	else
                        		echo "<option value=\"{$out_access->id}\">{$out_access->groupname}</option>";
                        }
                    }
                    else
                    	echo "<option>".$lang['settings_misc_nogroups']."</option>";

                	echo "</select>";
                }

                echo "</td></tr>";

                echo "</table>";
			echo "</td></tr></table>";

		echo "</td>";
		echo "</tr>";

		echo "</table>";


	 echo "<br><br><table><tr><td><input type=\"submit\" name=\"sig_ok\" value=\"".$lang['settings_savesettings']."\" class=\"button\"></td></tr></table>";



        ###################################################
		echo "<br><br><table>";
		###################################################


		echo "<tr>";
		echo "<td valign=\"top\" style=\"padding-left:".$eingerueckt."px;\">";

			echo "<table><tr><td>";

                echo "<tr><td><b><u>".$lang['settings_misc_newuserhead']."</u></b></td></tr>";
                echo "<tr><td height=\"8\"></td><td></td></tr>";
                echo "<tr><td width=\"124\">".$lang['settings_ot_username'].":</td><td><input type=\"text\" name=\"new_user_name\" value=\"".$new_user_name."\"></td></tr>";
                echo "<tr><td>".$lang['settings_ot_mailaddress'].":</td><td><input type=\"text\" name=\"new_user_mail\" value=\"".$new_user_mail."\"></td></tr>";
                echo "<tr><td height=\"12\"></td><td></td></tr>";
                echo "<tr><td>".$lang['settings_misc_password'].":</td><td><input type=\"password\" name=\"new_user_pw\"></td></tr>";
                echo "<tr><td>".$lang['settings_misc_passwordrepeat'].":</td><td><input type=\"password\" name=\"new_user_pwrepeat\"></td></tr>";

                echo "<tr><td>".$lang['settings_misc_group'].":</td><td valign=\"top\">";


                echo "<select name=\"new_user_group\">";

                if($user_group == "1")
                    $query = "SELECT * FROM {$prefix}_intern_groups";
                else
                    $query = "SELECT * FROM {$prefix}_intern_groups WHERE id<>'1'";


                $get_access=$mysql->query($query);
                if($mysql->numRows($get_access) != 0)
                {
                    while($out_access=$mysql->fetchObject($get_access))
                    {
                    	if($new_user_group == $out_access->id)
                    		echo "<option value=\"{$out_access->id}\" selected>{$out_access->groupname}</option>";
                    	else
                        	echo "<option value=\"{$out_access->id}\">{$out_access->groupname}</option>";
                    }
                }
                else
                    echo "<option>".$lang['settings_misc_nogroups']."</option>";

                echo "</select>";


                echo "</td></tr>";


			echo "</td></tr></table>";

		echo "</td>";
		echo "</tr>";

		echo "</table>";


	 echo "<br><br><table><tr><td><input type=\"submit\" name=\"newuser_ok\" value=\"".$lang['settings_misc_createnewuser']."\" class=\"button\"></td></tr></table>";


        ###################################################
		echo "<br><br><table>";
		###################################################


		echo "<tr>";
		echo "<td valign=\"top\" style=\"padding-left:".$eingerueckt."px;\">";

			echo "<table><tr><td>";

                echo "<tr><td><b><u>".$lang['settings_misc_editused']."</u></b></td></tr>";
                echo "<tr><td height=\"8\"></td><td></td></tr>";


                $get_users=$mysql->query("SELECT * FROM {$prefix}_intern_users");
                while($out_users=$mysql->fetchObject($get_users))
                {
                    echo "<tr><td>{$out_users->user}</td>";



                    if($out_users->id_group == "-1")
                    	echo "<td>".$lang['settings_misc_undefined']."</td>";
                    else if($out_users->id_group == "1")
                    	echo "<td>".$lang['settings_misc_admin']."</td>";
                    else
                    {
                        $get_group=$mysql->query("SELECT * FROM {$prefix}_intern_groups WHERE id='{$out_users->id_group}'");
                        $out_group=$mysql->fetchObject($get_group);

                    	echo "<td>{$out_group->groupname}</td>";
                    }


					if($out_users->id != "1" && $out_users->id!=$user_id)
					{
                    echo "
                    <td><a href=\"".$file_root."/admin.php?set=ok&s=other&edituser=".$out_users->id."\"><img src=\"".$file_root."/images/editicon_s.gif\" border=\"0\" title=\"Editieren\"></a></td><td width=\"10\" align=\"center\"></td>
        <td><a href=\"".$file_root."/admin.php?set=ok&s=other&deluser=".$out_users->id."\" onClick=\"return confirm('".$lang['setuser_sure']."')\"><img src=\"".$file_root."/images/delicon_s.gif\" border=\"0\" title=\"".$lang['setuser_delgroup']."\"></a></td>
               		";
               		}



                    echo "</tr>";
                }

        echo "</td></tr></table>";
        echo "<table><tr><td>";


                if(!empty($edituser))
                {
                    echo "<tr>";
                    echo "<td valign=\"top\" style=\"padding-left:".$eingerueckt."px;\">";

                        echo "<table><tr><td>";
                            $get_axxs_new=$mysql->query("SELECT * FROM $prefix"."_intern_users WHERE id='$edituser'");
                            $aus_axxs_new=$mysql->fetchObject($get_axxs_new);

                            echo "<table>";
                            echo "<tr><td height=\"8\"></td><td></td></tr>";
                            echo "<tr><td width=\"124\">".$lang['settings_ot_username'].":</td><td><input type=\"text\" name=\"new_user_name\" value=\"".$aus_axxs_new->user."\"></td></tr>";
                            echo "<tr><td>".$lang['settings_ot_mailaddress'].":</td><td><input type=\"text\" name=\"new_user_mail\" value=\"".$aus_axxs_new->mail."\"></td></tr>";
                            echo "<tr><td height=\"12\"></td><td></td></tr>";
                            echo "<tr><td>".$lang['settings_ot_oldpw'].":</td><td><input type=\"password\" name=\"new_user_oldpw\" value=\"$user_oldpw\"></td></tr>";
                            echo "<tr><td>".$lang['settings_ot_newpw'].":</td><td><input type=\"password\" name=\"new_user_newpw\" value=\"$user_newpw\"></td></tr>";
                            echo "<tr><td>".$lang['settings_ot_rnewpw'].":</td><td valign=\"top\"><input type=\"password\" name=\"new_user_newpwr\" value=\"$user_newpwr\"></td></tr>";

                            echo "<tr><td>".$lang['settings_misc_group'].":</td><td valign=\"top\">";


                            echo "<select name=\"id_group_new\">";

                            //if admin login, then show all groups to chose
                            if($user_group == "1")
                                $query = "SELECT * FROM {$prefix}_intern_groups";
                            else
                                $query = "SELECT * FROM {$prefix}_intern_groups WHERE id<>'1'";

                            $get_access=$mysql->query($query);
                            if($mysql->numRows($get_access) != 0)
                            {//TODO, wenn user in undefinierter gruppe das auch anzeigen

                           		if($aus_axxs_new->id_group == "-1")
                                	echo "<option value=\"{$aus_axxs_new->id_group}\" selected>(".$lang['settings_misc_undefined'].")</option>";

                                while($out_access=$mysql->fetchObject($get_access))
                                {
                                    if($out_access->id == $aus_axxs_new->id_group)
                                        echo "<option value=\"{$out_access->id}\" selected>{$out_access->groupname}</option>";
                                    else
                                        echo "<option value=\"{$out_access->id}\">{$out_access->groupname}</option>";
                                }
                            }
                            else
                                echo "<option>".$lang['settings_misc_nogroups']."</option>";

                            echo "</select>";


                            echo "</td></tr>";

                            echo "</table>";
                        echo "</td></tr></table>";

                        echo "<br><br><table><tr><td><input type=\"submit\" name=\"edituser_ok\" value=\"".$lang['settings_misc_usereditbutton']."\" class=\"button\"></td></tr></table>";

                    echo "</td>";
                    echo "</tr>";
                }



                echo "</td></tr>";


			echo "</td></tr></table>";

		echo "</td>";
		echo "</tr>";

		echo "</table>";

/***************************/
echo "</td></tr>";
echo "</table>";
/***************************/


		echo "</td><td valign=\"top\">";


/***************************/
echo "<table>";
echo "<tr><td style=\"background-color:".$tdcolor1.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/


        ###################################################
		echo "<table>";
		###################################################


		echo "<tr><td style=\"font-size:13pt;\"><b>".$lang['settings_misc_groupmanagement']."</b></td></tr>";
		echo "<tr><td style=\"height:10px;\"></td></tr>";
		echo "<tr>";
		echo "<td valign=\"top\" style=\"padding-left:".$eingerueckt."px;\">";

			echo "<table><tr><td>";

                echo "<table>";
                echo "<tr><td><b><u>".$lang['settings_misc_newgroup']."</u></b></td></tr>";
                echo "<tr><td height=\"8\"></td><td></td></tr>";

				echo "<tr><td>".$lang['settings_misc_groupname'].":</td><td><input type=\"text\" name=\"groupname\" value=\"{$groupname}\"></td></tr>";

                $get_access_name=$mysql->query("SELECT * FROM {$prefix}_intern_permission_name");
                while($out_access_name=$mysql->fetchObject($get_access_name))
                {
                    echo "<tr><td><label for=\"{$out_access_name->perm_name}\">{$out_access_name->perm_name}</label></td><td><input type=\"checkbox\" name=\"{$out_access_name->perm_name}\" value=\"1\" id=\"{$out_access_name->perm_name}\"></td></tr>";
                }

                echo "</table>";
			echo "</td></tr></table>";

		echo "</td>";
		echo "</tr>";

		echo "</table>";

	 echo "<br><br><table><tr><td><input type=\"submit\" name=\"newgroup_ok\" value=\"".$lang['settings_misc_creategroupbutton']."\" class=\"button\"></td></tr></table>";



        ###################################################
		echo "<br><br><table>";
		###################################################


		echo "<tr>";
		echo "<td valign=\"top\" style=\"padding-left:".$eingerueckt."px;\">";

			echo "<table><tr><td>";

                echo "<table>";
                echo "<tr><td><b><u>".$lang['settings_misc_groupedit']."</u></b></td></tr>";
                echo "<tr><td height=\"8\"></td><td></td></tr>";

				$editgroup = $_GET['editgroup'];


                $get_access=$mysql->query("SELECT * FROM {$prefix}_intern_groups WHERE id<>1");
                if($mysql->numRows($get_access) != 0)
                {
                    while($out_access=$mysql->fetchObject($get_access))
                    {
                        echo "<tr><td>{$out_access->groupname}</td>

                        <td><a href=\"".$file_root."/admin.php?set=ok&s=other&editgroup=".$out_access->id."\"><img src=\"".$file_root."/images/editicon_s.gif\" border=\"0\" title=\"".$lang['settings_misc_edit']."\"></a></td><td width=\"10\" align=\"center\"></td>
        <td><a href=\"".$file_root."/admin.php?set=ok&s=other&delgroup=".$out_access->id."\" onClick=\"return confirm('".$lang['setuser_sure']."')\"><img src=\"".$file_root."/images/delicon_s.gif\" border=\"0\" title=\"".$lang['setuser_delgroup']."\"></a></td>

                        </tr>";

                        if($editgroup == $out_access->id)
                        {
                        	echo "<tr><td style=\"padding-left: 20px;\"><input type=\"text\" value=\"{$out_access->groupname}\" name=\"groupname_new\"><input type=\"hidden\" value=\"{$editgroup}\" name=\"editgroup_new\"></td></tr>";

                            $get_access_name=$mysql->query("SELECT * FROM {$prefix}_intern_permission_name");
                            while($out_access_name=$mysql->fetchObject($get_access_name))
                            {
                            	$out_access_perm=$mysql->fetchObject($mysql->query("SELECT * FROM {$prefix}_intern_permission WHERE id_group='{$editgroup}' AND id_permission_name='{$out_access_name->perm_name}'"));

                            	if($out_access_perm->perm_flag == 1)
                            		$checkbox = "checked";

                                echo "<tr><td style=\"padding-left: 20px;\"><label for=\"{$out_access_name->perm_name}_new\">{$out_access_name->perm_name}</label></td><td><input type=\"checkbox\" name=\"{$out_access_name->perm_name}_new\" value=\"1\" id=\"{$out_access_name->perm_name}_new\" {$checkbox}></td></tr>";


                                unset($checkbox);
                            }
                            echo "<tr><td style=\"padding-left: 20px;\"><input type=\"submit\" name=\"groupedit_ok\" value=\"".$lang['settings_misc_edit']."\" class=\"button\"></td></tr>";
                            echo "<tr><td height=\"12\"></td><td></td></tr>";
                        }
                    }
				}
				else
					echo "<tr><td>".$lang['settings_misc_nogroupsbutadmin']."</td></tr>";

                echo "</table>";
			echo "</td></tr></table>";

		echo "</td>";
		echo "</tr>";

		echo "</table>";

	 echo "<br><br><table><tr><td><input type=\"submit\" name=\"sig_ok\" value=\"".$lang['settings_misc_deletegroup']."\" class=\"button\"></td></tr></table>";



/***************************/
echo "</td></tr>";
echo "</table>";


		echo "</td></tr></table>";



	echo "</form>";
}
else
	echo "No Access!";
?>