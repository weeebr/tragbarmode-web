<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

  require('../settings/connect.php');
  require('admin_relaymail_funcs.php');
  require('admin_dynamic_code.php');

  # read settings
  $get_settings = $mysql->query("SELECT * FROM {$prefix}_settings");
  $aus_settings = $mysql->fetchObject($get_settings);

  $aus_info	 		= $mysql->fetchObject($mysql->query("SELECT * FROM {$prefix}_info"));
  $VALID			= $aus_info->licencevalid;
  $COPYRIGHT_TAG	= $aus_info->licencecopyright;
  

  function microtime_float()
  {
    list($usec, $sec) = explode(' ', microtime());
    $usec = ceil( (float)$usec*1000 );
    $usec = str_pad($usec, 3, "0", STR_PAD_LEFT);
    return $sec . $usec;
  }

  if ($get_language=$mysql->query("SELECT * FROM {$prefix}_language WHERE language_aktiv='1'"))
  {
    $aus_language = $mysql->fetchObject($get_language);
    require("../settings/{$aus_language->language_file}");
  }
  else
    die();

  global $lang;
  error_reporting(0);

  # continue the created job from admin_dispatchjob.php to read the job-data
  session_name($_GET['job']);
  session_id($_GET['job']);
  session_start();

  # Sicherstellen, dass alle Daten korrekt eingelesen worden konnten
  if (!array_key_exists('job', $_SESSION))
    die();
  else
    $job = $_SESSION['job'];


  if(!empty($job['attachments']) && is_array($job['attachments']))
  	$attachment = true;

  # Da mail() einige Zeit beanspruchen kann, und diese im Gegensatz zu relaymail() dem
  # Zeitlimit angerechnet wird, muss eben jenes nun deaktiviert werden
  set_time_limit(0);
  ignore_user_abort(true);

  # Browser disconnecten, die PHP-Instanz läuft dank ignore_user_abort() trotzdem weiter
  header('HTTP/1.1 404 Not Found');
  ob_flush();
  flush();

  # Zeitverschiebung berechnen
  $timezone = abs(date('Z'));
  $timezone = ($timezone/3600)*100 + ($timezone%3600)/60;

  $headerdate = sprintf('%s %s%04d', date('D, j M Y H:i:s'), (date('Z') < 0) ? '-' : '+', $timezone);

  # Boundary string generieren
  $semi_rand = md5(time());
  $grenze = "==Multipart_Boundary_x{$semi_rand}x";


  # Header generieren
  $header  = "";
  $header .= "Return-Path: <{$job['from']}>\n";
  $header .= "Date: {$headerdate}\n";
  $header .= "From: {$job['from_name']} <{$job['from']}>\n";
  $header .= "X-Priority: 3\n";
  $header .= "X-Mailer: PHPmailer [version 1.8]\n";
  $header .= "MIME-Version: 1.0\n";

  if($attachment == false)
  {
    
    
    $header .= "Content-Transfer-Encoding: 8bit\n";
  	$header .= $job['mailformat']
               ? "Content-type: text/html; charset=\"{$job['charset']}\"\n"
               : "Content-type: text/plain; charset=\"{$job['charset']}\"\n";
			   
			   
    /*     
		//TEMP TEST MULTIPART
		
		if($job['mailformat'] == 1)
		{
			$job['alternatetext'] = str_replace('{SHOWEMAIL_LINK}', "{$job['acturl']}/newsletter.php?showemail={$job['id_archive']}", $job['alternatetext']);
		
			$header .= "Content-Type: multipart/alternative;\n\tboundary=\"$grenze\"\n";
			
			$message_before .= "\n--$grenze\n";
			$message_before .= "Content-type: text/plain; charset=\"{$job['charset']}\"\n";
			$message_before .= "Content-Transfer-Encoding: 8bit\n";
			$message_before .= $job['alternatetext']; //text nachricht variabel
			$message_before .= "\n--$grenze\n";
			$message_before .= "Content-type: text/html; charset=\"{$job['charset']}\"\n";
			$message_before .= "Content-Transfer-Encoding: 8bit\n";		
				//html nachricht variabel	
			$message_after   = "\n\n--".$grenze."--";
		}
		else
		{
			$header .= "Content-Transfer-Encoding: 8bit\n";
			$header .= "Content-type: text/plain; charset=\"{$job['charset']}\"\n";
		}
	*/
  }
  else
  {
  	$header .= "Content-Type: multipart/mixed;\n\tboundary=\"$grenze\"\n";

	# Erstellen der Attachments

    $message_before .= "\n--$grenze\n";
    //$message_before .= "Content-transfer-encoding: 8bit\r\n";
    $message_before .= $job['mailformat']
                   ? "Content-type: text/html; charset={$job['charset']}\n"
                   : "Content-type: text/plain; charset={$job['charset']}\n";
    $message_before .= "Content-transfer-encoding: 8bit\n\n";

    $message_after = "\n\n";
    $file_array_content = $job['attachments'];

    foreach($file_array_content as $key=>$value)
    {
    	if(!empty($file_array_content[$key]['name']))
    	{
            $data = chunk_split(base64_encode($file_array_content[$key]['data']));

            if(empty($file_array_content[$key]['type']))
                $mimetype = "application/octetstream";
            else
                $mimetype = $file_array_content[$key]['type'];

            $message_after .= "\n--$grenze\n";
            $message_after .= "Content-Type: ".$mimetype.";\n\tname=\"".$file_array_content[$key]['name']."\"\n";
            $message_after .= "Content-Transfer-Encoding: base64\n";
            $message_after .= "Content-Disposition: attachment;\n\tfilename=\"".$file_array_content[$key]['name']."\"\n\n";
            $message_after .= $data;
            $message_after .= "\n\n";
    	}
    }

    $message_after .= "--".$grenze."--";

  }

  if( $aus_settings->replace_form_alt_titlecheck == 1)
  	$alternative_title = true;


  # Nachbearbeitung der Nachricht
  $job['message'] = str_replace('\"', '"', $job['message']);
  $job['message'] = str_replace('{TITLE_EXPRESSION}',  $aus_settings->replace_form_expression_title, $job['message']);
  $job['message'] = str_replace('{NAME_EXPRESSION}', $aus_settings->replace_form_expression_name, $job['message']);
  $job['message'] = str_replace('{SHOWEMAIL_LINK}', "{$job['acturl']}/newsletter.php?showemail={$job['id_archive']}", $job['message']);

  if( (!$VALID && !$COPYRIGHT_TAG) || (!$VALID && $COPYRIGHT_TAG) || ($VALID && $COPYRIGHT_TAG)  )
  {	
	  if ( !strrpos($job['message'], $lang['sendmails_sentwithnletter']) )
		$job['message'] .= $job['mailformat']
							 ? "<br><br>--------------------------<br>" . $lang['sendmails_sentwithnletter'] . '.'
							 : "\n\n--------------------------\n"       . $lang['sendmails_sentwithnletter'] . '.';
  }
						 
  if ( $job['mailformat']==1 && $aus_settings->attach_viewcount==1 )
  	$job['message'] .= "<img src=\"{$job['acturl']}/inc/newsletter_countviews.php?id={$_GET['job']}\" width=\"1\" height=\"1\">";


  # In dieser Variable wird nach und nach dynamisch der Inhalt der Hauptschleife generiert
  $mainloop = '';

  # Empfänger-Mailadressen via MySQL holen
  $time_limit = time();
  if ($job['try_email']) {
    $nletter_mail     = '$aus_id_user->newentrie_mail_address;';
    $get_id_user      = $mysql->query("SELECT newentrie_mail_address "
                                  . "FROM {$prefix}_settings");
  } else if ($job['id_group'] != 1) {
    $mainloop        .= $code00;
    $get_id_user      = $mysql->query("SELECT id_user, mail, forename, surname "
                                  . "FROM {$prefix}_group_def g, {$prefix}_entries u "
                                  . "WHERE g.id_user=u.id "
                                  .   "AND u.flag<>'1' "
                                  .   "AND g.id_group='{$job['id_group']}' "
                                  .   "AND regdate_t<='{$time_limit}' "
                                  .   "AND u.id>'{$job['resume_id']}'");
    $nletter_mail     = '$aus_mailaddi->mail';
    $nletter_surname  = '$aus_mailaddi->surname';
    $nletter_forename = '$aus_mailaddi->forename';
  } else {
    $mainloop        .= $code01;
    $get_id_user = $mysql->query("SELECT id, id_unique, mail, title, forename, surname "
                             . "FROM {$prefix}_entries "
                             . "WHERE flag<>'1' "
                             .   "AND regdate_t<='{$time_limit}' "
                             .   "AND id>'{$job['resume_id']}' "
                             . "ORDER BY id");
    $nletter_mail     = '$aus_id_user->mail';
    $nletter_surname  = '$aus_id_user->surname';
    $nletter_forename = '$aus_id_user->forename';
  }

  # Gesamtanzahl der Mails für die Mailjob-Fortschrittsanzeige aktualisieren
  $mail_total = $job['mail_sent'] + $mysql->numRows($get_id_user);
  $mysql->query("UPDATE {$prefix}_mailjobs SET mailTotal=" . $mail_total . " WHERE timestamp={$_GET['job']}");

  # Die Nachricht wird nun direkt an den Tags aufgespalten: 'Hallo {FORENAME}!' => array('Hallo ', '{FORENAME}', '!')
  # Anschließend wird jedes zweite Arrayelement (also jeder Tag) ersetzt durch einen Code in Stringform,
  # der dann später in der Hauptschleife einfach ausgeführt wird.
  $need_title = $need_groups = $need_profile = $need_unsublink = false;
  $message = preg_split('#({[^}]+})#', $job['message'], -1, PREG_SPLIT_DELIM_CAPTURE); $len = count($message);
  for ($i=1; $i < $len; $i+=2)

    switch ($message[$i]) {
    case            '{EMAIL}': $message[$i] = "return {$nletter_mail};"; break;
    case            '{TITLE}': $message[$i] = 'return $nletter_title_string;'; $need_title = true; break;
    case           '{GROUPS}': $message[$i] = 'return $nletter_groups;'; $need_groups = true; break;
    case     '{PROFILE_LINK}': $message[$i] = 'return $profilelink;'; $need_profile = true; break;
    case '{UNSUBSCRIBE_LINK}': $message[$i] = 'return $unsublink;'; $need_unsublink = true; break;
    case          '{SURNAME}': $message[$i] = "return empty({$nletter_surname}) ?"
                                                . "\$aus_settings->replace_form_ifempty_surname : {$nletter_surname};"; break;
    case         '{FORENAME}': $message[$i] = "return empty({$nletter_forename}) ?"
                                                . "\$aus_settings->replace_form_ifempty_forename : {$nletter_forename};"; break;
    }

  # Je nachdem, welche Tags in der Nachricht auftauchen, wird jetzt noch mehr dynamischer Code in die Hauptschleife eingefügt
  $mainloop .= ($need_title)     ? $code02 : '';
  $mainloop .= ($need_unsublink) ? $code03 : '';
  $mainloop .= ($need_profile)   ? $code04 : '';
  $mainloop .= ($need_groups)    ? $code05 : '';

//$c=0;
  # Hauptschleife - jede Mail wird nun bearbeitet und versandt
  while ($aus_id_user = $mysql->fetchObject($get_id_user))
  {
  //if($c==1)die();
  //$c++;


    # Überprüfen, ob der Mailjob zwischenzeitlich abgebrochen wurde
    $jobstatus = $mysql->query("SELECT finished FROM {$prefix}_mailjobs WHERE timestamp={$_GET['job']}");
    $row = $mysql->fetchRow($jobstatus);
    if ($row[0] != 0)
      die();

    # Hier wird der dynamisch generierte Code ausgeführt.
    # Er setzt viele Variablen, die gleich beim Zusammensetzten der Nachricht benötigt werden
    eval($mainloop);

    # Die einstmals gesplittete Nachricht wird nun wieder zusammengesetzt - allerdings mit echten Daten statt Tags
    $generated_message = '';
    for ($i=0; $i < $len; $i+=2)
      $generated_message .= $message[$i] . (($message[$i+1]{0} === '{') ? $message[$i+1] : eval($message[$i+1]));


  	# if no sur- or forename, set alternative title
  	if( $alternative_title == true)
  	{
  		$nletter_surname_tmp = eval("return {$nletter_surname};");
  		$nletter_forename_tmp = eval("return {$nletter_forename};");
  		if( empty($nletter_surname_tmp) && empty($nletter_forename_tmp) && !empty($nletter_title_string))
  		{
            $generated_message = str_replace($nletter_title_string." ",  $aus_settings->replace_form_alt_title, $generated_message);
        }

  	}



    # Mailjob-Fortschritt aktualisieren, mailLastID für Resume
    $timestamp = microtime_float();
    $mysql->query("UPDATE {$prefix}_mailjobs SET mailSent=mailSent+1, lastID='{$id}', lastTimestamp='{$timestamp}' WHERE timestamp={$_GET['job']}");


	# Anhang
	if($attachment == true || $job['mailformat'] == 1)
		$generated_message = $message_before.$generated_message.$message_after;
		
    # Versand der Mail
    mail(eval("return {$nletter_mail};"), $job['subject'], $generated_message, $header);



	//debug messages:
/*
    $myString = "";
    $fh=fopen('test.html', "w");
    fwrite($fh, $generated_message);
    fclose($fh);
*/


    if (PHP_OS != 'WINNT' || version_compare(PHP_VERSION, '5.0.0', '>='))
      usleep($job['delay']);
  }


  # Mailjob schließen
  $mysql->query("UPDATE {$prefix}_mailjobs SET finished=".time()." WHERE timestamp={$_GET['job']}");
  $get_mailTotal = $mysql->query("SELECT mailTotal FROM {$prefix}_mailjobs WHERE timestamp={$_GET['job']}");
  $out_mailTotal = $mysql->fetchObject($get_mailTotal);
  $mysql->query("UPDATE {$prefix}_archiv SET flag=0,empf='{$out_mailTotal->mailTotal}' WHERE mailjobTimestamp={$_GET['job']}");

  session_destroy();
?>