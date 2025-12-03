<?php
// delete.php
// Page unique pour empêcher les suppressions

include "includes/header.php"; 
?>

<div class="content">
    <h1>Suppression désactivée</h1>

    <div class="card" style="max-width:600px;">
        <p>
            <strong>Pour des raisons de sécurité et de conformité médicale,  
            la suppression définitive des données n'est pas autorisée.</strong>
        </p>

        <p>
            Cela inclut :
        </p>

        <ul style="margin-left:20px;">
            <li>Patients</li>
            <li>Médecins</li>
            <li>Consultations</li>
            <li>Prescriptions</li>
            <li>Rendez-vous(Mais pour l'instant ces derniers sont supprimables, en cas d'annulation)</li>
        </ul>

        <p>
            La conservation des données permet :
        </p>
        <ul style="margin-left:20px;">
            <li>De maintenir l’historique médical</li>
            <li>De respecter les obligations légales</li>
            <li>D’assurer une meilleure traçabilité</li>
        </ul>

        <p style="margin-top:20px;">
            <strong>Dans une prochaine version,  
            vous pourrez archiver une donnée au lieu de la supprimer.</strong>
        </p>

        <a href="dashboard.php">
            <button style="margin-top:20px;">Retour au tableau de bord</button>
        </a>
    </div>
</div>

</body>
</html>