<link rel="stylesheet" href="../assets/css/style.css">

<?php
require_once '../config/db.php';
session_start();

// --- LOGIQUE D'INSCRIPTION ---
if (isset($_POST['register'])) {
    $username = trim(htmlspecialchars($_POST['username']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($username && $email && !empty($password)) {
        // Sécurité : Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'developer')");
            $stmt->execute([$username, $email, $hashedPassword]);
            header('Location: ../auth/login.php?success=registered');
            exit();
        } catch (PDOException $e) {
            die("Erreur : Cet email ou pseudo est déjà utilisé.");
        }
    }
}

// --- LOGIQUE DE CONNEXION ---
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Vérification sécurisée du mot de passe haché
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirection dynamique selon le rôle
        if ($user['role'] === 'admin') {
            header('Location: ../admin/dashboard.php');
        } else {
            header('Location: ../developer/dashboard.php');
        }
        exit();
    } else {
        header('Location: ../auth/login.php?error=1');
        exit();
    }
}