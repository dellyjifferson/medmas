<?php
session_start();
require_once "db.php";

// Vérification login
if (!isset($_SESSION['code_medecin'])) {
    header("Location: login.php");
    exit();
}

$message = "";

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $no_dossier = $_POST['no_dossier'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $age = $_POST['age'];

    // Validation simple
    if (empty($no_dossier) || empty($nom) || empty($prenom) || empty($sexe) || empty($telephone) || empty($age)) {
        $message = "<p style='color:red;'>Veuillez remplir tous les champs obligatoires.</p>";
    } else {
        // Vérifier si le numéro de dossier existe déjà
        $check = $conn->prepare("SELECT no_dossier FROM patient WHERE no_dossier = ?");
        $check->bind_param("s", $no_dossier);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $message = "<p style='color:red;'>Ce numéro de dossier existe déjà.</p>";
        } else {
            // Insertion
            $stmt = $conn->prepare("
                INSERT INTO patient (no_dossier, nom, prenom, sexe, telephone, adresse, age)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->bind_param("ssssssi", $no_dossier, $nom, $prenom, $sexe, $telephone, $adresse, $age);

            if ($stmt->execute()) {
                header("Location: patients.php?added=1");
                exit();
            } else {
                $message = "<p style='color:red;'>Erreur lors de l’ajout du patient.</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un patient</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>

<?php include "includes/header.php"; ?>

<div class="container">
    <h2>Ajouter un nouveau patient</h2>
    <?= $message ?>

    <form method="POST" action="add_patient.php">

        <label>No Dossier *</label>
        <input type="text" name="no_dossier" required>

        <label>Nom *</label>
        <input type="text" name="nom" required>

        <label>Prénom *</label>
        <input type="text" name="prenom" required>

        <label>Sexe *</label>
        <select name="sexe" required>
            <option value="">-- Choisir --</option>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select>

        <label>Téléphone *</label>
        <input type="text" name="telephone" required>

        <label>Adresse</label>
        <input type="text" name="adresse">

        <label>Âge *</label>
        <input type="number" name="age" required>

        <button type="submit" class="btn">Ajouter</button>
    </form>
</div>

</body>
</html>
