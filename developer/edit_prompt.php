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
<style>

/* TITLE */
h2{
    text-align:center;
    margin-top:40px;
    margin-bottom:20px;
    color:#1e293b;
}

/* FORM CONTAINER */
form{
    max-width:500px;
    margin:0 auto;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
    gap:15px;
}

/* INPUT + SELECT + TEXTAREA */
form input,
form select,
form textarea{
    width:100%;
    padding:12px;
    border:1px solid #ddd;
    border-radius:8px;
    font-size:14px;
    outline:none;
    transition:0.3s;
}

/* FOCUS EFFECT */
form input:focus,
form select:focus,
form textarea:focus{
    border-color:#3b82f6;
    box-shadow:0 0 5px rgba(59,130,246,0.3);
}

/* TEXTAREA */
form textarea{
    resize:none;
}

/* BUTTON */
form button{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
    padding:12px;
    border:none;
    border-radius:8px;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

/* HOVER BUTTON */
form button:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

</style>


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