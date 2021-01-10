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
				$regnr = $_POST["regnr"];
				$merke = $_POST["merke"];
				$modell = $_POST["modell"];
				$aarsmodell = $_POST["aarsmodell"];
				$kundenr = $_POST["kundenr"];
				
			
			$sql = "INSERT INTO Bil (regnr, merke, modell, aarsmodell, kundenr) VALUES ('$regnr', '$merke', '$modell', '$aarsmodell', '$kundenr')";
			
			if($kobling->query($sql)) {
					echo "Det å legge til bil funket";//$sql
			}	
			else {
				echo "Noe gikk galt med $sql ($kobling->error)";
			}
		}
			
		
		?>
		<table>
			<form method="POST">
			<tr>
				<th>Reggistreringsnummer</th>
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
				<th>Årsmodell</th>
				<td><input type="text" name="aarsmodell"></td>
			</tr>
			<tr>
			<?php
                $sql = "SELECT * FROM Leietaker ORDER BY etternavn";
                $resultat = $kobling->query($sql);
				echo "<th>Kunde</th>";
                echo "<td><select name='kundenr'>"; 

                while($rad = $resultat->fetch_assoc()) {
                    $kundenr = $rad["kundenr"];
                    $fnavn = $rad["fornavn"];
					$enavn = $rad["etternavn"];

                    echo "<option value=$kundenr>$enavn $fnavn</option>";
                }
                echo "</select> </td>";
			?>
			</tr>
		</table>
		<input type="submit" name="leggtil" value="Legg Til">			
			</form>
			</div>
		</div>
	</body>
</html>