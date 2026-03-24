<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Prompt Repository</title>
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f2f5;
            font-family: Arial, sans-serif;
        }

        .splash-container {
            text-align: center;
        }

        .logo {
            width: 120px;
            margin-bottom: 20px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .loader {
            width: 220px;
            height: 8px;
            background: #ddd;
            border-radius: 10px;
            overflow: hidden;
            margin: auto;
        }

        .loader-bar {
            height: 100%;
            width: 0;
            background: #007bff;
            animation: loading 3s linear forwards;
        }

        @keyframes loading {
            from { width: 0; }
            to { width: 100%; }
        }
    </style>
</head>
<body>

<div class="splash-container">
    <img src="../assets/images/logo.png" class="logo" alt="Logo">
    <h1>Prompt Repository</h1>

    <div class="loader">
        <div class="loader-bar"></div>
    </div>
</div>

<script>
    setTimeout(() => {

        <?php if (isset($_SESSION['user_id'])): ?>

            <?php if ($_SESSION['role'] === 'admin'): ?>
                window.location.href = "../admin/dashboard.php";
            <?php else: ?>
                window.location.href = "../developer/dashboard.php";
            <?php endif; ?>

        <?php else: ?>

            window.location.href = "login.php";

        <?php endif; ?>

    }, 3000);
</script>

</body>
</html>