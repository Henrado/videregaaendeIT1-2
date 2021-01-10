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
			
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "personer";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
		if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
		}
			
		$kobling->set_charset("utf-8");
		
		$person_id = $_POST["person_id"];
		$nyttfnavn = $_POST["nyttfnavn"];
		$nyttenavn = $_POST["nyttenavn"];
		
		$sql = "UPDATE person SET fornavn='$nyttfnavn' WHERE person_id='$person_id'";
		//echo "$sql";
		
			if ($kobling->query($sql)) {
				echo "Det funket";
			} else {
				echo "Det funker ikke";
			}
		}	
	?>
	</body>
</html>