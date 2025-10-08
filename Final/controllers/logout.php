<?php
// destroy session and navigate to login
session_start();
$_SESSION = [];
session_destroy();

header('Location: login.php');

?>