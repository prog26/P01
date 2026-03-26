<?php 



require_once '../includes/auth.php';


// ✔️ Autoriser developer ET admin
if ($_SESSION['role'] !== 'developer' && $_SESSION['role'] !== 'admin') {
    header("Location: /Prompt-Repository/auth/login.php");
    exit();
}


require_once '../includes/auth.php';
confirm_logged_in();
require_once '../config/db.php';
include '../includes/header.php';





// 1. Récupération de l'ID de catégorie depuis l'URL (si le filtre est utilisé)
$category_filter = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// 2. Préparation de la requête SQL dynamique
$sql = "SELECT p.*, c.name as cat_name FROM prompts p 
        INNER JOIN categories c ON p.category_id = c.id";

// Si un filtre est sélectionné, on ajoute une condition WHERE
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

// 3. Récupération de toutes les catégories pour remplir le menu déroulant du filtre
$categories = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();
?>
<style>

/* HEADER */
.dashboard-header{
    margin-bottom:30px !important;
}

.dashboard-header h2{
    font-size:24px;
    color:#1e293b;
}

/* BUTTON */
.btn-main{
    background:linear-gradient(135deg,#10b981,#059669) !important;
    color:white !important;
    padding:10px 18px !important;
    border-radius:8px !important;
    text-decoration:none !important;
    font-weight:600;
    transition:0.3s;
}

.btn-main:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

/* FILTER */
.filter-box{
    background:white !important;
    border-radius:12px !important;
    padding:15px 20px !important;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.filter-box select{
    padding:8px 12px !important;
    border-radius:6px !important;
    border:1px solid #ddd !important;
}

/* GRID */
.prompt-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:20px;
}

/* CARD */
.prompt-card{
    background:white !important;
    border:none !important;
    padding:20px !important;
    border-radius:12px !important;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s;
}

.prompt-card:hover{
    transform:translateY(-5px);
}

/* BADGE */
.badge{
    background:#3b82f6 !important;
    padding:5px 12px !important;
    border-radius:20px !important;
    font-size:12px !important;
}

/* TITLE */
.prompt-card h3{
    margin:10px 0;
    color:#1e293b;
}

/* CONTENT */
.content-box{
    background:#f8fafc !important;
    border-radius:8px !important;
    padding:12px !important;
    font-size:14px;
    color:#334155;
}

/* ACTIONS */
.actions a{
    text-decoration:none;
    font-size:14px;
    color:#3b82f6;
    margin-right:10px;
}

.actions a:hover{
    text-decoration:underline;
}

/* DELETE */
.actions a[onclick]{
    color:#ef4444 !important;
}

/* EMPTY */
.prompt-grid p{
    text-align:center;
    color:#64748b;
}

</style>


<div class="dashboard-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>📚 Bibliothèque des Prompts</h2>
    <a href="add_prompt.php" class="btn-main" style="background: #28a745; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">＋ Nouveau Prompt</a>
</div>

<div class="filter-box" style="margin-bottom: 30px; background: #f4f4f4; padding: 15px; border-radius: 8px;">
    <form action="dashboard.php" method="GET" style="display: flex; gap: 10px; align-items: center;">
        <label for="category_id"><strong>Filtrer par thématique :</strong></label>
        <select name="category_id" id="category_id" onchange="this.form.submit()" style="padding: 5px;">
            <option value="0">Toutes les catégories</option>
            <?php foreach($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= ($category_filter == $cat['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if($category_filter > 0): ?>
            <a href="dashboard.php" style="color: red; font-size: 0.9em;">Réinitialiser</a>
        <?php endif; ?>
    </form>
</div>

<div class="prompt-grid">
    <?php if(count($prompts) > 0): ?>
        <?php foreach($prompts as $p): ?>
            <div class="prompt-card" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 10px;">
                <span class="badge" style="background: #007bff; color: white; padding: 3px 8px; border-radius: 4px; font-size: 0.8em;">
                    <?= htmlspecialchars($p['cat_name']) ?>
                </span>
                <h3><?= htmlspecialchars($p['title']) ?></h3>
                <div class="content-box" style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin: 10px 0;">
                    <code><?= nl2br(htmlspecialchars($p['content'])) ?></code>
                </div>
                <div class="actions">
                    <?php if($p['user_id'] == $_SESSION['user_id'] || $_SESSION['role'] === 'admin'): ?>
                        <a href="edit_prompt.php?id=<?= $p['id'] ?>">Modifier</a> | 
                        <a href="../controllers/promptController.php?delete_id=<?= $p['id'] ?>" 
                           onclick="return confirm('Supprimer ce prompt ?')" style="color:red;">Supprimer</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun prompt trouvé pour cette catégorie.</p>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>