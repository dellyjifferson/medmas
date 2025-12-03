<?php
session_start();
require_once "db.php";

if (!isset($_SESSION['code_medecin'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: medecins.php");
    exit;
}

$id = $_GET['id'];

// Récupération du médecin
$stmt = $conn->prepare("SELECT * FROM medecin WHERE code_medecin = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    die("Médecin introuvable.");
}

$success = $error = "";

// Mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom       = $_POST['nom'];
    $prenom    = $_POST['prenom'];
    $sexe      = $_POST['sexe'];
    $adresse   = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $email     = $_POST['email'];
    $spec      = $_POST['specialisation'];
    $admin     = isset($_POST['admin']) ? 1 : 0;

    // Vérifier si nouveau password
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $update = $conn->prepare("UPDATE medecin SET nom=?, prenom=?, sexe=?, adresse=?, telephone=?, email=?, specialisation=?, password=?, admin=? WHERE code_medecin=?");
        $update->bind_param("ssssssssii", $nom, $prenom, $sexe, $adresse, $telephone, $email, $spec, $password, $admin, $id);
    } else {
        // Sans changer mot de passe
        $update = $conn->prepare("UPDATE medecin SET nom=?, prenom=?, sexe=?, adresse=?, telephone=?, email=?, specialisation=?, admin=? WHERE code_medecin=?");
        $update->bind_param("sssssssii", $nom, $prenom, $sexe, $adresse, $telephone, $email, $spec, $admin, $id);
    }

    if ($update->execute()) {
        $success = "Médecin mis à jour avec succès.";
    } else {
        $error = "Erreur lors de la mise à jour.";
    }
}
?>
<?php include "includes/header.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Médecin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div>

    <div>
        <div class="card-header bg-warning text-dark text-center">
            <h3>Modifier Médecin</h3>
        </div>

        <div>

            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST">

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" value="<?= $data['nom'] ?>" class="form-control" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Prénom</label>
                        <input type="text" name="prenom" value="<?= $data['prenom'] ?>" class="form-control" required>
                    </div>
                </div>

                <label class="form-label">Sexe</label>
                <select name="sexe" class="form-select mb-3" required>
                    <option value="M" <?= $data['sexe']=='M'?'selected':'' ?>>Masculin</option>
                    <option value="F" <?= $data['sexe']=='F'?'selected':'' ?>>Féminin</option>
                </select>

                <label class="form-label">Adresse</label>
                <textarea name="adresse" class="form-control mb-3"><?= $data['adresse'] ?></textarea>

                <label class="form-label">Téléphone</label>
                <input type="text" name="telephone" value="<?= $data['telephone'] ?>" class="form-control mb-3">

                <label class="form-label">Email</label>
                <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control mb-3">

                <label class="form-label">Spécialisation</label>
                <input type="text" name="specialisation" value="<?= $data['specialisation'] ?>" class="form-control mb-3">

                <label class="form-label">Nouveau mot de passe (optionnel)</label>
                <input type="password" name="password" placeholder="Laisser vide pour ne pas changer" class="form-control mb-4">

                <div class="form-check mb-4">
                    <input type="checkbox" name="admin" class="form-check-input" <?= $data['admin']==1?'checked':'' ?>>
                    <label class="form-check-label">Administrateur</label>
                </div>

                <button type="submit" class="btn btn-warning w-100">Mettre à jour</button>

            </form>
        </div>
                <br>
        <div class="card-footer text-center">
            <a href="medecins.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>

</body>
</html>
