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
			
			<h1>Alle registrerte biler</h1>
			
			<?php
                if(isset($_POST["ny_regnr"])) {
					$regnr = $_POST["ny_regnr"];
                    $merke = $_POST["ny_merke"];
                    $modell = $_POST["ny_modell"];
                    $aarsmodell = $_POST["ny_aarsmodell"];
                    $kundenr = $_POST["ny_kundenr"];
                    

                    $sql = "UPDATE bil SET modell='$modell', aarsmodell='$aarsmodell', kundenr='$kundenr' WHERE regnr='$regnr'";
        
                    if($kobling->query($sql)) {
						header ("refresh:0;");
                } else {
                echo "Noe gikk galt med spørringen $sql ($kobling->error).";
                        } 
				}
				
			if (isset($_POST["slett_id"])) {
					$slett_id = $_POST["slett_id"];	
			
					$sql = "DELETE FROM bil WHERE regnr='$slett_id'";

					if($kobling->query($sql)) {
						header ("refresh:0; url=kunder.php");
					} else {
					echo "Noe gikk galt med spørringen. Hvis de har bestilt ett produkt vil dem ikke kunne slettes!";
					}
				}
				
			$sql = "SELECT * FROM bil";
			$resultat = $kobling->query($sql);
			//echo $sql;

			echo "<table>";
			echo "<tr>";
				echo "<th>Registreringsnummmer</th>";
				echo "<th>Merke</th>";
				echo "<th>Modell</th>";
				echo "<th>Årsmodell</th>";
				echo "<th>Kundenummer</th>";
				echo "<th>Slett</th>";
				echo "<th>Endre</th>";
			echo "</tr>";
					
			while($rad = $resultat->fetch_assoc()) {
				$regnr = $rad["regnr"];
				$merke = $rad["merke"];
				$modell =$rad["modell"];
				$aarsmodell = $rad["aarsmodell"];
				$kundenr = $rad["kundenr"];
						
			echo "<tr>";
				echo "<td>$regnr</td>";
				echo "<td>$merke</td>";
				echo "<td>$modell</td>";
				echo "<td>$aarsmodell</td>";
				echo "<td>$kundenr</td>";
					echo "<td>";
					echo "<form method='post'>"; //skriv action='slette.php' for å slette på en annen side
					echo "<input type='hidden' name='slett_id' value='$kundenr'>";
					echo "<input type='submit' value='slett'>";
					echo "</form>";
				echo "</td>";
                    echo "<td>";
                echo "<form method='post' action='EndreForm.php'>";
                    echo "<input type='hidden' name='endre_id' value='$kundenr'>";
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