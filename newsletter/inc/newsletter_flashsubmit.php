<?php
include(dirname(__FILE__)."/../settings/connect.php");
require(dirname(__FILE__)."/newsletter_functions.php");

$get_set=$mysql->query("SELECT * FROM $prefix"."_settings");
$aus_settings=$mysql->fetchObject($get_set);

if($get_language=$mysql->query("SELECT * FROM $prefix"."_language WHERE language_aktiv='1'"))
$aus_language=$mysql->fetchObject($get_language);
require(dirname(__FILE__)."/../settings/".$aus_language->language_file);


    /* Variablen für Flash */

    $mail=$_POST['mail'];
    $forename=$_POST['name'];
    $ein=$_POST['ein'];
    $aus=$_POST['aus'];

    $loaded = 1;
    $flash_message="";

    /***********************/


    if($ein==true)
    {
        include(dirname(__FILE__)."/newsletter_subscribecheck.php");
    }
    if($aus==true)
    {
        include(dirname(__FILE__)."/newsletter_unsubscribesubcheck.php");
    }


echo "&msg=$flash_message";
echo "&loaded=$loaded";



?>