<?php
header("Location: auth/splash.php");
exit();
?>

<?php

session_start();

// Si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin/dashboard.php');
    } else {
        header('Location: developer/dashboard.php');
    }
} else {
    // Si personne n'est connecté, on force la connexion
    header('Location: auth/login.php');
}
exit();
?>