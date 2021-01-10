<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Løkker med php</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php 
			$tall = 1;
			while ($tall <= 15) {
				echo "$tall <br>";
				$tall = $tall + 1;
			}

			for ($tall2 = 0; $tall2 <= 15; $tall2 ++) {
				echo "$tall2";
				echo "<br>";
				$tall = $tall + 1;
			}
		?>
	</body>