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
						<td class="register" align="center" width="20%"><a href="gaestebuch_freigeben.php">Eintr&auml;ge freigeben</a></td>
						<td class="register" align="center" width="20%"><a href="gaestebuch_freigegebene_bearbeiten.php">Freigegebene Eintr&auml;ge bearbeiten</a></td>
						<td class="register" align="center" width="20%"><a href="gaestebuch_gesperrte_bearbeiten.php">Gesperrte Eintr&auml;ge bearbeiten</a></td>
						<td class="register" align="center" width="20%"><a href="gaestebuch_SQL_Table.php">Vollst&auml;ndige SQL-Tabelle</a></td>
						<td class="registerActive" align="center" width="20%"><a href="gaestebuch_einstellungen.php">G&auml;stebuch Einstellungen</a></td>
						</tr>
						</table>
						<?php
						include("../config.php");
						include("../dbconnect.php");
						if (isset($_GET['EinstellungenGespeichert'])) {
							echo '<p class="loggedout" align="center">Die Einstellungen wurden gespeichert.</p>';
						}
						?>
						<h1>G&auml;stebuch Einstellungen</h1>
						<p>
						
						<form action="gaestebuch_einstellungen_speichern.php" method="post">
						<table class="pageframe" border="0">
						<tr>
						<td colspan="2">
						<?php
						
						$FreigabepflichtErmitteln = mysqli_query($db, "SELECT * from attribute WHERE attributname='GaestebuchEintraegeFreigabepflicht'");
						
						while ($FreigabeRow = mysqli_fetch_array($FreigabepflichtErmitteln))
						{
							$Freigabewert = $FreigabeRow['wert'];
							
							if($Freigabewert == '0')
							{
								echo("<input type='checkbox' name='GaestebuchEintraegeFreigabepflicht' id='GaestebuchEintraegeFreigabepflicht'>Eintr&auml;ge m&uuml;ssen zuerst freigegeben werden vor dem Ver&ouml;ffentlichen.");
							}
							else
							{
								echo("<input type='checkbox' name='GaestebuchEintraegeFreigabepflicht' id='GaestebuchEintraegeFreigabepflicht' checked>Eintr&auml;ge m&uuml;ssen zuerst freigegeben werden vor dem Ver&ouml;ffentlichen.");
							}
						
						}
						
						?>
						</td>
						</tr>
						<tr>
						<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
						<td colspan="2">
						<?php
						
						$EmailErmitteln = mysqli_query($db, "SELECT * from attribute WHERE attributname='GaestebuchEintraegeMail'");
						
						while ($emailRow = mysqli_fetch_array($EmailErmitteln))
						{
							$emailwert = $emailRow['wert'];
							
							if($emailwert == '0')
							{
								echo("<input type='checkbox' name='GaestebuchEintraegeMail' id='GaestebuchEintraegeMail'>E-Mail senden, wenn ein Eintrag ins G&auml;stebuch gemacht wurde.");
							}
							else
							{
								echo("<input type='checkbox' name='GaestebuchEintraegeMail' id='GaestebuchEintraegeMail' checked>E-Mail senden, wenn ein Eintrag ins G&auml;stebuch gemacht wurde.");
							}
						
						}
						
						?>
						</td>
						<tr>
						<td>
						E-Mail Adresse zur Benachrichtigung von Eintr&auml;gen:
						</td>
						<td>
						<?php
						
						$EmailAdressen = mysqli_query($db, "SELECT * from gaestebuchemail");
						
						while ($emailAdressenRow = mysqli_fetch_array($EmailAdressen))
						{
							$emailAdressenWert = $emailAdressenRow['email'];
							
							echo("<input type='email' name='emailAdresse' id='emailAdresse' size='50' value='" .$emailAdressenWert. "'>");
												
						}
						
						?>
						</td>
						</tr>
						<tr>
						<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
						<td colspan="2">
						<input type="submit" value="Einstellungen speichern">
						</td>
						</tr>
						</table>
						</form>
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