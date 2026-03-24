<?php
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';

if(isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header('Location: manage_categories.php');
exit();