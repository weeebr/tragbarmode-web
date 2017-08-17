<?php
# Dateien einbinden
include("config.php");
include("dbconnect.php");

?>

<html>
	<head>
		<title>
			Familiegugge mit H&auml;rz
		</title>
	</head>
	<body background="img_page/Background.jpg">
		<table border="0" height="100%" style="border-collapse: collapse;" align="center">
			<tr width="100%" height="22%">
				<td valign="top">
					<img src="img_page/Titelbild.jpg"><img src="img_page/seit2009.jpg" align="top"><br>
					<a href="index.php"><img src="img_page/knoepfe/Home_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Home_grau.png'" onmouseout="src='img_page/knoepfe/Home_weiss.png'" alt="Home"> &nbsp;
					<a href="geschichte.php"><img src="img_page/knoepfe/Geschichte_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Geschichte_grau.png'" onmouseout="src='img_page/knoepfe/Geschichte_weiss.png'" alt="Geschichte"></a> &nbsp;
					<a href="vorstand.php"><img src="img_page/knoepfe/Vorstand_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Vorstand_grau.png'" onmouseout="src='img_page/knoepfe/Vorstand_weiss.png'" alt="Vorstand"></a> &nbsp;
					<a href="auftritte.php"><img src="img_page/knoepfe/Auftritte_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Auftritte_grau.png'" onmouseout="src='img_page/knoepfe/Auftritte_weiss.png'" alt="Auftritte"></a> &nbsp;
					<a href="mitglieder.php"><img src="img_page/knoepfe/Mitglieder_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Mitglieder_grau.png'" onmouseout="src='img_page/knoepfe/Mitglieder_weiss.png'" alt="Mitglieder"></a> &nbsp;
					<a href="galerie.php"><img src="img_page/knoepfe/Galerie_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Galerie_grau.png'" onmouseout="src='img_page/knoepfe/Galerie_weiss.png'" alt="Galerie"></a>
					<a href="sponsoren.php"><img src="img_page/knoepfe/Sponsoren_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Sponsoren_grau.png'" onmouseout="src='img_page/knoepfe/Sponsoren_weiss.png'" alt="Sponsoren"></a> &nbsp;
					<a href="goenner.php"><img src="img_page/knoepfe/Goenner_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Goenner_grau.png'" onmouseout="src='img_page/knoepfe/Goenner_weiss.png'" alt="G&ouml;nner"></a> &nbsp;
					<img src="img_page/knoepfe/Gaestebuch_grau.png" width="120" alt="G&auml;stebuch"></a> &nbsp;
					<a href="kontakt.php"><img src="img_page/knoepfe/Kontakt_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Kontakt_grau.png'" onmouseout="src='img_page/knoepfe/Kontakt_weiss.png'" alt="Kontakt"></a> &nbsp;
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
			</tr>
			<tr height="*">
				<td>
				<form action="gaestebuch_eintragen.php" id="gaestebuch_eintragen" method="post">
				<table border ="0" bgcolor="#FFFFFF" align="center">
				<tr>
					<td>
						Name: <font color="red"><b>*</b></font>
					</td>
					<td>
						<input type="text" name="sendername" id="sendername" maxlength="255">
					</td>
				</tr>
				<tr>
					<td>
						E-Mail Adresse: 
					</td>
					<td>
						<input type="text" name="sendermail" id="sendermail" maxlength="255">
					</td>
				</tr>
				<tr>
					<td>
						Homepage: 
					</td>
					<td>
						<input type="text" name="senderhomepage" id="senderhomepage" maxlength="255" value="http://">
					</td>
				</tr>
				<tr>
					<td>
						Nachricht: <font color="red"><b>*</b></font>
					</td>
					<td>
						<textarea name="nachricht" id="nachricht"></textarea>
					</td>
				</tr>
				
				<?php
					// Ermitteln, ob der Eintrag zuerst freigegeben werden muss
					$FreigabepflichtErmitteln = mysqli_query($db, "SELECT * from attribute WHERE attributname='GaestebuchEintraegeFreigabepflicht'");
					
					echo '<tr><td></td><td>';
					while ($FreigabeRow = mysqli_fetch_array($FreigabepflichtErmitteln))
					{
						$Freigabewert = $FreigabeRow['wert'];
						
						if($Freigabewert == '0')
						{
							$Status = "1";
						}
						elseif(Freigabewert == '1')
						{
							$Status = "2";
						}
						
						echo "<input type='hidden' name='status' id='status' value='". $Status ."'>";
						
					}
				echo '</td></tr>';
				
				?>
				
				<tr>
					<td colspan="2" align="center">
						<button type="submit">Eintrag absenden</button>
					</td>
				</tr>
				</table>	
				</form>
					<?php
						//Gästebucheinträge anzeigen
						$ergebnis = mysqli_query($db, "SELECT * FROM gaestebuch WHERE status='1' ORDER BY datum DESC");
						
						echo '<table style="border-collapse: collapse;" border = "0" width="100%">';
						while ($row = mysqli_fetch_array($ergebnis))
							{
								$sendername = $row['sendername'];
								$datum = $row['datum'];
								$nachricht = $row['nachricht'];
								
								echo "<tr>";
								echo "<td align='left' bgcolor='#000000'><font color='#FFFFFF'>Name:&nbsp;". $sendername . "</td>";
								echo "<td align='right' bgcolor='#000000'><font color='#FFFFFF'>Eintrag vom ". $datum . "</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td colspan='2' bgcolor='#515151'><font color='#FFFFFF'>". $nachricht . "</td>";
								echo "</tr>";
								echo "<tr height='20'><td></td></tr>";
  							}
					echo "</table>";
					?>
				</td>
			</tr>
			<tr height="40">
				<td>
					
				</td>
			</tr>
		</table>
	</body>
</html>