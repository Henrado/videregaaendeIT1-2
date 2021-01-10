<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Regning med php</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php 

		if (isset ($_GET ["generer"])) {
		
		$red1=(rand(1,16));
		$red2=(rand(1,16));
		$gre1=(rand(1,16));
		$gre2=(rand(1,16));
		$blue1=(rand(1,16));
		$blue2=(rand(1,16));

            
		if ($red1 == 10) {
			$red11 = "a";
		} else if ($red1 == 11) {
			$red11 = "b";
		} else if ($red1 == 12) {
			$red11 = "c";
		} else if ($red1 == 13) {
			$red11 = "d";
		} else if ($red1 == 14) {
			$red11 = "e";
		} else if ($red1 == 15) {
			$red11 = "e";
		} else if ($red1 == 16) {
			$red11 = "f";
		} else if ($red1 <= 9) {
			$red11 = $red1;
		}
		
		if ($red2 == 10) {
			$red21 = "a";
		} else if ($red2 == 11) {
			$red21 = "b";
		} else if ($red2 == 12) {
			$red21 = "c";
		} else if ($red2 == 13) {
			$red21 = "d";
		} else if ($red2 == 14) {
			$red21 = "e";
		} else if ($red2 == 15) {
			$red21 = "e";
		} else if ($red2 == 16) {
			$red21 = "f";
		} else if ($red2 <= 9) {
			$red21 = $red2;
		}
		
		if ($gre1 == 10) {
			$gre11 = "a";
		} else if ($gre1 == 11) {
			$gre11 = "b";
		} else if ($gre1 == 12) {
			$gre11 = "c";
		} else if ($gre1 == 13) {
			$gre11 = "d";
		} else if ($gre1 == 14) {
			$gre11 = "e";
		} else if ($gre1 == 15) {
			$gre11 = "e";
		} else if ($gre1 == 16) {
			$gre11 = "f";
		} else if ($gre1 <= 9) {
			$gre11 = $gre1;
		}

		if ($gre2 == 10) {
			$gre21 = "a";
		} else if ($gre2 == 11) {
			$gre21 = "b";
		} else if ($gre2 == 12) {
			$gre21 = "c";
		} else if ($gre2 == 13) {
			$gre21 = "d";
		} else if ($gre2 == 14) {
			$gre21 = "e";
		} else if ($gre2 == 15) {
			$gre21 = "e";
		} else if ($gre2 == 16) {
			$gre21 = "f";
		} else if ($gre2 <= 9) {
			$gre21 = $gre2;
		}
		
		if ($blue1 == 10) {
			$blue11 = "a";
		} else if ($blue1 == 11) {
			$blue11 = "b";
		} else if ($blue1 == 12) {
			$blue11 = "c";
		} else if ($blue1 == 13) {
			$blue11 = "d";
		} else if ($blue1 == 14) {
			$blue11 = "e";
		} else if ($blue1 == 15) {
			$blue11 = "e";
		} else if ($blue1 == 16) {
			$blue11 = "f";
		} else if ($blue1 <= 9) {
			$blue11 = $blue1;
		}
		
		if ($blue2 == 10) {
			$blue21 = "a";
		} else if ($blue2 == 11) {
			$blue21 = "b";
		} else if ($blue2 == 12) {
			$blue21 = "c";
		} else if ($blue2 == 13) {
			$blue21 = "d";
		} else if ($blue2 == 14) {
			$blue21 = "e";
		} else if ($blue2 == 15) {
			$blue21 = "e";
		} else if ($blue2 == 16) {
			$blue21 = "f";
		} else if ($blue2 <= 9) {
			$blue21 = $blue2;
		}
		$farge = "#" . $red11 . $red21 . $gre11 . $gre21 . $blue11 . $blue21;
		echo $farge;
		echo "<h2 style='background-color:$farge'> 
		Automatisk generert med kode: $farge!
		</h2>";
		}
        ?>

			<form method = "GET"> 
				<input type="submit" name="generer" value="Generer farger">
			</form>
    </body>