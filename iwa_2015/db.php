<?php

$dbServer = "localhost";
$dbKorisnik ="iwa_2015";
$dbLozinka ="foi2015";
$dbIme = "iwa_2015_vz_projekt";

$conn = mysqli_connect($dbServer,$dbKorisnik,$dbLozinka,$dbIme);
if (!$conn) {
	die("Spajanje nije uspjelo: " . mysqli_connect_error());
}