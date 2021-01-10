<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
		<h1>Registrer flere biler</h1>
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
			
			if(isset($_POST["leggtil"])) {
				$regnr = $_POST["regnr"];
				$merke = $_POST["merke"];
				$modell = $_POST["modell"];
				$aar = $_POST["aar"];
				$typeid = $_POST["typeid"];
				$personid = $_POST["personid"];
			
			$sql = "INSERT INTO Bil (regnr , merke , modell , aar , typeid , personid) VALUES ('$regnr' , '$merke' , '$modell' , '$aar' , '$typeid' , '$personid')";

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
				<th>Registreringsnummer</th>
				<td><input type="text" name="regnr"></td>
			</tr>
			<tr>
				<th>Merke</th>
				<td><input type="text" name="merke"></td>
			</tr>
			<tr>
				<th>Modell</th>
				<td><input type="text" name="modell"></td>
			</tr>
			<tr>
				<th>År</th>
				<td><input type="text" name="aar"></td>
			</tr>
			<tr>
				<th>Person</th>
			<?php 
				$sql = "SELECT * FROM Person ORDER BY etternavn";
                $resultat = $kobling->query($sql);
				echo "<td>";
                echo "<select name='personid'>"; 
				
                while($rad = $resultat->fetch_assoc()) {
                    $fnavn = $rad["fornavn"];
                    $enavn = $rad["etternavn"];
					$personid = $rad["personid"];

                    echo "<option value=$personid>$enavn $fnavn</option>";
                }
                echo "</select>";
				echo "</td>";
			?>
			<tr>
				<th>Biltype</th>
			<?php 
				$sql = "SELECT * FROM Biltype ORDER BY Typenavn";
                $resultat = $kobling->query($sql);
				echo "<td>";
                echo "<select name='typeid'>"; 
				
                while($rad = $resultat->fetch_assoc()) {
                    $typeid = $rad["typeid"];
                    $typenavn = $rad["typenavn"];

                    echo "<option value=$typeid>$typenavn</option>";
                }
                echo "</select>";
				echo "</td>";
		?>
			</tr>
			<tr>
				<th>Legg til</th>
				<td><input type="submit" name="leggtil" value="OK"></td>
			</tr>
			</form>
		</table>
			
	</body>
</html>