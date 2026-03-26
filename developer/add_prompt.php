<?php 




require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';
include '../includes/header.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>




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