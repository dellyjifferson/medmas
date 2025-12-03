<?php
session_start();
require_once "db.php";

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['code_medecin'])) {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT * FROM medecin ORDER BY nom ASC");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'includes/header.php'; ?> 
    <meta charset="UTF-8">
    <title>Médecins</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des Médecins</h2>
        <a href="ajouter_medecin.php" class="btn btn-primary">Ajouter un Médecin</a>
    </div>

    <div>
        <div>

            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Spécialisation</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['code_medecin'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['prenom'] ?></td>
                        <td><?= $row['specialisation'] ?></td>
                        <td><?= $row['telephone'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <?php if ($row['is_admin'] == 1): ?>
                                <span class="badge bg-success">Admin</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Normal</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit_medecin.php?id=<?= $row['code_medecin'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <br>
                            <a href="delete.php?id=<?= $row['code_medecin'] ?>" 
                               onclick="return confirm('Voulez-vous vraiment supprimer ce médecin ?');"
                               class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-3">
        <a href="dashboard.php" class="btn btn-secondary">Retour au Dashboard</a>
    </div>

</div>

</body>
</html>
