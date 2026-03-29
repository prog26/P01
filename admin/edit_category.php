<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';

if(!isset($_GET['id'])) header('Location: manage_categories.php');

$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$_GET['id']]);
$cat = $stmt->fetch();

include '../includes/header.php';


?>
<div class="form-card">
    <div class="form-card-header">
        <h2>Modifier la catégorie</h2>
    </div>
    
    <form action="../controllers/categoryController.php" method="POST">
        <input type="hidden" name="id" value="<?= $cat['id'] ?>">
        <input type="text" name="name" value="<?= htmlspecialchars($cat['name']) ?>" required>
        <button type="submit" name="edit_category">Mettre à jour</button>
    </form>
</div>



<?php include '../includes/footer.php'; ?>