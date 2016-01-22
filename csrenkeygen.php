<?php
$LandCode = $_POST["landcode"];
$Provincie = (isset($_POST['provincie'])&& strlen(trim($_POST['provincie'])) > 0)? $_POST['provincie']: 'DomeinValidatie';
$Stad = (isset($_POST['stad'])&& strlen(trim($_POST['stad'])) > 0)? $_POST['stad']: 'DomeinValidatie';
$Organisatie = $_POST['organisatie'];
$CommonName = $_POST["commonname"];
$Afdeling = (isset($_POST['afdeling'])&& strlen(trim($_POST['afdeling'])) > 0)? $_POST['afdeling']: 'webdevelopment';
$EMailAdres = $_POST["emailadres"];

$dn = array(
"countryName" => $LandCode,
"stateOrProvinceName" => $Provincie,
"localityName" => $Stad,
"organizationName" => stripslashes($Organisatie),
"organizationalUnitName" => $Afdeling,
"commonName" => $CommonName,
"emailAddress" => $EMailAdres
);

$keybestand = "files/" . $CommonName . date(Y) . ".key";
$csrbestand = "files/" . $CommonName . date(Y) . ".csr";

$keygen = openssl_pkey_new();
$csrgen = openssl_csr_new($dn, $keygen);

openssl_pkey_export($keygen, $keyprint);

openssl_pkey_export_to_file($keygen, $keybestand);

openssl_csr_export($csrgen, $csrprint);
echo nl2br($csrprint);

openssl_csr_export_to_file($csrgen, $csrbestand);
