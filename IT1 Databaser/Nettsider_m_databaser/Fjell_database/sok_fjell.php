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
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "fjellomrader";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			$sql ="SELECT * FROM Fylke
      JOIN Omrade ON Fylke . fylkenr=Omrade . fylkenr
      JOIN Fjell ON Omrade . omradeID=Fjell . omradeID GROUP BY fylke.fylkenr";
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			echo "Fylker som har fjellomrader";
			echo "<table>";
			echo "<tr>";
				echo "<th>Fylke</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$fylke = $rad["fylke"];
						
			echo "<tr>";
				echo "<td><a href='mota_fjell.php?fylke=$fylke'>$fylke</a></td>";
			echo "</tr>";
			}
			echo "</table>";
			
		?>
			
	</body>
</html>