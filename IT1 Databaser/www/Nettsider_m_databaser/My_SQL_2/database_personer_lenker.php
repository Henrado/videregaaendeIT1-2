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
				echo "<th>Slett</th>";
				echo "<th>Endre</th>";
			echo "</tr>";
			
			while($rad = $resultat->fetch_assoc()) {
				$person_id = $rad["person_id"];
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
				$poststed = $rad["poststed"];
				$mobil = $rad["mobil"];
				$epost = $rad["epost"];
				
			echo "<tr>";
				echo "<td>$fnavn</td>";
				echo "<td>$enavn</td>";
				echo "<td><a href='postadresse_mota.php?poststed=$poststed'>$poststed</a></td>";
				echo "<td>$mobil</td>";
				echo "<td>$epost</td>";
					echo "<form method='post'>"; //skriv action='slette.php' for å slette på en annen side
					echo "<td>";
					echo "<input type='hidden' name='slett_id' value='$person_id'>";
					echo "<input type='submit' value='slett'>";
					echo "</td>";
					echo "</form>";
			
					echo "<form method='post' action='update.php'>";
					echo "<td>";
					echo "<input type='hidden' name='endre_id' value='$person_id'>";
					echo "<input type='submit' value='endre'>";
					echo "</td>";
					echo "</form>";
			echo "</tr>";
			}
			echo "</table>";
		
		if (isset($_POST["slett_id"])) {
			$slett_id = $_POST["slett_id"];	
			
			$sql = "DELETE FROM person WHERE person_id='$slett_id'";

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