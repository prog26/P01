<?php 
require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';
include '../includes/header.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<main>
    <div class="page-wrapper">
        <a href="dashboard.php" class="btn-back">← Retour au Dashboard</a>

        <div class="form-card">
            <div class="form-card-header">
                <h2>Enregistrer un nouvel actif</h2>
                <p>Ajoutez un nouveau prompt à votre bibliothèque partagée.</p>
            </div>

            <form action="../controllers/promptController.php" method="POST" class="main-form">
                <div>
                    <label>Titre du Prompt :</label>
                    <input type="text" name="title" placeholder="Ex: Script de migration SQL" required>
                </div>
                
                <div>
                    <label>Catégorie :</label>
                    <select name="category_id">
                        <?php foreach($categories as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label>Contenu de l'instruction (Prompt) :</label>
                    <textarea name="content" placeholder="Collez ici l'instruction qui fonctionne..." required></textarea>
                </div>

                <button type="submit" name="add_prompt">Sauvegarder dans la Knowledge Base</button>
            </form>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>