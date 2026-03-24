<?php
session_start();
session_unset();
session_destroy(); // Détruit la session en cours
header("Location: login.php");
exit();
?>