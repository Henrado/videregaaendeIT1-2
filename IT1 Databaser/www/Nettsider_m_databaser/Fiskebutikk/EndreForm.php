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

$sql = "SELECT * FROM kunde JOIN postadresse ON kunde . postnr=postadresse . postnr WHERE kundenummer='$endre_id'";
$resultat = $kobling->query($sql);

echo "<form action='kunder.php' method='POST' >";
while($rad = $resultat->fetch_assoc()) {
    $enavn = $rad["etternavn"];
    $kundenummer = $rad["kundenummer"];
    $fnavn = $rad["fornavn"];
    $adresse = $rad["adresse"];
    $telefonnummer = $rad["telefonnummer"];
    $postnr = $rad["postnr"];
    $poststed = $rad["poststed"];

    echo "<table>";
			echo "<tr>";
    
    echo "<th>Kundenummer</th>";
    echo "<td><input type='number' name='kundenummer' value='$kundenummer' readonly></td>";		
		echo "</tr>";
        
    echo "<th>etternavn</th> ";
    echo "<td><input type='text' name='nyttetternavn' value='$enavn'></td>";
        echo "</tr>";
       
    echo "<th>fornavn</th> ";
    echo "<td><input type='text' name='nyttfornavn' value='$fnavn'></td>";
        echo "</tr>";
        
    echo "<th>adresse</th> ";
    echo "<td><input type='text' name='nyttadresse' value='$adresse'></td>";
        echo "</tr>";
        
    echo "<th>telefonnummer</th> ";
    echo "<td><input type='text' name='nytttelefonnummer' value='$telefonnummer'></td>";
        echo "</tr>";
        
    echo "<th>postnr</th> ";
    echo "<td><input type='text' name='nyttpostnr' value='$postnr'></td>";
        echo "</tr>";
        
    echo "<th>poststed</th> ";
    echo "<td><input type='text' name='nyttpoststed' value='$poststed'></td>";
    
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