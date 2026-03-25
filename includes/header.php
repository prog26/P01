<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompt Repository | DevGenius</title>

    
</head>

<body>
<header>
    <nav>
        <div class="logo">🚀 PromptRepo</div>

        <ul>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="../developer/dashboard.php">Mon Dashboard</a></li>
                
                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <li><a href="../admin/dashboard.php" class="admin-link">👑 Admin</a></li>
                <?php endif; ?>
                
                <li>
                    <a href="../auth/logout.php">
                        Déconnexion (<?= htmlspecialchars($_SESSION['username']) ?>)
                    </a>
                </li>
            <?php else: ?>
                <li><a href="../auth/login.php">Connexion</a></li>
                <li><a href="../auth/register.php">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main class="container">
