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
			if (isset($_GET['regn'])) {
					$tall = $_GET["tall"];
					$endelig = 0;
					
					while ($tall >= 1) {
						$endelig += $tall;
						$tall--;
					}
					echo "Summen av alle tallene fra x til 1 er $endelig !";
			}
			else {
				echo "Tast inn et tall";
			}
		
		?>
		<form method = "GET"> 
				<input type="number" name="tall"> <br>
				<input type="submit" name="regn" value="Legg sammen tall!">
		</form>
		
	</body>
</html>