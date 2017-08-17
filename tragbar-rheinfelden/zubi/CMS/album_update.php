<?php
include("../dbconnect.php");

$AlbumNr = mysqli_real_escape_string($db, $_POST["AlbumNr"]);
$AlbumName = mysqli_real_escape_string($db, $_POST["AlbumName"]);
$AlbumKommentar = mysqli_real_escape_string($db, $_POST["AlbumKommentar"]);

$eintragen2 = mysqli_query($db, "UPDATE `bilderalbum` SET `AlbumName` = '" .$AlbumName. "' WHERE `bilderalbum`.`ID` = '" .$AlbumNr. "'");
$eintragen3 = mysqli_query($db, "UPDATE `bilderalbum` SET `AlbumKommentar` = '" .$AlbumKommentar. "' WHERE `bilderalbum`.`ID` = '" .$AlbumNr. "'");

header('Location: galerie_BilderAlbum_verwalten.php?ChangeOK=1');
?>