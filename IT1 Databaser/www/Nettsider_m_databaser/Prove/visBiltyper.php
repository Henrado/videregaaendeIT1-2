<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
		<h1>Alle biltyper som er registrert i databasen</h1>
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
			
			$sql = "SELECT * FROM Biltype ORDER BY typenavn";
			
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			
			echo "<table>";
			echo "<tr>";
				echo "<th>Biltyper</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$typenavn = $rad["typenavn"];
				$typeid = $rad["typeid"];
						
			echo "<tr>";
				echo "<td><a href='motaBiltyper.php?typenavn=$typenavn'>$typenavn</a></td>";
			echo "</tr>";
			}
			echo "</table>";
			
		?>
			
	</body>
</html>