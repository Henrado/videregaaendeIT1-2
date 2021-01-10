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
			}
		</style>
    </head>
    <body>
	
        <?php
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "personer";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			$sql = "SELECT * FROM person ORDER BY person_id";
			$resultat = $kobling->query($sql);
			/*echo $sql;*/
			echo "<table>";
			echo "<tr>";
				echo "<th>Person id</th>";
				echo "<th>Fornavn</th>";
				echo "<th>Etternavn</th>";
				echo "<th>E-post</th>";
				echo "<th>Postnummer</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$person_id = $rad["person_id"];
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
				$epost = $rad["e-post"];
				$postnr = $rad["postadresse_postnr"];

				
			echo "<tr>";
				echo "<td>$person_id</td>";
				echo "<td>$fnavn</td>";
				echo "<td>$enavn</td>";
				echo "<td>$epost</td>";
				echo "<td>$postnr</td>";
			echo "</tr>";
			}
			echo "</table>";
		?>
		
	</body>
</html>