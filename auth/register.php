<?php include '../includes/header.php'; ?>

<style>

/* CONTAINER */
.auth-container{
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    margin-top:80px;
}

/* CARD */
.auth-container form{
    background:white;
    padding:40px;
    border-radius:15px;
    width:380px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

/* TITLE */
.auth-container h2{
    margin-bottom:20px;
    color:#1e293b;
    text-align:center;
}

/* INPUT */
.auth-container input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    transition:0.3s;
}

/* INPUT FOCUS */
.auth-container input:focus{
    border-color:#3b82f6;
    box-shadow:0 0 5px rgba(59,130,246,0.3);
}

/* BUTTON */
.auth-container button{
    width:100%;
    padding:12px;
    background:#10b981; /* vert pour différencier login */
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

/* HOVER */
.auth-container button:hover{
    background:#059669;
}

/* TEXT LINK */
.auth-container p{
    margin-top:15px;
    font-size:14px;
    text-align:center;
}

/* LINK */
.auth-container a{
    color:#3b82f6;
    text-decoration:none;
    font-weight:bold;
}

.auth-container a:hover{
    text-decoration:underline;
}

</style>

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
