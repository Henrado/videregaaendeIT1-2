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
			if(isset($_GET['kjop'])) {
				$antall = $_GET['antall'];
				$ordrenummer = $_GET['ordrenummer'];
				$produktnummer = $_GET['produktnummer'];
							
			$sql = "INSERT INTO varelinje (ordrenummer, produktnummer, antall) VALUES ('$ordrenummer', '$produktnummer', $antall)";
			
				if($kobling->query($sql)) {
					echo "<h1>Du har nå kjøpt ett eller flere produkter hoss oss!</h1>";
			}	
			else {
				echo "Noe gikk galt med $sql ($kobling->error)";
				echo "<h1>Kjøpet funket ikke. Prøv på nytt, du har ikke blitt belastet</h1>";
			}		//Kan fjernes
			}
			
			
			echo "<h1>Kjøp mere hoss oss <a href='produkterliste.php'>her!</a></h1>";

		?>
			</div>
		</div>
	</body>
</html>