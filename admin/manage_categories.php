<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<h2>Gestion des Catégories</h2>

<form action="../controllers/categoryController.php" method="POST" style="margin-bottom: 20px;">
    <input type="text" name="name" placeholder="Nom de la catégorie (ex: DevOps)" required>
    <button type="submit" name="add_category">Ajouter</button>
</form>

<table>
    <tr><th>ID</th><th>Nom</th><th>Actions</th></tr>
    <?php foreach($categories as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><a href="edit_category.php?id=<?= $c['id'] ?>">Modifier</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>