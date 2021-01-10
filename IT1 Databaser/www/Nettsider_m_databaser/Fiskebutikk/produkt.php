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
				
			<?php
			if(isset($_GET['produktnummer'])) {
				$produktnummer = $_GET['produktnummer'];
			}
			
		
			$sql = "SELECT * FROM produkt WHERE produktnummer='$produktnummer'";
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			while($rad = $resultat->fetch_assoc()) {
				$produktnummer = $rad["produktnummer"];
				$navn = $rad["navn"];
				$beskrivelse =$rad["beskrivelse"];
				$bilde = $rad["bilde"];
				$rabatt = $rad["rabatt"];
				$pris = $rad["pris"];
				
				
			
			echo "<h1>$navn</h1>";	
				
			echo "<div class='ting'>";
				echo "<div class='p-bilde'>";
					echo "<img src='./produkter/$bilde' alt='$bilde' width='200px'>";
				echo "</div>";
					echo "<div class='p-text'>";
						echo "<p>$beskrivelse</p>";
					echo "</div>";
					echo "<div class='p-pris'>";
						echo "<h3>$pris kr</h3>";
					
						if ($rabatt > 0){
							$nypris = $pris - $pris * $rabatt / 100;
							echo "<h3>Få hele $rabatt % rabbatt</h3>";
							echo "<p>Ny pris er $nypris</p>";
						}
						//echo "<a href='kjop.php?produktnummer=$produktnummer'>";
						//echo "<p >KJØP</p>";
						//echo "</a>";
						
						
						echo "<form action='./kjop.php'>";
						
			$sql = "SELECT * FROM kunde";			//LAste personer
					$resultat = $kobling->query($sql);
				
						echo "<input type='hidden' value='$produktnummer' name='produktnummer'>";
						
						echo "<select name='kunde'>"; 

						while($rad = $resultat->fetch_assoc()) {
							$kundenummer = $rad["kundenummer"];
							$fnavn = $rad["fornavn"];
							$enavn = $rad["etternavn"];

								echo "<option value=$kundenummer>$enavn $fnavn</option>";
					}
						echo "</select>";
						echo "<br>";
						echo "<input type='submit' name='kjop' value='KJØP' class='kjop'>";
						echo "</form>";
					
					echo "</div>";
			echo "</div>";
			}
			
		?>
			</div>
		</div>
	</body>
</html>