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
			
			$FreigebenId = $_GET['id'];
			
			$FreigabeEintragen = mysqli_query($db, "UPDATE `gaestebuch` SET `status` = '3' WHERE `gaestebuch`.`id` = " .$FreigebenId);
			
			header('Location: gaestebuch_freigegebene_bearbeiten.php?SperrenOK=1');
			
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