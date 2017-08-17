<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('logincheck')) die('Error!');

//Newsletter aus Archiv löschen
$delid=$_GET['delid'];
if($delid)
{
	$mysql->query("DELETE FROM $prefix"."_archiv WHERE id='$delid'");
}



echo "<table width=\"100%\"><tr><td>";

    echo "<table>";
    echo "<tr><td><b>".$lang['start_headline']."</b></td></tr>";
    echo "<tr><td style=\"height:8px;\"></td></tr>";
    echo "</table>";

	if($aus_settings->send_oldway==0)
	{

        echo '<table id="captions" width="773px">';
        echo '  <tr>';
        echo '    <td width="15px">'.$lang['dispatchjob_id'].'</td>';
        echo '    <td width="150px">'.$lang['dispatchjob_begin'].'</td>';
        echo '    <td width="150px">'.$lang['dispatchjob_email'].'</td>';
        echo '    <td width="150px">'.$lang['dispatchjob_progress'].'</td>';
        echo '    <td width="150px">'.$lang['dispatchjob_elapsedtime'].'</td>';
        echo '    <td width="150px">'.$lang['dispatchjob_remainingtime'].'</td>';
        echo '    <td width="15px"></td>';
        echo '  </tr>';
        echo '</table>';

        echo '<table id="jobtable" width="773px" cellpadding="0" cellspacing="0">';
        echo '</table>';

        $twidth=744;


        echo "<table>";
        echo "<tr><td style=\"height:30px;\"></td></tr>";
        echo "<tr><td style=\"background-image:url(images/menu_line.gif); background-repeat:repeat-x;\" width=\"".$twidth."\" height=\"1px\"></td></tr>";
        echo "</table><br>";
	}

    echo "<br><table cellspacing=\"0\" cellpadding=\"0\">";


	$get_sent=$mysql->query("SELECT count(id) AS sent_id FROM {$prefix}_archiv");
	$aus_sent=$mysql->fetchObject($get_sent);

	$get_entries=$mysql->query("SELECT count(id) AS entries_id FROM {$prefix}_entries");
	$aus_entries=$mysql->fetchObject($get_entries);

	$get_send_in=$mysql->query("SELECT count(id) AS send_in_id FROM {$prefix}_send_in");
	$aus_send_in=$mysql->fetchObject($get_send_in);

	$get_send_an=$mysql->query("SELECT count(id) AS send_an_id FROM {$prefix}_send_in WHERE answered='1'");
	$aus_send_an=$mysql->fetchObject($get_send_an);

	$view_ids=explode(",",$user_viewed);
	$new_msgs=$aus_send_in->send_in_id-(count($view_ids)-1);

    echo "<tr>";
    echo "<td valign=\"top\"><table>";
    echo "<tr><td><u>".$lang['start_newsletter']."</u></td></tr>";
    echo "<tr><td>".$lang['start_sentnewsletter'].": ".$aus_sent->sent_id."</td></tr>";
    echo "<tr><td>".$lang['start_receivers'].": ".$aus_entries->entries_id."</td></tr>";
    echo "</table></td>";

	echo "<td width=\"100\"></td>";

    echo "<td valign=\"top\"><table>";
    echo "<tr><td><u>".$lang['start_contactform']."</u></td></tr>";
    echo "<tr><td>".$lang['start_allmsg'].": ".$aus_send_in->send_in_id."</td></tr>";
    echo "<tr><td>".$lang['start_answered'].": ".$aus_send_an->send_an_id."</td></tr>";
    echo "<tr><td>".$lang['start_unopen'].": ".$new_msgs."</td></tr>";
    echo "</table></td>";

    echo "</table>";

echo "</td></tr></table>";


	####### Archive #################
	echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"padding-left: 5px;\">";

    echo "<tr><td><u>".$lang['sendform_newsletterarchive'].":</u> <font style=\"font-size:7pt;\">(".$lang['sendform_lastnewsletter'].")</font></td></tr>";
    echo "<tr><td height=\"12\"></td></tr>";

        echo "<tr><td><table cellpadding=\"0\" cellspacing=\"0\">";

		$alimit=10;

		if(empty($_GET['b'])) {$begin=0;}
		else {$begin=$_GET['b'];}

        $get_archiv=$mysql->query("SELECT id, betreff, date_format(date, '%d.%m.%y') as date FROM $prefix"."_archiv WHERE flag=0 ORDER BY id DESC LIMIT $begin,$alimit");
        if($mysql->numRows($get_archiv)!=0)
        {
            while($aus_archiv=$mysql->fetchObject($get_archiv))
            {
                if (strlen($aus_archiv->betreff)>15)
                {
                    $aus_latest_s=substr($aus_archiv->betreff,0,12);
                    $aus_latest_s.="...";
                    echo "<tr><td width=\"68\">".$aus_archiv->date."</td><td width=\"142\"><a href=# onclick=\"archiv('".$file_root."/admin.php?archivid=$aus_archiv->id');\">".stripslashes($aus_latest_s)."</a></td><td><b>»</b> <a href=\"".$inclusion_path."s=$s&delid=$aus_archiv->id\" onClick=\"return confirm('".$lang['sendform_sure']."')\">".$lang['sendform_delete']."</a></td></tr>";
                }
                else
                {
                	echo "<tr><td width=\"68\">".$aus_archiv->date."</td><td width=\"142\"><a href=# onclick=\"archiv('".$file_root."/admin.php?archivid=$aus_archiv->id');\">".stripslashes($aus_archiv->betreff)."</a></td><td><b>»</b> <a href=\"".$inclusion_path."s=$s&delid=$aus_archiv->id\" onClick=\"return confirm('".$lang['sendform_sure']."')\">".$lang['sendform_delete']."</a></td></tr>";
                }
            }

            $begin=$_GET['b']+$alimit;
            $begin_back=$_GET['b']-$alimit;

            $get_check_next=$mysql->query("SELECT id FROM $prefix"."_archiv ORDER BY id DESC LIMIT $begin,$alimit");
            $get_check_back=$mysql->query("SELECT id FROM $prefix"."_archiv ORDER BY id DESC LIMIT $begin_back,$alimit");

			echo "</table>";
			echo "<table cellpadding=\"0\" cellspacing=\"0\">";
            echo "<tr><td height=\"12\"></td></tr>";
            echo "<tr><td>";

            if($mysql->numRows($get_check_back)!=0)
            	echo "<b>&laquo;</b> <a href=\"admin.php?s=$s&b=".$begin_back."\">".$lang['sendform_prev']."</a>";

            if($mysql->numRows($get_check_back)!=0 && $mysql->numRows($get_check_next)!=0)
            echo " | ";

            if($mysql->numRows($get_check_next)!=0)
            	echo "<a href=\"admin.php?s=$s&b=".$begin."\">".$lang['sendform_next']."</a> <b>&raquo;</b>";
            echo "</td></tr>";
        }
        else
        {
            echo "<tr><td>".$lang['sendform_nothing']."</td></tr>";
        }
        echo "</table></td></tr>";

	echo "</table>";
    ###################################################


?>