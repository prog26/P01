<?php 
require_once '../includes/auth.php';
confirm_admin(); // Sécurité : vérifie que l'utilisateur est admin
require_once '../config/db.php';
include '../includes/header.php';
?>

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