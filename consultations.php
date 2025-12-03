<?php
session_start();
if (!isset($_SESSION['code_medecin'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

// Fetch consultations
$sql = "SELECT c.id_consultation, c.symptome, c.date_consultation,
               p.no_dossier, p.nom AS patient_nom, p.prenom AS patient_prenom,
               m.nom AS doc_nom, m.prenom AS doc_prenom
        FROM consultation c
        JOIN patient p ON c.no_dossier = p.no_dossier
        JOIN medecin m ON c.code_medecin = m.code_medecin
        ORDER BY c.date_consultation DESC";

$result = $conn->query($sql);
?>
<?php include 'includes/header.php'; ?> 

<div class="container">
    <h1>Liste des Consultations</h1>
    <a class="btn" href="add_consultation.php">➕ Nouvelle Consultation</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Médecin</th>
                <th>Symptôme</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row['id_consultation'] ?></td>
                    <td><?= $row['patient_nom'] . " " . $row['patient_prenom'] ?></td>
                    <td><?= $row['doc_nom'] . " " . $row['doc_prenom'] ?></td>
                    <td><?= $row['symptome'] ?></td>
                    <td><?= $row['date_consultation'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<?php include 'includes/footer.php'; ?> 
