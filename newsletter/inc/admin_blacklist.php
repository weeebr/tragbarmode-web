<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

	if($_GET['delid'])
	{
		$delid=$_GET['delid'];
		$mysql->query("DELETE FROM {$prefix}_blacklist WHERE id='".$delid."'");
	}
	if($_GET['delall'])
	{
		$mysql->query("DELETE FROM {$prefix}_blacklist");

	}
	echo "<table>";
	echo "<tr><td><b>".$lang['admin_bl_blocked'].":</b></td></tr>";
	
    $get_bl=$mysql->query("SELECT * FROM {$prefix}_blacklist ORDER BY mail");
    if($mysql->numRows($get_bl)!=0)
    {
        $near_9="#E7EBEE";
        $near_0="#F1F1F1";

        while($aus_bl=$mysql->fetchObject($get_bl))
        {
            echo "<tr bgcolor=\"$near_9\" onmouseover=\"javascript:this.bgColor='$near_0';\" onmouseout=\"javascript:this.bgColor='$near_9';status='';return true;\"><td>".$aus_bl->mail."</td><td><a href=\"".$file_root."/admin.php?s=$s&blacklist=".$_GET['blacklist']."&delid=".$aus_bl->id."\" onClick=\"return confirm('".$lang['admin_bl_sure']."?')\"><img src=\"".$file_root."/images/delicon_s.gif\" border=\"0\" title=\"".$lang['admin_bl_del']."\"></a></td></tr>";
        }

	echo "<tr><td height=\"10\"></td></tr>";
	echo "<tr><td><a href=\"".$file_root."/admin.php?s=$s&blacklist=".$_GET['blacklist']."&delall=ok\" onClick=\"return confirm('".$lang['admin_bl_sure']."?')\">".$lang['admin_bl_alldel']."</a></td></tr>";
    }
    else
    {
    	echo "<tr><td>".$lang['admin_bl_sofar']."</td></tr>";
    }
    
    echo "</table>";
?>