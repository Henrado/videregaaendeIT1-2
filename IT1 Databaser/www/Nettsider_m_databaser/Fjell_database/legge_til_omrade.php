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
			$database = "fjellomrader";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
		if(isset($_POST["leggtil"])) {
				$omrade = $_POST["omrade"];
				$fylkenr = $_POST["fylkenr"];
				//NOE HER
			
			$sql = "INSERT INTO Omrade (omrade , fylkenr) VALUES ('$omrade' , '$fylkenr')";
				//Kan bli feil
			if($kobling->query($sql)) {
					echo "Spørringen ble gjennomført";//$sql
			}	
			else {
				echo "Noe gikk galt med $sql ($kobling->error)";
			}
		}
			
		?>
		<table>
			<form method="POST">
			<tr>
				<th>Område</th>
				<td><input type="text" name="omrade"></td>
			</tr>

		<?php
                $sql = "SELECT * FROM Fylke ORDER BY fylke";
                $resultat = $kobling->query($sql);
				echo "<th>";
                echo "<select name='fylkenr'>"; 
				
                while($rad = $resultat->fetch_assoc()) {
                    $fylkenr = $rad["fylkenr"];
                    $fylke = $rad["fylke"];

                    echo "<option value=$fylkenr>$fylke</option>";
                }
                echo "</select>";
				echo "</th>";
		?>
				<td><input type="submit" name="leggtil" value="Legg til område"></td>
			</tr>
			</form>
		</table>
	</body>
</html>