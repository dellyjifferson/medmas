<?php
session_start();
if (!isset($_SESSION['code_medecin'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

// Load patients for dropdown
$patients = $conn->query("SELECT no_dossier, nom, prenom FROM patient ORDER BY nom");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_dossier = $_POST['no_dossier'];
    $code_medecin = $_SESSION['code_medecin'];
    $symptome = $_POST['symptome'];
    $date_consultation = date("Y-m-d");

    $sql = "INSERT INTO consultation (no_dossier, code_medecin, symptome, date_consultation)
            VALUES ('$no_dossier', '$code_medecin', '$symptome', '$date_consultation')";

    if ($conn->query($sql)) {
        header("Location: consultations.php");
        exit();
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h1>Ajouter une Consultation</h1>

    <form method="POST">

        <label>Patient</label>
        <select name="no_dossier" required>
            <option value="">Sélectionner un patient</option>
            <?php while ($p = $patients->fetch_assoc()) : ?>
                <option value="<?= $p['no_dossier'] ?>">
                    <?= $p['nom'] . " " . $p['prenom'] ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Symptôme</label>
        <textarea name="symptome" required></textarea>

        <button type="submit" class="btn">Enregistrer</button>
    </form>
</div>
