<!DOCTYPE html>
<html>
    
    <head>
        <title>Phus</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./test.css">
    </head>
    <body>
		<div class="Main">
        <?php
			
			include "./php/tilkobling.php";
			
			include "./php/bannerogmeny.php";

		?>
			<div class="Innhold">
				
			<h1>Registrer deg</h1>
			
		<?php	
				
				$kobling->set_charset("utf-8");
		
		if(isset($_POST["leggtil"])) {
				$fnavn = $_POST["fornavn"];
				$enavn = $_POST["etternavn"];
				$mobil = $_POST["mobil"];
				$startdato = $_POST["startdato"];
				
			
			$sql = "INSERT INTO leitaker (fornavn, etternavn, mobil, startdato) VALUES ('$fnavn', '$enavn', '$mobil', '$startdato')";
			
			if($kobling->query($sql)) {
					echo "Det å legge til brukere funket";//$sql
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
				<td><input type="text" name="etternavn"></td>
			</tr>
			<tr>
				<th>Telefon nummer</th>
				<td><input type="text" name="telefonnummer"></td>
			</tr>
			<tr>
				<th>Adresse</th>
				<td><input type="text" name="adresse"></td>
			
			</table>
		
				<input type="submit" name="leggtil" value="Legg Til">			
			</form>
			</div>
		</div>
	</body>
</html>