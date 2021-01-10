<!DOCTYPE html>
<html>
    
    <head>
        <title>Oslos Fiskeutsyr</title>
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
		
		if((isset($_POST["leggtil"])) and (empty($_POST["postnrny"])) and (empty($_POST["poststedny"]))) {
				$postnr = $_POST["postadresse"];
				
			echo "Bruker gammel postadresse ";
		}
		
		elseif((isset($_POST["leggtil"])) and (isset($_POST["postnrny"])) and (isset($_POST["poststedny"]))) {		// Flere variabler som må oppfylles
				$postnr = $_POST["postnrny"];
				$poststed = $_POST["poststedny"];
				
			echo "Bruker ny postadresse";
			
			$sql = "INSERT INTO postadresse (postnr, poststed) VALUES ('$postnr', '$poststed')";
			//echo $sql;
			
			if($kobling->query($sql)) {
					echo "La til ny postst";
			}	
			else {
				echo "Noe gikk galt med å sette inn ny postadresse$sql ($kobling->error)";
			}
		}
		
		if(isset($_POST["leggtil"])) {
				$fnavn = $_POST["fornavn"];
				$enavn = $_POST["etternavn"];
				$telefonnummer = $_POST["telefonnummer"];
				$adresse = $_POST["adresse"];
				
			
			$sql = "INSERT INTO kunde (fornavn, etternavn, telefonnummer, adresse, postnr) VALUES ('$fnavn', '$enavn', '$telefonnummer', '$adresse', '$postnr')";
			
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
			</tr>
			<tr> 
				<th>Postnummer</th>
				<td><input type="nummer" name="postnrny"></td>
			</tr>
			<tr>
				<th>Poststed</th>
				<td><input type="text" name="poststedny"></td>
			</tr>
			<tr>

		<?php
                $sql = "SELECT * FROM postadresse";
                $resultat = $kobling->query($sql);
				echo "<th>Hvis postadressen finnes alerede ";
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
			</div>
		</div>
	</body>
</html>