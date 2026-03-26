<?php 




require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';
include '../includes/header.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<style>

/* TITLE */
h2{
    text-align:center;
    margin-top:40px;
    margin-bottom:25px;
    color:#0f172a;
    font-size:26px;
    font-weight:600;
}

/* FORM CONTAINER */
.main-form{
    max-width:600px;
    margin:0 auto 60px;
    background:white;
    padding:30px;
    border-radius:14px;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    gap:15px;
}

/* LABEL */
.main-form label{
    font-size:14px;
    font-weight:600;
    color:#334155;
}

/* INPUTS */
.main-form input,
.main-form select,
.main-form textarea{
    width:100%;
    padding:12px;
    border:1px solid #e2e8f0;
    border-radius:8px;
    font-size:14px;
    background:#f8fafc;
    transition:0.3s;
    outline:none;
}

/* FOCUS EFFECT */
.main-form input:focus,
.main-form select:focus,
.main-form textarea:focus{
    border-color:#3b82f6;
    background:white;
    box-shadow:0 0 0 3px rgba(59,130,246,0.2);
}

/* TEXTAREA */
.main-form textarea{
    resize:none;
}

/* BUTTON */
.main-form button{
    margin-top:10px;
    padding:14px;
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    border:none;
    border-radius:10px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

/* BUTTON HOVER */
.main-form button:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

/* SMALL RESPONSIVE */
@media(max-width:600px){
    .main-form{
        margin:20px;
        padding:20px;
    }
}

</style>


<h2>Enregistrer un nouvel actif</h2>
<form action="../controllers/promptController.php" method="POST" class="main-form">
    <label>Titre du Prompt :</label>
    <input type="text" name="title" placeholder="Ex: Script de migration SQL" required>
    
    <label>Catégorie :</label>
    <select name="category_id">
        <?php foreach($categories as $c): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Contenu de l'instruction (Prompt) :</label>
    <textarea name="content" rows="10" placeholder="Collez ici l'instruction qui fonctionne..." required></textarea>

    <button type="submit" name="add_prompt">Sauvegarder dans la Knowledge Base</button>
</form>

<?php include '../includes/footer.php'; ?>