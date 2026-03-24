<?php
// On démarre la session une seule fois ici pour tout le projet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Vérifie si l'utilisateur est connecté.
 * À utiliser en haut des pages du dossier developer/
 */
function confirm_logged_in() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../auth/login.php");
        exit();
    }
}

/**
 * Vérifie si l'utilisateur est ADMIN.
 * À utiliser en haut des pages du dossier admin/
 */
function confirm_admin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: ../developer/dashboard.php");
        exit();
    }
}
?>