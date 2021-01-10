<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
		<h1>Alle biler som er registrert i databasen</h1>
        <?php
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "bilregister";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			$sql = "SELECT * FROM Bil JOIN person ON Bil.personid=Person.personid JOIN biltype ON Bil.typeid=biltype.typeid";
			
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			
			echo "<table>";
			echo "<tr>";
				echo "<th>Registreringsnummer</th>";
				echo "<th>Merke</th>";
				echo "<th>Modell</th>";
				echo "<th>År</th>";
				echo "<th>Type bil</th>";
				echo "<th>Etternavn</th>";
				echo "<th>Fornavn</th>";
				echo "<th>E-post</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$regnr = $rad["regnr"];
				$merke = $rad["merke"];
				$modell = $rad["modell"];
				$aar = $rad["aar"];
				$typenavn = $rad["typenavn"];
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
				$epost = $rad["epost"];
						
			echo "<tr>";
				echo "<td>$regnr</td>";
				echo "<td>$merke</td>";
				echo "<td>$modell</td>";
				echo "<td>$aar</td>";
				echo "<td><a href='motaBiltyper.php?typenavn=$typenavn'>$typenavn</a></td>";
				echo "<td>$enavn</td>";
				echo "<td>$fnavn</td>";
				echo "<td>$epost</td>";
			echo "</tr>";
			}
			echo "</table>";
			
		?>
			
	</body>
</html>