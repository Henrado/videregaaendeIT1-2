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
				<h1>Handlekurv</h1>
			<?php
			if(isset($_GET['produktnummer'])) {
				$produktnummer = $_GET['produktnummer'];
				$kundenummer = $_GET['kunde'];
				$tid = date('Y-m-d');
				
				$sql = "INSERT INTO handlekurv (ordretidspunkt, kundenummer) VALUES ('$tid', '$kundenummer')";
			
				if($kobling->query($sql)) {
			}	
			else {
				echo "Noe gikk galt med $sql ($kobling->error)";
			}		//Kan fjernes
			}
			
				$sql = "SELECT * FROM handlekurv WHERE ordretidspunkt='$tid' AND kundenummer='$kundenummer'";
					$resultat = $kobling->query($sql);
				while($rad = $resultat->fetch_assoc()) {
					$ordrenummer = $rad["ordrenummer"];
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
				
			echo "<h2>Du har nå lagt til $navn i din handlekurv</h2>";	
				
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
							echo "<p>Ordrenummer $ordrenummer</p>";
						}
						echo "<form action='./betal.php'>";
						echo "<p>Antall</p>";
						echo "<input type='hidden' value='$ordrenummer' name='ordrenummer'>";
						echo "<input type='hidden' value='$produktnummer' name='produktnummer'>";						
								
						echo "<input type='number' name='antall'>";
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