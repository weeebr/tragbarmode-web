<?php
include("dbconnect.php");

$sendername = mysqli_real_escape_string($db, $_POST["sendername"]);
$sendermail = mysqli_real_escape_string($db, $_POST["sendermail"]);
$senderhomepage = mysqli_real_escape_string($db, $_POST["senderhomepage"]);
$nachricht = mysqli_real_escape_string($db, $_POST["nachricht"]);
$status = mysqli_real_escape_string($db, $_POST["status"]);

if($senderhomepage == 'http://')
{
	$senderhomepage = '';
}

// Wenn gewünscht, E-Mail rauslassen
$EmailErmitteln = mysqli_query($db, "SELECT * FROM attribute WHERE attributname='GaestebuchEintraegeMail'");
						if($EmailErmitteln !== 0)
						{
						while ($EmailErmittelnrow = mysqli_fetch_array($EmailErmitteln))
							{
								$EmailErmittelnRes = $EmailErmittelnrow['wert'];
								
								if($EmailErmittelnRes == '1')
								{
									$EmailAdresse = mysqli_query($db, "SELECT * FROM gaestebuchemail WHERE id='1'");
										if($EmailAdresse !== '')
										{
											while ($EmailAdresserow = mysqli_fetch_array($EmailAdresse))
											{
												$EmailEmpfaenger = $EmailAdresserow['email'];
												$EmailAbsendername = "Mor&auml;nenschr&auml;nzer Webservice";
												$EmailAbsendermail = "webservice@moraenenschranenzer.ch";
												$EmailBetreff = "Neuer Eintrag ins G&auml;stebuch!";
												if($status == '2')
												{
													$EmailStatus = "<font color='#FF0000'><b>Du musst den Eintrag freigeben, damit er ver&ouml;ffentlicht wird!</b></font>";
												}
												$EmailText = "<h1>Neuer Eintrag ins G&auml;stebuch!</h1>
																Folgender neuer Eintrag wurde ins G&auml;stebuch geschrieben:<br>
																Name: " .$sendername. "<br>
																E-Mail:" .$sendermail. "<br>
																Homepage:" .$senderhomepage. "<br><br>
																Nachricht: <br>
																" .$nachricht. "<br><br>
																" .$EmailStatus. "<br><br>
																Freundliche Gr&uuml;sse, <br>
																Ihr Mor&auml;nenschr&auml;nzer Webservice";
																
																$extra = "From: " .$EmailAbsendername. " <" .$EmailAbsendermail. ">\n";
																$extra .= "Content-Type: text/html\n";
																$extra .= "Content-Transfer-Encoding: 8bit\n";
																mail($EmailEmpfaenger, $EmailBetreff, $EmailText, $extra);
											}
										}
								}
  							}
						}


// Eintrag in die Datenbank eintragen
$eintragen = mysqli_query($db, "INSERT INTO gaestebuch (sendername, sendermail, senderhomepage, nachricht, status) VALUES ('$sendername', '$sendermail', '$senderhomepage', '$nachricht', '$status')");

include("gaestebuch.php");
?>