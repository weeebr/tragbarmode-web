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
        <link rel="stylesheet" href="design.css" />
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
					<a href="galerie.php"><img src="img_page/knoepfe/Galerie_grau.png" width="120" alt="Galerie"></a> &nbsp;
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
				<td align="center" valign="top">
					<?php
					// Status beim Kommentarschreiben ermitteln
					if (isset($_GET['EintragOK']))
					{
						$StatusID = $_GET['EintragOK'];
					}
					
					// BildID ermitteln
					$BildID = $_GET['picID'];
					
					// Daten zum Bild ermitteln
					setlocale(LC_TIME, "de_DE.utf8");
					date_default_timezone_set("Europe/Zurich");
					$BilderDatenAbfrage = mysqli_query($db, "SELECT ID, AlbumID, BildName, BildKommentar, DATE_FORMAT(BildDatum,'%D. %M %Y %h:%i') AS Datum, BildPfad FROM bilder WHERE ID=" .$BildID);
					if($BilderDatenAbfrage !== 0)
						{
						while ($BilderDatenAbfrageRow = mysqli_fetch_array($BilderDatenAbfrage))
							{
								$BilderID = $BilderDatenAbfrageRow['ID'];
								$AlbumID = $BilderDatenAbfrageRow['AlbumID'];
								$BildName = $BilderDatenAbfrageRow['BildName'];
								$BildKommentar = $BilderDatenAbfrageRow['BildKommentar'];
								$BildDatum = $BilderDatenAbfrageRow['Datum'];
								$BildPfad = $BilderDatenAbfrageRow['BildPfad'];
								
								echo "<table border='0' style='border-collapse: collapse;'>";
								echo "<tr>";
								echo "<td colspan='3' bgcolor='#000000' align='center' height='80'>";
								// In diesem Bereich wird die Bildliste im Bildlauf angezeigt
								// Zuerst die 6 vorherigen (->DESC) Bilder mit Verlinkung, endlos
								$Vorherige6BildAbfrage = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' AND ID < " .$BildID. " ORDER BY ID DESC LIMIT 6");
								$Vorherige6BildAbfrageReihen = mysqli_num_rows($Vorherige6BildAbfrage);
								if($Vorherige6BildAbfrageReihen >= 6)
									{
									$Stack62 = array();
									while ($Vorherige6BildAbfrageRow = mysqli_fetch_array($Vorherige6BildAbfrage))
										$Stack62[] = $Vorherige6BildAbfrageRow;
										$Stack62 = array_reverse($Stack62);
										foreach($Stack62 as $Vorherige6BildAbfrageRow)
										{
										$Vorherige6BildID = $Vorherige6BildAbfrageRow['ID'];
										$Vorherige6BildPfad = $Vorherige6BildAbfrageRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Vorherige6BildID. "'><img src='" .$Vorherige6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
									}
								elseif($Vorherige6BildAbfrageReihen == 5)
									{
										$Vorherige1BildAbfrageEnde = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY ID DESC LIMIT 1");
										while($Vorherige1BildAbfrageEndeRow = mysqli_fetch_array($Vorherige1BildAbfrageEnde))
										{
											$Vorherige1BildIDEnde = $Vorherige1BildAbfrageEndeRow['ID'];
											$Vorherige1BildPfadEnde = $Vorherige1BildAbfrageEndeRow['BildPfad'];
											
											echo "<a href='bilder.php?picID=" .$Vorherige1BildIDEnde. "'><img src='" .$Vorherige1BildPfadEnde. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
										$Stack52 = array();
										while ($Vorherige6BildAbfrageRow = mysqli_fetch_array($Vorherige6BildAbfrage))
											$Stack52[] = $Vorherige6BildAbfrageRow;
											$Stack52 = array_reverse($Stack52);
											foreach($Stack52 as $Vorherige6BildAbfrageRow)
											{
												$Vorherige6BildID = $Vorherige6BildAbfrageRow['ID'];
												$Vorherige6BildPfad = $Vorherige6BildAbfrageRow['BildPfad'];
										
												echo "<a href='bilder.php?picID=" .$Vorherige6BildID. "'><img src='" .$Vorherige6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
											}
									}
								elseif($Vorherige6BildAbfrageReihen == 4)
								{
									$Vorherige2BildAbfrageEnde = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY ID DESC LIMIT 2");
									$Stack41 = array();
									while($Vorherige2BildAbfrageEndeRow = mysqli_fetch_array($Vorherige2BildAbfrageEnde))
										$Stack41[] = $Vorherige2BildAbfrageEndeRow;
										$Stack41 = array_reverse($Stack41);
										foreach($Stack41 as $Vorherige2BildAbfrageEndeRow)
										{
											$Vorherige2BildIDEnde = $Vorherige2BildAbfrageEndeRow['ID'];
											$Vorherige2BildPfadEnde = $Vorherige2BildAbfrageEndeRow['BildPfad'];
											
											echo "<a href='bilder.php?picID=" .$Vorherige2BildIDEnde. "'><img src='" .$Vorherige2BildPfadEnde. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
										$Stack42 = array();
										while ($Vorherige6BildAbfrageRow = mysqli_fetch_array($Vorherige6BildAbfrage))
											$Stack42[] = $Vorherige6BildAbfrageRow;
											$Stack42 = array_reverse($Stack42);
											foreach($Stack42 as $Vorherige6BildAbfrageRow)
											{
												$Vorherige6BildID = $Vorherige6BildAbfrageRow['ID'];
												$Vorherige6BildPfad = $Vorherige6BildAbfrageRow['BildPfad'];
										
												echo "<a href='bilder.php?picID=" .$Vorherige6BildID. "'><img src='" .$Vorherige6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
											}
									
								}
								elseif($Vorherige6BildAbfrageReihen == 3)
								{
									$Vorherige3BildAbfrageEnde = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY ID DESC LIMIT 3");
									$Stack31 = array();
									while($Vorherige3BildAbfrageEndeRow = mysqli_fetch_array($Vorherige3BildAbfrageEnde))
										$Stack31[] = $Vorherige3BildAbfrageEndeRow;
										$Stack31 = array_reverse($Stack31);
										foreach($Stack31 as $Vorherige3BildAbfrageEndeRow)
										{
											$Vorherige3BildIDEnde = $Vorherige3BildAbfrageEndeRow['ID'];
											$Vorherige3BildPfadEnde = $Vorherige3BildAbfrageEndeRow['BildPfad'];
											
											echo "<a href='bilder.php?picID=" .$Vorherige3BildIDEnde. "'><img src='" .$Vorherige3BildPfadEnde. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
										$Stack32 = array();
										while ($Vorherige6BildAbfrageRow = mysqli_fetch_array($Vorherige6BildAbfrage))
											$Stack32[] = $Vorherige6BildAbfrageRow;
											$Stack32 = array_reverse($Stack32);
											foreach($Stack32 as $Vorherige6BildAbfrageRow)
											{
												$Vorherige6BildID = $Vorherige6BildAbfrageRow['ID'];
												$Vorherige6BildPfad = $Vorherige6BildAbfrageRow['BildPfad'];
										
												echo "<a href='bilder.php?picID=" .$Vorherige6BildID. "'><img src='" .$Vorherige6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
											}
									
								}
								elseif($Vorherige6BildAbfrageReihen == 2)
								{
									$Vorherige4BildAbfrageEnde = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY ID DESC LIMIT 4");
									$Stack21 = array();
									while($Vorherige4BildAbfrageEndeRow = mysqli_fetch_array($Vorherige4BildAbfrageEnde))
										$Stack21[] = $Vorherige4BildAbfrageEndeRow;
										$Stack21 = array_reverse($Stack21);
										foreach($Stack21 as $Vorherige4BildAbfrageEndeRow)
										{
											$Vorherige4BildIDEnde = $Vorherige4BildAbfrageEndeRow['ID'];
											$Vorherige4BildPfadEnde = $Vorherige4BildAbfrageEndeRow['BildPfad'];
											
											echo "<a href='bilder.php?picID=" .$Vorherige4BildIDEnde. "'><img src='" .$Vorherige4BildPfadEnde. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
										$Stack22 = array();
										while ($Vorherige6BildAbfrageRow = mysqli_fetch_array($Vorherige6BildAbfrage))
											$Stack22[] = $Vorherige6BildAbfrageRow;
											$Stack22 = array_reverse($Stack22);
											foreach($Stack22 as $Vorherige6BildAbfrageRow)
											{
												$Vorherige6BildID = $Vorherige6BildAbfrageRow['ID'];
												$Vorherige6BildPfad = $Vorherige6BildAbfrageRow['BildPfad'];
										
												echo "<a href='bilder.php?picID=" .$Vorherige6BildID. "'><img src='" .$Vorherige6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
											}
									
								}
								elseif($Vorherige6BildAbfrageReihen == 1)
								{
									$Vorherige5BildAbfrageEnde = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY ID DESC LIMIT 5");
									$Stack11 = array();
									while($Vorherige5BildAbfrageEndeRow = mysqli_fetch_array($Vorherige5BildAbfrageEnde))
										$Stack11[] = $Vorherige5BildAbfrageEndeRow;
										$Stack11 = array_reverse($Stack11);
										foreach($Stack11 as $Vorherige5BildAbfrageEndeRow)
										{
											$Vorherige5BildIDEnde = $Vorherige5BildAbfrageEndeRow['ID'];
											$Vorherige5BildPfadEnde = $Vorherige5BildAbfrageEndeRow['BildPfad'];
											
											echo "<a href='bilder.php?picID=" .$Vorherige5BildIDEnde. "'><img src='" .$Vorherige5BildPfadEnde. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
										while ($Vorherige6BildAbfrageRow = mysqli_fetch_array($Vorherige6BildAbfrage))
											{
												$Vorherige6BildID = $Vorherige6BildAbfrageRow['ID'];
												$Vorherige6BildPfad = $Vorherige6BildAbfrageRow['BildPfad'];
										
												echo "<a href='bilder.php?picID=" .$Vorherige6BildID. "'><img src='" .$Vorherige6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
											}
									
								}
								elseif($Vorherige6BildAbfrageReihen == 0)
								{
									$Vorherige6BildAbfrageEnde = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY ID DESC LIMIT 6");
									$Stack01 = array();
									while($Vorherige6BildAbfrageEndeRow = mysqli_fetch_array($Vorherige6BildAbfrageEnde))
										$Stack01[] = $Vorherige6BildAbfrageEndeRow;
										$Stack01 = array_reverse($Stack01);
										foreach($Stack01 as $Vorherige6BildAbfrageEndeRow)
										{
											$Vorherige6BildIDEnde = $Vorherige6BildAbfrageEndeRow['ID'];
											$Vorherige6BildPfadEnde = $Vorherige6BildAbfrageEndeRow['BildPfad'];
											
											echo "<a href='bilder.php?picID=" .$Vorherige6BildIDEnde. "'><img src='" .$Vorherige6BildPfadEnde. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
								}
								// Danach das Bild, das momentan gross angezeigt wird
								echo "<img src='" .$BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FF0000'> ";
								
								// Zuletzt die 6 nächsten (->ASC, nichts schreiben) Bilder mit Verlinkung, endlos
								$Naechste6BildAbfrage = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' AND ID > " .$BildID. " LIMIT 6");
								$Naechste6BildAbfrageReihen = mysqli_num_rows($Naechste6BildAbfrage);
								if($Naechste6BildAbfrageReihen >= 6)
									{
									while ($Naechste6BildAbfrageRow = mysqli_fetch_array($Naechste6BildAbfrage))
										{
										$Naechste6BildID = $Naechste6BildAbfrageRow['ID'];
										$Naechste6BildPfad = $Naechste6BildAbfrageRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste6BildID. "'><img src='" .$Naechste6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
									}
								elseif($Naechste6BildAbfrageReihen == 5)
								{
									while ($Naechste6BildAbfrageRow = mysqli_fetch_array($Naechste6BildAbfrage))
										{
										$Naechste6BildID = $Naechste6BildAbfrageRow['ID'];
										$Naechste6BildPfad = $Naechste6BildAbfrageRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste6BildID. "'><img src='" .$Naechste6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
									$Naechste1BildAbfrageAnfang = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' LIMIT 1");
									$Naechste1BildAbfrageAnfangReihen = mysqli_num_rows($Naechste1BildAbfrageAnfang);
									
									while($Naechste1BildAbfrageAnfangRow = mysqli_fetch_array($Naechste1BildAbfrageAnfang))
									{
										$Naechste1BildIDAnfang = $Naechste1BildAbfrageAnfangRow['ID'];
										$Naechste1BildPfadAnfang = $Naechste1BildAbfrageAnfangRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste1BildIDAnfang. "'><img src='" .$Naechste1BildPfadAnfang. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
									}
								}
								elseif($Naechste6BildAbfrageReihen == 4)
								{
									while ($Naechste6BildAbfrageRow = mysqli_fetch_array($Naechste6BildAbfrage))
										{
										$Naechste6BildID = $Naechste6BildAbfrageRow['ID'];
										$Naechste6BildPfad = $Naechste6BildAbfrageRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste6BildID. "'><img src='" .$Naechste6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
									$Naechste2BildAbfrageAnfang = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' LIMIT 2");
									$Naechste2BildAbfrageAnfangReihen = mysqli_num_rows($Naechste2BildAbfrageAnfang);
									
									while($Naechste2BildAbfrageAnfangRow = mysqli_fetch_array($Naechste2BildAbfrageAnfang))
									{
										$Naechste2BildIDAnfang = $Naechste2BildAbfrageAnfangRow['ID'];
										$Naechste2BildPfadAnfang = $Naechste2BildAbfrageAnfangRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste2BildIDAnfang. "'><img src='" .$Naechste2BildPfadAnfang. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
									}
								}
								elseif($Naechste6BildAbfrageReihen == 3)
								{
									while ($Naechste6BildAbfrageRow = mysqli_fetch_array($Naechste6BildAbfrage))
										{
										$Naechste6BildID = $Naechste6BildAbfrageRow['ID'];
										$Naechste6BildPfad = $Naechste6BildAbfrageRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste6BildID. "'><img src='" .$Naechste6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
									$Naechste3BildAbfrageAnfang = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' LIMIT 3");
									$Naechste3BildAbfrageAnfangReihen = mysqli_num_rows($Naechste3BildAbfrageAnfang);
									
									while($Naechste3BildAbfrageAnfangRow = mysqli_fetch_array($Naechste3BildAbfrageAnfang))
									{
										$Naechste3BildIDAnfang = $Naechste3BildAbfrageAnfangRow['ID'];
										$Naechste3BildPfadAnfang = $Naechste3BildAbfrageAnfangRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste3BildIDAnfang. "'><img src='" .$Naechste3BildPfadAnfang. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
									}
								}
								elseif($Naechste6BildAbfrageReihen == 2)
								{
									while ($Naechste6BildAbfrageRow = mysqli_fetch_array($Naechste6BildAbfrage))
										{
										$Naechste6BildID = $Naechste6BildAbfrageRow['ID'];
										$Naechste6BildPfad = $Naechste6BildAbfrageRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste6BildID. "'><img src='" .$Naechste6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
									$Naechste4BildAbfrageAnfang = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' LIMIT 4");
									$Naechste4BildAbfrageAnfangReihen = mysqli_num_rows($Naechste4BildAbfrageAnfang);
									
									while($Naechste4BildAbfrageAnfangRow = mysqli_fetch_array($Naechste4BildAbfrageAnfang))
									{
										$Naechste4BildIDAnfang = $Naechste4BildAbfrageAnfangRow['ID'];
										$Naechste4BildPfadAnfang = $Naechste4BildAbfrageAnfangRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste4BildIDAnfang. "'><img src='" .$Naechste4BildPfadAnfang. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
									}
								}
								elseif($Naechste6BildAbfrageReihen == 1)
								{
									while ($Naechste6BildAbfrageRow = mysqli_fetch_array($Naechste6BildAbfrage))
										{
										$Naechste6BildID = $Naechste6BildAbfrageRow['ID'];
										$Naechste6BildPfad = $Naechste6BildAbfrageRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste6BildID. "'><img src='" .$Naechste6BildPfad. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
										}
									$Naechste5BildAbfrageAnfang = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' LIMIT 5");
									$Naechste5BildAbfrageAnfangReihen = mysqli_num_rows($Naechste5BildAbfrageAnfang);
									
									while($Naechste5BildAbfrageAnfangRow = mysqli_fetch_array($Naechste5BildAbfrageAnfang))
									{
										$Naechste5BildIDAnfang = $Naechste5BildAbfrageAnfangRow['ID'];
										$Naechste5BildPfadAnfang = $Naechste5BildAbfrageAnfangRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste5BildIDAnfang. "'><img src='" .$Naechste5BildPfadAnfang. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
									}
								}
								elseif($Naechste6BildAbfrageReihen == 0)
								{
									$Naechste6BildAbfrageAnfang = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' LIMIT 6");
									$Naechste6BildAbfrageAnfangReihen = mysqli_num_rows($Naechste6BildAbfrageAnfang);
									
									while($Naechste6BildAbfrageAnfangRow = mysqli_fetch_array($Naechste6BildAbfrageAnfang))
									{
										$Naechste6BildIDAnfang = $Naechste6BildAbfrageAnfangRow['ID'];
										$Naechste6BildPfadAnfang = $Naechste6BildAbfrageAnfangRow['BildPfad'];
										
										echo "<a href='bilder.php?picID=" .$Naechste6BildIDAnfang. "'><img src='" .$Naechste6BildPfadAnfang. "' style='max-height: 55px; max-width: 72px; border-style: double; border-color: #FFFFFF'></a> ";
									}
								}
								echo "</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td align='center' width='120' bgcolor='#000000'>";
								// Bereich, wo das vorherige Bild gewählt werden kann
								
								//Abfrage machen
								$VorherigesBildAbfrage = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' AND ID < " .$BildID. " ORDER BY ID DESC LIMIT 1");
								$VorherigesBildAbfrageReihen = mysqli_num_rows($VorherigesBildAbfrage);
								if($VorherigesBildAbfrageReihen > 0)
									{
									while($VorherigesBildAbfrageRow = mysqli_fetch_array($VorherigesBildAbfrage))
										{
										$VorherigesBildID = $VorherigesBildAbfrageRow['ID'];
										
										echo "<a href='bilder.php?picID=" .$VorherigesBildID. "'><img src='img_page/knoepfe/bild_vorheriges.png' height='250'></a>";
										}
									}
								elseif($VorherigesBildAbfrageReihen == 0)
								{
									$VorherigesBildAbfrageEnde = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' ORDER BY ID DESC LIMIT 1");
									while($VorherigesBildAbfrageEndeRow = mysqli_fetch_array($VorherigesBildAbfrageEnde))
									{
										$VorherigesBildEndeID = $VorherigesBildAbfrageEndeRow['ID'];
										
										echo "<a href='bilder.php?picID=" .$VorherigesBildEndeID. "'><img src='img_page/knoepfe/bild_vorheriges.png' height='250'></a>";
									}
								}
								echo "</td>";
								echo "<td align='center' width='800' height='600' bgcolor='#000000'>";
								// Bereich, indem das Bild gross angezeigt wird
								echo "<img src='" .$BildPfad. "' style='max-height: 600px; max-width: 800px'>";
								
								echo "</td>";
								echo "<td align='center' width='120' bgcolor='#000000'>";
								// Bereich, wo das nächste Bild gewählt werden kann
								
								//Abfrage machen
								$NaechstesBildAbfrage = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' AND ID > " .$BildID. " LIMIT 1");
								$NaechstesBildAbfrageReihen = mysqli_num_rows($NaechstesBildAbfrage);
								if($NaechstesBildAbfrageReihen > 0)
									{
									while ($NaechstesBildAbfrageRow = mysqli_fetch_array($NaechstesBildAbfrage))
										{
										$NaechstesBildID = $NaechstesBildAbfrageRow['ID'];
										
										echo "<a href='bilder.php?picID=" .$NaechstesBildID. "'><img src='img_page/knoepfe/bild_naechstes.png' height='250'></a>";
										}
									}
								elseif($NaechstesBildAbfrageReihen == 0)
								{
									$NaechstesBildAbfrageAnfang = mysqli_query($db, "SELECT * FROM bilder WHERE AlbumID='" .$AlbumID. "' LIMIT 1");
									while ($NaechstesBildAbfrageAnfangRow = mysqli_fetch_array($NaechstesBildAbfrageAnfang))
									{
										$NaechstesBildAnfangID = $NaechstesBildAbfrageAnfangRow['ID'];
										
										echo "<a href='bilder.php?picID=" .$NaechstesBildAnfangID. "'><img src='img_page/knoepfe/bild_naechstes.png' height='250'></a>";
									}
								}
								
								
									echo "</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td bgcolor='#000000'>";
									echo "</td>";
									echo "<td bgcolor='#000000'>";
									echo "<table border='0' style='border-collapse:collapse;' width='800'>";
									echo "<tr>";
									echo "<td width='*' height='100' valign='top'>";
									echo "<font style='color:#FFFFFF; font-weight:bold;'>" .$BildName. "</font><br>";
									echo "<font style='color:#FFFFFF;'>" .$BildKommentar. "</font>";
									echo "</td>";
									echo "<td align='right' valign='top'><font style='color:#FFFFFF;'>" .$BildDatum. "</font>";
									echo "</td>";
									echo "</tr>";
									echo "</table>";
									echo "</td>";
									echo "<td bgcolor='#000000'>";
									echo "</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='3' bgcolor='#000000'><font style='color:#FFFFFF;'><hr></font></td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='3' align='center' bgcolor='#000000'>";
									if(isset($StatusID))
									{
										if($StatusID == 2)
										{
											echo "<p class='yellow' align='center'>Der Eintrag wurde gespeichert und wird nach einer Pr&uuml;fung freigegeben.</p>";
										}
										elseif($StatusID == 1)
										{
											echo "<p class='green' align='center'>Der Eintrag wurde erfolgreich ver&ouml;ffentlicht.</p>";
										}
									}
									echo "</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='3' bgcolor='#000000'><font style='color:#FFFFFF;'>";
									echo "<h1>Kommentare</h1>";
									echo "</font></td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td bgcolor='#000000'>";
									echo "</td>";
									echo "<td bgcolor='#000000'><font style='color:#FFFFFF;'>";
									echo "<form action='bilder_kommentar_eintragen.php' id='bilder_kommentar_eintragen' method='post'>";
									echo "<table border='0' style='border-collapse:collapse;'>";
									echo "<tr>";
									echo "<tr>";
									// die Bild ID in einem versteckten Feld irgendwo im Tabellenraster mitgeben
									echo "<input type='hidden' name='BildID' id='BildID' value='" .$BilderID. "'>";
									echo "<td><font style='color:#FFFFFF;'>";
									echo "Name:</font></td>";
									echo "<td>";
									echo "<input type='text' name='sendername' size='50' id='sendername' maxlength='255'></td><td></td>";
									echo "</tr><tr>";
									echo "<td><font style='color:#FFFFFF;'>";
									echo "E-Mail Adresse:</font></td>";
									echo "<td>";
									echo "<input type='email' name='sendermail' size='50' id='sendermail' maxlength='255'></td><td></td>";
									echo "</tr><tr>";
									echo "<td><font style='color:#FFFFFF;'>";
									echo "Homepage:</font></td>";
									echo "<td>";
									echo "<input type='text' name='senderhomepage' size='50' id='senderhomepage' maxlength='255' value='http://'></td><td></td>";
									echo "</tr><tr>";
									echo "<td><font style='color:#FFFFFF;'>";
									echo "Eintrag:</font></td>";
									echo "<td>";
									echo "<textarea name='eintrag' cols='38' id='eintrag'></textarea></td><td valign='bottom'><button type='submit'>Eintrag absenden</button></td>";
									echo "</tr>";
									// In einem versteckten Feld irgendwo im Tabellenraster den Status ermitteln und mitgeben
									$FreigabepflichtErmitteln = mysqli_query($db, "SELECT * from attribute WHERE attributname='BilderEintraegeFreigabepflicht'");
									while ($FreigabeRow = mysqli_fetch_array($FreigabepflichtErmitteln))
									{
										$Freigabewert = $FreigabeRow['wert'];
									
										if($Freigabewert == '0')
										{
											$Status = "1";
										}
										elseif($Freigabewert == '1')
										{
											$Status = "2";
										}
						
										echo "<input type='hidden' name='status' id='status' value='". $Status ."'>";
						
									}
									echo "</table>";
									echo "</form>";
									echo "</td>";
									echo "<td bgcolor='#000000'>";
									echo "</font></td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td colspan='3' bgcolor='#000000'><font style='color:#FFFFFF;'><hr></font></td>";
									echo "</tr>";
									// Kommentare zum Bild anzeigen
									$BildKommentarAbfrage = mysqli_query($db, "SELECT id, sendername, sendermail, senderhomepage, kommentar, DATE_FORMAT(datum,'%D. %M %Y %h:%i') AS datum FROM bilderkommentare WHERE BildID='" .$BildID. "' AND Status='1' ORDER BY datum DESC");
									$BildKommentarAbfrageReihen = mysqli_num_rows($BildKommentarAbfrage);
									if($BildKommentarAbfrageReihen !== 0)
									{
										while ($BildKommentarAbfrageRow = mysqli_fetch_array($BildKommentarAbfrage))
										{
										$BildKommentarID = $BildKommentarAbfrageRow['id'];
										$BildKommentarSendername = $BildKommentarAbfrageRow['sendername'];
										$BildKommentarSendermail = $BildKommentarAbfrageRow['sendermail'];
										$BildKommentarSenderhomepage = $BildKommentarAbfrageRow['senderhomepage'];
										$BildKommentarKommentar = $BildKommentarAbfrageRow['kommentar'];
										$BildKommentarDatum = $BildKommentarAbfrageRow['datum'];
										
										echo "<tr>";
										echo "<td colspan='3' align='center' bgcolor='#000000'>";
										echo "<table border ='0' style='border-collapse:separate; border-spacing:20px;' width='900' align='left'>";
										echo "<tr>";
										echo "<td>";
										echo "<table border='0' style='border-collapse:collapse;' width='1000'>";
										echo "<tr>";
										echo "<td bgcolor='#515151'><font style='color:#FFFFFF;'>" .$BildKommentarSendername. " am " .$BildKommentarDatum. "</font></td>";
										echo "</tr>";
										echo "<tr>";
										echo "<td bgcolor='#717171'><font style='color:#FFFFFF;'>" .$BildKommentarKommentar. "</font></td>";
										echo "</tr>";
										echo "</table>";
										echo "</td>";
										echo "</tr>";
										echo "</table>";
										echo "</td>";
										echo "</tr>";
										}
									}
									elseif($BildKommentarAbfrageReihen == 0)
									{
										echo "<tr>";
										echo "<td colspan='3' align='center' bgcolor='#000000'>";
										echo "<font style='font-style:italic; color:#FFFFFF'>Zurzeit sind keine Eintr&auml;ge vorhanden.</font><br>&nbsp;";
										echo "</td>";
										echo "</tr>";
									}
									echo "</table>";
							}
						}
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