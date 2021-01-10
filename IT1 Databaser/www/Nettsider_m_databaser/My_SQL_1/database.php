<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="#">
    </head>
    <body>
	
        <?php
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "tegneseriefigurer";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			$sql = "SELECT figurnavn , bladnavn FROM figur JOIN blad ON figur . blad_id=blad.blad_id";
			$resultat = $kobling->query($sql);
			
		echo "<table>";
		echo "<tr>";
			echo "<th>Blad id</th>";
			echo "<th>Bladnavn</th>";
		echo "</tr>";
		
			while($rad = $resultat->fetch_assoc()) {
				$figurnavn = $rad["figurnavn"];
				$bladnavn = $rad["bladnavn"];
			
		echo "<tr>";
			echo "<td>$figurnavn</td>";
			echo "<td>$bladnavn</td>";
		echo "</tr>";
			}
		echo "</table>";
		?>
		
	</body>
</html>