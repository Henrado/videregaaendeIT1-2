<!DOCTYPE html>
<html>
    
    <head>
        <title>Phus</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./test.css">
    </head>
    <body>
		<div class="Main">
        <?php

            include "./php/tilkobling.php";
			
            include "./php/bannerogmeny.php";
            ?>
		
			<div class="Innhold">
			
			<h1>Alle registrerte leietagere</h1>
			
			<?php
			           

			$sql = "SELECT * FROM Leietaker JOIN Bil ON Bil.kundenr=Leietaker.kundenr";
			$resultat = $kobling->query($sql);
			//echo $sql;

			echo "<table>";
			echo "<tr>";
				echo "<th>Kundenummer</th>";
				echo "<th>Fornavn</th>";
				echo "<th>Etternavn</th>";
				echo "<th>Mobil</th>";
				echo "<th>Start dato</th>";
				echo "<th>Registreringsnummer</th>";
				echo "<th>Merke</th>";
				echo "<th>Model</th>";
				echo "<th>Årsmodell</th>";
				
			echo "</tr>";
					
			while($rad = $resultat->fetch_assoc()) {
				$kundenr = $rad["kundenr"];
				$fornavn = $rad["fornavn"];
				$etternavn =$rad["etternavn"];
				$mobil = $rad["mobil"];
				$startdato = $rad["startdato"];
				$regnr = $rad["regnr"];
				$merke = $rad["merke"];
				$modell =$rad["modell"];
				$aarsmodell = $rad["aarsmodell"];
				
				
			echo "<tr>";
				echo "<td>$kundenr</td>";
				echo "<td>$fornavn</td>";
				echo "<td>$etternavn</td>";
				echo "<td>$mobil</td>";
				echo "<td>$startdato</td>";
				echo "<td>$regnr</td>";
				echo "<td>$merke</td>";
				echo "<td>$modell</td>";
				echo "<td>$aarsmodell</td>";
			echo "</tr>";
			}
			echo "</table>";
		?>
			</div>
		</div>
	</body>
</html>