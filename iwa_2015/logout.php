<?php
session_start();
unset($_SESSION['korisnik_sesije']);
session_destroy();
header("Location: login.php");
?>