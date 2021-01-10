<!doctype html>
<html>
<head>
    <title>DELETE-spørringer</title>
    <meta charset="UTF-8">
</head>
<body>

<?php
if(isset($_POST["slett_id"])) {
    $slett_id = $_POST["slett_id"];
	
    // Tilkoblingsinformasjon
    $tjener = "localhost";
    $brukernavn = "root";
    $passord = "";
    $database = "personer";

    // Opprette en kobling
    $kobling = new mysqli($tjener, $brukernavn, $passord, $database);

    // Sjekk om koblingen virker
    if ($kobling->connect_error) {
        die("Noe gikk galt: " . $kobling->connect_error);
    }

    // Angi UTF-8 som tegnsett
    $kobling->set_charset("utf8");

} else {
    die("Du må angi en person.");
}

$sql = "DELETE FROM person WHERE person_id='$slett_id'";

if($kobling->query($sql)) {
    echo "Spørringen $sql ble gjennomført.";
} else {
    echo "Noe gikk galt med spørringen $sql ($kobling->error).";
}
?>

</body>
</html>