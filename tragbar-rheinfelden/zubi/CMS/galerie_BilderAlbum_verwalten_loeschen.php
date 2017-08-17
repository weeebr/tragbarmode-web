<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <?php
			include("../dbconnect.php");
			include("../config.php");
			
			$LoeschenID = $_GET['DeleteID'];
			
			$LoeschenEintragen = mysqli_query($db, "UPDATE `bilderalbum` SET `AlbumStatus` = '3' WHERE `bilderalbum`.`ID` = " .$LoeschenID);
			
			header('Location: galerie_BilderAlbum_verwalten.php?LoeschenOK=1');
			
			?>
        <?php else : ?>
            <p>
                <?php
				header('Location: login.php?notlogged=1');
				exit();
				?>
            </p>
        <?php endif; ?>
    </body>
</html>