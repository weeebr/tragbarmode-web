<?php
	include("../settings/connect.php");

	$return_value = "";
    $get_settings = $mysql->query("SELECT * FROM {$prefix}_settings");
    $aus_settings = $mysql->fetchObject($get_settings);
    
    
	$get_language=$mysql->query("SELECT * FROM {$prefix}_language WHERE language_aktiv='1'");
	$aus_language=$mysql->fetchObject($get_language);

	require("../settings/$aus_language->language_file");

	$return_value	.= "<script language=\"javascript\" src=\"js/divtools.js\"></script>";

    $return_value	.= "<table cellpadding=\"0\" cellspacing=\"0\" style=\"padding-left:10px;\">";

    $file_s = array();
    $max	= 19;
    $dir=dir("../upload/");

    while($file=$dir->read())
    {
		$len = strlen($file);
        $pos = $len - 5;

        if($file!="." && $file!=".." && $file!="index.htm" && ( strpos($file, '.gif', $pos) || strpos($file, '.jpg', $pos) || strpos($file, '.bmp', $pos) || strpos($file, '.png', $pos) ))
        {
            $file_s[] = $file;
        }
    }

    if(!empty($file_s))
    {
        asort($file_s);
        $i = 3;
		foreach($file_s as $value)
		{
			$value_tmp = $value;

        	if(strlen($value) > $max)
        	{
        		$half = round(strlen($value) / 2);
        		$value = substr($value, 0, $half-(round($max/2)))."...".substr($value, $half+(round($max/2)), strlen($value));
        	}

			if($i % 3 == 0)
				$return_value	.= "<tr>";

			$return_value	.= "<td width=\"190\">{$value}<br>";

			if($aus_settings->wysiwyg==1 && $aus_settings->mailformat==1)
                $return_value	.= "
				<a href=# onclick=\"javascript: CKEDITOR.instances.text.insertHtml('<img src=".$file_root."/upload/".$value_tmp.">');\" rel=\"nofollow\" onclick=\"this.blur()\" onmouseover=\"roll_over('arrow_up_img_{$i}', 'images/arrow_up_img_over.gif')\" onmouseout=\"roll_over('arrow_up_img_{$i}', 'images/arrow_up_img.gif')\">
                
                <img src=\"images/arrow_up_img.gif\" title=\"".$lang_newsadd_imglink."\" border=\"0\" name=\"arrow_up_img_{$i}\"></a>
                ";
			else
                $return_value	.= "
                <a href=\"javascript:insertcode('&lt;a href=&quot;".$file_root."/upload/{$value_tmp}&quot;&gt;".$lang_newsadd_linkdescr."&lt;/a&gt;');\" onclick=\"this.blur()\" onmouseover=\"roll_over('arrow_up_img_{$i}', 'images/arrow_up_img_over.gif')\" onmouseout=\"roll_over('arrow_up_img_{$i}', 'images/arrow_up_img.gif')\">
                <img src=\"images/arrow_up_img.gif\" title=\"".$lang_newsadd_imglink."\" border=\"0\" name=\"arrow_up_img_{$i}\"></a>

                <a href=\"javascript:insertcode('&lt;img src=&quot;".$file_root."/upload/{$value_tmp}&quot;&gt;');\" onclick=\"this.blur()\" onmouseover=\"roll_over('arrow_up_img_{$i}x', 'images/arrow_up_img_over.gif')\" onmouseout=\"roll_over('arrow_up_img_{$i}x', 'images/arrow_up_img.gif')\">
                <img src=\"images/arrow_up_img.gif\" title=\"".$lang['sendform_image_upload_imgpaste']."\" border=\"0\" name=\"arrow_up_img_{$i}x\"></a>";

			$return_value	.= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"admin.php?s=newsletter&delitem={$value_tmp}\" onClick=\"return confirm('".$lang['sendform_sure']."')\"><img src=\"images/delicon_s.gif\" title=\"Delete\" border=\"0\"></a>";
			$return_value	.= "</td>";


			if($i % 3 == 2)
				$return_value	.= "</tr>";

			$i++;
		}

    }

    $return_value	.= "</table>";

	$return_value	.= "<table cellpadding=\"0\" cellspacing=\"0\">";
	$return_value	.= "<tr><td style=\"height:10px;\"></td></tr>";
	$return_value	.= "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"750px\" height=\"1\"></td></tr>";
	$return_value	.= "<tr><td style=\"height:10px;\"></td></tr>";
	$return_value	.= "</table>";
	

	echo json_encode($return_value);

?>