<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

require_once(dirname(__FILE__)."/../settings/connect.php");

$id = $_GET['id'];
$mysql->query("UPDATE {$prefix}_archiv SET views=views+1 WHERE mailjobTimestamp='{$id}'");

?>