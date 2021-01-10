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
			
			<h1>Alle registrerte kunder</h1>
			
			<?php
                if(isset($_POST["kundenummer"])) {
  	 
                
                    $kundenummer = $_POST["kundenummer"];
                    $nyttetternavn = $_POST["nyttetternavn"];
                    $nyttfornavn = $_POST["nyttfornavn"];
                    $nyttadresse = $_POST["nyttadresse"];
                    $nytttelefonnummer = $_POST["nytttelefonnummer"];
                    $nyttpostnr = $_POST["nyttpostnr"];
                    

                    $sql = "UPDATE kunde SET etternavn='$nyttetternavn', fornavn='$nyttfornavn', adresse='$nyttadresse', telefonnummer='$nytttelefonnummer', postnr='$nyttpostnr' WHERE kundenummer='$kundenummer'";
        
                    if($kobling->query($sql)) {
						header ("refresh:0; url=kunder.php");
                } else {
                echo "Noe gikk galt med spørringen $sql ($kobling->error).";
                        } 
				}
				
			if (isset($_POST["slett_id"])) {
					$slett_id = $_POST["slett_id"];	
			
					$sql = "DELETE FROM kunde WHERE kundenummer='$slett_id'";

					if($kobling->query($sql)) {
						header ("refresh:0; url=kunder.php");
					} else {
					echo "Noe gikk galt med spørringen. Hvis de har bestilt ett produkt vil dem ikke kunne slettes!";
					}
				}
				
			$sql = "SELECT * FROM kunde JOIN postadresse ON kunde . postnr=postadresse . postnr ORDER BY etternavn";
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			

			echo "<table>";
			echo "<tr>";
				echo "<th>Etternavn</th>";
				echo "<th>Fornavn</th>";
				echo "<th>Adresse</th>";
				echo "<th>Telefonnummer</th>";
				echo "<th>Postnummer</th>";
				echo "<th>Postadresse</th>";
				echo "<th>Slett</th>";
				echo "<th>Endre</th>";
			echo "</tr>";
					
			while($rad = $resultat->fetch_assoc()) {
				$kundenummer = $rad["kundenummer"];
				$enavn = $rad["etternavn"];
				$fnavn =$rad["fornavn"];
				$adresse = $rad["adresse"];
				$telefonnummer = $rad["telefonnummer"];
				$postnr = $rad["postnr"];
				$poststed = $rad["poststed"];
						
			echo "<tr>";
				echo "<td>$enavn</td>";
				echo "<td>$fnavn</td>";
				echo "<td>$adresse</td>";
				echo "<td>$telefonnummer</td>";
				echo "<td>$postnr</td>";
				echo "<td>$poststed</td>";
					echo "<td>";
					echo "<form method='post'>"; //skriv action='slette.php' for å slette på en annen side
					echo "<input type='hidden' name='slett_id' value='$kundenummer'>";
					echo "<input type='submit' value='slett'>";
					echo "</form>";
				echo "</td>";
                    echo "<td>";
                echo "<form method='post' action='EndreForm.php'>";
                    echo "<input type='hidden' name='endre_id' value='$kundenummer'>";
                    echo "<input type='submit' value='endre'>";
                    echo "</td>";
                    echo "</tr>";
                echo "</form>";
			echo "</tr>";
			}
			echo "</table>";
		?>
			</div>
		</div>
	</body>
</html>