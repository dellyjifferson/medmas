<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue - Polyclinique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom right, #e3f2fd, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-card {
            max-width: 650px;
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .logo-img {
            width: 120px;
            margin-bottom: 20px;
        }

        .tagline {
            font-size: 1.2rem;
            color: #555;
            margin-top: 10px;
            font-style: italic;
        }
    </style>
</head>

<body>

<div class="welcome-card">

    <!-- LOGO -->
    <img src="assets/MEDMAS_black.png" alt="Logo Polyclinique" class="logo-img">

    <!-- TITRE -->
    <h1 class="fw-bold">Système de Gestion de la Clinique</h1>

    <!-- SLOGAN -->
    <p class="tagline">« Pour une prise en charge moderne, rapide et efficace »</p>

    <!-- DESCRIPTION -->
    <p class="mt-3 text-muted">
        Bienvenue sur notre plateforme numérique dédiée à la gestion professionnelle des patients,
        consultations, médecins et prescriptions.  
        Une interface simple, rapide et sécurisée au service de la santé.
        <br><br>
        <em> All Right Reserved &copy; Groupe 7, ESIH L2 </em>
    </p>
    
    <!-- BOUTON LOGIN -->
    <a href="login.php" class="btn btn-primary btn-lg mt-4 px-5">
        Se connecter
    </a>

</div>

</body>
</html>
