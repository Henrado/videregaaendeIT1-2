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
		
		if(isset($_POST["leggtil"])) {
				$poststed = $_POST["poststed"];
				$postnr = $_POST["postnr"];
				//NOE HER
			
			$sql = "INSERT INTO postadresse (postnr, poststed) VALUES ('$postnr', '$poststed')";
			//echo $sql;
			
			if($kobling->query($sql)) {
					echo "Spørringen $sql ble gjennomført";
			}	
			else {
				echo "Noe gikk galt med $sql ($kobling->error)";
			}
		}
			
		?>
		
		<form method="POST">
			Poststed
			<input type="text" name="poststed">
			Postnummer
			<input type="number" name="postnr">
			
			<input type="submit" name="leggtil" value="Legg Til">
		</form>
	</body>
</html>