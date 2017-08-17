<?php
include("../dbconnect.php");

if ($_POST["GaestebuchEintraegeFreigabepflicht"]) {
  $FreigabepflichtErmitteln = "1";
}
else {
  $FreigabepflichtErmitteln = "0";
}

if ($_POST["GaestebuchEintraegeMail"]) {
  $EmailErmitteln = "1";
}
else {
  $EmailErmitteln = "0";
}

$EmailAdressen = mysqli_real_escape_string($db, $_POST["emailAdresse"]);

echo($FreigabepflichtErmitteln);
echo("<br>");
echo($EmailErmitteln);
echo("<br>");
echo($EmailAdressen);


$eintragen1 = mysqli_query($db, "UPDATE `attribute` SET `wert` = '" .$FreigabepflichtErmitteln. "' WHERE `attribute`.`attributname` = 'GaestebuchEintraegeFreigabepflicht'");
$eintragen2 = mysqli_query($db, "UPDATE `attribute` SET `wert` = '" .$EmailErmitteln. "' WHERE `attribute`.`attributname` = 'GaestebuchEintraegeMail'");
$eintragen3 = mysqli_query($db, "UPDATE `gaestebuchemail` SET `email` = '" .$EmailAdressen. "' WHERE `gaestebuchemail`.`id` = '1'");

header('Location: gaestebuch_einstellungen.php?EinstellungenGespeichert=1');
?>