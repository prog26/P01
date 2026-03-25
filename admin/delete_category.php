<?php
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        // Redirection avec un message de succès
        header('Location: manage_categories.php?msg=deleted');
    } catch (PDOException $e) {
        // Si la catégorie contient des prompts, on ne peut pas la supprimer directement
        header('Location: manage_categories.php?error=is_linked');
    }
} else {
    header('Location: manage_categories.php');
}
exit();