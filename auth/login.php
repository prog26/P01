<?php include '../includes/header.php'; ?>

<style>

/* CONTAINER CENTRÉ */
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
    width:350px;
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
    background:#3b82f6;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

/* HOVER BUTTON */
.auth-container button:hover{
    background:#2563eb;
}

/* ERROR */
.auth-container p{
    margin-bottom:15px;
    font-size:14px;
    text-align:center;
}

</style>

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
