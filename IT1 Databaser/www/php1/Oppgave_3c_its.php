<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Partall</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="#">
    </head>
    <body>
	
		<form method = "GET"> 
				<input type="number" name="tall"> <br>
				<input type="submit" name="regn" value="Fødselsår!">
		</form>
        <?php
		if (isset($_GET["regn"])) {
			$tall = $_GET["tall"];
			$j = 2; 
			for ($i = $tall; $i > 1; $i--) 
				{  
				if ($i%$j == 0) 
					{
					echo $i;
					echo "<br>";
				}
			}
		}
		?>
		
	</body>
</html>