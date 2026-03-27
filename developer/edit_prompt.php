<?php 
require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';

// Vérification de l'ID
if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM prompts WHERE id = ?");
$stmt->execute([$id]);
$prompt = $stmt->fetch();

if (!$prompt) {
    header('Location: dashboard.php');
    exit();
}

// Sécurité : Vérifier si l'utilisateur est bien le propriétaire ou admin
if ($prompt['user_id'] != $_SESSION['user_id'] && $_SESSION['role'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
include '../includes/header.php';
?>

<main>
    <div class="page-wrapper">
        <a href="dashboard.php" class="btn-back">← Retour au Dashboard</a>

        <div class="form-card">
            <div class="form-card-header">
                <h2>✏️ Modifier le Prompt</h2>
                <p>Mettez à jour les informations de votre actif.</p>
            </div>

            <form action="../controllers/promptController.php" method="POST" class="main-form">
                <input type="hidden" name="id" value="<?= $prompt['id'] ?>">

                <div>
                    <label>Titre du Prompt :</label>
                    <input type="text" name="title" value="<?= htmlspecialchars($prompt['title']) ?>" placeholder="Ex: Script de migration SQL" required>
                </div>

                <div>
                    <label>Catégorie :</label>
                    <select name="category_id">
                        <?php foreach($categories as $c): ?>
                            <option value="<?= $c['id'] ?>" <?= $c['id'] == $prompt['category_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label>Contenu de l'instruction (Prompt) :</label>
                    <textarea name="content" placeholder="Contenu du prompt..." required><?= htmlspecialchars($prompt['content']) ?></textarea>
                </div>

                <button type="submit" name="edit_prompt">Mettre à jour l'actif</button>
            </form>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>