<?php
require_once "db.php";

// Vérifier si un ID est fourni
if (!isset($_GET['id'])) {
    header("Location: patients.php?error=missing_id");
    exit;
}

$no_dossier = intval($_GET['id']);

// Récupérer les informations du patient
$stmt = $conn->prepare("SELECT * FROM patient WHERE no_dossier = ?");
$stmt->bind_param("i", $no_dossier);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: patients.php?error=not_found");
    exit;
}

$patient = $result->fetch_assoc();

// Mettre à jour si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    $update = $conn->prepare("
        UPDATE patient 
        SET nom = ?, prenom = ?, sexe = ?, date_naissance = ?, telephone = ?, adresse = ?
        WHERE no_dossier = ?
    ");
    $update->bind_param("ssssssi", $nom, $prenom, $sexe, $date_naissance, $telephone, $adresse, $no_dossier);

    if ($update->execute()) {
        header("Location: patients.php?success=updated");
        exit;
    } else {
        $error = "Erreur lors de la mise à jour.";
    }
}
?>
<?php include"includes/header.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>

<h2>Modifier les informations du patient</h2>

<?php if (isset($error)) : ?>
<p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($patient['nom']) ?>" required><br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($patient['prenom']) ?>" required><br><br>

    <label>Sexe :</label>
    <select name="sexe" required>
        <option value="M" <?= $patient['sexe'] == 'M' ? 'selected' : '' ?>>Masculin</option>
        <option value="F" <?= $patient['sexe'] == 'F' ? 'selected' : '' ?>>Féminin</option>
    </select><br><br>

    <label>Date de naissance :</label>
    <input type="date" name="date_naissance" value="<?= $patient['date_naissance'] ?>" required><br><br>

    <label>Téléphone :</label>
    <input type="text" name="telephone" value="<?= htmlspecialchars($patient['telephone']) ?>" required><br><br>

    <label>Adresse :</label>
    <textarea name="adresse" required><?= htmlspecialchars($patient['adresse']) ?></textarea><br><br>

    <button type="submit" class="btn-small">Enregistrer les modifications</button>
    <a href="patients.php">Annuler</a>
</form>

</body>
</html>
