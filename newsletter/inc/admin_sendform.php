<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################



/* Security Check */
if(!defined('logincheck')) die('Error!');
if(defined('enter_newsletter'))
{


	$dir="upload/";

    $get_set=$mysql->query("SELECT betreff,sig FROM $prefix"."_settings");
    $aus_set=$mysql->fetchObject($get_set);

    if($aus_set->sig!="")
    {
    	$text=$aus_set->sig;

		if($aus_settings->wysiwyg==1 && $aus_settings->mailformat==1)
			$text = str_replace("\n", "<br>", $text);
		
	}
	if($error!="1")
	{
		$subject=$aus_set->betreff;
	}



//zwei spalten layout
echo "<table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tr>";
echo "<td valign=\"top\" width=\"100%\" style=\"padding-left:8px;\">";

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

if($_POST['saveemail_ok'])
{
		$savedemails_name	= $_POST['savedemails_name'];
        $id_group 			= $_POST['id_group'];
        $emailname 			= $_POST['emailname'];
        $subject 			= escapeString($_POST['subject']);
		$text_tmp			= "";

        if($aus_settings->wysiwyg==1)
        {
        	$text 				= str_replace("\r\n", "\n", $_POST['text']);
        	$text_tmp 			= str_replace("\r\n", "\n", escapeString($_POST['text']));
        }
		else
		{
			$text 				= str_replace("\r\n", "\n", escapeString($_POST['text']));
			$text_tmp			= $text;
		}

		if(!empty($savedemails_name))
		{
            $get_templates=$mysql->query("SELECT * FROM {$prefix}_savedemails WHERE savedemails_name='{$savedemails_name}'");
            if($mysql->numRows($get_templates)!=0)
            {
            	$aus_templates=$mysql->fetchObject($get_templates);
            	$mysql->query("UPDATE {$prefix}_savedemails SET id_group='{$id_group}',id_sender='{$emailname}',betreff='{$subject}',msg='{$text_tmp}' WHERE id='{$aus_templates->id}'");

            	$output_template_edit = "<img src=\"images/correct.gif\"> ".$lang['sendform_button_saveemail_overwrite']."!";
            }
            else
            {
                $mysql->query("INSERT INTO {$prefix}_savedemails (savedemails_name,id_group,id_sender,betreff,msg) VALUES ('$savedemails_name','$id_group','$emailname','$subject','$text_tmp')");

                $output_template_edit = "<img src=\"images/correct.gif\"> ".$lang['sendform_button_saveemail_success']."!";
            }

            $changed_sm = true;
        }
        else
        {
        	$output_template_edit = "<img src=\"images/false.gif\"> ".$lang['sendform_button_saveemail_error']."!";
        }

        $subject 			= str_replace("\'", "'", $subject);
        $text 				= str_replace("\'", "'", $text);
		
		if(!empty($output_template_edit))
		{
			echo "<table cellpadding=\"0\" cellspacing=\"0\">";
			echo "<tr><td>";
				echo $output_template_edit;
			echo "</td></tr>";
			echo "<tr><td height=\"12\"></td></tr>";
			echo "</table>";
		}

}



$deltemplateid=$_GET['deltemplateid'];
if(!empty($deltemplateid))
{
	$mysql->query("DELETE FROM {$prefix}_savedemails WHERE id='{$deltemplateid}'");
	
	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td><img src=\"images/correct.gif\"> ".$lang['sendform_templates_deleted']."!</td></tr>";
	echo "<tr><td height=\"12\"></td></tr>";
	echo "</table>";
}



$showtemplate=$_GET['showtemplate'];
if(!empty($showtemplate))
{
    $get_templates=$mysql->query("SELECT * FROM {$prefix}_savedemails WHERE id='{$showtemplate}'");
    $aus_templates=$mysql->fetchObject($get_templates);

    $id_group = $aus_templates->id_group;
    $emailname = $aus_templates->id_sender;
    $subject = $aus_templates->betreff;
    $text = str_replace("\r\n", "\n", $aus_templates->msg);
    $savedemails_name = $aus_templates->savedemails_name;
}
if($_POST['ok_try'] || $_GET['ok_test'] || $_POST['ok_test'])
{
	if($aus_settings->send_oldway==0)
	{
		$savedemails_name	= $_POST['savedemails_name'];
		$id_group 			= $_POST['id_group'];
        $emailname			= $_POST['emailname'];
        $subject 			= $_POST['subject'];
        $file_array_post 	= $_POST['file_array_post'];
        $text 				= str_replace("\r\n", "\n", $_POST['text']);
	}
	else
	{
		$savedemails_name	= $_SESSION['savedemails_name'];
		$id_group 			= $_SESSION['id_group'];
        $emailname			= $_SESSION['nl_emailname'];
        $subject			= $_SESSION['nl_subject'];
        $file_array_content = $_SESSION['nl_file_array_content'];

        if(is_array($file_array_content))
        {
            $i = 0;
            foreach($file_array_content as $key=>$value)
            {
                $file_array_var[$i] = $file_array_content[$key]['name'].":".$file_array_content[$key]['type'];
                $i++;
            }
        }

        $text				= $_SESSION['nl_msg'];
	}

}
elseif(!empty($_POST['preview_ok']))    // html mail vorschau
{
    $savedemails_name	= $_POST['savedemails_name'];
    $id_group			= $_POST['id_group'];
    $emailname			= $_POST['emailname'];
    $subject			= $_POST['subject'];
    $text				= str_replace("\r\n", "\n", $_POST['text']);
    $file_array_post 	= $_POST['file_array_post'];

}

if($_POST['up_img'] || $_POST['reup_img'])
{
    $id_group			= $_POST['id_group'];
    $emailname			= $_POST['emailname'];
    $subject			= $_POST['subject'];
    $text				= str_replace("\r\n", "\n", $_POST['text']);
	$file_array_post 	= $_POST['file_array_post'];

    $changed_img 		= true;
}


if($_POST['up_att'])
{
    $id_group 	= $_POST['id_group'];
    $emailname 	= $_POST['emailname'];
    $subject 	= $_POST['subject'];
    $text 		= str_replace("\r\n", "\n", $_POST['text']);

    $changed_att = true;


    /* Uploading files */

    $upload = $_FILES['upload'];
    $dl1_path = dirname(__FILE__)."/../".$dir;

    $countElement = count($upload['name']);
    $i = 1;
    foreach($upload['name'] AS $key=>$value)
    {

        if($upload['size'][$key] != 0)
        {
            move_uploaded_file($upload['tmp_name'][$key], $dl1_path.$upload['name'][$key]);
            $files .= $upload['name'][$key].", ";
            $file_array_var[$i-1] = $upload['name'][$key].":".$upload['type'][$key];
        }
        else
            $files_error .= $upload['name'][$key].", ";


        $i++;

        if($i == $countElement)
            break;
    }

    $files = substr($files, 0, -2);
    $files_error = substr($files_error, 0, -2);

}



if($_GET['ins'])
{
	$file=$_GET['ins'];

    $handle = fopen("html_templates/".$file, "r");
    if($handle)
    {
       while(!feof($handle))
       {
           $buffer.=fgets($handle, 4096);
       }
       fclose($handle);
    }
    $text=$buffer;

    $changed_tpl = true;
}


    if($aus_settings->send_oldway==1)
    {

        echo "<table cellpadding=\"0\" cellspacing=\"0\">";

        echo "<tr><td><b>".$lang['sendform_newsletterinfo'].":</b></td></tr>";
        echo "<tr><td height=\"12\"></td></tr>";
        $get_resumeinfo=$mysql->query("SELECT * FROM {$prefix}_resume");
        $aus_resumeinfo=$mysql->fetchObject($get_resumeinfo);
        if($aus_resumeinfo->success=="1")
        {
            if((time()-$aus_resumeinfo->date)>=86400)
            echo "<tr><td>".$lang['sendform_lastnlettersend']." ".date("j",(time()-$aus_resumeinfo->date)-86400)." ".$lang['sendform_days']."</td></tr>";
            elseif((time()-$aus_resumeinfo->date)<=86400 && (time()-$aus_resumeinfo->date)>=3600)
            echo "<tr><td>".$lang['sendform_lastnlettersend']." ".date("H",(time()-$aus_resumeinfo->date)-3600)." ".$lang['sendform_hours']."</td></tr>";
            else
            echo "<tr><td>".$lang['sendform_lastnlettersend']." ".date("i",(time()-$aus_resumeinfo->date))." ".$lang['sendform_minutes']."</td></tr>";
        }
        else
        {
            if($aus_resumeinfo->date==0)
            echo "<tr><td>".$lang['sendform_nosent_sofar']."</td></tr>";

            else
            {
            echo "<tr><td><font style=\"color:#FF0000;\">".$lang['sendform_sendingat']." ".date("d.m.Y",$aus_resumeinfo->date)." ".$lang['sendform_failed']."!</font></td></tr>";
            echo "<tr><td>".$lang['sendform_resumeclick'].": <a href=\"".$inclusion_path."s=$s&resume=ok\"><img src=\"".$file_root."/images/arrow_go.gif\" border=\"0\" title=\"".$lang['sendform_resume']."\"></a></td></tr>";
            echo "<tr><td height=\"8\"></td></tr>";
            echo "<tr><td>".$lang['sendform_whilesending']."</td></tr>";
            }
        }

        echo "</table>";

        ###################################################

        echo "<br>";
        echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"750px\">";
        echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"".$twidth."\" height=\"1\"></td></tr>";
        echo "</table><br>";

        ###################################################
	}

echo "<form action=\"".$inclusion_path."s=newsletter\" method=\"post\" name=\"nletter_form\" enctype=\"multipart/form-data\">";


echo "<table cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr><td style=\"font-weight: bold;\">".$lang['sendform_group'].":</td></tr>";


$default_bg="#F9F9F9";
$default_bg="#000000";
$changed_bg="#F5F5F5";



echo "<tr><td>$aus_settings->send_method";

	if($aus_settings->send_oldway==1)
	{
		$id_group = $_POST['id_group'];
		echo "<table cellpadding=\"0\" cellspacing=\"0\"><tr><td>";
        echo "<select name=\"id_group\" style=\"font-family: arial; font-size: 10.5; width:250px; background-color:#f9f9f9;border: 1px solid #666666;\">";
        $get_groups=$mysql->query("SELECT id,groupname,default_group FROM $prefix"."_groups ORDER BY groupname");
        while($aus_groups=$mysql->fetchObject($get_groups))
        {
            if($id_group == $aus_groups->id)
            {
                echo "<option value=\"".$aus_groups->id."\" selected>".$aus_groups->groupname."</option>";
                $already_set=true;
            }
            elseif($aus_groups->default_group == 1)
            {
                echo "<option value=\"".$aus_groups->id."\" selected>".$aus_groups->groupname."</option>";
                $already_set=true;
            }
            elseif($aus_groups->groupname == "Standard" && $already_set != true)
                echo "<option value=\"".$aus_groups->id."\" selected>".$aus_groups->groupname."</option>";
            else
                echo "<option value=\"".$aus_groups->id."\">".$aus_groups->groupname."</option>";
        }
        echo "</select>";
        echo "</td></tr></table>";
	}
	else
	{

		echo "<table cellpadding=\"0\" cellspacing=\"0\" onmouseover=\"this.className='style2'\" onmouseout=\"this.className='style1'\" class=\"style1\" style=\"width:250px;\"><tr><td>";

		$get_groups_defaulftcheck=$mysql->query("SELECT default_group FROM $prefix"."_groups WHERE default_group='1'");
		if($mysql->numRows($get_groups_defaulftcheck)==0) $set_standard = true;

		if(!is_array($id_group))$id_group = array();
        $i=0;
        $get_groups=$mysql->query("SELECT id, groupname, default_group FROM $prefix"."_groups ORDER BY id, groupname");
        while($aus_groups=$mysql->fetchObject($get_groups))
        {
            if(empty($id_group) && $set_standard==true && $aus_groups->groupname=="Standard") $checked="checked";
            if(empty($id_group) && $aus_groups->default_group==1) $checked="checked";

            if(in_array($aus_groups->id,$id_group)) {$checked="checked"; $already_set=true;}


            echo "<input type=\"checkbox\" id=\"{$i}\" name=\"id_group[{$i}]\" value=\"{$aus_groups->id}\" {$checked}><label for=\"{$i}\"> {$aus_groups->groupname}</label><br>";

            unset($checked);
            $i++;
        }
        echo "</td></tr></table>";
    }


echo "</td></tr>";

$max_width = 750;

echo "<tr><td height=\"10\"></td></tr>";
echo "<tr><td style=\"font-weight: bold;\">".$lang['sendform_addresser'].":</td></tr>";
//echo "<tr><td><input type=\"text\" name=\"emailname\" value=\"$emailname\" maxlength=\"250\" style=\"width:200px;\" onmouseover=\"this.className='style2'\" onmouseout=\"this.className='style1'\" class=\"style1\"></td></tr>";
$get_sender = $mysql->query("SELECT * FROM {$prefix}_senderaddress");
if($mysql->numRows($get_sender) != 0)
{
    echo "
    <tr>
    <td>
    <select name=\"emailname\" style=\"background-color: #F9F9F9; border: 1px solid #000000; width:250px;\">
    ";

    while($aus_sender = $mysql->fetchObject($get_sender))
    {
    	if(!empty($_POST['emailname']) && $_POST['emailname'] == $aus_sender->id)
    		echo "<option value=\"".$aus_sender->id."\" selected>".$aus_sender->sender_name." &lt;".$aus_sender->sender_email."&gt;</option>";
		else if(!empty($_GET['showtemplate']) && $emailname == $aus_sender->id)
    		echo "<option value=\"".$aus_sender->id."\" selected>".$aus_sender->sender_name." &lt;".$aus_sender->sender_email."&gt;</option>";
        else if($aus_sender->sender_default == 1)
        	echo "<option value=\"".$aus_sender->id."\" selected>".$aus_sender->sender_name." &lt;".$aus_sender->sender_email."&gt;</option>";
        else
	        echo "<option value=\"".$aus_sender->id."\">".$aus_sender->sender_name." &lt;".$aus_sender->sender_email."&gt;</option>";

    }

    echo "
    </select>
    </td>
    </tr>
    ";
}
else
{
	echo "<tr><td><a href=\"admin.php?set=ok&s=nl_text\" class=\"red\">".$lang['sendform_missingemail']."!</a></td></tr>";
}

echo "<tr><td height=\"10\"></td></tr>";
echo "<tr><td style=\"font-weight: bold;\">".$lang['sendform_subject'].":</td></tr>";
echo "<tr><td><input type=\"text\" name=\"subject\" value=\"$subject\" maxlength=\"250\" style=\"width:".$max_width."px;\" onmouseover=\"this.className='style2'\" onmouseout=\"this.className='style1'\" class=\"style1\"></td></tr>";
echo "<tr><td height=\"8\"></td></tr>";
echo "<tr><td>

<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tr>
<td valign=\"bottom\" style=\"font-weight: bold;\">
".$lang['sendform_message'].":
</td>";

if($aus_settings->mailformat==0 || ($aus_settings->wysiwyg==0 && $aus_settings->mailformat==1))
echo "<td align=\"right\"><input type=\"button\" value=\"-\" onClick=\"smaller()\" class=\"resizer\" title=\"".$lang['sendform_resizer_smaller']."\"> <input type=\"button\" value=\"+\" onClick=\"bigger()\" class=\"resizer\" title=\"".$lang['sendform_resizer_bigger']."\"></td>";


echo "</tr></table>

</td></tr>";
$text=str_replace('\"', '"', $text);
$editor_name = "text";

echo "<tr><td>";

	
    if($aus_settings->wysiwyg==1 && $aus_settings->mailformat==1)
    {
	
		/* Start - CKEditor, this is NOT a copyright of USOLVED */
		echo "<textarea name=\"text\">{$text}</textarea>";
		?>
			<script type="text/javascript">
				CKEDITOR.replace( 'text', {toolbar : 'USOLVED'}  );
			</script>
		<?php
		/* End - CKEditor, this is NOT a copyright of USOLVED */
	
	
	
	
		/* Start - FCKeditor, this is not a copyright of USOLVED */
		/* 
        include("inc/FCKeditor/fckeditor.php");

        $sBasePath = substr($_SERVER['PHP_SELF'],0,-10)."/inc/FCKeditor/";

        $oFCKeditor = new FCKeditor($editor_name) ;
        $oFCKeditor->BasePath = $sBasePath;
        $oFCKeditor->Value = $text;
        $oFCKeditor->Width  = $max_width ;
        $oFCKeditor->Height = '332' ;
        $oFCKeditor->Config['CustomConfigurationsPath'] = $sBasePath.'/fckconfig.js' ;
        $oFCKeditor->Config['SkinPath'] = $sBasePath.'/editor/skins/default/' ;
        $oFCKeditor->ToolbarSet = 'USOLVED';
        $oFCKeditor->Create() ;
		*/
        /* End - FCKeditor, this is not a copyright of USOLVED */

    }
	else
		echo "<textarea name=\"text\" rows=\"16\" style=\"width:".$max_width."px;\" onmouseover=\"this.className='style2'\" onmouseout=\"this.className='style1'\" class=\"style1\">".$text."</textarea>";


echo "</td></tr>";


if($aus_settings->mailformat==1)$code="HTML";
else $code="Text";

if($aus_settings->send_type==0)$type=$lang['settings_sendphp'];
else $type=$lang['settings_sendsmtp'];

if($aus_settings->send_oldway==0)$type.=" live";

$get_charset=$mysql->query("SELECT * FROM {$prefix}_charset WHERE active=1");
$aus_charset=$mysql->fetchObject($get_charset);

echo "
<tr>
<td>
    <table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>

	<td>
		<table cellpadding=\"0\" cellspacing=\"0\">
        <tr><td><font style=\"color:#CCCCCC;font-size:7pt;\">".$lang['sendform_emailencoding'].": ".$code.", ".$aus_charset->charset."</font></td></tr>
        <tr><td><font style=\"color:#CCCCCC;font-size:7pt;\">".$lang['settings_sendmethod'].": ".$type."</font></td></tr>
		</table>
	</td>

	<td align=\"right\">
        <table cellpadding=\"0\" cellspacing=\"0\">
        <tr><td>";
        //ne schleife mit explode durchgehen...

        $placeholder_array = array('{TITLE_EXPRESSION}', '&nbsp;&nbsp;&nbsp;&nbsp;{TITLE}', '&nbsp;&nbsp;&nbsp;&nbsp;{NAME_EXPRESSION}', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{FORENAME}', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{SURNAME}', '{GROUPS}', '{EMAIL}', '{PROFILE_LINK}', '{SHOWEMAIL_LINK}', '{UNSUBSCRIBE_LINK}');

        echo "
        <div id=\"menu\">
		
        <ul>
          <li><h2>Platzhalter</h2>
            <ul>
        ";
        foreach($placeholder_array as $value)
        {
        	if($aus_settings->wysiwyg==0 || ($aus_settings->wysiwyg==1 && $aus_settings->mailformat==0))
                echo "<li><a href=\"javascript:insertcode('".str_replace("&nbsp;","",$value)."');\">{$value}</a></li>";
        	else
			{
                //echo "<li><a href=# onclick=\"selectObjectText('".str_replace("&nbsp;","",$value)."','{$editor_name}');\">{$value}</a></li>";
				echo "<li><a href=# onclick=\"javascript: CKEDITOR.instances.{$editor_name}.insertHtml('".str_replace("&nbsp;","",$value)."');\" rel=\"nofollow\">{$value}</a></li>";
			}
        }

        echo "
            </ul>
          </li>
        </ul>
		
		
		</div>

        </td></tr>
        </table>
	</td>

	</tr>
    </table>
</td>
</tr>


";



if(!empty($file_array_var) || !empty($_POST['file_array_post']))
{

	if(!empty($file_array_var) && empty($_POST['file_array_post']))
		$file_array_output = $file_array_var;
	else
		$file_array_output = unserialize(stripslashes($_POST['file_array_post']));


	echo "<tr><td height=\"4\"></td></tr>";
	echo "<tr><td> <font style=\"color:#CCCCCC;font-size:7pt;\"><u>".$lang['sendform_attachment_head'].":</u></font></td></tr>";
	echo "<tr><td height=\"2\"></td></tr>";

	if(is_array($file_array_output))
	{
        foreach($file_array_output AS $value)
        {
        	$value_output = explode(":", $value);
            echo "<tr><td><img src=\"images/attachment.gif\"> <font style=\"color:#CCCCCC;font-size:7pt;\">".$value_output[0]."</font></td></tr>";
        }
	}
	echo "<input type=\"hidden\" name=\"file_array_post\" value='".htmlentities(serialize($file_array_output))."'>";
}

echo "<tr><td height=\"3\"></td></tr>";


###################################################

	/* sichtarbeitsregeln */
	if(empty($changed_tpl))
	{
        $tpl_visibility = "hidden";
        $tpl_display    = "none";
	}
	else
	{
		$tpl_visibility = "visible";
        $tpl_display    = "block";
	}

	if(empty($changed_img))
	{
        $img_visibility = "hidden";
        $img_display    = "none";
	}
	else
	{
		$img_visibility = "visible";
        $img_display    = "block";
	}

	if(empty($changed_att))
	{
        $att_visibility = "hidden";
        $att_display    = "none";
	}
	else
	{
		$att_visibility = "visible";
        $att_display    = "block";
	}

		$sm_visibility = "hidden";
        $sm_display    = "none";

		$browser_visibility = "hidden";
        $browser_display    = "none";
		
		
		$newsolved_visibility = "hidden";
        $newsolved_display    = "none";
		
echo "</table>";

	$twidth=750;
	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"".$twidth."\" height=\"1\"></td></tr>";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "</table>";

    if($aus_settings->mailformat==1 && $aus_settings->wysiwyg==0)
    {
    echo "<table cellpadding=\"0\" cellspacing=\"0\">

            <tr><td height=\"3\"></td></tr>
            <tr><td width=\"237\">
            <img src=\"".$file_root."/images/textformat/paragraph.gif\" alt=\"".$lang['sendform_break']."\" border=\"0\" style=\"border: 1px solid black;\"  onClick=\"insert_paragraph()\" title=\"".$lang['sendform_break']."\">
            <img src=\"".$file_root."/images/textformat/b.gif\" alt=\"".$lang['sendform_bold']."\" border=\"0\" style=\"border: 1px solid black;\"  onClick=\"insert_b()\" title=\"".$lang['sendform_bold']."\">
            <img src=\"".$file_root."/images/textformat/i.gif\" alt=\"".$lang['sendform_italic']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_i()\" title=\"".$lang['sendform_italic']."\">
            <img src=\"".$file_root."/images/textformat/u.gif\" alt=\"".$lang['sendform_underline']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_u()\" title=\"".$lang['sendform_underline']."\">
            <img src=\"".$file_root."/images/textformat/s.gif\" alt=\"".$lang['sendform_cross']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_s()\" title=\"".$lang['sendform_cross']."\">

            <img src=\"".$file_root."/images/textformat/color.gif\" alt=\"".$lang['sendform_textcolor']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_color()\" title=\"".$lang['sendform_textcolor']."\">
            <img src=\"".$file_root."/images/textformat/size.gif\" alt=\"".$lang['sendform_textsize']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_size()\" title=\"".$lang['sendform_textsize']."\">
            <img src=\"".$file_root."/images/textformat/font.gif\" alt=\"".$lang['sendform_textfamily']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_font()\" title=\"".$lang['sendform_textfamily']."\">

            </td><td width=\"101\">

            <img src=\"".$file_root."/images/textformat/img.gif\" alt=\"".$lang['sendform_insertimg']."\" border=\"0\" style=\"border: 1px solid black;\"  onClick=\"insert_img()\" title=\"".$lang['sendform_insertimg']."\">
            <img src=\"".$file_root."/images/textformat/url.gif\" alt=\"".$lang['sendform_insertlink']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_url()\" title=\"".$lang['sendform_insertlink']."\">
            <img src=\"".$file_root."/images/textformat/email.gif\" alt=\"".$lang['sendform_insertemaillink']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_email()\" title=\"".$lang['sendform_insertemaillink']."\">

            </td><td>

            <img src=\"".$file_root."/images/textformat/center.gif\" alt=\"".$lang['sendform_center']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_center()\" title=\"".$lang['sendform_center']."\">
            <img src=\"".$file_root."/images/textformat/right.gif\" alt=\"".$lang['sendform_right']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_right()\" title=\"".$lang['sendform_right']."\">
            <img src=\"".$file_root."/images/textformat/list.gif\" alt=\"".$lang['sendform_list']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_list()\" title=\"".$lang['sendform_list']."\">

            <img src=\"".$file_root."/images/textformat/table.gif\" alt=\"".$lang['sendform_table']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_table()\" title=\"".$lang['sendform_table']."\">
            <img src=\"".$file_root."/images/textformat/table_img.gif\" alt=\"".$lang['sendform_tableimg']."\" border=\"0\" style=\"border: 1px solid black;\" onClick=\"insert_table_img()\" title=\"".$lang['sendform_tableimg']."\">
            </td></tr>
    </table>";
    }


	
	
    ###################################################
	#### Gespeicherte Vorlagen ###
	
    echo "<table cellpadding=\"0\" cellspacing=\"0\">";
    echo "<tr><td height=\"8\"></td></tr>";
    echo "<tr><td style=\"color:#666666;font-size:8pt;\">
    <img src=\"images/arrow.gif\">
    <a href=\"javascript:showPart('tpl');\"><b><u>".$lang['sendform_template']."</u></b></a>
    </td></tr>";
    echo "<tr><td height=\"7\"></td></tr>";

	echo "</table>";



	echo "<div id=\"item_tpl\" style=\"visibility:".$tpl_visibility."; display:".$tpl_display.";\">";

	
	#### HTML Templates ###
	if($aus_settings->mailformat==1)
    {
	echo "<table cellpadding=\"0\" cellspacing=\"0\" style=\"padding-left:10px;\">";
	echo "<tr><td><u>HTML Templates:</u></td></tr>";
	echo "<tr><td height=\"8\"></td></tr>";

		$file_s = array();
        $dir=dir("html_templates");
        while($file=$dir->read())
        {
        	if($file!="." && $file!=".." && $file!="index.htm" && (strtolower(substr(strrchr($file,"."),1))=="html" || strtolower(substr(strrchr($file,"."),1))=="htm"))
				$file_s[]=$file;
    	}
    	if(!empty($file_s))
    	{
            asort($file_s);

            $columns=3;
            $i=1;
            foreach($file_s AS $muh => $value)
            {
                    if($i%$columns==1)
                    {
                        echo "<tr>";
                    }

                    echo "<td width=\"235\" valign=\"top\">
                    <a href=\"admin.php?s=$s&ins=".$value."\" onClick=\"return confirm('".$lang['sendform_template_insert']."')\" onmouseover=\"roll_over('arrow_up_tpl_{$i}', 'images/arrow_up_tpl_over.gif')\" onmouseout=\"roll_over('arrow_up_tpl_{$i}', 'images/arrow_up_tpl.gif')\">
                    <img src=\"images/arrow_up_tpl.gif\" border=\"0\" name=\"arrow_up_tpl_{$i}\" title=\"".$lang['sendform_template_title_img']."\"></a> <a href=\"html_templates/".$value."\" target=\"_blank\" title=\"".$lang['sendform_template_title_lnk']."\">".$value."</a>
                    </td>";

                    if($i%$columns==0)
                    {
                        echo "</tr><tr><td height=\"4\"></td></tr>";
                    }
            $i++;
            }
		}
		else
		{
			echo "<tr><td style=\"color:#cccccc;font-size:8pt;\">".$lang['sendform_template_no']."!</td></tr>";
		}

	echo "</table><br>";
	}
	
	
	#### Database Templates ###
	
    echo "<table cellpadding=\"0\" cellspacing=\"0\" style=\"padding-left:10px;\">";
	echo "<tr><td><u>".$lang['sendform_templates'].":</u></td></tr>";
	echo "<tr><td height=\"8\"></td></tr>";

    
        $get_templates=$mysql->query("SELECT * FROM {$prefix}_savedemails ORDER BY savedemails_name");
        if($mysql->numRows($get_templates)!=0)
        {
            while($aus_templates=$mysql->fetchObject($get_templates))
            {
            	echo "<tr><td><a href=\"".$inclusion_path."s=$s&showtemplate=".$aus_templates->id."\">".$aus_templates->savedemails_name."</a></td><td><b>»</b> <a href=\"".$inclusion_path."s=$s&deltemplateid=".$aus_templates->id."\" onClick=\"return confirm('".$lang['sendform_sure']."')\">".$lang['sendform_delete']."</a></td></tr>";
            }
        }
        else
        {
        	echo "<tr><td>".$lang['sendform_nothing']."</td></tr>";
        }

    echo "</table>";
	
	
	
	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"".$twidth."\" height=\"1\"></td></tr>";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "</table>";

	echo "</div>";


    ###################################################
	#### Template speichern ###

	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
    echo "<tr><td height=\"8\"></td></tr>";
    echo "<tr><td style=\"color:#666666;font-size:8pt;\">
    <img src=\"images/arrow.gif\">
    <a href=\"javascript:showPart('sm');\"><u><b>".$lang['sendform_sm']."</b></u></a>
    </td></tr>";
    echo "<tr><td height=\"7\"></td></tr>";

	echo "</table>";

	echo "<div id=\"item_sm\" style=\"visibility:".$sm_visibility."; display:".$sm_display.";\">";

    echo "<table cellpadding=\"0\" cellspacing=\"0\" style=\"padding-left:10px;\">";
    echo "<tr><td width=\"366\">".$lang['sendform_button_saveemail']." <input type=\"text\" name=\"savedemails_name\" value=\"$savedemails_name\" style=\"width:70px;\"></td><td align=\"right\"><input type=\"submit\" name=\"saveemail_ok\" value=\"".$lang['sendform_button_saveemail_button']."\" style=\"width:92px;\" class=\"button\"></td></tr>";
    echo "</table>";

	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"".$twidth."\" height=\"1\"></td></tr>";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "</table>";

	echo "</div>";

	

	###################################################
	#### Bilder Upload ###

    if($aus_settings->image_upload==1)
    {						
	
	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
    echo "<tr><td height=\"8\"></td></tr>";
    echo "<tr><td style=\"color:#666666;font-size:8pt;\">
    <img src=\"images/arrow.gif\">
    <a href=\"javascript:showPart('img');\"><u><b>".$lang['sendform_image']."</b></u></a>
    </td></tr>";
    echo "<tr><td height=\"7\"></td></tr>";

	echo "</table>";
	echo "<div id=\"item_img\" style=\"visibility:".$img_visibility."; display:".$img_display.";\">";
	echo "<table cellpadding=\"0\" cellspacing=\"0\" style=\"padding-left:10px;\">";

	######## Bild Upload ########

		if($_POST['reup_img'])
		{
            $temp_dl1=$_POST['temp_dl1'];
            $temp_dl1_size=$_POST['temp_dl1_size'];
            $temp_dl1_name=$_POST['temp_dl1_name'];
            $up_img="set";
		}
		else
		{
            $up_img=$_POST['up_img'];
            $temp_dl1=$_FILES['temp_dl1']['tmp_name'];
            $temp_dl1_size=$_FILES['temp_dl1']['size'];
            $temp_dl1_name=$_FILES['temp_dl1']['name'];
		}

		if($_POST['reup_img_no'])
		{
            $temp_dl1_name=$_POST['temp_dl1_name'];

            $name_img=strtolower($temp_dl1_name);
            $name_img=strtolower($name_img);
            $name_img=strtr($name_img," ","_");

            $dl1_path=dirname(__FILE__)."/../upload/";
            unlink($dl1_path."tmp_".$name_img);
		}

		if($up_img)
		{
            $fileext="gif|jpg|jpeg|png|bmp";
            $maxsize=(2048*1024);


			if($temp_dl1_size!="")
            {
                //..."_stacic", von php definiert
                $size=$temp_dl1_size;                           // Größe der Datei
                $size_dl1_up=$size;
                $size_dl1_up=round(($size_dl1_up/1024),2);

                $name_img=strtolower($temp_dl1_name);           // Der Originalname
                $name_img=strtolower($name_img);
                $name_img=strtr($name_img," ","_");

                $dl1_path=dirname(__FILE__)."/../upload/";

                if(eregi("($fileext)$",$name_img))
                {
                      if($size<$maxsize && $size!=0)
                      {
                            if(file_exists($dl1_path.$name_img) && empty($_POST['reup_img']))
                            {
                                move_uploaded_file($temp_dl1,$dl1_path."tmp_".$name_img);
                                @chmod($dl1_path."tmp_".$name_img, 0777);
                                $temp_dl1=$dl1_path."tmp_".$name_img;

                                echo "<tr><td><b>&raquo; <font style=\"color:#FF2900;\">".$lang['sendform_image_upload_exists']."!</font></b></td></tr>";
                                echo "<tr><td>".$lang['sendform_image_upload_error5']."?</td></tr>";
                                echo "<tr><td>
                                <input type=\"hidden\" name=\"copytodir_name\" value=\"$copytodir_name\">
                                <input type=\"hidden\" name=\"temp_dl1\" value=\"$temp_dl1\">
                                <input type=\"hidden\" name=\"temp_dl1_size\" value=\"$temp_dl1_size\">
                                <input type=\"hidden\" name=\"temp_dl1_name\" value=\"$temp_dl1_name\">
                                <input type=\"submit\" name=\"reup_img\" value=\"".$lang['sendform_image_upload_error5_1']."\">
                                <b>/</b>
                                <input type=\"submit\" name=\"reup_img_no\" value=\"".$lang['sendform_image_upload_error5_2']."\">
                                </td></tr>";
                                echo "<tr><td height=\"12\"></td></tr>";
                                $error_upload="set";
                            }

                            if($overwrite=="yes" || $error_upload!="set")
                            {
                                if($_POST['reup_img'])
                                {
                                    unlink($dl1_path.$name_img);
                                    rename($dl1_path."tmp_".$name_img,$dl1_path.$name_img);
                                }
                                else
                                {
                                    move_uploaded_file($temp_dl1,$dl1_path.$name_img);
                                    @chmod($dl1_path.$name_img, 0777);
                                }


                          echo "<tr><td><b>".$lang['sendform_image_upload_upimg']." (".$name_img.")!</b></td></tr>";
                          echo "<tr><td height=\"6\"></td></tr>";

                          if($aus_settings->wysiwyg==0)
                          	echo "<tr><td>
                          	<a href=\"javascript:insertcode('&lt;a href=&quot;".$file_root."/upload/".$name_img."&quot;&gt;".$lang_newsadd_linkdescr."&lt;/a&gt;');\" onclick=\"this.blur()\" onmouseover=\"roll_over('arrow_up_img_1', 'images/arrow_up_img_over.gif')\" onmouseout=\"roll_over('arrow_up_img_1', 'images/arrow_up_img.gif')\">
                          	<img src=\"".$file_root."/images/arrow_up_img.gif\" title=\"".$lang_newsadd_imglink."\" border=\"0\" name=\"arrow_up_img_1\"></a>  ".$lang['sendform_image_upload_imglink']."
                          	<a href=\"javascript:insertcode('&lt;img src=&quot;".$file_root."/upload/".$name_img."&quot;&gt;');\" onclick=\"this.blur()\" onmouseover=\"roll_over('arrow_up_img_2', 'images/arrow_up_img_over.gif')\" onmouseout=\"roll_over('arrow_up_img_2', 'images/arrow_up_img.gif')\">
                          	<img src=\"".$file_root."/images/arrow_up_img.gif\" title=\"".$lang['sendform_image_upload_imgpaste']."\" border=\"0\" name=\"arrow_up_img_2\"></a> ".$lang['sendform_image_upload_imgpaste']."
                          	</td></tr>";
                          else
						  {
                          	/*
							echo "<tr><td>
                          <a href=# onclick=\"selectObject('".$file_root."/upload/".$name_img."','".$editor_name."');\" onmouseover=\"roll_over('arrow_up_img', 'images/arrow_up_img_over.gif')\" onmouseout=\"roll_over('arrow_up_img', 'images/arrow_up_img.gif')\">
						  <img src=\"".$file_root."/images/arrow_up_img.gif\" title=\"".$lang['sendform_image_upload_imgpaste']."\" border=\"0\" name=\"arrow_up_img\">
						  </a> ".$lang['sendform_image_upload_imgpaste']."
                          </td></tr>";
						  */
						  
						    echo "<tr><td>
							<a href=# onclick=\"javascript: CKEDITOR.instances.{$editor_name}.insertHtml('<img src=".$file_root."/upload/".$name_img.">');\" rel=\"nofollow\" onmouseover=\"roll_over('arrow_up_img', 'images/arrow_up_img_over.gif')\" onmouseout=\"roll_over('arrow_up_img', 'images/arrow_up_img.gif')\">
							<img src=\"".$file_root."/images/arrow_up_img.gif\" title=\"".$lang['sendform_image_upload_imgpaste']."\" border=\"0\" name=\"arrow_up_img\">
							</a> ".$lang['sendform_image_upload_imgpaste']."
							</td></tr>";
						  }

                          echo "<tr><td height=\"8\"></td></tr>";

                        	}

                      }
                      else
                      {
                      	echo "<tr><td></td><td class=\"error_msg\" style=\"padding-left: 3;\">".$lang['sendform_image_upload_error1']." $aus_settings->admin_img_size"."kb ".$lang['sendform_image_upload_error2'].".</td></tr>";
                      }
                }
                else
                {
                	echo "<tr><td></td><td class=\"error_msg\" style=\"padding-left: 3;\">".$lang['sendform_image_upload_error3']." $fileext!</td></tr>";
                }
            }
		}

	echo "</table>";
	echo "<table cellpadding=\"0\" cellspacing=\"0\" style=\"padding-left:10px;\">";


        $file_config=dirname(__FILE__)."/../upload/";

        ###############################

        $file_bin=substr(decbin(fileperms($file_config)), -9);
        $file_arr=explode(".", substr(chunk_split($file_bin, 1, "."), 0, 17));
        $perms_config="";
        $i=0;

        foreach ($file_arr as $this_arr)
        {
            $file_char=($i%3==0 ? "r" : ($i%3==1 ? "w" : "x" ));
            $perms_config.=($this_arr=="1" ? $file_char : "-") . ($i%3==2 ? " " : "");
            $i++;
        }
        unset($file_bin, $file_arr, $file_char);

        if(substr($perms_config,1,1)!="w" || substr($perms_config,5,1)!="w" || substr($perms_config,9,1)!="w")
        {
        	echo "<tr><td>".$lang['sendform_image_chmodcheck']."!</td></tr>";
		}
		else
		{
            echo "<tr><td>
            <table cellpadding=\"0\" cellspacing=\"0\"><tr>
            <td valign=\"top\" width=\"366\"><input size=\"24\" type=\"file\" name=\"temp_dl1\">
            </td>
            <td align=\"right\"><input type=\"submit\" name=\"up_img\" value=\"".$lang['sendform_image_upload_ok']."\" class=\"button\" style=\"width:92px;\"></td>
            </tr>
            </table>
            </td></tr>";
        }

	echo "</table>";

	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"".$twidth."\" height=\"1\"></td></tr>";
	echo "<tr><td style=\"height:10px;\"></td></tr>";
	echo "</table>";

	echo "</div>";

    }





###################################################


    if($aus_settings->attachment_upload==1)
    {


        echo "<table cellpadding=\"0\" cellspacing=\"0\">";
        echo "<tr><td height=\"8\"></td></tr>";
        echo "<tr><td style=\"color:#666666;font-size:8pt;\">
        <img src=\"images/arrow.gif\">
        <a href=\"javascript:showPart('att');\"><u><b>".$lang['sendform_attachment']."</b></u></a>
        </td></tr>";
        echo "<tr><td height=\"7\"></td></tr>";

        echo "</table>";

        echo "<div id=\"item_att\" style=\"visibility:".$att_visibility."; display:".$att_display.";\">";
        echo "<table style=\"padding-left:7px;\">";

		if(!empty($files))
		{
			echo "<tr><td>".$lang['sendform_attachment_success1']." <b>".$files."</b> ".$lang['sendform_attachment_success2']."</td></tr>";
		}

		if(!empty($files_error))
		{
			echo "<tr><td>".$lang['sendform_attachment_error1']." <b>".$files_error."</b></td></tr>";
		}

        $file_config=dirname(__FILE__)."/../upload/";

        ###############################

        $file_bin=substr(decbin(fileperms($file_config)), -9);
        $file_arr=explode(".", substr(chunk_split($file_bin, 1, "."), 0, 17));
        $perms_config="";
        $i=0;

        foreach ($file_arr as $this_arr)
        {
            $file_char=($i%3==0 ? "r" : ($i%3==1 ? "w" : "x" ));
            $perms_config.=($this_arr=="1" ? $file_char : "-") . ($i%3==2 ? " " : "");
            $i++;
        }
        unset($file_bin, $file_arr, $file_char);

        if(substr($perms_config,1,1)!="w" || substr($perms_config,5,1)!="w" || substr($perms_config,9,1)!="w")
        {
        	echo "<tr><td>".$lang['sendform_image_chmodcheck']."!</td></tr>";
		}
		else
		{
            /* selbsterweiterndes menu */
            echo "<tr id=\"attachment_row_1\">";
                 echo "<td width=\"335\">
                    <input name=\"upload[0]\" tabindex=\"7\" type=\"file\" onchange=\"attachmentChanged()\" size=\"25\" />";
                 echo "</td>";
                 echo "<td align=\"right\"><input type=\"submit\" name=\"up_att\" value=\"".$lang['sendform_attachment_upload_ok']."\" class=\"button\" style=\"width:119px;\"></td>";
            echo "</tr>";
		}


        echo "</table>";

        echo "<table cellpadding=\"0\" cellspacing=\"0\">";
        echo "<tr><td style=\"height:10px;\"></td></tr>";
        echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"".$twidth."\" height=\"1\"></td></tr>";
        echo "<tr><td style=\"height:10px;\"></td></tr>";
        echo "</table>";

        echo "</div>";

    }



    ###################################################
	#### File Browser ###

	echo "<table cellpadding=\"0\" cellspacing=\"0\">";
    echo "<tr><td height=\"8\"></td></tr>";
    echo "<tr><td style=\"color:#666666; font-size:8pt;\">
    <img src=\"images/arrow.gif\">
	<a href=\"javascript:showPart('browser');\" id=\"filebrowser\"><u><b>File Browser</b></u></a>
    </td></tr>";
    echo "<tr><td height=\"7\"></td></tr>";

	echo "</table>";
	
	echo "
	<div id=\"item_browser\" style=\"visibility:".$browser_visibility."; display:".$browser_display.";\">
	</div>
	";


	
	
    ###################################################
	#### NEWSolved Plugin ###

	$newsolved_prefix=$aus_settings->newsolved_plugin_prefix;
	$newsolved_plugin=$aus_settings->newsolved_plugin_activate;

	/* NEWSolved Pro Plugin */
	if(!empty($newsolved_plugin) && (@$mysql->numRows($mysql->query("SHOW COLUMNS FROM {$newsolved_prefix}_entries LIKE 'flag_cron'"))!=0))
	{

        ###################################################

		echo "<table cellpadding=\"0\" cellspacing=\"0\">";
		echo "<tr><td height=\"8\"></td></tr>";
		echo "<tr><td style=\"color:#666666;font-size:8pt;\">
		<img src=\"images/arrow.gif\">
		<a href=\"javascript:showPart('newsolved');\"><u><b>".$lang['sendform_newsolvedpro_plugin']."</b></u></a>
		</td></tr>";
		echo "<tr><td height=\"7\"></td></tr>";

		echo "</table>";
		
		echo "<div id=\"item_newsolved\" style=\"visibility:".$newsolved_visibility."; display:".$newsolved_display.";\">";
		
        echo "<table cellpadding=\"0\" cellspacing=\"0\">";

        $plugin_color = "#000000";
        $inputclass = "newsolved";


        if(!empty($error_output))
        {
            echo $error_output;
            echo "<tr><td height=\"14\" width=\"240\"></td></tr>";
        }
        //----------------------

        echo "</table><table cellpadding=\"0\" cellspacing=\"0\">";


        //----------------------

        echo "<tr><td style=\"width:26px;\"><input type=\"radio\" name=\"newsolved_send_type\" value=\"last\"></td><td width=\"240\"><font style=\"color:".$plugin_color.";\">".$lang['sendform_latest1']." <input type=\"text\" name=\"newsolved_sendlast\" value=\"$newsolved_sendlast\" maxlength=\"2\" style=\"width:20;\" class=\"".$inputclass."\"> ".$lang['sendform_latest2']."</font></td>";
        echo "</tr>";

        echo "<tr><td height=\"4\"></td></tr>";

        echo "<tr><td style=\"width:26px;\"><input type=\"radio\" name=\"newsolved_send_type\" value=\"date\"></td><td><font style=\"color:".$plugin_color.";\">".$lang['sendform_date1']." <input type=\"text\" name=\"newsolved_senddates\" value=\"yyyy-mm-dd\"  maxlength=\"10\" onFocus=\"if(this.value=='yyyy-mm-dd') this.value=''\" onBlur=\"if(this.value=='')this.value='yyyy-mm-dd'\" style=\"width:58;\" class=\"".$inputclass."\"> ".$lang['sendform_date2']."</font></td>";
        echo "</tr>";


        echo "</table>";
		echo "</div>";

	}	
		

	
	###################################################
	#### Buttons ####

	echo "<center>";
	echo "<table cellpadding=\"0\" cellspacing=\"0\" style=\"text-align: center;\">";
	echo "<tr><td height=\"20\"></td></tr>";




	echo "
	<tr><td>
	<input type=\"submit\" name=\"ok_s\" value=\"".$lang['sendform_button_sendnewsletter']."\" onClick=\"return confirm('".$lang['sendform_button_sendnewsletter_q']."')\" onmouseover=\"this.className='sendnewsletter_hover'\" onmouseout=\"this.className='sendnewsletter'\" class=\"sendnewsletter\">
	<input type=\"submit\" name=\"ok_try\" value=\"".$lang['sendform_button_testmail']."\" title=\"".$lang['sendform_testmail_msg']."\" onmouseover=\"this.className='miscbutton_hover'\" onmouseout=\"this.className='miscbutton'\" class=\"miscbutton\">
	";
	if($aus_settings->send_oldway==1)
		echo "<input type=\"submit\" name=\"ok_test\" value=\"".$lang['sendform_button_simulate']."\" title=\"".$lang['sendform_simulate_msg']."\" onmouseover=\"this.className='miscbutton_hover'\" onmouseout=\"this.className='miscbutton'\" class=\"miscbutton\">";
	if($aus_settings->wysiwyg==0)	
		echo "<input type=\"submit\" name=\"preview_ok\" value=\"".$lang['sendform_button_preview']."\" onmouseover=\"this.className='miscbutton_hover'\" onmouseout=\"this.className='miscbutton'\" class=\"miscbutton\">";
	
	echo "</td></tr>";

	echo "</table>";
	echo "</center>";



echo "<table>";

if($error=="1")
{
	echo "<tr><td height=\"10\"></td></tr>";
	if($emailname=="")	{echo "<tr><td><b>»</b> ".$lang['sendform_check2addresser']."!<br></td></tr>";}
	if($subject=="")	{echo "<tr><td><b>»</b> ".$lang['sendform_check2subject']."!<br></td></tr>";}
	if($text=="")		{echo "<tr><td><b>»</b> ".$lang['sendform_check2msg']."!<br></td></tr>";}
}


$twidth=264;

echo "</table>";

echo "</form>";

//zwei spalten layout (alt)
echo "</td>";
echo "</tr></table>";
}
else
	echo "No Access!";
?>