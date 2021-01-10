<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Skjema med php</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="#">
    </head>
    <body>
        <?php
			if (isset($_GET["regn"])) {
				$dato = date("d" . " ". "m" ." ". "Y" . " ");
				$fodt = $_GET["tall"];
				echo "Datoen i dag er: $dato";
				if (date("Y") - $fodt > 18) {
					echo " Du er over 18 år";
				}
				else if (date("Y") - $fodt == 18) {
					echo "Du blir 18 år i år";
				}
				else {
					echo "Du er ikke over 18 år";
				} 
			}
		?>
		<form method = "GET"> 
				<input type="number" name="tall"> <br>
				<input type="submit" name="regn" value="Fødselsår!">
		</form>      