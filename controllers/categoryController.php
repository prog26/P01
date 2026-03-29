<?php
require_once '../config/db.php';
session_start();

// Sécurité : Seul l'admin peut gérer les catégories
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../developer/dashboard.php');
    exit();
}

if (isset($_POST['add_category'])) {
    $name = htmlspecialchars($_POST['name']);
    $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
    $stmt->execute([$name]);
    header('Location: ../admin/manage_categories.php');
    exit();
}
//--- Modifier une catégorie
if (isset($_POST['edit_category'])) {
    $id   = (int) $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $stmt = $pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
    $stmt->execute([$name, $id]);
    header('Location: ../admin/manage_categories.php');
    exit();
}