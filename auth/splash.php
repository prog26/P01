<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Prompt Repository</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="splash-body">

<div class="splash-container">
    
    <img src="../assets/images/logo.png?v=<?= time() ?>" class="splash-logo" alt="Logo">
    <h1 class="splash-title">Prompt Repository</h1>

    <div class="splash-loader">
        <div class="splash-loader-bar"></div>
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