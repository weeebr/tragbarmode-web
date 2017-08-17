<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


    $id_group = $_POST['id_group'];

    $filename="usolved_nletter_group_{$id_group}.sql";
    if($fp=@fopen(dirname(__FILE__)."/../settings/".$filename,"w+"))
    {


    ########### SQL Dump ###########

    $date=date("Y-m-d H:i:s");

    /****************************************************************/
    /* Generate Dump Header */

    $get_groupname=$mysql->query("SELECT * FROM {$prefix}_groups WHERE id='{$id_group}'");
    $aus_groupname=$mysql->fetchObject($get_groupname);

$data.="#
# www.usolved.net
# NLetter - Database Backup
# Date: $date
# Database: $db
#
# Mode: E-Mails from group {$aus_groupname->groupname} (id: {$id_group})


";

$data.="


#********* E-Mail Adresses *********

";
	$row[0] = "{$prefix}_entries";
    $get_groups = $mysql->query("SELECT * FROM {$prefix}_group_def WHERE id_group='{$id_group}'");
    while($aus_groups = $mysql->fetchObject($get_groups))
    {

        ##### INSERTS #####

        $get_list_content=$mysql->query("SELECT * FROM $row[0] WHERE id='{$aus_groups->id_user}'");
        $aus_list_content=$mysql->fetchArray($get_list_content);

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


#********* Groups Definitions *********

";

	$row[0] = "{$prefix}_group_def";
    $get_list_content=$mysql->query("SELECT * FROM $row[0] WHERE id_group='{$id_group}'");
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