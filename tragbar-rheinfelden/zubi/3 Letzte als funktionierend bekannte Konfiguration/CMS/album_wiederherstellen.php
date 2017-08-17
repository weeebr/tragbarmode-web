<?php
include("../dbconnect.php");

$AlbumNrW = mysqli_real_escape_string($db, $_POST["AlbumNrW"]);
$AlbumNameW = mysqli_real_escape_string($db, $_POST["AlbumNameW"]);
$AlbumKommentarW = mysqli_real_escape_string($db, $_POST["AlbumKommentarW"]);

$eintragen1 = mysqli_query($db, "UPDATE `bilderalbum` SET `AlbumStatus` = '1' WHERE `bilderalbum`.`ID` = '" .$AlbumNrW. "'");
$eintragen2 = mysqli_query($db, "UPDATE `bilderalbum` SET `AlbumName` = '" .$AlbumNameW. "' WHERE `bilderalbum`.`ID` = '" .$AlbumNrW. "'");
$eintragen3 = mysqli_query($db, "UPDATE `bilderalbum` SET `AlbumKommentar` = '" .$AlbumKommentarW. "' WHERE `bilderalbum`.`ID` = '" .$AlbumNrW. "'");

header('Location: galerie_BilderAlbum_verwalten.php?WiederherstellenOK=1');
?>