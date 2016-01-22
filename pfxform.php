<?php

//Initial variables

$dir = "files/";

?>
<html>
<body>
<form action="pfxgen.php" method="post" name="pfxgen">
<table border="0">
<tr>
<td>Duid de key file aan: </td>
<?php
//loop die de files in een dropdown steekt
echo "<td><select name='keyfile'>";
$dirdisplay = opendir($dir);
$options = array();
while (($bestand = readdir($dirdisplay)) !== false) {
	if  ($bestand != "." && $bestand != ".." && (substr($bestand, -3, 3)) == "key" ) {
		$options[] = $bestand;
	}
}
sort($options);
foreach($options as $option){
	echo "<option> $option </option>";
}
	closedir($dirdisplay);
echo "</select></td></tr>";

//Upload het certificaat via een tekstveld

echo "<tr><td>Plak het certificaat in dit tekstveld</td><td><textarea name='certfile' rows='20' cols='65'></textarea></td></tr>";

//Duid de bundel aan

echo "<tr><td>Duid het type certificaat aan</td><td><select name='bundlefile'>";
$dirdisplay = opendir($dir);
while (($bestand = readdir($dirdisplay)) !== false) {
        if  ($bestand != "." && $bestand != ".." && (substr($bestand, -6, 6 )) == "bundle" ) {
        echo "<option> $bestand </option>";
        }
}
        closedir($dirdisplay);
echo "</select></td></tr>";

// Wachtwoord

echo "<tr><td>Vul een wachtwoord in, enkel voor niet UAC certificaten</td><td><input type='text' name='wachtwoord'></text></td></tr>";

//Submit
echo "</table><p><input type='submit'></p>";
?>
</form>
