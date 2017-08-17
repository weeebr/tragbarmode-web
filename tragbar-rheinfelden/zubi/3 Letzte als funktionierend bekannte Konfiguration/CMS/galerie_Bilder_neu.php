<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/psl-config.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo($CMStitle); ?></title>
        <link rel="stylesheet" href="CMSdesign.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <table border="0" class="pageframe" width="100%" height="100%">
				<tr>
					<td>
						
					</td>
					<td>
						
					</td>
					<td>
						
					</td>
				</tr>
				<tr height="50">
					<td colspan="2">
						<p style="font-size:xx-large;">Sie sind angemeldet als <?php echo htmlentities($_SESSION['username']); ?>.</p>
					</td>
					<td width="50%" align="right">
						<p style="font-size:xx-large;"><a href="includes/logout.php">Abmelden</a> &nbsp; <a href="CMSsettings.php">Einstellungen</a></p>
					</td>
				</tr>
				<tr height="*">
					<td width="20%" align="center">
					<br><br><br><br><br>
					<a href="index.php"><img src="img_page/knoepfe/Home_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Home_grau.png'" onmouseout="src='img_page/knoepfe/Home_weiss.png'" alt="Home"><br>
					<a href="geschichte.php"><img src="img_page/knoepfe/Geschichte_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Geschichte_grau.png'" onmouseout="src='img_page/knoepfe/Geschichte_weiss.png'" alt="Geschichte"></a><br>
					<a href="vorstand.php"><img src="img_page/knoepfe/Vorstand_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Vorstand_grau.png'" onmouseout="src='img_page/knoepfe/Vorstand_weiss.png'" alt="Vorstand"></a><br>
					<a href="auftritte.php"><img src="img_page/knoepfe/Auftritte_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Auftritte_grau.png'" onmouseout="src='img_page/knoepfe/Auftritte_weiss.png'" alt="Auftritte"></a><br>
					<a href="mitglieder.php"><img src="img_page/knoepfe/Mitglieder_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Mitglieder_grau.png'" onmouseout="src='img_page/knoepfe/Mitglieder_weiss.png'" alt="Mitglieder"></a><br>
					<a href="galerie.php"><img src="img_page/knoepfe/Galerie_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Galerie_grau.png'" onmouseout="src='img_page/knoepfe/Galerie_weiss.png'" alt="Galerie"></a><br>
					<a href="sponsoren.php"><img src="img_page/knoepfe/Sponsoren_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Sponsoren_grau.png'" onmouseout="src='img_page/knoepfe/Sponsoren_weiss.png'" alt="Sponsoren"></a><br>
					<a href="goenner.php"><img src="img_page/knoepfe/Goenner_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Goenner_grau.png'" onmouseout="src='img_page/knoepfe/Goenner_weiss.png'" alt="G&ouml;nner"></a><br>
					<a href="gaestebuch.php"><img src="img_page/knoepfe/Gaestebuch_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Gaestebuch_grau.png'" onmouseout="src='img_page/knoepfe/Gaestebuch_weiss.png'" alt="G&auml;stebuch"></a><br>
					<a href="kontakt.php"><img src="img_page/knoepfe/Kontakt_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Kontakt_grau.png'" onmouseout="src='img_page/knoepfe/Kontakt_weiss.png'" alt="Kontakt"></a>
					<script language="JavaScript" type="text/javascript">
					//<![CDATA[
					<!-- hide from none JavaScript Browsers
					
					Image1 = new Image(1189,284)
					Image1.src = "img_page/knoepfe/Home_grau.png"
					
					Image2 = new Image(1189,284)
					Image2.src = "img_page/knoepfe/Geschichte_grau.png"
					
					Image3 = new Image(1189,284)
					Image3.src = "img_page/knoepfe/Vorstand_grau.png"
					
					Image4 = new Image(1189,284)
					Image4.src = "img_page/knoepfe/Auftritte_grau.png"
					
					Image5 = new Image(1189,284)
					Image5.src = "img_page/knoepfe/Mitglieder_grau.png"
					
					Image6 = new Image(1189,284)
					Image6.src = "img_page/knoepfe/Galerie_grau.png"
					
					Image7 = new Image(1189,284)
					Image7.src = "img_page/knoepfe/Sponsoren_grau.png"
					
					Image8 = new Image(1189,284)
					Image8.src = "img_page/knoepfe/Goenner_grau.png"
					
					Image9 = new Image(1189,284)
					Image9.src = "img_page/knoepfe/Gaestebuch_grau.png"
					
					Image10 = new Image(1189,284)
					Image10.src = "img_page/knoepfe/Kontakt_grau.png"
					
					// End Hiding -->
					//]]>
					</script>
					</td>
					<td colspan="2">
						<table class="pageframe" border="1" width="100%">
						<tr>
						<td class="registerActive" align="center" width="25%"><a href="galerie_BilderAlbum_verwalten.php">Alben verwalten</a></td>
						<td class="register" align="center" width="25%"><a href="galerie_bilder_verwalten.php">Bilder verwalten</a></td>
						<td class="register" align="center" width="25%"><a href="galerie_SQL_Table.php">Vollst&auml;ndige SQL-Tabellen</a></td>
						<td class="register" align="center" width="25%"><a href="galerie_einstellungen.php">Gallerie Einstellungen</a></td>
						</tr>
						</table>
						<?php
						if (isset($_GET['upload'])) {
							echo '<p class="loggedout" align="center">Das Bild wurde erfolgreich hochgeladen.</p>';
						}
						?>
						<h1>Neues Bild hochladen</h1>
						<p>
						<form action="galerie_bilder_upload.php" method="post" enctype="multipart/form-data">
						<?php
							include("../dbconnect.php");
							
							$username = htmlentities($_SESSION['username']);
							$usernameID = mysqli_query($db, "SELECT * FROM cmsmembers WHERE username='" .$username. "'");
							if($usernameID !== 0)
								{
									while ($usernameIDrow = mysqli_fetch_array($usernameID))
										{
										$usernameIDres = $usernameIDrow['id'];
										echo "<input type='hidden' name='BildUserID' id='BildUserID' value='" .$usernameIDres. "'>";
										}
								}
							
						?>
						<table style="border-collapse: collapse;" border = "0">
						<tr>
							<td>Name:</td>
							<td><input type="text" name="BildName" id="BildName" size="50"></td>
						</tr>
						<tr>
							<td>Kommentar:</td>
							<td><textarea name="BildKommentar" id="BildKommentar" rows="5" cols="38"></textarea>
						</tr>
						<tr>
						<td colspan="2"><input type="file" name="datei"></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><input type="image" src="img_page/knoepfe/bild_hochladen.png" width="100">
						
						</table>
						</form>
						</p>
					</td>
				</tr>
			</table>
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