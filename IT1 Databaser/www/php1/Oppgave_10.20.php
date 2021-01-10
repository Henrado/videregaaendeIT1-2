<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Løkker med php</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php 
			for ($i=0; $i<=10; $i++) {
				echo "<br> $i gangen <br>";
				
				for ($j=1; $j<=10; $j++){
					$pro = $i*$j;
					echo "$i * $j = $pro <br>";
				}
			}
		?>
			
	</body>
</html>