<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Løkker med php</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php 
			echo "<table border=1>";
			
			for ($k=1; $k<=12; $k++) {
				echo "<tr> <td>Hei</td><td> på</td> </tr>";
			}
			
			echo "</table>";
			for ($i=1; $i<=42; $i++) {
				echo "IT1 <br>";
			}
			$f = 1;
			while ($f <= 42) {
				echo "IT2 <br>";
				$f++;
			}
		?>
			
	</body>
</html>