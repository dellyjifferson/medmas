<!-- sidebar.php -->
<div class="sidebar" id="sidebar">
    <!-- <button class="btn btn-primary theme-toggle" id="toggleSidebar">☰</button> -->
    <div class="sidebar-header">
      <img src="assets/MEDMAS.png" alt="Logo Polyclinique" class="logo-img" height="70px">
    </div>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="patients.php">👤 Patients</a>
    <a href="consultations.php">🩺 Consultations</a>
    <a href="prescriptions.php">💊 Prescriptions</a>
    <a href="appointments.php">📅 Rendez-vous</a>

    <?php if (!empty($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
        <a href="add_medecin.php">➕ Ajouter Médecin</a>
        <a href="medecins.php">👨‍⚕️ Liste des Médecins</a>
    <?php endif; ?>
    <!-- Bouton Dark Mode -->
    <button id="themeToggle" class="theme-btn">🌙</button>  <br><br>
    <a href="logout.php" class="mt-4 text-warning">🚪 Déconnexion</a>
</div>
<!-- <script>
  document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    // Vérifier si la sidebar est visible
    if (sidebar.style.display === 'none' || !sidebar.style.display) {
      sidebar.style.display = 'block'; // afficher
    } else {
      sidebar.style.display = 'none'; // cacher
    }
  });
</script> -->