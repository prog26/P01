<?php



require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // On appelle la fonction de suppression dans le controller ou on gère ici
    header("Location: ../controllers/promptController.php?delete_id=" . $id);
    exit();
}