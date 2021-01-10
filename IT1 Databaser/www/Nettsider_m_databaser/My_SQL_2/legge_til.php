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
				$fnavn = $_POST["fornavn"];
				$enavn = $_POST["etternavn"];
				$postadresse = $_POST["postadresse"];
				if(isset($_POST["mobil"])){$mobil = $_POST["mobil"];}
				if(isset($_POST["epost"])){$epost = $_POST["epost"];}
				//NOE HER
			
			$sql = "INSERT INTO person (fornavn, etternavn, mobil, epost, postadresse_postnr) VALUES ('$fnavn', '$enavn', '$mobil', '$epost', '$postadresse')";
			
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
				<th>Fornavn</th>
				<td><input type="text" name="fornavn"></td>
			</tr>
			<tr>
				<th>Etternavn</th>
				<td><input type="text" name="etternavn"><td>
			</tr>
			<tr>
				<th>Mobil nummer</th>
				<td><input type="text" name="mobil"></td>
			</tr>
			<tr>
				<th>E-post</th>
				<td><input type="text" name="epost"></td>
			</tr>
			<tr>

		<?php
                $sql = "SELECT * FROM postadresse";
                $resultat = $kobling->query($sql);
				echo "<th>";
                echo "<select name='postadresse'>"; 

                while($rad = $resultat->fetch_assoc()) {
                    $postnr = $rad["postnr"];
                    $poststed = $rad["poststed"];

                    echo "<option value=$postnr>$poststed $postnr</option>";
                }
                echo "</select>";
				echo "</th>";
		?>
				<td><input type="submit" name="leggtil" value="Legg Til"></td>
			</tr>
			</form>
		</table>
	</body>
</html>