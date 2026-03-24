<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';

// Statistiques
$userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$promptCount = $pdo->query("SELECT COUNT(*) FROM prompts")->fetchColumn();
?>

<style>
body{
    background:#f5f7fb;
    font-family: 'Segoe UI', sans-serif;
}

/* Titre */
.dashboard-title{
    font-size:28px;
    font-weight:600;
    margin-bottom:20px;
}

/* Container */
.dashboard-container{
    max-width:1100px;
    margin:auto;
}

/* Cards stats */
.stats-container{
    display:flex;
    gap:20px;
    margin-bottom:30px;
}

.stat-card{
    flex:1;
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,0.05);
    transition:0.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
}

.stat-title{
    color:#888;
    font-size:14px;
}

.stat-value{
    font-size:28px;
    font-weight:bold;
    margin-top:10px;
}

/* Section admin */
.admin-section{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 4px 15px rgba(0,0,0,0.05);
}

/* Buttons style dashboard */
.admin-links{
    display:flex;
    gap:15px;
    margin-top:15px;
}

.btn{
    padding:12px 20px;
    border-radius:8px;
    text-decoration:none;
    color:white;
    font-weight:500;
    transition:0.3s;
}

/* couleurs inspirées */
.btn-category{
    background:#4f46e5;
}

.btn-users{
    background:#10b981;
}

.btn:hover{
    opacity:0.85;
}

/* Progress bar style */
.progress-bar{
    height:8px;
    background:#e5e7eb;
    border-radius:5px;
    overflow:hidden;
    margin-top:10px;
}

.progress-fill{
    height:100%;
    background:#4f46e5;
    width:70%;
}
</style>

<div class="dashboard-container">

    <div class="dashboard-title">📊 Tableau de Bord Admin</div>

    <!-- Stats -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-title">Utilisateurs</div>
            <div class="stat-value"><?= $userCount ?></div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 80%;"></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total Prompts</div>
            <div class="stat-value"><?= $promptCount ?></div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: 60%; background:#10b981;"></div>
            </div>
        </div>
    </div>

    <!-- Admin actions -->
    <div class="admin-section">
        <h3>Gestion</h3>

        <div class="admin-links">
            <a href="manage_categories.php" class="btn btn-category">📁 Catégories</a>
            <a href="manage_users.php" class="btn btn-users">👥 Utilisateurs</a>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
