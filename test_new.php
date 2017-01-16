<?php 
	
$zahl = NULL;
$binaerwerte = array();
$error = NULL;

if(!isset($zahl)) $zahl = 0;

make_binary($zahl, $binaerwerte);

function make_binary($input, $out_array) {
	
	if (isset($_POST["submit"]) && ($_POST["submit"] == "umwandeln")) {
		$input = $_POST["eingabe"];
	}
	
	if (!is_numeric($input) || $input < 0 || $input > 4294967295) {
		return NULL;
	}
	
	for ($i=31;$i>=0;$i--) {
		
		if ($input & pow(2, $i)) {
			$out_array[$i] = 1;
		} else {
			$out_array[$i] = 0;
		}
	}
	$GLOBALS['zahl'] = $input;
	return substr(chunk_split(join("", $out_array), 4, "."), 0, -1);
}

?>

<html lang="de">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="test_new_css.css" rel="stylesheet" type="text/css" charset="UFT-8"/>
		<title> Testsite </title>
	</head>
	<body>
		<header>
			<h1 align="center";>Dezimal / Binär Rechner</h1>
			<p align="center";>Für Werte zwischen 0 und 4.294.967.295</p>
		</header>
		<nav>
			<ul>
				<li><a href="">no</a></li>
				<li><a href="">navigation</a></li>
				<li><a href="">yet</a></li>
			</ul>
		</nav>
		<article>
			<form id="binary_form" name="form" method="post" style="width:400px;border:3px solid grey;padding:5px;">
				<span>Dezimal:</span><br/>
				<input id="user_input" type="number" onfocus="this.select()" size="27" name="eingabe"
				min="0" max="4294967295" value="<?php echo $zahl;?>"/>
				<input style="width:100px;" type="submit" name="submit" value="umwandeln" data-copytarget="#output"
				id="submit_btn"/><br/>
				<span>Binär:</span><br/>
				<input type="text" placeholder=":D Ooops!" onfocus="this.select()" size="40" name="ausgabe"
				id="binary_output" readonly="on" value="<?php echo make_binary($zahl, $binaerwerte);?>"/>
			</form>
			<p>Nur ein Textfeld.</p>
			<textarea rows="5" cols="45"></textarea>
		</article>
		<footer>Und das ist der Footer</footer>
	</body>
</html>