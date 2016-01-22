<html>
<body>
<form action="pfxgen.php" method="post" name="pfxgen">
<table border="0">
<tr>
<td>Duid de key file aan: </td>
<?php

//initial variables

$dir = "files/";

echo "<td><select name='keyfile'>";
$dirdisplay = opendir($dir);
$options = array();

//loop to create an alphabetical dropdown

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

//Upload the certificate in the text field

echo "<tr><td>Paste the certificate in thie field</td><td><textarea name='certfile' rows='20' cols='65'></textarea></td></tr>";

//Root bundle dropdown

echo "<tr><td>Select the proper bundle (root and intermediate certificates)</td><td><select name='bundlefile'>";
$dirdisplay = opendir($dir);
while (($bestand = readdir($dirdisplay)) !== false) {
        if  ($bestand != "." && $bestand != ".." && (substr($bestand, -6, 6 )) == "bundle" ) {
        echo "<option> $bestand </option>";
        }
}
        closedir($dirdisplay);
echo "</select></td></tr>";

// Password

echo "<tr><td>Enter a password. You can leave this empty.</td><td><input type='text' name='wachtwoord'></text></td></tr>";

//Submit
echo "</table><p><input type='submit'></p>";
?>
</form>
