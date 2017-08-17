<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

require(dirname(__FILE__)."/settings/connect.php");
require(dirname(__FILE__)."/inc/user_check.php");

echo "<html>";
echo "<head>";
echo "<title>NLetter - Admin</title>";
echo "<link rel=\"stylesheet\" href=\"settings/styles.css\" type=\"text/css\">";

echo '<script type="text/javascript" src="inc/js/xmlhttp.js"></script>';
echo '<script type="text/javascript" src="inc/js/jobtable.js"></script>';

echo "<body onload=\"getMailJobs()\">";

    echo '<table id="captions" width="773px" cellpadding="0" cellspacing="0">';
    echo '  <tr>';
    echo '    <td width="15px">'.$lang['dispatchjob_id'].'</td>';
    echo '    <td width="150px">'.$lang['dispatchjob_begin'].'</td>';
    echo '    <td width="150px">'.$lang['dispatchjob_email'].'</td>';
    echo '    <td width="150px">'.$lang['dispatchjob_progress'].'</td>';
    echo '    <td width="150px">'.$lang['dispatchjob_elapsedtime'].'</td>';
    echo '    <td width="150px">'.$lang['dispatchjob_remainingtime'].'</td>';
    echo '    <td width="15px"></td>';
    echo '    <td width="15px"></td>';
    echo '  </tr>';
    echo '</table>';

    echo '<table id="jobtable" width="773px" cellpadding="0" cellspacing="0">';
    echo '</table>';

echo "</body>";
echo "</html>";

?>