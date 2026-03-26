<?php
require_once '../includes/auth.php';
confirm_admin();
require_once '../config/db.php';
include '../includes/header.php';

// Récupérer toutes les catégories
$categories = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll();
?>

<style>

/* CONTAINER */
.container{
    max-width:1000px;
    margin:40px auto;
    padding:20px;
}

/* HEADER DASHBOARD */
.dashboard-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.dashboard-header h2{
    color:#0f172a;
    font-size:24px;
}

/* BUTTON */
.btn{
    padding:10px 16px;
    border-radius:8px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    transition:0.3s;
}

/* MAIN BUTTON */
.btn-main{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
    color:white;
}

.btn-main:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 15px rgba(0,0,0,0.1);
}

/* DANGER BUTTON */
.btn-danger{
    background:#ef4444;
    color:white;
}

.btn-danger:hover{
    background:#dc2626;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

/* HEADER TABLE */
table thead{
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

/* HOVER ROW */
table tbody tr:hover{
    background:#f9fafb;
}

/* STRONG NAME */
table td strong{
    color:#0f172a;
}

/* RESPONSIVE */
@media(max-width:700px){

    .dashboard-header{
        flex-direction:column;
        align-items:flex-start;
        gap:10px;
    }

    table{
        font-size:13px;
    }

    table th, table td{
        padding:10px;
    }
}

</style>


<div class="container">
    <div class="dashboard-header">
        <h2>📂 Gestion des Catégories</h2>
        <a href="add_category.php" class="btn btn-main">＋ Ajouter une catégorie</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $cat): ?>
                <tr>
                    <td><?= $cat['id'] ?></td>
                    <td><strong><?= htmlspecialchars($cat['name']) ?></strong></td>
                    <td>
                        <a href="delete_category.php?id=<?= $cat['id'] ?>" 
                           class="btn btn-danger" 
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                           Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>