<?php 

require_once '../includes/auth.php';

// Autoriser developer ET admin
if ($_SESSION['role'] !== 'developer' && $_SESSION['role'] !== 'admin') {
    header("Location: /Prompt-Repository/auth/login.php");
    exit();
}

require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';
include '../includes/header.php';

// 1. Récupération de l'ID de catégorie depuis l'URL
$category_filter = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// 2. Requête SQL dynamique
$sql = "SELECT p.*, c.name as cat_name FROM prompts p 
        INNER JOIN categories c ON p.category_id = c.id";

if ($category_filter > 0) {
    $sql .= " WHERE p.category_id = :cat_id";
}

$sql .= " ORDER BY p.created_at DESC";

$stmt = $pdo->prepare($sql);

if ($category_filter > 0) {
    $stmt->bindValue(':cat_id', $category_filter, PDO::PARAM_INT);
}

$stmt->execute();
$prompts = $stmt->fetchAll();

// 3. Toutes les catégories pour le filtre
$categories = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();
?>

<div class="dashboard-header">
    <h2>📚 Bibliothèque des Prompts</h2>
    <a href="add_prompt.php" class="btn-new-prompt">
        <span class="btn-new-prompt-icon">＋</span>
        Nouveau Prompt
    </a>
</div>

<div class="filter-box">
    <form action="dashboard.php" method="GET">
        <label for="category_id"><strong>Filtrer par thématique :</strong></label>
        <select name="category_id" id="category_id" onchange="this.form.submit()">
            <option value="0">Toutes les catégories</option>
            <?php foreach($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= ($category_filter == $cat['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if($category_filter > 0): ?>
            <a href="dashboard.php">Réinitialiser</a>
        <?php endif; ?>
    </form>
</div>

<div class="prompt-grid">
    <?php if(count($prompts) > 0): ?>
        <?php foreach($prompts as $p): ?>
            <div class="prompt-card">
                <span class="badge"><?= htmlspecialchars($p['cat_name']) ?></span>
                <h3><?= htmlspecialchars($p['title']) ?></h3>
                <div class="content-box">
                    <code><?= nl2br(htmlspecialchars($p['content'])) ?></code>
                </div>
                <div class="actions">
                    <?php if($p['user_id'] == $_SESSION['user_id'] || $_SESSION['role'] === 'admin'): ?>
                        <a href="edit_prompt.php?id=<?= $p['id'] ?>">Modifier</a>
                        <a href="../controllers/promptController.php?delete_id=<?= $p['id'] ?>"
                           onclick="return confirm('Supprimer ce prompt ?')">Supprimer</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="empty-state">
            <p>Aucun prompt trouvé pour cette catégorie.</p>
        </div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>