<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="#">
		<style>
			 table {
				border: solid;
			}
			table th {
				color: #0000FF;
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
			if (isset($_GET["fylke"])) {
				$fylke = $_GET["fylke"];
				echo "Alle fjell i fylke $fylke";
				echo "<p><a href='https://www.google.no/maps/place/$fylke' target='_blank'>Se $fylke på kart</a></p>";
			}
			else {
				die ("Du kom hit uten et fylke!!!" . $kobling->connect_error);
			}
			
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
					JOIN Fjell ON Omrade . omradeID=Fjell . omradeID WHERE fylke='$fylke'";
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			echo "<table>";
			echo "<tr>";
				echo "<th>Område</th>";
				echo "<th>Fjell</th>";
				echo "<th>MOH</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$omrade = $rad["omrade"];
				$fjell = $rad["fjell"];
				$moh = $rad["moh"];
			
			echo "<tr>";
				echo "<td>$omrade</td>";
				echo "<td>$fjell</td>";
				echo "<td>$moh</td>";
			echo "</tr>";
			}
			
		?>
			
	</body>
</html>