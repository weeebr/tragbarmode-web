<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');



if(!empty($SHOWEMAILID))
{
    $get_archive = $mysql->query("SELECT * FROM {$prefix}_archiv WHERE id={$SHOWEMAILID}");
    if($mysql->numRows($get_archive) != 0)
    {
    	$out_archive 	= $mysql->fetchObject($get_archive);
		$message		= $out_archive->msg;
		$betreff		= $out_archive->betreff;


        $message = str_replace('\"', '"', $message);
        //$message = str_replace('<BR>', '', $message);
        $message = str_replace('{TITLE_EXPRESSION}', $aus_settings->replace_form_expression_title, $message);
        $message = str_replace('{NAME_EXPRESSION}', $aus_settings->replace_form_expression_name, $message);
        $message = str_replace('{SHOWEMAIL_LINK}', "{$aus_settings->activation_url}/newsletter.php?showemail=...", $message);
        $message = str_replace('{TITLE}', 'Neutrum', $message);
        $message = str_replace('{FORENAME}', 'Vorname', $message);
        $message = str_replace('{SURNAME}', 'Nachname', $message);
        $message = str_replace("{EMAIL}", $zieladdi, $message);
        $message = str_replace("{GROUPS}", "Gruppe", $message);
        $message = str_replace("{UNSUBSCRIBE_LINK}", $activation_url."/newsletter.php?unlink_mail=...", $message);
        $message = str_replace("{PROFILE_LINK}", $activation_url."/newsletter.php?profile_id=...", $message);
        $message = str_replace("{SHOWEMAIL_LINK}", $activation_url."/newsletter.php?showemail=...", $message);

    	echo "<table>";
    	echo "<tr><td><b>".$betreff."</b></td></tr>";
		echo "<tr><td>".$message."</td></tr>";
    	echo "</table>";
    }
}


?>