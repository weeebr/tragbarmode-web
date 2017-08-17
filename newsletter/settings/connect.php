<?php
##########################################################################
##########################  Script © by       ############################
##########################  www.usolved.net   ############################
##########################################################################

include(dirname(__FILE__)."/config.php");
include(dirname(__FILE__)."/sql.class.php");

//---- Verbindungsfunktion zur Dantenbank ---------

$mysql=&new myMySQL($db_type);
$mysql->connect($host,$dbuser,$dbpasswd,$db);

//---- Verbindungsfunktion zur Dantenbank Ende ----

?>