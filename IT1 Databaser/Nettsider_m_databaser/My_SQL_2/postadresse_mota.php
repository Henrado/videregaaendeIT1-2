<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
		<style>
			 table {
				border: solid;
			}
			table th {
				color: #FF0000;
				border: solid;
				border-color:#00FF00;
			}
			table td {
				color: #0000FF;
			}
		</style>
    </head>
    <body>
	
        <?php
			if (isset($_GET["poststed"])) {
				$poststed = $_GET["poststed"];
				echo "$poststed";
				echo "<p><a href='https://www.google.no/maps/place/$poststed' target='_blank'>Se poststed på kart</a></p>";
			}
			else {
				die ("Du kom hit uten et poststed!!!" . $kobling->connect_error);
			}
				$tjener ="localhost";
				$brukernavn = "root";
				$passord = "";
				$database = "personer";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
				if ($kobling->connect_error) {
					die ("Du feilet!!!" . $kobling->connect_error);
				}
			
			$kobling->set_charset("utf-8");
			
			$sql = "SELECT * FROM person JOIN postadresse ON person.postadresse_postnr = postadresse.postnr WHERE poststed='$poststed'";
			$resultat = $kobling->query($sql);
			/*echo $sql;*/
			echo "Alle som har $poststed som Poststed";
			echo "<table>";
			echo "<tr>";
				echo "<th>Fornavn</th>";
				echo "<th>Etternavn</th>";
				echo "<th>Mobil</th>";
				echo "<th>E-post</th>";
				echo "<th>Postnummer</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
				$mobil = $rad["mobil"];
				$epost = $rad["epost"];
				$postnr = $rad["postnr"];
				
			echo "<tr>";
				echo "<td>$fnavn</td>";
				echo "<td>$enavn</td>";
				echo "<td>$mobil</td>";
				echo "<td>$epost</td>";
				echo "<td>$postnr</td>";
			echo "</tr>";
			}
			echo "</table>";
			
		?>			
	</body>
</html>