<?php
include("../dbconnect.php");

$AlbumName = mysqli_real_escape_string($db, $_POST["AlbumName"]);
$AlbumKommentar = mysqli_real_escape_string($db, $_POST["AlbumKommentar"]);

$eintragen = mysqli_query($db, "INSERT INTO bilderalbum (AlbumName, AlbumKommentar) VALUES ('" .$AlbumName. "', '" .$AlbumKommentar. "')");

header('Location: galerie_BilderAlbum_verwalten.php?AddOK=1');
?>