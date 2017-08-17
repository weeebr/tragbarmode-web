<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


    $filename="usolved_nletter.sql";
    if($fp=@fopen(dirname(__FILE__)."/../settings/".$filename,"w+"))
    {
    
	$export_setting_emptytable = $_POST['export_setting_emptytable'];

    ########### SQL Dump ###########

    $date=date("Y-m-d H:i:s");
    if($export_setting_emptytable == 1) $set_empty = true;


	if($set_empty == true) $info_mode = "With Empty Table";
	else  $info_mode = "Without Empty Table";

    /****************************************************************/
    /* Generate Dump Header */


$data.="#
# www.usolved.net
# NLetter - Database Backup
# Date: $date
# Database: $db
#
# Mode: $info_mode


";

	/****************************************************************/
	/* Generate Empty Tables if selected */

	if($set_empty == true)
	{
$data.="

#********* Empty Tables *********

";
		$data.="TRUNCATE TABLE {$prefix}_entries;\n";
		$data.="TRUNCATE TABLE {$prefix}_groups;\n";
		$data.="TRUNCATE TABLE {$prefix}_group_def;\n";
	}


	$table_array[0][0] = "E-Mail Adresses";
	$table_array[0][1] = "{$prefix}_entries";

	$table_array[1][0] = "Groups";
	$table_array[1][1] = "{$prefix}_groups";

	$table_array[2][0] = "Groups Definitions";
	$table_array[2][1] = "{$prefix}_group_def";



	/****************************************************************/
	/* Generate Inserts */

foreach($table_array AS $key=>$value_headline)
{

$data.="


#********* {$table_array[$key][0]} *********

";
	foreach($value_headline AS $value_tablename)
	{

        $result=$mysql->query("SHOW TABLES LIKE '{$value_tablename}'");
        while($row=$mysql->fetchRow($result))
        {

            ##### INSERTS #####

			if($row[0] == "{$prefix}_groups")
			{
                if($set_empty == true)
                    $get_list_content=$mysql->query("SELECT * FROM $row[0]");
                else
                    $get_list_content=$mysql->query("SELECT * FROM $row[0] WHERE groupname<>'Standard'");
			}
			else
				$get_list_content=$mysql->query("SELECT * FROM $row[0]");

            while($aus_list_content=$mysql->fetchArray($get_list_content))
            {
            $i=1;
            $j=1;
$data.="INSERT INTO $row[0] (";

                $get_db_tab_n=$mysql->query("SHOW COLUMNS FROM $row[0]");
                while($aus_tab_n=$mysql->fetchRow($get_db_tab_n))
                {

                    if($i!=1)$data.=",";
                    $data.=$aus_tab_n[0];
                    $i++;

                }

$data.=") VALUES (";

                $get_db_tab=$mysql->query("SHOW COLUMNS FROM $row[0]");
                while($aus_tab=$mysql->fetchRow($get_db_tab))
                {

                    if($j!=1)$data.=",";
                    $content=str_replace("\n","\\n",$aus_list_content[$aus_tab[0]]);
$data.="'".$content."'";
                    $j++;

                }
$data.=");
";
            }

$data.="

";
            unset($data_temp);
        }

	}
}


	/****************************************************************/
	/* SQL Dump save */

    fwrite($fp,$data);
    fclose($fp);

    header("Content-Disposition: atachment; filename=".$filename);
    header("Content-Type: application/octet-stream");
    header("Content-Length: ".filesize(dirname(__FILE__)."/../settings/".$filename));
    header("Pragma: no-cache");
    header("Expires: 0");

    $fp=fopen(dirname(__FILE__)."/../settings/".$filename,"r");
    print fread($fp,filesize(dirname(__FILE__)."/../settings/".$filename));
    fclose($fp);

    unlink(dirname(__FILE__)."/../settings/".$filename);
    exit();
    
    }
    else
    	echo $lang['exim_error'];
?>