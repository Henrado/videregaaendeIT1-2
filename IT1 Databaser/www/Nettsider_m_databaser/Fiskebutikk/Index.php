<!doctype html>
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
			<h1>Dagens anbefalte produkt</h1>
			
		<?php
		
			$sql = "SELECT * FROM produkt";
			$resultat = $kobling->query($sql);
			
			//echo $sql;
			$alleprodukter = array();
			while($rad = $resultat->fetch_assoc()) {
				$alleprodukter[] = $rad["produktnummer"];
			}
			$tall = count($alleprodukter) - 1;
			
			$test = $alleprodukter[mt_rand(0, $tall)];
				
			$sql = "SELECT * FROM produkt WHERE produktnummer='$test'";
			$resultat = $kobling->query($sql);
			//echo $sql;
			
			while($rad = $resultat->fetch_assoc()) {
				$produktnummer = $rad["produktnummer"];
				$navn = $rad["navn"];
				$beskrivelse =$rad["beskrivelse"];
				$bilde = $rad["bilde"];
				$rabatt = $rad["rabatt"];
				$pris = $rad["pris"];
				
			echo "<a href='produkt.php?produktnummer=$produktnummer' class='link1'>"; //Her er linken til
			echo "<div class='ting'>";
				echo "<div class='p-bilde'>";
					echo "<img src='./produkter/$bilde' alt='$bilde' width='200px'>";
				echo "</div>";
					echo "<div class='p-text'>";
						echo "<h2>$navn</h2>";
						echo "<p>$beskrivelse</p>";
					echo "</div>";
					echo "<div class='p-pris'>";
						echo "<h3>$pris kr</h3>";
					
						if ($rabatt > 0){
							$nypris = $pris - $pris * $rabatt / 100;
							echo "<h3>Få hele $rabatt % rabbatt</h3>";
							echo "<p>Ny pris er $nypris</p>";
						}
					echo "</div>";
			echo "</div>";
			echo "</a>";
			}
			
		?>
			</div>
		</div>
    </body>
</html>