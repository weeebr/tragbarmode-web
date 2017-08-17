<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');


    echo "</td></tr>";
	
	if( (!$VALID && !$COPYRIGHT_TAG) || (!$VALID && $COPYRIGHT_TAG) || ($VALID && $COPYRIGHT_TAG)  )
	{
		echo "<tr><td class=\"output\" style=\"height:4px;\"></td></tr>\n";

		echo "<tr><td><table>\n";
		echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">NLetter  v".$VERSION_INFO."</td></tr>\n";
		echo "<tr><td class=\"output\" style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">&copy; <a onclick=\"window.open(this.href,'_blank');return false;\" href=\"http://www.usolved.net\" class=\"output\" style=\"".$STYLE_FONT." font-weight: bold;\">USOLVED</a></td></tr>\n";
		echo "</table></td></tr>\n";
	}
    
    echo "</table>\n";

echo "</body>\n";
echo "</html>";

?>
