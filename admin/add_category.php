<?php 
require_once '../includes/auth.php';
confirm_admin(); // Sécurité : vérifie que l'utilisateur est admin
require_once '../config/db.php';
include '../includes/header.php';
?>

<style>

/* CONTAINER ADMIN */
.admin-container{
    max-width:600px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:14px;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

/* TITLE */
.admin-container h2{
    margin-bottom:10px;
    color:#0f172a;
}

/* DESCRIPTION */
.admin-container p{
    color:#64748b;
    font-size:14px;
    margin-bottom:20px;
}

/* BACK BUTTON */
.btn-back{
    display:inline-block;
    margin-bottom:20px;
    text-decoration:none;
    color:#3b82f6;
    font-size:14px;
    font-weight:500;
    transition:0.3s;
}

.btn-back:hover{
    text-decoration:underline;
}

/* FORM */
.main-form{
    display:flex;
    flex-direction:column;
    gap:15px;
}

/* GROUP */
.form-group{
    display:flex;
    flex-direction:column;
    gap:5px;
}

/* LABEL */
.form-group label{
    font-weight:600;
    font-size:14px;
    color:#334155;
}

/* INPUT */
.form-group input{
    padding:12px;
    border:1px solid #e2e8f0;
    border-radius:8px;
    background:#f8fafc;
    font-size:14px;
    transition:0.3s;
    outline:none;
}

/* FOCUS */
.form-group input:focus{
    background:white;
    border-color:#3b82f6;
    box-shadow:0 0 0 3px rgba(59,130,246,0.2);
}

/* BUTTON */
.btn-submit{
    margin-top:10px;
    padding:14px;
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    border:none;
    border-radius:10px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

/* HOVER BUTTON */
.btn-submit:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

/* RESPONSIVE */
@media(max-width:600px){
    .admin-container{
        margin:20px;
        padding:20px;
    }
}

</style>


<div class="admin-container">
    <a href="manage_categories.php" class="btn-back">⬅ Retour à la liste</a>
    
    <h2>Ajouter une nouvelle catégorie</h2>
    <p>Créez une thématique pour organiser les prompts (ex: DevOps, UI/UX, Tests Unitaires).</p>

    <form action="../controllers/categoryController.php" method="POST" class="main-form">
        <div class="form-group">
            <label for="name">Nom de la catégorie :</label>
            <input type="text" id="name" name="name" placeholder="Ex: Mobile Development" required>
        </div>
        
        <button type="submit" name="add_category" class="btn-submit">Créer la catégorie</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>