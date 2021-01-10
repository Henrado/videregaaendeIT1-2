<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Løkker med php</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>


		<form method="GET">
			<input type="number" name="tall">
			<input type="submit" name="primtall" value="Finn primtall">
		</form>
		
		
		<?php  
			if(isset($_GET["primtall"])){
				$tall = $_GET["tall"];
					for($i=$tall; $i>1  ; $i--){
						$ikkePrim = false;
							for ($j=$i-1; $j>1; $j--){
								if ($i%$j == 0){
									$ikkePrim = true;
									break;
								}
							}
								if ($ikkePrim == false){
									echo "<p> Tallet $i er et primtall </p>";
								}
					}
			}

        ?>


    </body>

</html>