<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('logincheck')) die('Error!');
if(defined('enter_eximport'))
{


		$up_file1		= $_POST['up_file1'];
		$bl_text		= $_POST['bl_text'];
		$del_maillist	= $_POST['del_maillist'];
		$temp_dl1		= $_FILES['temp_dl1']['tmp_name'];
		$temp_dl1_size	= $_FILES['temp_dl1']['size'];
		$temp_groupid	= $_POST['temp_groupid'];
		$allow_double_entries = $_POST['allow_double_entries'];
		if($up_file1)
		{

			if($temp_dl1_size!="")
            {
            //..."_stacic", von php definiert
            $size_dl1_up=$temp_dl1_size;
            $size_dl1_up=round(($size_dl1_up/1024),2);

            $name_file=strtolower($_FILES['temp_dl1']['name']);			// Der Originalname
			$name_file=strtr($name_file," ","_");

                  if($size_dl1_up!=0)
                  {
					  $datum=date("Y-m-d");
					  $j=0;
                      $handle=fopen("$temp_dl1", "r");
                      while(!feof($handle))
                      {
                      	  $buffer=fgets($handle,4096);
                          if(!empty($buffer))
                          {

                          	  $buffer_temp			= explode(";",$buffer);
                          	  $buffer_temp_email	= str_replace("\r\n", "", $buffer_temp[0]);

                              $get_mailcheck		= $mysql->query("SELECT * FROM $prefix"."_entries WHERE mail='{$buffer_temp_email}'");
                              $mailcheck			= $mysql->numRows($get_mailcheck);
                              //$get_mailcheck_bl=$mysql->query("SELECT * FROM $prefix"."_blacklist WHERE mail='{$buffer_temp_email}'");
                              //TODO, nicht effizient genug
                                $blackaddress_found     = false;
                                $get_blacklist_check    = $mysql->query("SELECT mail FROM {$prefix}_blacklist");
                                if($mysql->numRows($get_blacklist_check)!=0)
                                {
                                    while($aus_blacklist_check = $mysql->fetchObject($get_blacklist_check))
                                    {
                                        if(strstr($mail, $aus_blacklist_check->mail))
                                        {
                                            $blackaddress_found = true;
                                            break;
                                        }
                                    }
                                }
                                
                                
                              if($allow_double_entries == 1)
                              	$mailcheck = 0;

                              if($mailcheck == 0 && $blackaddress_found == false)
                              {

                                  $id_unique = substr(md5(microtime()), 1, 12);

                                  $mysql->query("INSERT INTO $prefix"."_entries (id_unique,mail,title,forename,surname,regdate,regdate_t) VALUES ('$id_unique','".$buffer_temp_email."','".$buffer_temp[1]."','".$buffer_temp[2]."','".$buffer_temp[3]."','$datum','".time()."')");

                                  if($temp_groupid != 1)
                                  {
                                    $mysql->query("INSERT INTO $prefix"."_group_def (id_user,id_group) VALUES ('".mysql_insert_id()."','".$temp_groupid."')");
                                  }

                                  $j++;
                              }


                          }
                      }
                      fclose($handle);


/*
                  	### Mail Adressen der Blacklist wieder entfernen ###
                    $get_bl=$mysql->query("SELECT * FROM $prefix"."_blacklist");
                    while($aus_bl=$mysql->fetchObject($get_bl))
                    {
                        $get_id=$mysql->query("SELECT id FROM $prefix"."_entries WHERE mail='".$aus_bl->mail."'");
                        $aus_id=$mysql->fetchObject($get_id);

                        if($mysql->query("DELETE FROM $prefix"."_entries WHERE id='".$aus_id->id."'"))
                        	$j--;

                        $mysql->query("DELETE FROM $prefix"."_group_def WHERE id_user='".$aus_id->id."'");
                    }
*/

                  	echo "<table><tr><td><b>» <font style=\"color:#7BBD42;\">".$j." ".$lang['exim_addradded']."!</font></b></td></tr>";
                  }
                  else
                  {
                  	echo $lang['exim_filerror']."!";
                  }
            }
		}
		if($bl_text)
		{

			if($temp_dl1_size!="")
            {
                //..."_stacic", von php definiert
                $size=$temp_dl1_size;                           // Größe der Datei
                $size_dl1_up=$size;
                $size_dl1_up=round(($size_dl1_up/1024),2);

                $name_file=strtolower($_FILES['temp_dl1']['name']);         // Der Originalname
                $name_file=strtolower($name_file);
                $name_file=strtr($name_file," ","_");

                  if($size!=0)
                  {
					  $datum=date("Y-m-d");
					  $j="1";
                      $handle=fopen("$temp_dl1", "r");
                      while(!feof($handle))
                      {
                      	  $buffer=fgets($handle,4096);
                          if(!empty($buffer))
                          {
                              $buffer = str_replace("\r\n", "", $buffer);

                              $get_blcheck=$mysql->query("SELECT * FROM $prefix"."_blacklist WHERE mail='$buffer'");
                              if($mysql->numRows($getblcheck)==0)
                              {
                                      $mysql->query("INSERT INTO $prefix"."_blacklist (mail) VALUES ('$buffer')");
                                      $j++;
                              }
                          }
                      }
                      fclose($handle);
				  	  $j--;
                  	  echo "<table><tr><td><b>» <font style=\"color:#7BBD42;\">".$j." ".$lang['exim_up_bladded']."!</font></b></td></tr>";
                  }
                  else
                  {
                  	echo $lang['exim_filerror']."!";
                  }
            }
		}
		if($_POST['bl_manuell'])
		{
			$mail_name=$_POST['mail_name'];
			$get_mailcheck_bl=$mysql->query("SELECT * FROM $prefix"."_blacklist WHERE mail='{$mail_name}'");

			if(!empty($mail_name) && $mysql->numRows($get_mailcheck_bl)==0)
			{
				$mysql->query("INSERT INTO $prefix"."_blacklist (mail) VALUES ('".$mail_name."')");
				echo "<table><tr><td><b>» <font style=\"color:#7BBD42;\">".$lang['exim_up_bladded_single']."!</font></b></td></tr>";
			}
			else
				echo "<table><tr><td><b>» <font style=\"color:#7BBD42;\">".$lang['exim_up_bladded_single_error']."!</font></b></td></tr>";
		}
		if($del_maillist)
		{
			if($temp_dl1_size!="")
            {
                //..."_stacic", von php definiert
                $size=$temp_dl1_size;                           // Größe der Datei
                $size_dl1_up=$size;
                $size_dl1_up=round(($size_dl1_up/1024),2);

                $name_file=strtolower($_FILES['temp_dl1']['name']);         // Der Originalname
                $name_file=strtolower($name_file);
                $name_file=strtr($name_file," ","_");

                  if($size!=0)
                  {
					  $datum=date("Y-m-d");
					  $j="1";
                      $handle=fopen("$temp_dl1", "r");
                      while(!feof($handle))
                      {
                      	  $buffer=fgets($handle,4096);
                          if(!empty($buffer))
                          {
                          	$mysql->query("DELETE FROM $prefix"."_entries WHERE mail='$buffer'");
                          	$j++;
                          }
                      }
                      fclose($handle);
				  	  $j--;
                  	  echo "<table><tr><td><b>» <font style=\"color:#7BBD42;\">".$j." ".$lang['exim_up_removed']."!</font></b></td></tr>";
                  }
                  else
                  {
                  	echo $lang['exim_filerror']."!";
                  }
            }
		}

	###############################################################
    ###############################################################

    $twidth=640;
    $tdwidth=5;
    $tdcolorwidth=4;
    $tdcolor1="#FCE99A";
    $tdcolor2="#FCE99A";
    $tdcolor3="#FCE99A";
    $tdcolor4="#FCE99A";



    if($_POST['up_file_db'] || $_POST['export_start'] || $_POST['export_start_emails'])
    {
        $eximportNletterVisibility  = "visible";
        $eximportNletterDisplay     = "block";
    }
    else
    {
        $eximportNletterVisibility  = "hidden";
        $eximportNletterDisplay     = "none";
    }

    //------

    if($_POST['up_file1'] || $_POST['dl_file'])
    {
        $eximportMiscVisibility     = "visible";
        $eximportMiscDisplay        = "block";
	}
	else
	{
        $eximportMiscVisibility     = "hidden";
        $eximportMiscDisplay        = "none";
    }

    //------

    if($_POST['bl_manuell'] || $_POST['bl_text'])
    {
        $blacklistVisibility        = "visible";
        $blacklistDisplay           = "block";
	}
	else
	{
        $blacklistVisibility        = "hidden";
        $blacklistDisplay           = "none";
	}

	//------

	if($_POST['del_maillist'])
    {
        $removeVisibility           = "visible";
        $removeDisplay              = "block";
	}
	else
	{
        $removeVisibility           = "hidden";
        $removeDisplay              = "none";
    }

	echo "<form action=\"$php_self\" method=\"post\" name=\"dbexport\" enctype=\"multipart/form-data\">";

/***************************/
echo "<table>";
echo "<tr><td style=\"background-color:".$tdcolor1.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/

	echo "<table>";
	echo "<tr><td><a href=\"javascript:showPart('eximportNletter');\" class=\"eximp\">".$lang['exim_headline']."</a></td></tr>";
	echo "</table>";



	echo "<div id=\"item_eximportNletter\" style=\"visibility:".$eximportNletterVisibility."; display:".$eximportNletterDisplay.";\">";

	echo "<form action=\"$php_self\" method=\"post\" enctype=\"multipart/form-data\">";
	echo "<br><table>";
    echo "<tr><td><u>".$lang['exim_addsqlemails'].":</u></td></tr>";
    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td><input size=\"25\" type=\"file\" name=\"temp_dl1\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"up_file_db\" value=\"&nbsp;".$lang['exim_add']."&nbsp;\" class=\"button\"></td></tr>";
    if(!empty($import_msg))echo "<tr><td>".$import_msg."</td></tr>";

    echo "</table>";

	echo "<br><br>";

    echo "<table>";
   		echo "<tr><td valign=\"top\" class=\"head_yellow\"><u>".$lang['exim_export_allemails'].":</u></td></tr>";
   		echo "<tr><td height=\"8\"></td></tr>";


   		echo "<tr><td><input type=\"checkbox\" id=\"emptytable\" name=\"export_setting_emptytable\" value=\"1\" checked><label for=\"emptytable\">".$lang['exim_exportsqlemails_truncate']."</label></td></tr>";
   		echo "<tr><td height=\"10\"></td></tr>";
   		 echo "<tr><td class=\"bg_yellow\"><input type=\"submit\" name=\"export_start\" value=\"".$lang['exim_startexport']."\" class=\"button\"></td></tr>";

   		echo "<tr><td height=\"24\"></td></tr>";
   		echo "<tr><td valign=\"top\" class=\"head_yellow\"><u>".$lang['exim_export_agroup'].":</u></td></tr>";
   		echo "<tr><td height=\"8\"></td></tr>";

		$i=0;
        $get_groups=$mysql->query("SELECT id, groupname, default_group FROM $prefix"."_groups WHERE groupname<>'Standard' ORDER BY id, groupname");
        if($mysql->numRows($get_groups)!=0)
        {
            while($aus_groups=$mysql->fetchObject($get_groups))
            {
                if($i==0)
                    echo "<tr><td><input type=\"radio\" id=\"{$i}\" name=\"id_group\" value=\"{$aus_groups->id}\" checked><label for=\"{$i}\"> {$aus_groups->groupname}</label></td></tr>";
                else
                    echo "<tr><td><input type=\"radio\" id=\"{$i}\" name=\"id_group\" value=\"{$aus_groups->id}\"><label for=\"{$i}\"> {$aus_groups->groupname}</label></td></tr>";

            $i++;
            }

            echo "<tr><td height=\"10\"></td></tr>";
            echo "<tr><td class=\"bg_yellow\"><input type=\"submit\" name=\"export_start_emails\" value=\"".$lang['exim_startexport_emails']."\" class=\"button\"></td></tr>";
   		}
   		else
   			echo "<tr><td>".$lang['exim_nogroups']."</td></tr>";

    echo "</table>";
    echo "</form>";
	echo "</div>";

/***************************/
echo "</td></tr>";
echo "<tr><td></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/

	###################################################

    echo "<br><br>";
	echo "<table>";
	echo "<tr><td><div style=\"background-image:url(images/menu_line.gif); width:".$twidth."px; height:1px;\"></div></td></tr>";
	echo "</table><br><br>";

	###################################################


/***************************/
echo "</td></tr>";
echo "<tr><td style=\"background-color:".$tdcolor2.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/

	echo "<table>";
	echo "<tr><td><a href=\"javascript:showPart('eximportMisc');\" class=\"eximp\">".$lang['exim_eximforeign']."</a></td></tr>";
	echo "</table>";


	###################################################


	echo "<div id=\"item_eximportMisc\" style=\"visibility:".$eximportMiscVisibility."; display:".$eximportMiscDisplay.";\">";

	echo "<br>";
	echo "<form action=\"$php_self\" method=\"post\" enctype=\"multipart/form-data\">";
	echo "<table>";
    echo "<tr><td><u>".$lang['exim_addemailsfromtext'].":</u></td></tr>";
    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td><input size=\"25\" type=\"file\" name=\"temp_dl1\">&nbsp;&nbsp;";

    echo $lang['exim_group'].": <select name=\"temp_groupid\" style=\"font-size: 8pt;\">";
    $get_group=$mysql->query("SELECT * FROM $prefix"."_groups ORDER BY id");
    while($aus_group=$mysql->fetchObject($get_group))
    {
    	echo "<option value=\"".$aus_group->id."\">".$aus_group->groupname."</option>";
    }
    echo "</select>";

    echo "&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"up_file1\" value=\"&nbsp;".$lang['exim_add']."&nbsp;\" class=\"button\"></td></tr>";
    echo "<tr><td><input type=\"checkbox\" id=\"allow_double_entries\" name=\"allow_double_entries\" value=\"1\"> <label for=\"allow_double_entries\">".$lang['exim_allowdouble']."</label></td></tr>";
    echo "</table>";
    echo "</form>";

	###################################################

	echo "<br><br>";

	echo "<form action=\"$php_self\" method=\"post\" enctype=\"multipart/form-data\">";
	echo "<table>";
    echo "<tr><td><u>".$lang['exim_exportmailsintext'].":</u> (".$lang['exim_attention'].")</td></tr>";
    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td><input type=\"submit\" name=\"dl_file\" value=\"&nbsp;".$lang['exim_startexport']."&nbsp;\" class=\"button\"></td></tr>";
    echo "</table>";
    echo "</form>";

    echo "</div>";

/***************************/
echo "</td></tr>";
echo "<tr><td></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/


    echo "<br><br>";
	echo "<table>";
	echo "<tr><td><div style=\"background-image:url(images/menu_line.gif); width:".$twidth."px; height:1px;\"></div></td></tr>";
	echo "</table><br><br>";

	###################################################

/***************************/
echo "</td></tr>";
echo "<tr><td style=\"background-color:".$tdcolor3.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/

	echo "<table>";
	echo "<tr><td><a href=\"javascript:showPart('blacklist');\" class=\"eximp\">".$lang['exim_blacklist']."</a> (<a href=# onclick=\"blacklist('".$file_root."/admin.php?blacklist=ok');\">".$lang['exim_showlist']."</a>)</td></tr>";
	echo "</table>";


	###################################################

	echo "<div id=\"item_blacklist\" style=\"visibility:".$blacklistVisibility."; display:".$blacklistDisplay.";\">";

	echo "<br>";

	echo "<table>";
	echo "<form action=\"$php_self\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<tr><td><u>".$lang['exim_addtobl'].":</u></td></tr>";
    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td><input size=\"25\" type=\"file\" name=\"temp_dl1\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"bl_text\" value=\"&nbsp;".$lang['exim_add']."&nbsp;\" class=\"button\"></td></tr>";
    echo "</form>";
    echo "</table>";

    echo "<br><br>";


	echo "<table>";
	echo "<form action=\"$php_self\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<tr><td><u>".$lang['exim_addsinglemailtobl'].":</u></td></tr>";
    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td><input size=\"25\" type=\"text\" name=\"mail_name\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"bl_manuell\" value=\"&nbsp;".$lang['exim_add']."&nbsp;\" class=\"button\"></td></tr>";
    echo "</form>";
    echo "</table>";

    echo "</div>";

/***************************/
echo "</td></tr>";
echo "<tr><td></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/


    echo "<br><br>";
	echo "<table>";
	echo "<tr><td><div style=\"background-image:url(images/menu_line.gif); width:".$twidth."px; height:1px;\"></div></td></tr>";
	echo "</table><br><br>";

/***************************/
echo "</td></tr>";
echo "<tr><td style=\"background-color:".$tdcolor4.";width:".$tdcolorwidth."px;\"></td><td width=\"".$tdwidth."\"></td><td>";
/***************************/

	###################################################

	echo "<table>";
	echo "<tr><td><a href=\"javascript:showPart('remove');\" class=\"eximp\">".$lang['exim_removeadress']."</a></td></tr>";
	echo "</table>";


	###################################################

	echo "<div id=\"item_remove\" style=\"visibility:".$removeVisibility."; display:".$removeDisplay.";\">";

	echo "<br>";

	echo "<table>";
	echo "<form action=\"$php_self\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<tr><td><u>".$lang['exim_adressesfromtext'].":</u></td></tr>";
    echo "<tr><td height=\"10\"></td></tr>";
    echo "<tr><td><input size=\"25\" type=\"file\" name=\"temp_dl1\">&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"del_maillist\" value=\"&nbsp;".$lang['exim_delete']."&nbsp;\" class=\"button\"></td></tr>";
    echo "</form>";
    echo "</table>";

    echo "</div>";

/***************************/
echo "</td></tr>";
echo "</table>";

}
else
	echo "No Access!";
?>