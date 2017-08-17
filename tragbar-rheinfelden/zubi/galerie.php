<?php
# Dateien einbinden
include("config.php");
include("dbconnect.php");

?>

<html>
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="img_page/favicon.ico" />
		<title>
			Familiegugge mit H&auml;rz
		</title>
	</head>
	<body background="img_page/Background.jpg">
		<table border="0" height="100%" style="border-collapse: collapse;" align="center">
			<tr width="100%" height="22%">
				<td valign="top">
					<img src="img_page/Titelbild.jpg"><img src="img_page/seit2009.jpg" align="top"><br>
					<a href="index.php"><img src="img_page/knoepfe/Home_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Home_grau.png'" onmouseout="src='img_page/knoepfe/Home_weiss.png'" alt="Home"></a> &nbsp;
					<a href="geschichte.php"><img src="img_page/knoepfe/Geschichte_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Geschichte_grau.png'" onmouseout="src='img_page/knoepfe/Geschichte_weiss.png'" alt="Geschichte"></a> &nbsp;
					<a href="vorstand.php"><img src="img_page/knoepfe/Vorstand_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Vorstand_grau.png'" onmouseout="src='img_page/knoepfe/Vorstand_weiss.png'" alt="Vorstand"></a> &nbsp;
					<a href="auftritte.php"><img src="img_page/knoepfe/Auftritte_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Auftritte_grau.png'" onmouseout="src='img_page/knoepfe/Auftritte_weiss.png'" alt="Auftritte"></a> &nbsp;
					<a href="mitglieder.php"><img src="img_page/knoepfe/Mitglieder_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Mitglieder_grau.png'" onmouseout="src='img_page/knoepfe/Mitglieder_weiss.png'" alt="Mitglieder"></a> &nbsp;
					<img src="img_page/knoepfe/Galerie_grau.png" width="120" alt="Galerie"> &nbsp;
					<a href="sponsoren.php"><img src="img_page/knoepfe/Sponsoren_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Sponsoren_grau.png'" onmouseout="src='img_page/knoepfe/Sponsoren_weiss.png'" alt="Sponsoren"></a> &nbsp;
					<a href="goenner.php"><img src="img_page/knoepfe/Goenner_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Goenner_grau.png'" onmouseout="src='img_page/knoepfe/Goenner_weiss.png'" alt="G&ouml;nner"></a> &nbsp;
					<a href="gaestebuch.php"><img src="img_page/knoepfe/Gaestebuch_weiss.png" width="120" onmouseover="src='img_page/knoepfe/Gaestebuch_grau.png'" onmouseout="src='img_page/knoepfe/Gaestebuch_weiss.png'" alt="G&auml;stebuch"></a> &nbsp;
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
					<h1>Fotogalerie</h1>
					<?php
					// Nur die 8 neusten Bilder im Hauptalbum werden in der Vorschau angezeigt.
					$HauptalbumAbfrage = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='1' ORDER BY BildDatum DESC LIMIT 4");
						if($HauptalbumAbfrage !== 0)
						{
						echo "<table border='0'>";
						echo "<tr>";
						while ($HauptalbumAbfrageRow = mysqli_fetch_array($HauptalbumAbfrage))
							{
								$BildID = $HauptalbumAbfrageRow['ID'];
								$BildPfad = $HauptalbumAbfrageRow['BildPfad'];
								
								echo "<td><a href='bilder.php?picID=" .$BildID. "'><img src='" .$BildPfad. "' height='200'></a></td>";
								
							}
						echo "</tr>";
						echo "</table>";
						}
						
					$HauptalbumAbfrage2 = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='1' ORDER BY BildDatum DESC LIMIT 4,4");
						if($HauptalbumAbfrage2 !== 0)
						{
						echo "<table border='0'>";
						echo "<tr>";
						while ($HauptalbumAbfrageRow2 = mysqli_fetch_array($HauptalbumAbfrage2))
							{
								$BildID2 = $HauptalbumAbfrageRow2['ID'];
								$BildPfad2 = $HauptalbumAbfrageRow2['BildPfad'];
								
								
								echo "<td><a href='bilder.php?picID=" .$BildID2. "'><img src='" .$BildPfad2. "' height='200'></a></td>";
								
								
							}
						echo "</tr>";
						echo "</table>";
						}
					?>
					<p>
					<h1>Fotoalben</h1>
					<?php
					// Alben abfragen
					$AlbenAbfrage = mysqli_query($db, "SELECT ID, AlbumName, DATE_FORMAT(AlbumDatum,'%d.%m.%Y') AS for_date FROM bilderalbum WHERE AlbumStatus='1' AND ID!='1' ORDER BY AlbumDatum DESC");
						if($AlbenAbfrage !== 0)
						{
							echo "<table border='0' style='border-spacing:5pt;'>";
							echo "<tr>";
							while ($AlbenAbfrageRow = mysqli_fetch_array($AlbenAbfrage))
							{
								$AlbumID = $AlbenAbfrageRow['ID'];
								$AlbumName = $AlbenAbfrageRow['AlbumName'];
								$AlbumDatum = $AlbenAbfrageRow['for_date'];
								
								echo "<td style='background-color:#000000;'>";
								echo "<font color='#FFFFFF'>";
								echo "<div align='center'>";
								
								// Hier müssen die 2 Bilder vom Album sein
								$AlbenbilderAbfrage = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY BildDatum DESC LIMIT 2");
								if($AlbenbilderAbfrage !== 0)
								{
									while ($AlbenbilderAbfrageRow = mysqli_fetch_array($AlbenbilderAbfrage))
									{
										$AlbumBildPfad = $AlbenbilderAbfrageRow['BildPfad'];
										
										echo "<img src='" .$AlbumBildPfad. "' height='70'>";
									}
								}
								echo "<br>";
								
								// Hier müssen die 2 nächsten Bilder vom Album sein
								$AlbenbilderAbfrage2 = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY BildDatum DESC LIMIT 2, 2");
								if($AlbenbilderAbfrage2 !== 0)
								{
									while ($AlbenbilderAbfrageRow2 = mysqli_fetch_array($AlbenbilderAbfrage2))
									{
										$AlbumBildPfad2 = $AlbenbilderAbfrageRow2['BildPfad'];
										
										echo "<img src='" .$AlbumBildPfad2. "' height='70'>";
									}
								}
								
								echo "</div>";
								
								echo "<br>";
								echo "<div align='left'>" .$AlbumName. "</div><div align='right'>" .$AlbumDatum. "</div>";
								echo "</font>";
								echo "</td>";
								
								
							}
						echo "</tr>";
						echo "</table>";
						}
						
					?>
					</p>
				</td>
			</tr>
			<tr height="40">
				<td>
					
				</td>
			</tr>
		</table>
	</body>
</html>