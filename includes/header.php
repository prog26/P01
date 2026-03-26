<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prompt Repository | DevGenius</title>

    <style>
    /* ── RESET ── */
    *, *::before, *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Outfit', 'Segoe UI', sans-serif;
        background: #f0f2f5;
    }

    /* ── HEADER ── */
    header {
        background: #0f172a;
        border-bottom: 1px solid rgba(255,255,255,0.06);
        position: sticky;
        top: 0;
        z-index: 1000;
        backdrop-filter: blur(12px);
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 32px;
        height: 64px;
    }

    /* ── LOGO ── */
    .logo {
        color: #f8fafc;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }

    .logo::before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        background: #3b82f6;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(59,130,246,0.8);
    }

    /* ── MENU ── */
    nav ul {
        display: flex;
        align-items: center;
        gap: 4px;
        list-style: none;
    }

    nav ul li a {
        text-decoration: none;
        color: #94a3b8;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 14px;
        border-radius: 8px;
        transition: color 0.2s ease, background 0.2s ease;
        letter-spacing: 0.2px;
    }

    nav ul li a:hover {
        color: #f1f5f9;
        background: rgba(255,255,255,0.07);
    }

    /* ── SEPARATEUR ── */
    .nav-divider {
        width: 1px;
        height: 20px;
        background: rgba(255,255,255,0.1);
        margin: 0 8px;
    }

    /* ── ADMIN ── */
    .admin-link {
        color: #f59e0b !important;
        font-weight: 600 !important;
    }

    .admin-link:hover {
        background: rgba(245,158,11,0.1) !important;
        color: #fbbf24 !important;
    }

    /* ── BOUTON LOGIN ── */
    nav ul li a[href*="login"] {
        color: #94a3b8;
        border: 1px solid rgba(255,255,255,0.1);
        background: transparent;
        padding: 7px 18px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    nav ul li a[href*="login"]:hover {
        border-color: rgba(255,255,255,0.25);
        color: #f1f5f9;
        background: rgba(255,255,255,0.05);
    }

    /* ── BOUTON REGISTER ── */
    nav ul li a[href*="register"] {
        background: #3b82f6;
        color: #fff !important;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        border: none;
        transition: background 0.2s ease, transform 0.15s ease, box-shadow 0.2s ease;
        box-shadow: 0 2px 8px rgba(59,130,246,0.35);
    }

    nav ul li a[href*="register"]:hover {
        background: #2563eb;
        box-shadow: 0 4px 14px rgba(59,130,246,0.5);
        transform: translateY(-1px);
    }

    /* ── BOUTON LOGOUT ── */
    nav ul li a[href*="logout"] {
        color: #f87171;
        background: rgba(239,68,68,0.08);
        padding: 7px 18px;
        border-radius: 8px;
        font-weight: 500;
        border: 1px solid rgba(239,68,68,0.2);
        transition: all 0.2s ease;
    }

    nav ul li a[href*="logout"]:hover {
        background: rgba(239,68,68,0.15);
        color: #fca5a5;
        border-color: rgba(239,68,68,0.4);
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
        nav {
            flex-direction: column;
            height: auto;
            padding: 16px 20px;
            gap: 14px;
        }

        nav ul {
            flex-wrap: wrap;
            justify-content: center;
            gap: 6px;
        }

        .nav-divider {
            display: none;
        }
    }
</style>

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
