<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("Prescription invalide.");
}

$id = intval($_GET['id']);

// Charger la prescription + consultation + patient + médecin
$sql = "
SELECT 
    p.id_prescription,
    p.ordonnance,
    c.date_consultation,
    pat.no_dossier,
    pat.nom AS patient_nom,
    pat.prenom AS patient_prenom,
    pat.age,
    pat.sexe AS patient_sexe,
    m.nom AS med_nom,
    m.prenom AS med_prenom,
    m.specialisation
FROM prescription p
JOIN consultation c ON p.id_consultation = c.id_consultation
JOIN patient pat ON c.no_dossier = pat.no_dossier
JOIN medecin m ON c.code_medecin = m.code_medecin
WHERE p.id_prescription = $id
";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Ordonnance introuvable.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ordonnance – <?= $data['patient_nom'] ?></title>

<style>
body {
    font-family: "Arial", sans-serif;
    margin: 40px;
}

.print-header {
    text-align: center;
    margin-bottom: 20px;
}

.print-header h2 {
    margin: 0;
}

.info-block {
    margin-bottom: 20px;
}

.label {
    font-weight: bold;
}

.ordonnance-box {
    border: 1px solid #000;
    padding: 20px;
    min-height: 200px;
    font-size: 18px;
    white-space: pre-line;
}

.print-btn {
    margin-bottom: 20px;
}

@media print {
    .print-btn {
        display: none;
    }
}
</style>
</head>

<body>

<button class="print-btn" onclick="window.print()">🖨️ Imprimer</button>

<div class="print-header">
    <h2>Ordonnance Médicale</h2>
    <p><em>Clinique Groupe 7 — Système de Gestion MEDMAS</em></p>
</div>

<div class="info-block">
    <p><span class="label">Médecin :</span> 
        Dr. <?= $data['med_prenom'] . " " . $data['med_nom'] ?> (<?= $data['specialisation'] ?>)
    </p>
    <p><span class="label">Date consultation :</span> <?= $data['date_consultation'] ?></p>
</div>

<div class="info-block">
    <p><span class="label">Patient :</span> 
        <?= $data['patient_prenom'] . " " . $data['patient_nom'] ?>
    </p>
    <p><span class="label">Âge :</span> <?= $data['age'] ?> ans</p>
    <p><span class="label">Sexe :</span> <?= $data['patient_sexe'] ?></p>
    <p><span class="label">No dossier :</span> <?= $data['no_dossier'] ?></p>
</div>

<h3>📝 Ordonnance</h3>
<div class="ordonnance-box">
    <?= nl2br($data['ordonnance']) ?>
</div>

</body>
</html>
