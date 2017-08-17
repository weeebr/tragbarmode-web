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

$eintragen = mysqli_query($db, "INSERT INTO gaestebuch (sendername, sendermail, senderhomepage, nachricht, status) VALUES ('$sendername', '$sendermail', '$senderhomepage', '$nachricht', '$status')");

include("gaestebuch.php");
?>