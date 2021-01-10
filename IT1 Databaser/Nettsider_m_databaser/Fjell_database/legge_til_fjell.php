<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="#">
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
			$database = "fjellomrader";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
		if(isset($_POST["leggtil"])) {
				$fjell = $_POST["fjell"];
				$moh = $_POST["moh"];
				$omradeID = $_POST["omradeID"];
				//NOE HER
			
			$sql = "INSERT INTO Fjell (fjell , moh , omradeID) VALUES ('$fjell' , '$moh' , '$omradeID')";
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
				<th>Fjell</th>
				<td><input type="text" name="fjell"></td>
			</tr>
			<tr>
				<th>Moh</th>
				<td><input type="text" name="moh"></td>
			</tr>

		<?php
                $sql = "SELECT * FROM Omrade ORDER BY omrade";
                $resultat = $kobling->query($sql);
				echo "<th>";
                echo "<select name='omradeID'>"; 

                while($rad = $resultat->fetch_assoc()) {
                    $omradeID = $rad["omradeID"];
                    $omrade = $rad["omrade"];

                    echo "<option value=$omradeID>$omrade</option>";
                }
                echo "</select>";
				echo "</th>";
		?>
				<td><input type="submit" name="leggtil" value="Legg til fjell"></td>
			</tr>
			</form>
		</table>
	</body>
</html>