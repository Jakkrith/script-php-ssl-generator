<?php

// Catch the POST information and put them in variables

$Keyfile = $_POST['keyfile'];
$Certfile = $_POST['certfile'];
$Bundlefile = $_POST['bundlefile'];
$Wachtwoord = $_POST['wachtwoord'];

//extra variables

$Pfxfile = 'files/' . rtrim($Keyfile, "key") . "pfx";

// Process the POST information
$Keyresult = file_get_contents('files/' . $Keyfile, "r");
$Bundleresult = file_get_contents('files/' . $Bundlefile, "r");

// OpenSSL magic
$Extra = array( 
'extracerts' => $Bundlefile
);
if ($Pfxresult = openssl_pkcs12_export_to_file($Certfile, $Pfxfile, $Keyresult, $Wachtwoord, $Extra)) 
echo "Success.";
