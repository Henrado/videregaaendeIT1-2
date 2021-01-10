<!DOCTYPE html>
<html>
    
    <head>
        <title>Oslos Fiskeutsyr</title>
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
		
			<h1>Alle registrerte bestillinger</h1>
			
			<?php
								
				$sql = "SELECT * FROM kunde JOIN handlekurv ON kunde . kundenummer=handlekurv . kundenummer JOIN 
			varelinje ON handlekurv . ordrenummer=varelinje . ordrenummer JOIN
			produkt ON varelinje . produktnummer=produkt . produktnummer";
			//echo $sql;
			if(isset($_POST["sorter"])) {
				$sql = "SELECT * FROM kunde JOIN handlekurv ON kunde . kundenummer=handlekurv . kundenummer JOIN 
			varelinje ON handlekurv . ordrenummer=varelinje . ordrenummer JOIN
			produkt ON varelinje . produktnummer=produkt . produktnummer WHERE ordretidspunkt >= (NOW() - INTERVAL 7 DAY)";
			}
			$resultat = $kobling->query($sql);

			
			echo "<table>";
			echo "<tr>";
				echo "<th>Kundenummer</th>";
				echo "<th>Etternavn</th>";
				echo "<th>Fornavn</th>";
				echo "<th>Produktnummer</th>";
				echo "<th>Produkt navn</th>";
				echo "<th>Antall</th>";
				echo "<th>pris</th>";
				echo "<th>Rabatt</th>";
				echo "<th>Samlet pris</th>";
			echo "</tr>";
					
			while($rad = $resultat->fetch_assoc()) {
				$kundenummer = $rad["kundenummer"];
				$enavn = $rad["etternavn"];
				$fnavn =$rad["fornavn"];
				$produktnummer = $rad["produktnummer"];
				$produktnavn = $rad["navn"];
				$antall = $rad["antall"];
				$pris = $rad["pris"];
				$rabatt = $rad["rabatt"];
				
				
				
				if ($rabatt > 0){
					$nypris = $pris - $pris * $rabatt / 100;
					$sampris = $nypris * $antall;
				}
				else {
					$sampris =$pris * $antall;
				}
			echo "<tr>";
				echo "<td>$kundenummer</td>";
				echo "<td>$fnavn</td>";
				echo "<td>$enavn</td>";
				echo "<td>$produktnummer</td>";
				echo "<td>$produktnavn</td>";
				echo "<td>$antall</td>";
				echo "<td>$pris</td>";
				echo "<td>$rabatt</td>";
				echo "<td>$sampris</td>";
			echo "</tr>";
			}
			echo "</table>";
		?>
				<form method="POST">
				<input type="submit" name="sorter" value="sorter">
				</form>
			</tr>
			</div>
		</div>
	</body>
</html>