<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');


/* Output after deleted E-Mail */

if($SET_UNLINKED == "form")
{
    echo "<form action=\"".$FORM_URL."\" method=\"post\">";
    echo "<table>";
    echo "<tr><td>".$lang['onl_suretounsubscribe']."</td></tr>";
    echo "<tr><td><input type=\"submit\" name=\"unlink_ok\" value=\"".$lang['onl_suretounsubscribe_yes']."\"></td></tr>";
    echo "<tr><td><input type=\"hidden\" name=\"unlink_value\" value=\"{$UNLINK_MAIL}\"></td></tr>";
    echo "</form>";
}
else if($SET_UNLINKED == "success")
	echo "<table><tr><td style=\"".$STYLE_FONT."\">".$lang['onl_unsubscribed']."</td></tr></table>";
else if($SET_UNLINKED == "failure")
	echo "<table><tr><td style=\"".$STYLE_FONT."\">".$lang['onl_nomail']."!</td></tr></table>";


/* Output after unlocked E-Mail */

if($SET_UNLOCKED == "success")
	echo "<table><tr><td style=\"".$STYLE_FONT."\">".$lang['onl_emailunlocked']."!</td></tr></table>";
else if($SET_UNLOCKED == "failure")
	echo "<table><tr><td style=\"".$STYLE_FONT."\">".$lang['onl_wrongid']."</td></tr></table>";


/* Output after unsubscribe */

if(!empty($unsubscribe_message))
	echo "<table><tr><td style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">".$unsubscribe_message."</td></tr></table>";


/* Output after subscribe */

if(!empty($subscribe_message))
	echo "<table><tr><td style=\"".$STYLE_PADDING." ".$STYLE_FONT."\">".$subscribe_message."</td></tr></table>";


?>