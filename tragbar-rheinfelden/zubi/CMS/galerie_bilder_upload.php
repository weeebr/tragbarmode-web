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
        <?php if (login_check($mysqli) == true) : 
			
			include("../dbconnect.php");
			
			$BildAlbum = mysqli_real_escape_string($db, $_POST["BildAlbum"]);
			$BildUser = mysqli_real_escape_string($db, $_POST["BildUserID"]);
			$BildName = mysqli_real_escape_string($db, $_POST["BildName"]);
			$BildKommentar = mysqli_real_escape_string($db, $_POST["BildKommentar"]);
			
			date_default_timezone_set("Europe/Berlin");
			$timestamp = time();
			$datum = date("Y-m-d-H-i-s",$timestamp);
			
			$upload_folder = '../bilder_upload/'; //Das Upload-Verzeichnis
			$filename = "" .$BildUser. "_" .$datum. "";
			$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
			//Überprüfung der Dateiendung
			$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif', 'bmp');
			if(!in_array($extension, $allowed_extensions)) {
				die("Ungültige Dateiendung. Nur png, jpg, jpeg, bmp und gif-Dateien sind erlaubt");
			}
			 
			//Überprüfung der Dateigröße
			$max_size = 10485760; // 10 MB
			if($_FILES['datei']['size'] > $max_size) {
				die("Bitte keine Dateien grösser als 10 MB hochladen");
			}
			 
			//Überprüfung dass das Bild keine Fehler enthält
			if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
				$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
				$detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
				if(!in_array($detected_type, $allowed_types)) {
					die("Nur der Upload von Bilddateien ist gestattet");
				}
			}
			 
			//Pfad zum Upload
			$new_path = $upload_folder.$filename.'.'.$extension;
			$DBPath = $filename.'.'.$extension;
			 
			//Neuer Dateiname falls die Datei bereits existiert
			if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
				$id = 1;
				do {
					$new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
					$DBPath = $filename.'_'.$id.'.'.$extension;
					$id++;
				} while(file_exists($new_path));
			}
			 
			//Alles okay, verschiebe Datei an neuen Pfad
			move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
						
			$eintragen = mysqli_query($db, "INSERT INTO bilder (AlbumID, UserID, BildName, BildKommentar, BildPfad) VALUES ('" .$BildAlbum. "', '" .$BildUser. "', '" .$BildName. "', '" .$BildKommentar. "', 'bilder_upload/" .$DBPath. "')");
			
			header('Location: galerie_bilder_neu.php?upload=1');
			exit();
			
			else : ?>
            <p>
				<?php
                header('Location: login.php?notlogged=1');
				exit();
				?>
            </p>
        <?php endif; ?>
    </body>
</html>