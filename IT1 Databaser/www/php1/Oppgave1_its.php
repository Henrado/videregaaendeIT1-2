<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Løkker med php</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php 
		if(isset($_GET["pluss"])) {
			$tall1 = $_GET["inputt1"];
			$tall2 = $_GET["inputt2"];
			
			$resultat = $tall1 + $tall2;
				echo $resultat;
		}
		else if (isset($_GET["minus"])) {
			$tall1 = $_GET["inputt1"];
			$tall2 = $_GET["inputt2"];
			
			$resultat = $tall1 - $tall2;
				echo $resultat;
		}
		else if (isset($_GET["gange"])) {
			$tall1 = $_GET["inputt1"];
			$tall2 = $_GET["inputt2"];
			
			$resultat = $tall1 * $tall2;
				echo $resultat;
		}
		else if (isset($_GET["dele"])) {
			$tall1 = $_GET["inputt1"];
			$tall2 = $_GET["inputt2"];
			if ($tall2== 0) {
				echo "Å dele på 0 er bare tull...";
			}
			else {

			
			$resultat = $tall1 / $tall2;
				echo $resultat;
			}
		}
		?>
			<form method = "GET"> 
				<input type="number" name="inputt1"> <br>
				<input type="number" name="inputt2"> <br>
				<input type="submit" name="pluss" value="+">
				<input type="submit" name="minus" value="-">
				<input type="submit" name="gange" value="*">
				<input type="submit" name="dele" value="/">



			</form>
	</body>
</html>