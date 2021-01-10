<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Skjema med php</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="#">
    </head>
    <body>
        <?php 
			if (isset ($_GET["sendinn"])) {
				$hva = $_GET["hva"];
				$antall = $_GET["tall"];
			echo 	"Min $hva den har $antall kanter,
					$antall kanter har min $hva.
					Og har den ei $antall kanter.
					Så er det ei min $hva";
			}
			
		?>
			
	</body>
</html>