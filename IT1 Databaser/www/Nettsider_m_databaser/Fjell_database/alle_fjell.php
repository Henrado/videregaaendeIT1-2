<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
	
        <?php
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "fjellomrader";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			$sql = "SELECT * FROM Fylke
					JOIN Omrade ON Fylke . fylkenr=Omrade . fylkenr
					JOIN Fjell ON Omrade . omradeID=Fjell . omradeID ORDER BY moh";
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			
			echo "<table>";
			echo "<tr>";
				echo "<th>Fylke</th>";
				echo "<th>Område</th>";
				echo "<th>Fjell</th>";
				echo "<th>MOH</th>";
				echo "<th>Slett</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$fjellnr =$rad["fjellnr"];
				$fylke = $rad["fylke"];
				$omrade = $rad["omrade"];
				$fjell = $rad["fjell"];
				$moh = $rad["moh"];
						
			echo "<tr>";
				echo "<td>$fylke</td>";
				echo "<td>$omrade</td>";
				echo "<td>$fjell</td>";
				echo "<td>$moh</td>";
					echo "<form method='post'>"; //skriv action='slette.php' for å slette på en annen side
					echo "<td>";
					echo "<input type='hidden' name='slett_id' value='$fjellnr'>";
					echo "<input type='submit' value='slett'>";
					echo "</td>";
					echo "</form>";
			echo "</tr>";
			}
			echo "</table>";
			
				if (isset($_POST["slett_id"])) {
					$slett_id = $_POST["slett_id"];	
			
					$sql = "DELETE FROM fjell WHERE fjellnr='$slett_id'";

					if($kobling->query($sql)) {
						echo "Spørringen $sql ble gjennomført.";
					} else {
					echo "Noe gikk galt med spørringen $sql ($kobling->error).";
					}
					header ("Refresh:0");
				}
		?>
			
	</body>
</html>