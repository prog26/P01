<?php

require_once '../includes/auth.php';

// Bloque si ce n'est pas admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: /Prompt-Repository/auth/login.php");
    exit();
}

confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';

// Statistiques
$userCount   = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$promptCount = $pdo->query("SELECT COUNT(*) FROM prompts")->fetchColumn();
?>

<div class="dashboard-container">

    <!-- TITRE -->
    <div class="dashboard-header">
        <div class="dashboard-title">📊 Tableau de Bord Admin</div>
    </div>

    <!-- STATS -->
    <div class="stats-container">

        <div class="stat-card">
            <div class="stat-title">Utilisateurs</div>
            <div class="stat-value"><?= $userCount ?></div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total Prompts</div>
            <div class="stat-value"><?= $promptCount ?></div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>

    </div>

    <!-- GESTION -->
    <div class="admin-section">
        <h3 class="admin-links">Gestion</h3>
        <div class="admin-links">
            <a href="manage_categories.php" class="btn btn-category">📁 Catégories</a>
            <a href="manage_users.php"       class="btn btn-users">👥 Utilisateurs</a>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>