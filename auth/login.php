<?php include '../includes/header.php'; ?>



<div class="auth-container">
    <h2>Connexion</h2>

    <?php if(isset($_GET['error'])): ?>
        <p style="color:red;">Identifiants incorrects.</p>
    <?php endif; ?>

    <form action="../controllers/authController.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="login">Se connecter</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
