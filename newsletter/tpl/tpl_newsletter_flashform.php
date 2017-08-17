<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################



	if(!empty($STYLE_BGCOLOR))
		$bgc = "0x".substr($aus_settings->layout_bgcolor,1);
	if(!empty($STYLE_FONT_COLOR))
		$fc = "0x".substr($STYLE_FONT_COLOR, 1);

	echo "<table>\n";
    echo "<tr><td>
            <object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\"105\" height=\"224\">
            <param name=\"movie\" value=\"".$file_root."/newsletter.swf\">
            <param name=\"quality\" value=\"high\">
            <param name=\"flashvars\" value=\"n=".$aus_settings->form_name."&g=".$aus_settings->group_choice."&i=".$aus_settings->deactivation."&l=".$aus_language->id."&b=".$bgc."&f=".$fc."\">
            <embed src=\"".$file_root."/newsletter.swf\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"105\" height=\"224\" flashvars=\"n=".$aus_settings->form_forename."&g=".$aus_settings->group_choice."&i=".$aus_settings->deactivation."&l=".$aus_language->id."&b=".$bgc."&f=".$fc."\"></embed>
            </object>

    </td></tr>\n";
    echo "</table>\n";

?>