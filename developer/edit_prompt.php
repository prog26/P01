<?php 




require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM prompts WHERE id = ?");
$stmt->execute([$id]);
$prompt = $stmt->fetch();

// Sécurité : Vérifier si l'utilisateur est bien le propriétaire
if ($prompt['user_id'] != $_SESSION['user_id'] && $_SESSION['role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
include '../includes/header.php';
?>

<h2>Modifier le Prompt</h2>
<form action="../controllers/promptController.php" method="POST">
    <input type="hidden" name="id" value="<?= $prompt['id'] ?>">
    <input type="text" name="title" value="<?= htmlspecialchars($prompt['title']) ?>" required>
    
    <select name="category_id">
        <?php foreach($categories as $c): ?>
            <option value="<?= $c['id'] ?>" <?= $c['id'] == $prompt['category_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <textarea name="content" rows="8" required><?= htmlspecialchars($prompt['content']) ?></textarea>
    <button type="submit" name="edit_prompt">Mettre à jour</button>
</form>

<?php include '../includes/footer.php'; ?>