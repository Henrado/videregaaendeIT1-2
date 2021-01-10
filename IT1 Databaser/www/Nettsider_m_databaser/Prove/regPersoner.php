<!DOCTYPE html>
<html>
    
    <head>
        <title>Database</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="universal.css">
    </head>
    <body>
		<h1>Registrer flere personer</h1>
        <?php
			$tjener ="localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "bilregister";
			
			$kobling = new mysqli($tjener , $brukernavn , $passord , $database);
			
			
			if ($kobling->connect_error) {
				die ("Du feilet!!!" . $kobling->connect_error);
			}
			
			$kobling->set_charset("utf-8");
			
			if(isset($_POST["leggtil"])) {
				$fnavn = $_POST["fnavn"];
				$enavn = $_POST["enavn"];
				$epost = $_POST["epost"];
			
			$sql = "INSERT INTO Person (fornavn , etternavn , epost) VALUES ('$fnavn' , '$enavn' , '$epost')";

			if($kobling->query($sql)) {
					echo "Spørringen ble gjennomført";//$sql
			}	
			else {
				echo "Noe gikk galt med $sql ($kobling->error)";
			}
		}
			
		?>
		<table>
			<form method="POST">
			<tr>
				<th>Fornavn</th>
				<td><input type="text" name="fnavn"></td>
			</tr>
			<tr>
				<th>Etternavn</th>
				<td><input type="text" name="enavn"></td>
			</tr>
			<tr>
				<th>E-post</th>
				<td><input type="text" name="epost"></td>
			</tr>
			<tr>
				<th>Legg til</th>
				<td><input type="submit" name="leggtil" value="OK"></td>
			</tr>
			</form>
		</table>
			
	</body>
</html>