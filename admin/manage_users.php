<?php 
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';

$users = $pdo->query("SELECT * FROM users ORDER BY role ASC")->fetchAll();
?>

<style>

/* TITLE */
h2{
    text-align:center;
    margin:40px 0 25px;
    color:#0f172a;
}

/* TABLE CONTAINER */
table{
    width:90%;
    margin:0 auto 50px;
    border-collapse:collapse;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

/* HEADER */
table thead, table tr:first-child{
    background:#f1f5f9;
}

table th{
    padding:15px;
    text-align:left;
    font-size:14px;
    color:#334155;
}

/* ROWS */
table td{
    padding:15px;
    border-top:1px solid #e2e8f0;
    font-size:14px;
}

/* HOVER */
table tbody tr:hover{
    background:#f9fafb;
}

/* ROLE BADGES */
table td strong{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
    color:white;
}

/* ROLE COLORS */
table td strong:contains("ADMIN"){
    background:#ef4444;
}

/* fallback simple */
table td strong{
    background:#3b82f6;
}

/* DELETE LINK */
a{
    text-decoration:none;
    font-weight:500;
}

/* DELETE BUTTON STYLE */
a[href*="delete_user_id"]{
    color:white;
    background:#ef4444;
    padding:6px 10px;
    border-radius:6px;
    transition:0.3s;
}

a[href*="delete_user_id"]:hover{
    background:#dc2626;
}

/* ME TEXT */
td:contains("(Moi)"){
    color:#64748b;
    font-style:italic;
}

/* RESPONSIVE */
@media(max-width:700px){

    table{
        width:100%;
        font-size:13px;
    }

    table th, table td{
        padding:10px;
    }
}

</style>


<h2>Gestion des Utilisateurs</h2>

<table border="1" >
    <tr >
        <th>Username</th>
        <th>Email</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    <?php foreach($users as $u): ?>
    <tr>
        <td><?= htmlspecialchars($u['username']) ?></td>
        <td><?= htmlspecialchars($u['email']) ?></td>
        <td>
            <span class="role <?= $u['role'] ?>">
             <?= strtoupper($u['role']) ?>
            </span>
        </td>

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