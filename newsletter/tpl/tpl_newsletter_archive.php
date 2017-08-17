<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

/* Security Check */
if(!defined('template')) die('You can\'t access templates directly!');




/* Output in the Popup */

if(!empty($ARCHIVEID))
{
    $get_archive = $mysql->query("SELECT * FROM {$prefix}_archiv WHERE id={$ARCHIVEID}");
    if($mysql->numRows($get_archive) != 0)
    {
    	$out_archive = $mysql->fetchObject($get_archive);

    	echo "<table>";
    	echo "<tr><td><b>".$out_archive->betreff."</b></td></tr>";
		echo "<tr><td>".$out_archive->msg."</td></tr>";
    	echo "</table>";
    }
}
else
{

    /* Loop to get all sent newsletters*/

    $LIMIT = 5;
    $get_archive = $mysql->query("SELECT id,id_group,absender,betreff,msg,empf,date_format(date, '%d.%m.%Y') as date_new FROM {$prefix}_archiv WHERE flag=0 ORDER BY date DESC LIMIT 0,{$LIMIT}");
    while($out_archive = $mysql->fetchObject($get_archive))
    {
        $get_groupname=$mysql->query("SELECT groupname FROM {$prefix}_groups WHERE id='$out_archive->id_group'");
        $aus_groupname=$mysql->fetchObject($get_groupname);
        $text=str_replace("\n", "<br>", $out_archive->msg);


        /* HTML Output */


        /*
        //DESIGN: 1

        echo "<table>";
        echo "<tr><td><b>".$lang['admin_archive_date'].":</b></td><td>".$out_archive->date."</td></tr>";
        echo "<tr><td><b>".$lang['admin_archive_subject'].":</b></td><td>".$out_archive->betreff."</td></tr>";
        echo "<tr><td valign=\"top\"><b>".$lang['admin_archive_msg'].":</b></td><td>".$text."</td></tr>";
        echo "</table>";

        echo "<br>";

        */


        //DESIGN: 2

        echo "<table>\n";
        echo "<tr>\n";
        echo "<td><b>".$lang['admin_archive_date'].":</b></td><td>".$out_archive->date_new."</td>\n";
        echo "<td><b>".$lang['admin_archive_subject'].":</b></td><td><a href=# onclick=\"newsletter('".$file_root."/newsletter.php?showArchive=true&archiveid=".$out_archive->id."');\">".$out_archive->betreff."</a></td>\n";
        echo "</tr>\n";
        echo "</table>\n";

        echo "<br>";
    }

}


?>