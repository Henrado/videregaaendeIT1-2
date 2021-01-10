<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
	
        <?php
			if (isset($_GET["typenavn"])) {
				$typenavn = $_GET["typenavn"];
				echo "Alle biler med biltypen $typenavn";
			}
			else {
				die ("Du kom hit uten en biltype!!!" . $kobling->connect_error);
			}
		
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "bilregister";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			$sql = "SELECT * FROM Bil JOIN person ON Bil.personid=Person.personid JOIN biltype ON Bil.typeid=biltype.typeid WHERE typenavn='$typenavn'";
			
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			
			echo "<table>";
			echo "<tr>";
				echo "<th>Registreringsnummer</th>";
				echo "<th>Merke</th>";
				echo "<th>Modell</th>";
				echo "<th>År</th>";
				echo "<th>Etternavn</th>";
				echo "<th>Fornavn</th>";
				echo "<th>E-post</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$regnr = $rad["regnr"];
				$merke = $rad["merke"];
				$modell = $rad["modell"];
				$aar = $rad["aar"];
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
				$epost = $rad["epost"];
			echo "<tr>";
				echo "<td>$regnr</td>";
				echo "<td>$merke</td>";
				echo "<td>$modell</td>";
				echo "<td>$aar</td>";
				echo "<td>$enavn</td>";
				echo "<td>$fnavn</td>";
				echo "<td>$epost</td>";
			echo "</tr>";
			}
			echo "</table>";
			
		?>
			
	</body>
</html>