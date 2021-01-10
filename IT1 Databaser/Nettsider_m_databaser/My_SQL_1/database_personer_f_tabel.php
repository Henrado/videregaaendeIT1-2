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
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "personer";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			$sql = "SELECT * FROM person 
					JOIN postadresse ON person . postadresse_postnr=postadresse . postnr";
			$resultat = $kobling->query($sql);
			/*echo $sql;*/
			echo "<table>";
			echo "<tr>";
				echo "<th>Fornavn</th>";
				echo "<th>Etternavn</th>";
				echo "<th>Poststed</th>";
				echo "<th>Mobil</th>";
				echo "<th>E-post</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
				$poststed = $rad["poststed"];
				$mobil = $rad["mobil"];
				$epost = $rad["epost"];
				
			echo "<tr>";
				echo "<td>$fnavn</td>";
				echo "<td>$enavn</td>";
				echo "<td>$poststed</td>";
				echo "<td>$mobil</td>";
				echo "<td>$epost</td>";
			echo "</tr>";
			}
			echo "</table>";
			
		?>
		
	</body>
</html>