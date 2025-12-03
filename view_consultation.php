<?php
require_once "auth.php";
require_once "db.php";

// Vérification ID consultation
if (!isset($_GET['id'])) {
    header("Location: consultations.php?error=missing_id");
    exit;
}

$id = intval($_GET['id']);

// Récupération consultation + patient + médecin
$sql = $conn->prepare("
    SELECT c.*, 
           p.nom AS p_nom, p.prenom AS p_prenom, p.no_dossier,
           m.nom AS m_nom, m.prenom AS m_prenom, m.specialisation
    FROM consultation c
    JOIN patient p ON c.no_dossier = p.no_dossier
    JOIN medecin m ON c.code_medecin = m.code_medecin
    WHERE c.id_consultation = ?
");
$sql->bind_param("i", $id);
$sql->execute();
$consult = $sql->get_result()->fetch_assoc();

if (!$consult) {
    header("Location: consultations.php?error=not_found");
    exit;
}

// Vérifier s’il existe une prescription
$pres_sql = $conn->prepare("
    SELECT * FROM prescription 
    WHERE id_consultation = ?
");
$pres_sql->bind_param("i", $id);
$pres_sql->execute();
$prescription = $pres_sql->get_result()->fetch_assoc();
?>

<?php include "includes/header.php"; ?>

<div class="container mt-4">

    <a href="patients.php" class="btn btn-secondary mb-3">⬅ Retour aux patients</a>
    <a href="view_patient.php?id=<?= $consult['no_dossier'] ?>" class="btn btn-secondary mb-3">⬅ Retour au patient</a>

    <h2 class="mb-4">Consultation du <?= $consult['date_consultation'] ?></h2>

    <!-- Informations patient / médecin -->
    <div class="card mb-4">
        <div class="card-header">Informations générales</div>
        <div class="card-body">
            <p><strong>Patient :</strong> 
                <?= $consult['p_prenom'] . " " . $consult['p_nom'] ?>  
                (Dossier #<?= $consult['no_dossier'] ?>)
            </p>

            <p><strong>Médecin :</strong> 
                Dr. <?= $consult['m_prenom'] . " " . $consult['m_nom'] ?> — 
                <?= $consult['specialisation'] ?>
            </p>

            <p><strong>Date :</strong> <?= $consult['date_consultation'] ?></p>
        </div>
    </div>

    <!-- Symptômes -->
    <div class="card mb-4">
        <div class="card-header">Symptômes</div>
        <div class="card-body">
            <p><?= nl2br($consult['symptome']) ?></p>
        </div>
    </div>

    <!-- Prescription -->
    <div class="card mb-4">
        <div class="card-header">Prescription</div>
        <div class="card-body">

            <?php if ($prescription): ?>

                <p><strong>Ordonnance :</strong></p>
                <p><?= nl2br($prescription['ordonnance']) ?></p>

                <a href="view_prescription.php?id=<?= $prescription['id_prescription'] ?>" 
                   class="btn btn-info">Voir l’ordonnance</a>

                <a href="print_prescription.php?id=<?= $prescription['id_prescription'] ?>" 
                   class="btn btn-primary">🖨 Imprimer</a>

            <?php else: ?>

                <p>Aucune prescription enregistrée pour cette consultation.</p>

                <a href="add_prescription.php?consultation=<?= $consult['id_consultation'] ?>" 
                   class="btn btn-success">➕ Ajouter une prescription</a>

            <?php endif; ?>

        </div>
    </div>

</div>

<?php include "footer.php"; ?>
