<?php
include("config.php");

$db = mysqli_connect($db_host, $db_usrname, $db_password, $db_name);
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
?>