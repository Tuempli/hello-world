<?php 
	

$zahl = NULL;
$binaer = NULL;

if ($_GET["Senden"] == "Umwandeln") {
	$zahl = $_GET["eingabe"];
	$binaerwerte = array();
}


if (!is_numeric($zahl)) {
	$zahl = 0;
	$error = "Please enter a number.";
} else $error = NULL;

for ($i=31;$i>=0;$i--) {
	
	if ($zahl & pow(2, $i)) {
		$binaerwerte[$i] = 1;
	} else {
		$binaerwerte[$i] = 0;
	}
}

$binaer = substr(chunk_split(join("", $binaerwerte), 4, "."), 0, -1);

	
?>

<html>
	<head>
		<title> Testsite </title>
	</head>
	<body>
		<form>
		<h1>Dezimal --> Binär Rechner</h1>
		<p>Werte zwischen 0 und 4.294.967.295</p>
			<input type="text" name="eingabe" value="<?php echo $zahl ?>" />
			<input type="text" size="40" name="ausgabe" value="<?php echo $binaer ?>" />
			<input type="submit" name="Senden" value="Umwandeln" />
		</form>
		<p> <?php $error ?> </p>
	</body>
</html>