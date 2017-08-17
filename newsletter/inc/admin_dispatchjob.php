<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


  function microtime_float()
  {
    list($usec, $sec) = explode(' ', microtime());
    $usec = ceil( (float)$usec*1000 );
    $usec = str_pad($usec, 3, "0", STR_PAD_LEFT);
    return $sec . $usec;
  }

  function execute_job($subdir, $timestamp)
  {
    # Executer starten
    $hSocket = fsockopen($_SERVER['HTTP_HOST'], $_SERVER['SERVER_PORT']);
    fwrite($hSocket,
           "GET " . dirname($_SERVER['REQUEST_URI']) . "/".$subdir."admin_executejob.php?job={$timestamp} HTTP/1.1\r\n"
         . "Host: {$_SERVER['HTTP_HOST']}\r\n"
         . "Connection: close\r\n\r\n");

    //DEBUG
    //while (!feof($hSocket)) echo fread($hSocket, 8192);

    fclose($hSocket);
  }


  if (array_key_exists('ok_s', $_POST) || array_key_exists('ok_try', $_POST) || array_key_exists('resume', $_GET))
  {

    # Job-ID generieren und in der SQL-DB einen neuen Mailjob erzeugen
    if(array_key_exists('resume', $_GET))
	{
        # Durch Direktaufruf fehlende Informationen holen
        require('../settings/connect.php');
        $get_settings=$mysql->query("SELECT * FROM {$prefix}_settings");
        $aus_settings=$mysql->fetchObject($get_settings);

        # charset auslesen
        $get_charset=$mysql->query("SELECT * FROM {$prefix}_charset WHERE active=1");
        $aus_charset=$mysql->fetchObject($get_charset);

        $timestamp = $_GET['resume'];
        $get_emailcontent = $mysql->query("SELECT * FROM {$prefix}_archiv WHERE mailjobTimestamp='{$timestamp}'");
        $aus_emailcontent = $mysql->fetchObject($get_emailcontent);

        $get_jobcontent = $mysql->query("SELECT * FROM {$prefix}_mailjobs WHERE timestamp='{$timestamp}'");
        $aus_jobcontent = $mysql->fetchObject($get_jobcontent);


        # Benötigte Daten aus DB holen
        $from_tmp 		= $aus_emailcontent->absender;
        $from_tmp 		= explode(";", $from_tmp);
        if(is_array($from_tmp))
        {
        	$from_name	= $from_tmp[0];
        	$from_email	= $from_tmp[1]; 
        }
        
        $subject 		= $aus_emailcontent->betreff;
        $id_group		= $aus_emailcontent->id_group;
        $message 		= stripslashes($aus_emailcontent->msg);
        $attachments 	= $aus_emailcontent->attachments;
        $id_archive 	= $aus_emailcontent->id;

        if(!empty($attachments))
        {
        	$attachments = explode(";", $attachments);
        	if(is_array($attachments))
        	{
        		$i = 0;
                foreach($attachments as $value)
                {
                	if(!empty($value))
                	{
                        $value_output = explode(":", $value);

                        # Speicher Dateiinhalt und Name
                        $file = fopen(dirname(__FILE__)."/../upload/".$value_output[0], 'rb');
                        $data = fread($file, filesize(dirname(__FILE__)."/../upload/".$value_output[0]));
                        fclose($file);

                        $file_array_content[$i]['data'] = $data;
                        $file_array_content[$i]['name'] = $value_output[0];
                        $file_array_content[$i]['type'] = $value_output[1];

                        $i++;
                    }
                }
            }
        }


        $resume_id = $aus_jobcontent->lastID;
        $mail_sent = $aus_jobcontent->mailSent;

        # Momentane Session speichern und schließen
        $old_sessname = session_name();
        session_write_close();

        # Eigene interne Session für den Mailjob erstellen
        session_name($timestamp);
        session_id($timestamp);
        @session_start();

		$intervall = $aus_settings->intervall*1000; //in microsekunden umrechnen

        # Benötigte Daten für den Executer via $_SESSION übergeben
        $_SESSION['job'] =
        array('from'       => $from_email,
            'from_name'  => $from_name,
            'subject'    => $subject,
            'message'    => $message,
            'id_group'   => $id_group,
            'mailer'     => ($aus_settings->send_type) ? 'relaymail' : 'sendmail',
            'mailformat' => $aus_settings->mailformat,
            'acturl'     => $aus_settings->activation_url,
            'try_email'  => $_POST['ok_try'],
            'smtp_relay' => $smtp_relay=$aus_settings->smtp_relay,
            'smtp_port'  => $smtp_port=$aus_settings->smtp_port,
            'smtp_user'  => $smtp_user=$aus_settings->smtp_user,
            'smtp_pw'    => $smtp_pw=$aus_settings->smtp_pw,
            'delay'      => $intervall,
            'charset'    => $aus_charset->charset,
            'resume_id'  => $resume_id,
            'mail_sent'  => $mail_sent,
            'attachments'=> $file_array_content,
            'alternatetext'=> $aus_settings->default_alternatetext,
            'id_archive'=> $id_archive,
        );

        execute_job($subdir, $timestamp);

        # Session für den Executer freigeben und vorherige Session wiederherstellen
        session_write_close();
		session_name($old_sessname);
	}
	else
	{

        # charset auslesen
        $get_charset=$mysql->query("SELECT * FROM {$prefix}_charset WHERE active=1");
        $aus_charset=$mysql->fetchObject($get_charset);

        # Benötigte Daten aus POST formular holen
        $emailname 		= $_POST['emailname'];
        
        $get_sender 	= $mysql->query("SELECT * FROM {$prefix}_senderaddress WHERE id='{$emailname}'");
        $aus_sender 	= $mysql->fetchObject($get_sender);
		$from_name		= $aus_sender->sender_name;
		$from_email		= $aus_sender->sender_email;
		$from_tmp		= $from_name.";".$from_email;
		
		if(strstr($from_email, "usolved") == true)
        {
        	echo "Nicht erlaubte Adresse!"; exit();
		
		}		
		
        $subject 		= $_POST['subject'];
        $id_group_tmp 	= $_POST['id_group'];
        $file_array 	= unserialize(stripslashes($_POST['file_array_post']));

		if(is_array($file_array))
		{
			$i = 0;
			foreach($file_array as $value)
			{
				$value_output = explode(":", $value);

				# Speicher Dateiinhalt und Name
				$file = fopen(dirname(__FILE__)."/../upload/".$value_output[0],'rb');
                $data = fread($file, filesize(dirname(__FILE__)."/../upload/".$value_output[0]));
                fclose($file);

				$file_array_content[$i]['data'] = $data;
				$file_array_content[$i]['name'] = $value_output[0];
				$file_array_content[$i]['type'] = $value_output[1];

				$attachments .= $value.";";

				$i++;
			}
		}

        $message = stripslashes(str_replace("\r\n", "\n", $_POST['text']));

		if(!empty($message_addednews))
			$message .= $message_addednews;

        $resume_id = 0;
        $mail_sent = 0;

        # Archiv
        $datum_n = date('Y-m-d H:i:s');
        $message_db = str_replace("'", "\'", $message);
        $subject_db = str_replace("'", "\'", $_POST['subject']);

        $subdir = "inc/";           //diese datei wird von verschiedenen ebene aufgerufen, deswegen...


        foreach($id_group_tmp AS $id_group)
        {
            $timestamp = microtime_float();
            mysql_query("INSERT INTO {$prefix}_mailjobs (timestamp,mailSent,mailTotal,finished) VALUES ({$timestamp},0,0,0)");


            $mysql->query("INSERT INTO {$prefix}_archiv "
                    .   "(id_group,absender,betreff,msg,flag,date,mailjobTimestamp,attachments) "
                    . "VALUES "
                    .   "('{$id_group}','{$from_tmp}','{$subject_db}','{$message_db}',1,'{$datum_n}',{$timestamp},'{$attachments}')"
            );

            $id_archive = mysql_insert_id();


            # Momentane Session speichern und schließen
            $old_sessname = session_name();
            session_write_close();

            # Eigene interne Session für den Mailjob erstellen
            session_name($timestamp);
            session_id($timestamp);
            @session_start();

			$intervall = $aus_settings->intervall*1000; //in microsekunden umrechnen

            # Benötigte Daten für den Executer via $_SESSION übergeben
            $_SESSION['job'] =
              array('from'       => $from_email,
                    'from_name'  => $from_name,
                    'subject'    => $subject,
                    'message'    => $message,
                    'id_group'   => $id_group,
                    'mailer'     => ($aus_settings->send_type) ? 'relaymail' : 'sendmail',
                    'mailformat' => $aus_settings->mailformat,
                    'acturl'     => $aus_settings->activation_url,
                    'try_email'  => $_POST['ok_try'],
                    'smtp_relay' => $smtp_relay=$aus_settings->smtp_relay,
                    'smtp_port'  => $smtp_port=$aus_settings->smtp_port,
                    'smtp_user'  => $smtp_user=$aus_settings->smtp_user,
                    'smtp_pw'    => $smtp_pw=$aus_settings->smtp_pw,
                    'delay'      => $intervall,
                    'charset'    => $aus_charset->charset,
                    'resume_id'  => $resume_id,
                    'mail_sent'  => $mail_sent,
                    'attachments'=> $file_array_content,
                    'alternatetext'=> $aus_settings->default_alternatetext,
                    'id_archive'=> $id_archive,
              );


            execute_job($subdir, $timestamp);

            # Session für den Executer freigeben und vorherige Session wiederherstellen
            session_write_close();
            session_name($old_sessname);

        }
	}



	if(!array_key_exists('abort', $_GET))
	{
        echo '<table style="padding-left:6px;" cellpadding="0" cellspacing="0">';

        echo '<tr><td><b>'.$lang['dispatchjob_successadded'].'!</b></td></tr>';
        echo '<tr><td>'.$lang['dispatchjob_successinfo'].'</td></tr>';
        echo '<tr><td style="height:10px;"></td></tr>';
        echo "</table>";

        echo '<iframe src="admin_jobtable.php" width="100%" height="50" frameborder="0" marginheight="0" marginwidth="0" style="padding-left:2px;">';
        echo '</iframe>';

        echo "<table style=\"padding-left:4px;\">";
        echo "<tr><td style=\"height:4px;\"></td></tr>";
        echo "<tr><td style=\"background-image:url(images/menu_line.gif);\" width=\"765\" height=\"1\"></td></tr>";
        echo "</table>";
	}
  }
?>