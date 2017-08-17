<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('logincheck')) die('Error!');
if(defined('enter_usersettings'))
{


		if($_POST['add_group_ok'])
		{
            $groupname=$_POST['groupname'];
            $hidden=$_POST['hidden'];

            if(!empty($groupname))
            	$mysql->query("INSERT INTO $prefix"."_groups (groupname,hidden) VALUES ('$groupname','$hidden')");
            unset($groupname);
		}

		if($_POST['edit_default_entry_group'])
		{
			$default_entry_group = $_POST['default_entry_group'];
			if($default_entry_group != 0)
			{
				$mysql->query("UPDATE {$prefix}_settings SET default_entry_group='{$default_entry_group}'");
				//erneut settings auslesen, damit direkt ergebnis sichtbar wird...
				$get_settings = $mysql->query("SELECT * FROM {$prefix}_settings");
    			$aus_settings = $mysql->fetchObject($get_settings);
			}
		}

		if($delgroup=$_GET['delgroup'])
		{
            $mysql->query("DELETE FROM {$prefix}_groups WHERE id='$delgroup'");
            $mysql->query("DELETE FROM {$prefix}_group_def WHERE id_group='$delgroup'");
		}

		if($_POST['edit_group_ok'])
		{
            $groupname_new=$_POST['groupname_new'];
            $hidden_new=$_POST['hidden_new'];
            $groupname_id=$_POST['groupname_id'];
            $default_group=$_POST['default_group'];

			if($default_group==1)
				 $mysql->query("UPDATE {$prefix}_groups SET default_group='0'");

            $mysql->query("UPDATE {$prefix}_groups SET groupname='$groupname_new',hidden='$hidden_new',default_group='$default_group' WHERE id='$groupname_id'");
		}

		if($_POST['newsletter_ok'])
		{
			$title		= $_POST['title'];
			$forename	= htmlentities($_POST['forename']);
			$surname	= htmlentities($_POST['surname']);
			$mail		= $_POST['mail'];
			$datum		= date("Y-m-d");
            $id_unique	= substr(md5(microtime()), 1, 12);

			if(!empty($mail) && $mail!=$lang['onl_formemail'])
			{
				if($lang['onl_form_forename'] == $forename)	$forename	= "";
				if($lang['onl_form_surname'] == $surname)	$surname	= "";
				
				$get_email_check = $mysql->query("SELECT mail FROM {$prefix}_entries WHERE mail='$mail'");
				if($mysql->numRows($get_email_check) > 0)
					$notice_new_user = $lang['notice_new_user'];

                $mysql->query("INSERT INTO $prefix"."_entries (id_unique,mail,title,forename,surname,regdate,regdate_t) VALUES ('$id_unique','$mail','$title','$forename','$surname','$datum','".time()."')");

                if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 0)
                {
                    $id_user	= mysql_insert_id();
                    $group_id	= $_POST['group_id'];

                    $i=1;
                    $get_groups=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' ORDER BY groupname");
                    while($aus_groups=$mysql->fetchObject($get_groups))
                    {
                        $id_group	= $group_id[$i];
                        if(!empty($id_group))
                        $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$id_group."')");

                        $i++;
                    }
                }
                else if($aus_settings->group_choice == 1 && $aus_settings->group_choice_radio == 1)
                {
                    $id_user    = mysql_insert_id();
                    $group_id   = $_POST['group_id'];

                    $mysql->query("INSERT INTO {$prefix}_group_def (id_user,id_group) VALUES ('".$id_user."','".$group_id."')");

                }


                $success_new_user = $lang['success_new_user'];
            }
		}


		## 3.4 ##########################################################
		//----------------- Löschen eines Empfängers -------------------



		if($_POST['del_selected'])
		{
			$delarray=$_POST['delarray'];
			foreach($delarray as $key=>$value)
			{
			$mysql->query("DELETE FROM $prefix"."_entries WHERE id='$value'");
			$mysql->query("DELETE FROM $prefix"."_group_def WHERE id_user='$value'");
			}
		}

		if($_POST['delete_all'])
		{
			$mysql->query("DELETE FROM $prefix"."_entries");
			$mysql->query("DELETE FROM $prefix"."_group_def");
		}



		#################################################################


	$get_countmail=$mysql->query("SELECT count(mail) AS cmail FROM $prefix"."_entries WHERE flag<>'1'");
	$aus_countmail=$mysql->fetchObject($get_countmail);

	$w		= $_GET['w'];
	$order	= $_GET['order'];
	$locked	= $_GET['locked'];
	$desc	= $_GET['desc'];
	$reverse = $_GET['reverse'];

    if($w=="" && $reverse==0){$w="ok";unset($desc);$reverse=0;}
    else{$desc="DESC";unset($w);$reverse=1;}


	echo "<b>".$lang['setuser_headline'].":</b> (<i>".$aus_countmail->cmail."</i>)<br>";

	if($aus_settings->activation == 1)
	{
		$get_countmail=$mysql->query("SELECT count(mail) AS cmail FROM $prefix"."_entries WHERE flag='1'");
		$aus_countmail=$mysql->fetchObject($get_countmail);
		echo "<a href=\"".$file_root."/admin.php?s=$s&locked=true\">&raquo; <i>".$lang['setuser_lockeduser'].": (".$aus_countmail->cmail."</i>)</a><br>";
	}

	echo "<br>";

	## 3.1 ####################################+######
	//---------------- Filter Option ----------------


	echo "<table cellpadding=\"0\" cellspacing=\"0\"><tr>";

	echo "<td width=\"140\">";
	echo "<form action=\"$php_self\" method=\"post\">";
	echo $lang['setuser_firstletter'].":<br>
	<select name=\"alphabet\" style=\"font-family: arial; font-size: 10.5;\">
	<option value=\"all\">".$lang['setuser_all']."</option><option value=\"#\">#</option>";

	$letter_start="a";
	for($k=1;$k<=26;$k++)
	{
        if($_POST['alphabet']==$letter_start)
        	echo "<option value=\"".$letter_start."\" selected>".strtoupper($letter_start)."</option>";
        else
        	echo "<option value=\"".$letter_start."\">".strtoupper($letter_start)."</option>";

	$letter_start++;
	}
	echo "</select>&nbsp;";
	echo "<input type=\"submit\" name=\"filter_ok\" value=\"&nbsp;".$lang['setuser_filter']."&nbsp;\" class=\"button\">";
	echo "</form>";
	echo "</td>";

	//--------------------------

	if($_POST['limit_ok'])
	{
        $limit=$_POST['limit'];
        $mysql->query("UPDATE $prefix"."_settings SET showlimit='$limit'");
	}

    $get_limit=$mysql->query("SELECT * FROM $prefix"."_settings");
    $aus_limit=$mysql->fetchObject($get_limit);

	echo "<td width=\"110\">";
	echo "<form action=\"$php_self\" method='post'>";
	echo $lang['setuser_number'].":<br>";
	echo "<input type=\"text\" name=\"limit\" value=\"$aus_limit->showlimit\" size=\"5\" maxlength=\"10\">&nbsp;";
	echo "<input type=\"submit\" name=\"limit_ok\" value=\"".$lang['setuser_ok']."\" class=\"button\">";
	echo "</form>";
	echo "</td>";

	//--------------------------

	echo "<td width=\"198\">";
	echo "<form action=\"$php_self\" method='post'>";
	echo $lang['setuser_searchemail'].":<br>";
	echo "<input type=\"text\" name=\"s_mail\" value=\"".$_POST['s_mail']."\" size=\"15\">&nbsp;";
	echo "<input type=\"submit\" name=\"search_mail\" value=\"".$lang['setuser_searchemailok']."\" class=\"button\">";
	echo "</form>";
	echo "</td>";

	//--------------------------

	echo "<td width=\"269\">";
	echo "<form action=\"$php_self\" method=\"post\">";
	echo $lang['setuser_searchdate'].":<br>";

    $ya=date("Y");
    $ya++;
	$ta="0";
    echo "<select name=\"s_date_day\" style=\"font-family: arial; font-size: 10.5;\">";
    while($ta<32)
    {
     if($ta=="0"){ echo "<option value=\"-\">-</option>";}
     if($ta<10)
     {
     $ta="0"."$ta";
     }
     if($ta!="0")
     {
         if($_POST['s_date_day']==$ta)
         echo "<option value=\"$ta\" selected>$ta</option>";
         else
         echo "<option value=\"$ta\">$ta</option>";
     }
    $ta++;
    }
    echo "</select>&nbsp;";
    $ma="0";
    echo "<select name=\"s_date_month\" style=\"font-family: arial; font-size: 10.5;\">";
    while($ma<13)
    {
     if($ma=="0"){ echo "<option value=\"-\">-</option>";}
     if($ma<10)
     {
     $ma="0"."$ma";
     }
     if($ma!="0")
     {
         if($_POST['s_date_month']==$ma)
         echo "<option value=\"$ma\" selected>$ma</option>";
         else
         echo "<option value=\"$ma\">$ma</option>";
     }
    $ma++;
    }
    echo "</select>&nbsp;";
    $y="0";
    $get_check=$mysql->query("SELECT id FROM $prefix"."_entries");
	if($mysql->numRows($get_check)!=0)
	{
        $get_minyear=$mysql->query("SELECT min(regdate) AS minyear FROM $prefix"."_entries");
        $aus_minyear=$mysql->fetchObject($get_minyear);
        $n=substr($aus_minyear->minyear,0,4);
        $n--;
        echo "<select name=\"s_date_year\" style=\"font-family: arial; font-size: 10.5;\">";
            while($n<$ya)
            {
             if($y=="0")
             {echo"<option value=\"-\">-</option>";}
             else
             {
                 if($_POST['s_date_year']==$n)
                 echo"<option value=\"$n\" selected>$n</option>";
                 else
                 echo"<option value=\"$n\">$n</option>";
             }
            $n++;
            $y++;
            }
        echo "</select>&nbsp;";
	}
	else
	{
        echo "<select name=\"s_date_year\" style=\"font-family: arial; font-size: 10.5;\">";
        echo"<option value=\"-\">-</option>";
        echo"<option value=\"".date("Y")."\">".date("Y")."</option>";
        echo "</select>&nbsp;";
	}


	echo "<input type=\"submit\" name=\"search_date\" value=\"".$lang['setuser_searchdateok']."\" class=\"button\">";

	echo "</td><td><input type=\"submit\" name=\"delete_all\" value=\"".$lang['setuser_empty']."\" class=\"delbutton\" onClick=\"return confirm('".$lang['setuser_suretodelemails']."')\">";

	echo "</form>";
	echo "</td>";

	echo "</tr></table>";

	$twidth=770;


	echo "<table>";
	echo "<tr><td style=\"height:0px;\"></td></tr>";
	echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"".$twidth."\" height=\"1\"></td></tr>";
	echo "<tr><td style=\"height:20px;\"></td></tr>";
	echo "</table>";


	## 3.2 #########################################################
	//----------------- Anzeige der Empfänger ---------------------

	if($aus_limit->form_forename == 1)
	{
        $m1_width=230;$g1_width=176;$r1_width=170;
        $m2_width=230;$g2_width=176;$r2_width=170;
	}
	else
	{
        $m1_width=270;$g1_width=210;$r1_width=210;
        $m2_width=270;$g2_width=210;$r2_width=210;
	}

    ?>
    <script language="JavaScript">
    <!--
		function checkall(form)
		{
			for (var i = 0; i< form.elements.length; i++) {
				var k = form.elements[i];
				if (k.name != 'all') {
					k.checked = form.all.checked;
				}
			}
		}
    -->
    </script>
    <?php

	echo "<div id=\"useroutput\">";
	echo "<form action=\"$php_self\" method=\"post\">";
    echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\" bgcolor=\"#000000\" width=\"776\">";
    echo "<tr><td>";
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\" width=\"100%\">";
    echo "<tr><td>";
	echo "<table width=\"100%\" bgcolor=\"#F1F1F1\">";

	echo "<tr bgcolor=\"#F1F1F1\">
	<td style=\"width:".$m1_width."px;\"><a href=\"".$file_root."/admin.php?s=setuser&order=mail&w=$w&locked=$locked\" class=\"r\">".$lang['setuser_hemailadress'].":</a></td>";
	if($aus_limit->form_forename==1 || $aus_limit->form_surname==1)
	{
		if($aus_limit->form_forename==1) $order_type = "forename";
		else  $order_type = "surname";

		echo "<td style=\"width:110px;\"><a href=\"".$file_root."/admin.php?s=setuser&order=".$order_type."&w=".$w."&locked=".$locked."\" class=\"r\">".$lang['setuser_hname'].":</a></td>";

	}
	echo "<td style=\"width:".$g1_width."px;\">".$lang['setuser_hgroup'].":</td>
	<td style=\"width:".$r1_width."px;\"><a href=\"".$file_root."/admin.php?s=setuser&order=regdate_t&w=$w&locked=$locked\" class=\"r\">".$lang['setuser_hregdate'].":</a></td>
	<td>".$lang['setuser_hdelete'].":</td>
	</tr>";

    echo "</table>";
    echo "</td></tr></table>";
    echo "</td></tr></table>";

	echo "<br>";

    echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\" bgcolor=\"#000000\" width=\"776\">";
    echo "<tr><td>";
    echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\" width=\"100%\">";
    echo "<tr><td>";
	echo "<table width=\"100%\" bgcolor=\"#F9F9F9\">";


	## 3.3 #########################################################
	//-------- Je nach Auswahl unterschiedliche DB Auslese --------

    //---- Script für Seitenzahlen -----

    $page=$_GET['page'];
    if(!$page)
    {
    	$page="1";
    }
    $page--;
    $limit = $aus_limit->showlimit * $page;

	// LIMIT $limit, $aus_limit->showlimit

    //----------------------------------


	$filter_ok=$_POST['filter_ok'];
    if($filter_ok)
    {
        $alphabet=$_POST['alphabet'];
        if($order=="")$order="mail";

    	if($alphabet=="all")
    	{
    		$get_newsletter=$mysql->query("SELECT id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries WHERE flag<>'1' ORDER BY $order $desc");
    	}
    	else if($alphabet=="#")
    	{
        	$get_newsletter=$mysql->query("SELECT id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries WHERE flag<>'1' AND mail LIKE '0%' OR mail LIKE '1%' OR mail LIKE '2%' OR mail LIKE '3%' OR mail LIKE '4%' OR mail LIKE '5%' OR mail LIKE '6%' OR mail LIKE '7%' OR mail LIKE '8%' OR mail LIKE '9%' ORDER BY $order $desc");
    	}
    	else
    	{
        	$get_newsletter=$mysql->query("SELECT id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries WHERE flag<>'1' AND mail LIKE '$alphabet%' ORDER BY $order $desc");
        }

        $showpages = false;
    }
    else if($_POST['search_mail'])
    {
        $s_mail=$_POST['s_mail'];

        $get_newsletter=$mysql->query("SELECT id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries WHERE flag<>'1' AND mail LIKE '%$s_mail%'");

        $showpages = false;
    }
    else if($_POST['search_date'])
    {
        $s_date_year=$_POST['s_date_year'];
        $s_date_month=$_POST['s_date_month'];
        $s_date_day=$_POST['s_date_day'];

        $date_new=$s_date_year."-".$s_date_month."-".$s_date_day;
        $get_newsletter=$mysql->query("SELECT id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries WHERE flag<>'1' AND regdate='$date_new'");

        $showpages = false;
    }
    else if($_GET['show'])
    {
        $show=$_GET['show'];

        $get_newsletter=$mysql->query("SELECT entries.id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries AS entries, $prefix"."_group_def AS groups WHERE entries.flag<>'1' AND entries.id=groups.id_user AND groups.id_group='$show'");

        $showpages = false;
    }
	else
	{
		//Standard output

        if($limit=="") $limit = 0;
        if($order=="") $order="mail";

        if($locked != "true")
        {
        	$get_newsletter=$mysql->query("SELECT id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries WHERE flag<>'1' ORDER BY $order $desc LIMIT $limit, $aus_limit->showlimit");

			$showpages = true;
        }
        else
        {
        	$get_newsletter=$mysql->query("SELECT id,mail,forename,surname,regdate_t,date_format(regdate, '%d.%m.%Y') AS regdate FROM $prefix"."_entries WHERE flag='1' ORDER BY mail");

        	$showpages = false;

        }


	}

		if($mysql->numRows($get_newsletter)==0)
		{
        	echo "<tr bgcolor=\"#F9F9F9\"><td width=60%>".$lang['setuser_noresults']."</td><td width=\"30%\"></td><td width=\"10%\"></td></tr>";
		}
		else
		{
			$z=0;
            while($aus_newsletter=$mysql->fetchObject($get_newsletter))
            {
                echo "<tr bgcolor=\"#F9F9F9\" onmouseover=\"javascript:this.bgColor='#F5F5F5';\" onmouseout=\"javascript:this.bgColor='#F9F9F9';status='';return true;\">

                <td style=\"width:".$m2_width."px;\" valign=\"top\"><a href=# onclick=\"groupedit('".$file_root."/admin.php?groupedit_id=$aus_newsletter->id');\">".$aus_newsletter->mail."</a></td>";


				if($aus_limit->form_forename==1 || $aus_limit->form_surname==1)
					 echo "<td style=\"width:110px;\" valign=\"top\">";

                if($aus_limit->form_forename==1)	echo $aus_newsletter->forename." ";
                if($aus_limit->form_surname==1)		echo $aus_newsletter->surname;

            	if($aus_limit->form_forename==1 || $aus_limit->form_surname==1)
					 echo "</td>";


                echo "<td style=\"width:".$g2_width."px;\" valign=\"top\">";


                $get_groupname=$mysql->query("SELECT * FROM $prefix"."_groups groups, $prefix"."_group_def def WHERE def.id_group=groups.id AND def.id_user='".$aus_newsletter->id."' AND groupname<>'Standard'");
                if($mysql->numRows($get_groupname)==0)
                {
                    $groupname_show="Standard";
                    echo $groupname_show;
                }
                else
                {
                    while($aus_groupname=$mysql->fetchObject($get_groupname))
                    {

                    $groupname_show=$aus_groupname->groupname;
                    echo $groupname_show." ";

                    }
                }

                echo "</td>
                <td style=\"width:".$r2_width."px;\" valign=\"top\">".$aus_newsletter->regdate."</td>";

                echo "<td valign=\"top\"><input type=\"checkbox\" name=\"delarray[$z]\" value=\"".$aus_newsletter->id."\"></td>";

                echo "</tr>";
                $z++;
            }

        }

    echo "</table>";


    echo "</td></tr></table>";
    echo "</td></tr></table>";

    echo "<table width=\"776\" cellpadding=\"0\" cellspacing=\"0\">";
    echo "<tr><td height=\"4\"></td></tr>";
    echo "<tr><td align=\"right\" width=\"706\">
    <input type=\"submit\" name=\"del_selected\" value=\"".$lang['setuser_delete']."\" onClick=\"return confirm('".$lang['setuser_suredelselemail']."')\" class=\"button\">
    </td><td align=\"left\">
    <input type=\"checkbox\" id=\"all\" name=\"all\" onClick=\"checkall(this.form);\"> <label for=\"all\">".$lang['setuser_all']."</label>";
    echo "</td></tr>";
    echo "</table>";


    if($showpages == true)
    {
    echo "<table>";


            #########################################################
            ################ Seitenzahlen anzeigen ##################


			$linkvar = "s=$s&order=$order&reverse=$reverse&locked=$locked";


            echo "<tr><td height=\"12\"></td></tr>";
            echo "<tr><td><table>";

            echo "<tr><td><b>[</b> ";

                $get_countid=$mysql->query("SELECT count(id) AS countid FROM {$prefix}_entries WHERE flag<>'1'");
                $aus_countid=$mysql->fetchObject($get_countid);
				
				if($aus_limit->showlimit == 0) //division by zero check
					$showlimit = 1;
				else
					$showlimit = $aus_limit->showlimit;
					
                $while_limit=$aus_countid->countid / $showlimit;
                $while_limit=ceil($while_limit);

                if($page=="0")
                {
                	$snr=$page+1;
                }
                else if($page!="0")
                {
                	$snr=$page;

                    if($page>1)
                    {
                        $snr_b=$page-1;
                        echo "<b><a href=\"".$inclusion_path."{$linkvar}&page=$snr_b\">$font_a"."«"."$font_b</a></b> ";
                    }
                }
                else
                {
                    $snr=$page+2;
                    echo "<b><a href=\"".$inclusion_path."{$linkvar}&page=$snr_n\">$font_a"."«"."$font_b</a></b>";
                }

                while($snr<=$while_limit)
                {

                        if($snr!=$while_limit)
                        {
                            $snr_c=$snr-1;
                            if($snr_c==$page)
                            	echo "<a href=\"".$inclusion_path."{$linkvar}&page=$snr\">$font_a"."<u>$snr</u>"."$font_b</a> . ";
                            else
                            	echo "<a href=\"".$inclusion_path."{$linkvar}&page=$snr\">$font_a"."$snr"."$font_b</a> . ";
                        }
                        else if($snr==$while_limit)
                        {
                            $snr_c=$snr-1;
                            if($snr_c==$page)
                            	echo "<a href=\"".$inclusion_path."{$linkvar}&page=$snr\">$font_a"."<u>$snr</u>"."$font_b</a>";
                            else
                            	echo "<a href=\"".$inclusion_path."{$linkvar}&page=$snr\">$font_a"."$snr"."$font_b</a>";
                        }

                        $if_limit=$page+4;
                        if($snr>=$if_limit)
                        {
                        $snr_n=$snr+1;

                            $c1=$while_limit-3;
                            $c2=$page+1;
                            if($c1!=$c2)
                            {
                            	echo " <b><a href=\"".$inclusion_path."{$linkvar}&page=$snr_n\">$font_a"."»"."$font_b</a></b>";
                            }


                        break;
                        }

                $snr++;
                }

            echo " <b>]</b>"."$font_b</td></tr>";


            echo "</table></td></tr>";

            #########################################################
            #########################################################


    echo "</table>";
    }


	echo "</form>";
	echo "</div>";

	echo "<form action=\"$php_self\" method=\"post\">";

	###################################################

	$twidth=770;

    echo "<br><br>";
	echo "<table>";
	echo "<tr><td><div style=\"background-image:url(images/menu_line.gif); width: ".$twidth."px; height: 1px;\"></div></td></tr>";
	echo "</table>";


	###################################################
	# Group management

	echo "<br><br><table cellpadding=\"0\" cellspacing=\"0\"><tr>";
	echo "<td valign=\"top\">";

	echo "<table cellpadding=\"0\" cellspacing=\"1\">";
	echo "<tr><td><b>".$lang['setuser_groupmanage'].":</b></td></tr>";
	echo "<tr><td height=\"4\"></td></tr>";
	echo "<tr><td><input type=\"text\" name=\"groupname\" value=\"$groupname\" style=\"width:128px;\"></td><td width=\"90\"><input type=\"checkbox\" id=\"addhidden\" name=\"hidden\" value=\"1\"><label for=\"addhidden\"> ".$lang['setuser_hidden']."</label></td><td><input type=\"submit\" name=\"add_group_ok\" value=\"".$lang['setuser_add']."\" class=\"button\"></td></tr>";
	echo "</table>";



	echo "<br><table cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td style=\"width:132px; height: 4px;\"></td></tr>";
	$get_groupname=$mysql->query("SELECT * FROM $prefix"."_groups WHERE groupname<>'Standard' ORDER BY groupname");
    while($aus_groupname=$mysql->fetchObject($get_groupname))
    {

		//$get_groupcount=$mysql->query("SELECT count(*) AS groupuser FROM $prefix"."_group_def WHERE id_group='{$aus_groupname->id}'");


		$get_groupcount=$mysql->query("SELECT count(*) AS groupuser FROM {$prefix}_group_def g, {$prefix}_entries e WHERE id_group='{$aus_groupname->id}' AND g.id_user=e.id AND e.flag='0'");
    	$aus_groupcount=$mysql->fetchObject($get_groupcount);

    	if($aus_groupname->hidden==1)$cssclass="class=\"grey\"";

        echo "<tr>";

        if($_GET['editgroup']==$aus_groupname->id || $_GET['show']==$aus_groupname->id)
        	echo "<td style=\"width:132px;\"><a href=\"".$file_root."/admin.php?s=setuser&show=".$aus_groupname->id."\" ".$cssclass."><b>".$aus_groupname->groupname."</b></a> (".$aus_groupcount->groupuser.")</td>";
        else
        	echo "<td style=\"width:132px;\"><a href=\"".$file_root."/admin.php?s=setuser&show=".$aus_groupname->id."\" ".$cssclass.">".$aus_groupname->groupname."</a> (".$aus_groupcount->groupuser.")</td>";

        echo "<td><a href=\"".$file_root."/admin.php?s=setuser&editgroup=".$aus_groupname->id."\"><img src=\"".$file_root."/images/editicon_s.gif\" border=\"0\" title=\"Editieren\"></a></td><td width=\"10\" align=\"center\"></td>
        <td><a href=\"".$file_root."/admin.php?s=setuser&delgroup=".$aus_groupname->id."\" onClick=\"return confirm('".$lang['setuser_sure']."')\"><img src=\"".$file_root."/images/delicon_s.gif\" border=\"0\" title=\"".$lang['setuser_delgroup']."\"></a></td>
        </tr>";
        echo "<tr><td height=\"2\"></td></tr>";

        unset($cssclass);
    }
	echo "</table>";

    if($_GET['editgroup'] && !$_POST['edit_group_ok'])
    {
        $editgroup=$_GET['editgroup'];

        $get_groupname_n=$mysql->query("SELECT * FROM $prefix"."_groups WHERE id='$editgroup'");
        $aus_groupname_n=$mysql->fetchObject($get_groupname_n);

        if($aus_groupname_n->hidden==1)
			$checked="checked";
		if($aus_groupname_n->default_group==1)
			$checked_default="checked";

        echo "<br><table cellpadding=\"0\" cellspacing=\"0\">";
        echo "<tr>
        <td><input type=\"text\" name=\"groupname_new\" value=\"".$aus_groupname_n->groupname."\" style=\"width:128px;\"></td>
        <td width=\"90\"><input type=\"checkbox\" id=\"edithidden\" name=\"hidden_new\" value=\"1\" $checked><label for=\"edithidden\"> ".$lang['setuser_hidden']."</label></td>
        <td width=\"90\"><input type=\"checkbox\" id=\"editdefault\" name=\"default_group\" value=\"1\" $checked_default><label for=\"editdefault\"> ".$lang['setuser_default']."</label></td>
        <td><input type=\"hidden\" name=\"groupname_id\" value=\"".$aus_groupname_n->id."\">&nbsp;<input type=\"submit\" name=\"edit_group_ok\" value=\"".$lang['setuser_editgroup']."\" class=\"button\"></td>
        </tr>";
        echo "</table>";
    }

	echo "
	<br><br>
	<table cellpadding=\"0\" cellspacing=\"0\">
	<tr><td>".$lang['setuser_default_entry_group'].":</td></tr>
	<tr><td height=\"4\"></td></tr>
	</table>

	<table cellpadding=\"0\" cellspacing=\"0\">
	<tr><td width=\"170\"><select name=\"default_entry_group\" style=\"width: 150px;\">
	";
	$get_groupname_default=$mysql->query("SELECT * FROM $prefix"."_groups ORDER BY groupname");
    while($aus_groupname_default=$mysql->fetchObject($get_groupname_default))
    {
		if($aus_settings->default_entry_group == $aus_groupname_default->id)
			echo "<option value=\"{$aus_groupname_default->id}\" selected>{$aus_groupname_default->groupname}</option>";
		else
			echo "<option value=\"{$aus_groupname_default->id}\">{$aus_groupname_default->groupname}</option>";
	}

	echo "
	</select>
	</td>
		<td><input type=\"submit\" name=\"edit_default_entry_group\" value=\"".$lang['onl_ok']."\" class=\"button\"></td>
	</tr>
	</table>

	</td>";

	echo "<td width=\"50\"></td><td width=\"2\" background=\"".$file_root."/images/menu_line2.gif\"></td><td width=\"80\"></td>";
	echo "<td valign=\"top\">";


	###################################################
	# User management

	echo "<table cellpadding=\"0\" cellspacing=\"1\">";
	echo "<tr><td style=\"padding-left:4px;\"><b>".$lang['setuser_userheadline'].":</b></td></tr>";
	echo "<tr><td height=\"4\"></td></tr>";
	echo "</table>";


	echo "<table cellpadding=\"0\" cellspacing=\"1\">";

	$mail=$lang['onl_formemail'];
    echo "<tr><td style=\"padding-left:4px;\">
    <input type=\"text\" name=\"mail\" value=\"".$mail."\" onfocus=\"if(this.value=='".$mail."') this.value=''\" onblur=\"if(this.value=='')this.value='".$mail."'\" style=\"width:120px;\">
    </td></tr>";
    echo "<tr><td style=\"height:4px;\"></td></tr>";

    if($aus_settings->form_title=="1")
    {
        echo "<tr><td style=\"padding-left:4px;\">";
        	echo "<select name=\"title\" style=\"width:120px;\">\n";
        	echo "<option value=\"0\">".$lang['onl_form_mr']."</option>\n";
        	echo "<option value=\"1\">".$lang['onl_form_mrs']."</option>\n";
        	echo "</select>\n";
        echo "</td></tr>";
        echo "<tr><td style=\"height:4px;\"></td></tr>";
    }

    if($aus_settings->form_forename=="1")
    {
        echo "<tr><td style=\"padding-left:4px;\">
        <input class=\"output\" type=\"text\" name=\"forename\" value=\"".$lang['onl_form_forename']."\" onfocus=\"if(this.value=='".$lang['onl_form_forename']."') this.value=''\" onblur=\"if(this.value=='')this.value='".$lang['on_form_forename']."'\" style=\"width:120px;\">
        </td></tr>";
        echo "<tr><td style=\"height:4px;\"></td></tr>";
    }

    if($aus_settings->form_surname=="1")
    {
        echo "<tr><td style=\"padding-left:4px;\">
        <input class=\"output\" type=\"text\" name=\"surname\" value=\"".$lang['onl_form_surname']."\" onfocus=\"if(this.value=='".$lang['onl_form_surname']."') this.value=''\" onblur=\"if(this.value=='')this.value='".$lang['on_form_surname']."'\" style=\"width:120px;\">
        </td></tr>";

    }

    if($aus_settings->group_choice=="1")
    {

        echo "<tr><td style=\"height:8px;\"></td></tr>";
        echo "<tr><td style=\"padding-left:4px; font-family:".$aus_settings->layout_font_face."; font-size:".$aus_settings->layout_font_size."pt; color:".$aus_settings->layout_font_color.";\">".$lang['onl_group'].":</td></tr>";
        $i=1;
        $get_groups=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id<>'1' ORDER BY groupname");
        while($aus_groups=$mysql->fetchObject($get_groups))
        {
        	if($aus_settings->group_choice_radio == 0)
        	{
            	echo "<tr><td style=\"padding-left:0px; font-family:".$aus_settings->layout_font_face."; font-size:".$aus_settings->layout_font_size."pt; color:".$aus_settings->layout_font_color.";\"><input class=\"output\" id=\"selgroup{$i}\" type=\"checkbox\" name=\"group_id[".$i."]\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>";
            }
            else
            {
				echo "<tr><td style=\"padding-left:0px; font-family:".$aus_settings->layout_font_face."; font-size:".$aus_settings->layout_font_size."pt; color:".$aus_settings->layout_font_color.";\"><input class=\"output\" id=\"selgroup{$i}\" type=\"radio\" name=\"group_id\" value=\"".$aus_groups->id."\" /><label for=\"selgroup{$i}\">".$aus_groups->groupname."</label></td></tr>\n";
            }

            $i++;
        }
        echo "<tr><td class=\"output\" style=\"height:4px;\"></td></tr>";
    }

    echo "<tr><td style=\"height:4px;\"></td></tr>";
    echo "<tr><td style=\"padding-left:4px;\"><input type=\"submit\" name=\"newsletter_ok\" value=\"&nbsp;&nbsp;&nbsp;&nbsp;".$lang['onl_ok']."&nbsp;&nbsp;&nbsp;&nbsp;\" class=\"button\"></td></tr>";

	if(!empty($notice_new_user))
	{
		echo "<tr><td style=\"height:10px;\"></td></tr>";
		echo "<tr><td style=\"color:#E59930;\"><b>".$notice_new_user."</b></td></tr>";
	}
	if(!empty($success_new_user))
	{
		echo "<tr><td style=\"height:10px;\"></td></tr>";
		echo "<tr><td style=\"color:#7BBD42;\"><b>".$success_new_user."!</b></td></tr>";
	}

	echo "</table>";

	echo "</td>";
	echo "</tr></table>";



	echo "</form>";
}
else
	echo "No Access!";
?>