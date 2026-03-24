<?php
require_once '../config/db.php';
session_start();

// SÉCURITÉ : Seul l'admin a le droit d'utiliser ce contrôleur
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../developer/dashboard.php');
    exit();
}

// --- SUPPRIMER UN UTILISATEUR ---
if (isset($_GET['delete_user_id'])) {
    $id = intval($_GET['delete_user_id']);

    // On évite que l'admin se supprime lui-même par erreur
    if ($id === $_SESSION['user_id']) {
        header('Location: ../admin/manage_users.php?error=self_delete');
        exit();
    }

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: ../admin/manage_users.php?msg=user_deleted');
    exit();
}

// --- CHANGER LE RÔLE D'UN UTILISATEUR ---
if (isset($_POST['update_role'])) {
    $id = intval($_POST['user_id']);
    $new_role = $_POST['role']; // 'admin' ou 'developer'

    if (in_array($new_role, ['admin', 'developer'])) {
        $stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->execute([$new_role, $id]);
    }

    header('Location: ../admin/manage_users.php?msg=role_updated');
    exit();
}