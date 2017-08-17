<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


/* Security Check */
if(!defined('logincheck')) die('Error!');

if(defined('admin'))
{

    $getContent = $mysql->query("SELECT * FROM {$prefix}_info");
    $outContent = $mysql->fetchObject($getContent);

    if(!empty($_POST['licence_ok']))
    {
		include("inc/admin_checksum_check.php");
		
        $licence_domain  			= $_POST['licence_domain'];
        $licence_serialnumber     	= $_POST['licence_serialnumber'];
		$licence_script				= $outContent->licencescript;

        $mysql->query("UPDATE {$prefix}_info SET licencedomain='{$licence_domain}', licencekey='{$licence_serialnumber}'");
		
		if(checksum_check($licence_domain, $licence_serialnumber, $licence_script ))
		{
			if(substr($licence_serialnumber, 22, 1) <= 4)
				$licencecopyright = 0;
			else
				$licencecopyright = 1;
				
			$mysql->query("UPDATE {$prefix}_info SET licencevalid='1', licencecopyright='$licencecopyright'");
			
		}
		else
			$mysql->query("UPDATE {$prefix}_info SET licencevalid='0'");
			
		$licenceupdated	= $lang['admin_licence_updated']."!";
    }
	
    $getContent = $mysql->query("SELECT * FROM {$prefix}_info");
    $outContent = $mysql->fetchObject($getContent);

    echo "<form action=\"\" method=\"post\" name=\"licence_form\" id=\"licence_form\" autocomplete=\"off\">";

    echo "<table align=\"center\">";

    echo "<tr><td class=\"headline\">".$lang['admin_licence_headline']."</td></tr>";

    echo "<tr><td style=\"height: 10px;\"></td></tr>";
    echo "<tr><td>".$lang['admin_licence_domain'].":</td><td><input type=\"text\" name=\"licence_domain\" id=\"licence_domain\" value=\"{$outContent->licencedomain}\" style=\"width: 186px;\" /></td></tr>";
    echo "<tr><td>".$lang['admin_licence_key'].":</td><td><input type=\"text\" name=\"licence_serialnumber\" id=\"licence_serialnumber\" value=\"{$outContent->licencekey}\" style=\"width: 186px;\" maxlength=\"24\" /></td></tr>";
    echo "<tr><td></td><td width=\"230\"><div id=\"serialnumber_correct\"></div></td></tr>";
	echo "<tr><td style=\"height: 10px;\"></td></tr>";
    echo "<tr><td></td><td><input type=\"submit\" name=\"licence_ok\" value=\"{$lang['admin_licence_submit']}\" class=\"admin\"></td></tr>";
	echo "<tr><td></td><td>{$licenceupdated}</td></tr>";
	
	
	
    echo "</table>";

    echo "</form>";

}
?>