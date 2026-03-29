<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';

if (!isset($_GET['id'])) {
    header('Location: manage_categories.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$_GET['id']]);
$cat = $stmt->fetch();

if (!$cat) {
    header('Location: manage_categories.php');
    exit;
}

include '../includes/header.php';
?>

<div class="page-wrapper">
    <a href="manage_categories.php" class="btn-back">← Retour aux catégories</a>

    <div class="form-card">
        <div class="form-card-header">
            <h2>✏️ Modifier la catégorie</h2>
            <p>Modifiez le nom puis cliquez sur Mettre à jour.</p>
        </div>

        <form action="../controllers/categoryController.php" method="POST" class="main-form">
            <input type="hidden" name="id" value="<?= $cat['id'] ?>">

            <div>
                <label for="name">Nom de la catégorie</label>
                <input type="text" id="name" name="name"
                       value="<?= htmlspecialchars($cat['name']) ?>"
                       placeholder="Ex: Intelligence Artificielle"
                       required>
            </div>

            <button type="submit" name="edit_category">Mettre à jour</button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>