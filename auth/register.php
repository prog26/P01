<?php include '../includes/header.php'; ?>



<div class="auth-container">
    <h2>Inscription Développeur</h2>

    <form action="../controllers/authController.php" method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="register">Créer mon compte</button>
    </form>

    <p>Déjà membre ? <a href="login.php">Se connecter</a></p>
</div>

<?php include '../includes/footer.php'; ?>
