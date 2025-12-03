<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Clinic System</title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Dark Mode Script -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const body = document.body;

        // Charger le thème depuis localStorage
        if (localStorage.getItem("theme") === "dark") {
            body.classList.add("dark");
        }

        const themeToggle = document.getElementById("themeToggle");

        // Détecte si le bouton existe (par sécurité)
        document.addEventListener("click", function(e) {
            if (e.target && e.target.id === "themeToggle") {
                body.classList.toggle("dark");

                // Sauvegarde du thème
                if (body.classList.contains("dark")) {
                    localStorage.setItem("theme", "dark");
                    e.target.textContent = "☀️";
                } else {
                    localStorage.setItem("theme", "light");
                    e.target.textContent = "🌙";
                }
            }
        });

        // Ajuste l'icône selon le thème actuel
        setTimeout(() => {
            const toggleIcon = document.getElementById("themeToggle");
            if (toggleIcon) {
                toggleIcon.textContent = body.classList.contains("dark") ? "☀️" : "🌙";
            }
        }, 50);
    });
    </script>

</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <?php include 'sidebar.php'; ?>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <button class="btn btn-primary theme-toggle" id="toggleSidebar">☰</button>
             <h2 style="color: white;">Gestion de la Clinique</h2>
            
            <div class="user-info">

                <!-- Bouton Dark Mode -->
                <button id="themeToggle" class="theme-btn">🌙</button>

                <!-- Nom de l'utilisateur -->
                <span>
                    👨‍⚕️ <?= $_SESSION['nom'] ?? 'Utilisateur' ?>
                </span>

                <!-- Logout -->
                <a href="logout.php" class="logout">Déconnexion</a>
            </div>
        </div>
<script>
  document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    // Vérifier si la sidebar est visible
    if (sidebar.style.display === 'none' || !sidebar.style.display) {
      sidebar.style.display = 'block'; // afficher
    } else {
      sidebar.style.display = 'none'; // cacher
    }
  });
</script>