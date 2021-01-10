<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
	
        <?php
		if(isset($_POST["endre_id"])) {
			$endre_id = $_POST["endre_id"];
			
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "personer";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
		} else {
			die("Du må velge noe!");
		}
			$sql = "SELECT * FROM person 
					JOIN postadresse ON person . postadresse_postnr=postadresse . postnr WHERE person_id='$endre_id'";
			$resultat = $kobling->query($sql);
			//echo "$sql";
			
			echo "<form action='endre.php' method='POST'>";
			while ($rad = $resultat->fetch_assoc()) {
				$person_id = $rad["person_id"];
				$fnavn = $rad["fornavn"];
				$enavn = $rad["etternavn"];
			
				echo "ID";
				echo "<input type='number' name='person_id' value='$person_id' disabled>";
				echo "<br>Fornavn";
				echo "<input type='text' name='nyttfnavn' value='$fnavn'>";
				echo "<br>Etternavn";
				echo "<input type='text' name='nyttenavn' value='$enavn'>";
			}	
				echo "<input type='submit' name='endre_id' value='endre'>";
			echo "</form>";
			
		?>
	</body>
</html>