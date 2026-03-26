<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';

$users = $pdo->query("SELECT * FROM users ORDER BY role ASC")->fetchAll();
?>

<div class="page-header">
    <h2>👥 Gestion des Utilisateurs</h2>
    <span class="page-count"><?= count($users) ?> utilisateur<?= count($users) > 1 ? 's' : '' ?></span>
</div>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Nom d'utilisateur</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $u): ?>
            <tr>
                <td>
                    <div class="user-name">
                        <div class="user-avatar"><?= strtoupper(substr($u['username'], 0, 1)) ?></div>
                        <?= htmlspecialchars($u['username']) ?>
                    </div>
                </td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td>
                    <span class="role <?= $u['role'] ?>">
                        <?= strtoupper($u['role']) ?>
                    </span>
                </td>
                <td>
                    <?php if($u['id'] != $_SESSION['user_id']): ?>
                        <a href="../controllers/userController.php?delete_user_id=<?= $u['id'] ?>"
                           class="btn-delete-user"
                           onclick="return confirm('Supprimer cet utilisateur ?')">
                            🗑 Supprimer
                        </a>
                    <?php else: ?>
                        <span class="badge-me">👤 Moi</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>