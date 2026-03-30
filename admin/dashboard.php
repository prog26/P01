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
$bestUser = $pdo->query("
    SELECT users.username, COUNT(prompts.id) AS total
    FROM prompts
    JOIN users ON prompts.user_id = users.id
    GROUP BY users.id
    ORDER BY total DESC
    LIMIT 1
")->fetch();
//categorie qui est beaucoup des prompt
$stmt = $pdo->query("
    SELECT categories.name, COUNT(prompts.id) AS total_prompts
    FROM categories
    JOIN prompts ON prompts.category_id = categories.id
    GROUP BY categories.id
    ORDER BY total_prompts DESC
    LIMIT 1
");

$topCategory = $stmt->fetch();


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

        <div class="stat-card">
            <div class="stat-title">Top Developer</div>

            <div class="stat-value">
                <?= $bestUser ? htmlspecialchars($bestUser['username']) : 'Aucun' ?>
            </div>

            <small>
                <?= $bestUser ? $bestUser['total'] . ' prompts' : '' ?>
            </small>

        
        </div>

        <div  class="stat-card">
            <div class="stat-title">
                <h3>
                     Catégorie la plus utilisée :     
                </h3>
            </div>
            <div class="stat-value">
                 <?= $topCategory['name'] ?>
            </div>

            <p>
                    Nombre de prompts : <?= $topCategory['total_prompts'] ?>
            </p>

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