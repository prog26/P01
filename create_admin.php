<?php
require_once 'config/db.php';

// Configuration du compte admin
$username = 'RootAdmin';
$email = 'admin@devgenius.com';
$password = 'admin123'; // À changer après la première connexion

// Hachage sécurisé (exigé par le projet)
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'admin')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $hashed_password]);

    echo "<div style='color: green; font-family: sans-serif;'>";
    echo "<h2>✅ Succès !</h2>";
    echo "Le compte administrateur a été créé.<br>";
    echo "<b>Email :</b> $email<br>";
    echo "<b>Mot de passe :</b> $password<br>";
    echo "<br><a href='auth/login.php'>Aller à la page de connexion</a>";
    echo "</div>";
    
    // Optionnel : supprimer ce fichier après exécution pour la sécurité
} catch (PDOException $e) {
    echo "<div style='color: red;'>Erreur : " . $e->getMessage() . "</div>";
}
?>