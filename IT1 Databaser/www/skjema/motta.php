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
			if (isset ($_GET["dyr"]) && isset ($_GET["tall"])) {
			echo $_GET["dyr"];
			echo $_GET["tall"];
			}
			
		?>
			
	</body>
</html>