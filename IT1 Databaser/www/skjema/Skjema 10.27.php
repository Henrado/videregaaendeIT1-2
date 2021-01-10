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
			$dyr = "Ku";
			$tall = rand(1,10);
			echo "<a href='motta.php?dyr=$dyr & tall=$tall'>Min lenke</a>";
		?>
			
	</body>
</html>