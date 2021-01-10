<html>
<head>
    <title>Oslos Fiskeutsyr</title>
    <meta charset="UTF-8">
     <link rel="stylesheet" type="text/css" href="./test.css">
    
</head>
<body>

		<div class="Main">
        <?php
        
            include "./php/tilkobling.php";
			
            include "./php/bannerogmeny.php";
            ?>
		
			<div class="Innhold">
		
			<h1>Oppdater kunde</h1>
			
			
<?php
if(isset($_POST["endre_id"])) {
    $endre_id = $_POST["endre_id"];
} else {
    die("Du må angi en endre id.");
}

$sql = "SELECT * FROM Bil JOIN Leietaker ON Bil.kundenr=Leietaker.kundenr WHERE bil.kundenr='$endre_id'";
$resultat = $kobling->query($sql);


echo "<form action='biler.php' method='POST' >";
while($rad = $resultat->fetch_assoc()) {
    $regnr = $rad["regnr"];
	$merke = $rad["merke"];
	$modell =$rad["modell"];
	$aarsmodell = $rad["aarsmodell"];
	$kundenr = $rad["kundenr"];

    echo "<table>";
			echo "<tr>";
    
    echo "<th>Registreringsnummer</th>";
    echo "<td><input type='text' name='ny_regnr' value='$regnr' readonly></td>";		
		echo "</tr>";
        
    echo "<th>Merke</th> ";
    echo "<td><input type='text' name='ny_merke' value='$merke'></td>";
        echo "</tr>";
       
    echo "<th>Modell</th> ";
    echo "<td><input type='text' name='ny_modell' value='$modell'></td>";
        echo "</tr>";
        
    echo "<th>Årsmodell</th> ";
    echo "<td><input type='text' name='ny_aarsmodell' value='$aarsmodell'></td>";
        echo "</tr>";
        
    echo "<th>Kundenummer</th> ";
    echo "<td><input type='text' name='ny_kundenr' value='$kundenr'></td>";
        echo "</tr>";
    
echo "</table>";
    
}	
echo "<input type='submit' name='endre' value='endre'>";
echo "</form>";
?>
    </div>
    </div>
    
</body>
</html>