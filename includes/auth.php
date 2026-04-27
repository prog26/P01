<?php
session_start();


/* 🔐 Bloquer cache navigateur */
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");



// ❌ Pas connecté → login
if (!isset($_SESSION['user_id'])) {
    header("Location: /Prompt-Repository/auth/login.php");
    exit();
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