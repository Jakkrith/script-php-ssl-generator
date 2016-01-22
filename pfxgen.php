<?php

// Opvangen van de post gegevens

$Keyfile = $_POST['keyfile'];
$Certfile = $_POST['certfile'];
$Bundlefile = $_POST['bundlefile'];
$Wachtwoord = $_POST['wachtwoord'];

//extra variables

$Pfxfile = 'files/' . rtrim($Keyfile, "key") . "pfx";

//verwerken van post gegevens
$Keyresult = file_get_contents('files/' . $Keyfile, "r");
// Werkt: echo $Keyresult;
//Werkt: echo "<p>$Certfile</p>";
$Bundleresult = file_get_contents('files/' . $Bundlefile, "r");
//Werkt: echo $Bundleresult;

// OpenSSL magic
$Extra = array( 
'extracerts' => $Bundlefile
);
if ($Pfxresult = openssl_pkcs12_export_to_file($Certfile, $Pfxfile, $Keyresult, $Wachtwoord, $Extra)) 
echo "Gelukt. Ga naar de <a href='http://portal.combell.com/tools/sslrequests/files' target='_blank'>files</a>";
