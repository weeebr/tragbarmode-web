<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################


  define('CRLF', "\r\n");

  function relaymail_connect($smtp_relay, $smtp_port=25, $username=FALSE, $password=FALSE)
  {
    # Verbindung zum SMTPd aufbauen
    $hSocket = @fsockopen($smtp_relay, $smtp_port, $errno, $errstr, 7);
    if ($hSocket === FALSE)
      return array($lang['relaymail_fatal1'], NULL);

    # Reaktion vom SMTPd muss nun immer innerhalb von 5 Sekunden erfolgen
    stream_set_timeout($hSocket, 5);

    # Bereitschaft des SMTPd überprüfen
    if ( !check_reply($hSocket, '220', $errcode, $unused) )
      return array($lang['relaymail_fatal2'], $errcode);

	# Argumente in Array umwandeln, falls nur 1 Mail versandt werden soll
    if ( !is_array($to) ) {
      $to      = array($to);
      $message = array($message);
      $headers = array($headers);
    }

    # SMTP Session beginnen
    fwrite($hSocket, "EHLO {$_SERVER['SERVER_NAME']}@{$_SERVER['SERVER_ADDR']}\r\n");
    if ( !check_reply($hSocket, '250', $errcode, $response) )
      return array($lang['relaymail_fatal3'], $errcode);

    # SMTP-Authentifikation
    if ($username) {
      # Unterstützte Authentifikationsmethoden erfragen
      $authschemes['PLAIN'] = (bool) stristr($response, 'PLAIN');
      $authschemes['LOGIN'] = (bool) stristr($response, 'LOGIN');

      # Authentifizierung jetzt durchführen, sofern Username/Passwort angegeben
      if ($authschemes['PLAIN']) {                   # Authentifikationsschema PLAIN
        fwrite($hSocket,
            'AUTH PLAIN '            .
            base64_encode(
              $username              .
              chr(0x00)              .
              $username              .
              chr(0x00)              .
              $password
            )                        . CRLF
        );

        # Korrekte Authentifikation überprüfen
        if ( !check_reply($hSocket, '235', $errcode, $unused) )
          return array($lang['relaymail_fatal4'], $errcode);
      }

      else

      if ($authschemes['LOGIN']) {                   # Authentifikationsschema LOGIN
        fwrite($hSocket, 'AUTH LOGIN'             . CRLF);
        if ( !check_reply($hSocket, '334', $errcode, $unused) )
          return array($lang['relaymail_fatal5'], $errcode);

        fwrite($hSocket, base64_encode($username) . CRLF);
        if ( !check_reply($hSocket, '334', $errcode, $unused) )
          return array($lang['relaymail_fatal6'], $errcode);

        fwrite($hSocket, base64_encode($password) . CRLF);
        if ( !check_reply($hSocket, '235', $errcode, $unused) )
          return array($lang['relaymail_fatal7'], $errcode);
      }

      else

      if (stristr($response, '250-AUTH')) {          # Auth. unterstützt, aber nicht 'PLAIN' oder 'LOGIN'
        return array($lang['relaymail_fatal8'], '');
      }
    }

    return $hSocket;
  }


  function relaymail_disconnect($hSocket)
  {
    # Verbindung zum SMTPd schließen
    fwrite($hSocket, "QUIT\r\n");
    fclose($hSocket);
  }


  function check_reply($hSocket, $req_errcode, &$errcode, &$response)
  {
    $reply   = '';
	$matches = 0;

    # So lange Packets einlesen, bis ein gültiger Fehlercode gefunden wurde
    while ($matches == 0)
    {
      $temp = fread($hSocket, 8192);
      if ($temp !== NULL)
        $reply .= $temp;
      else {
        $errcode = NULL;
        return false;
      }

      $matches = preg_match('#^([2345][01235][0123458]) #m', $reply, $result);
    }

    # Falls gewünscht, die Antwort des Servers mit zurückgeben
    $response = $reply;

    # Ein Fehlercode wurde eingelesen - jetzt überprüfen ob dieser positiv oder negativ ist
    $errcode = $result[1];
    if (preg_match("#{$req_errcode}#", $errcode, $unused) != 0)
	  return true;
	else
	  return false;
  }

  function wait_for_reply($hSocket)
  {
    return check_reply($hSocket, ' ', $unused, $unused);
  }
?>