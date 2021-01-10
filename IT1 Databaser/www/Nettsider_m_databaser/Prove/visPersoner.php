<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
		<h1>Alle personer som er registrert i databasen</h1>
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
			
			$sql = "SELECT * FROM Person ORDER BY etternavn";
			
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			
			echo "<table>";
			echo "<tr>";
				echo "<th>Etternavn</th>";
				echo "<th>Fornavn</th>";
				echo "<th>E-post</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
				$epost = $rad["epost"];
						
			echo "<tr>";
				echo "<td>$enavn</td>";
				echo "<td>$fnavn</td>";
				echo "<td>$epost</td>";
			echo "</tr>";
			}
			echo "</table>";
			
		?>
		
	</body>
</html>