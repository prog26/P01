<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';

$users = $pdo->query("SELECT * FROM users ORDER BY role ASC")->fetchAll();
?>

<h2>Gestion des Utilisateurs</h2>

<table border="1" style="width: 100%; border-collapse: collapse;">
    <tr style="background: #333; color: white;">
        <th>Username</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    <?php foreach($users as $u): ?>
    <tr>
        <td><?= htmlspecialchars($u['username']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td><strong><?= strtoupper($u['role']) ?></strong></td>
        <td>
            <?php if($u['id'] != $_SESSION['user_id']): ?>
                <a href="../controllers/userController.php?delete_user_id=<?= $u['id'] ?>" style="color:red;">Supprimer</a>
            <?php else: ?>
                (Moi)
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../includes/footer.php'; ?>