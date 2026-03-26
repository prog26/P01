<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';
?>

<div class="page-wrapper">

    <a href="manage_categories.php" class="btn-back">⬅ Retour à la liste</a>

    <div class="form-card">
        <div class="form-card-header">
            <h2>📁 Ajouter une catégorie</h2>
            <p>Créez une thématique pour organiser les prompts (ex: DevOps, UI/UX, Tests Unitaires).</p>
        </div>

        <form action="../controllers/categoryController.php" method="POST" class="main-form">
            <div>
                <label for="name">Nom de la catégorie</label>
                <input type="text" id="name" name="name" placeholder="Ex: Mobile Development" required>
            </div>

            <button type="submit" name="add_category">Créer la catégorie</button>
        </form>
    </div>

</div>

<?php include '../includes/footer.php'; ?>