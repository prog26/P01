<?php
require_once '../config/db.php';
require_once '../includes/auth.php';

// Sécurité : On s'assure que l'utilisateur est bien connecté pour accéder au contrôleur
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

/**
 * --- AJOUTER UN PROMPT ---
 */
if (isset($_POST['add_prompt'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
    $category_id = intval($_POST['category_id']);
    $user_id = $_SESSION['user_id'];

    if (!empty($title) && !empty($content)) {
        $stmt = $pdo->prepare("INSERT INTO prompts (title, content, category_id, user_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $content, $category_id, $user_id]);
        
        // Redirection vers le dashboard avec un message
        header('Location: ../developer/dashboard.php?msg=added');
        exit();
    }
}

/**
 * --- MODIFIER UN PROMPT ---
 */
if (isset($_POST['edit_prompt'])) {
    $id = intval($_POST['id']);
    $title = htmlspecialchars(trim($_POST['title']));
    $content = htmlspecialchars(trim($_POST['content']));
    $category_id = intval($_POST['category_id']);

    // Sécurité : Seul le propriétaire ou l'admin peut modifier
    $stmt = $pdo->prepare("UPDATE prompts SET title = ?, content = ?, category_id = ? 
                          WHERE id = ? AND (user_id = ? OR ? = 'admin')");
    
    $stmt->execute([
        $title, 
        $content, 
        $category_id, 
        $id, 
        $_SESSION['user_id'], 
        $_SESSION['role']
    ]);

    // Redirection vers la page d'édition avec le message de succès (comme demandé)
    header("Location: ../developer/edit_prompt.php?id=$id&msg=success");
    exit();
}

/**
 * --- SUPPRIMER UN PROMPT ---
 */
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    
    // Sécurité : On vérifie que le prompt appartient à l'user (ou que l'user est admin)
    $stmt = $pdo->prepare("DELETE FROM prompts WHERE id = ? AND (user_id = ? OR ? = 'admin')");
    $stmt->execute([$id, $_SESSION['user_id'], $_SESSION['role']]);
    
    header('Location: ../developer/dashboard.php?msg=deleted');
    exit();
}

// Si quelqu'un accède au fichier sans action précise
header('Location: ../developer/dashboard.php');
exit();