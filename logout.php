<?php
session_start();
if(empty($_GET['wyloguj'])) $_GET['wyloguj'] == '';

if($_GET['wyloguj'] == 'tak') {
//session_destroy();
unset($_SESSION['zalogowany']);

header("Location: /index.php");
}

?>