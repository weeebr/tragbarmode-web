<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


    function parse_sql($sql)
    {
    $sql=preg_replace("/\r/s", "\n", $sql);
    $sql=preg_replace("/[\n]{2,}/s", "\n", $sql);
    $lines=explode("\n", $sql);
    $queries=array();
    $in_query=0;
    $i=0;

        foreach($lines as $line)
        {
        $line=trim($line);

            if(!$in_query)
            {
                if(preg_match("/^CREATE/i", $line))
                {
                $in_query=1;
                $queries[$i] = $line;
                }
                else if(!empty($line) && $line[0] != "#")
                {
                $queries[$i]=preg_replace("/;$/i", "", $line);
                $i++;
                }
            }
            else if($in_query)
            {
                if(preg_match("/^[\)]/", $line))
                {
                $in_query=0;
                $queries[$i].=preg_replace("/;$/i", "", $line);
                $i++;
                }
                else if(!empty($line) && $line[0] != "#")
                {
                $queries[$i].=$line;
                }
            }
        }

    return $queries;
    }

	//--------------------------------------------

    $up_file_db=$_POST['up_file_db'];
    $temp_dl1=$_FILES['temp_dl1']['tmp_name'];
    $temp_dl1_size=$_FILES['temp_dl1']['size'];
    if($up_file_db)
    {

        if($temp_dl1_size!="")
        {
        $size=$temp_dl1_size;                           // Grφίe der Datei
        $size_dl1_up=$size;
        $size_dl1_up=round(($size_dl1_up/1024),2);

        $name_file=strtolower($_FILES['temp_dl1']['name']);         // Der Originalname
        $name_file=strtolower($name_file);
        $name_file=strtr($name_file," ","_");

              if($size!=0)
              {
              $file=$temp_dl1;

                //Buffer starten
                ob_start();
                @ob_implicit_flush(0);
                if(eregi("\.gz", $file))
                {
                readgzfile($file);
                }
                else
                {
                readfile($file);
                }
                $content=ob_get_contents();
                ob_end_clean();


                if(!empty($content))
                {
                    $split_file=parse_sql($content);
                    foreach($split_file as $sql)
                    {
                        $sql=trim($sql);
                        if(!empty($sql) && $sql[0] != "#")
                        {
                        	@set_time_limit(1200);
                        	$mysql->query($sql);
                         }
                    }
                }
                else
                {
                $import_msg="Error";
                $error="ok";
                }

				if(!$error)
				{
                    $import_msg="Erfolgreich importiert!";

                  	### Mail Adressen der Blacklist wieder entfernen ###
                    $get_bl=$mysql->query("SELECT * FROM $prefix"."_blacklist");
                    while($aus_bl=$mysql->fetchObject($get_bl))
                    {
                        $get_id=$mysql->query("SELECT id FROM $prefix"."_entries WHERE mail='".$aus_bl->mail."'");
                        $aus_id=$mysql->fetchObject($get_id);
                        $mysql->query("DELETE FROM $prefix"."_entries WHERE mail='".$aus_id->id."'");
                        $mysql->query("DELETE FROM $prefix"."_group_def WHERE id_user='".$aus_id->id."'");
                    }
              	}
              }
              else
              {
              $import_msg="Error!";
              }
        }
    }

?>