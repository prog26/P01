<?php
// 🔐 Démarrer la session UNE seule fois
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompt Repository | DevGenius</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="/Prompt-Repository/assets/css/style.css">
</head>

<body>

<header>
    <nav>
        <div class="logo">🚀 PromptRepo</div>

        <ul>
             <!-- vérifie si utilisateur est connecté -->
            <?php if (isset($_SESSION['user_id'])): ?>

                <!-- ✅ connecté -->

                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <li><a href="/Prompt-Repository/admin/dashboard.php">Dashboard</a></li>
                    <li><a href="/Prompt-Repository/developer/dashboard.php">Voir Prompts</a></li>
                <?php else: ?>
                    <li><a href="/Prompt-Repository/developer/dashboard.php">Dashboard</a></li>
                <?php endif; ?>

                <li>
                    <a href="/Prompt-Repository/auth/logout.php" class="logout-link">
                        Déconnexion (<?= htmlspecialchars($_SESSION['username']) ?>)
                    </a>
                </li>

            <?php else: ?>

                <!-- ❌ non connecté -->

                <li><a href="/Prompt-Repository/auth/login.php">Connexion</a></li>
                <li><a href="/Prompt-Repository/auth/register.php">Inscription</a></li>

            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>