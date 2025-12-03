<?php
session_start();
 require 'db.php';

// Empêcher accès non connecté
if (!isset($_SESSION['code_medecin'])) {
    header("Location: login.php");
    exit();
}

// Récupération des stats pour le dashboard
$totalPatients = $conn->query("SELECT COUNT(*) AS total FROM patient")->fetch_assoc()['total'];
$totalConsultations = $conn->query("SELECT COUNT(*) AS total FROM consultation")->fetch_assoc()['total'];
$totalRdv = $conn->query("SELECT COUNT(*) AS total FROM rendez_vous")->fetch_assoc()['total'];

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$is_admin = $_SESSION['is_admin'];
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Clinique</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/styles.css">
    <script src="assets/theme.js"></script>
    <?php include "includes/header.php"; ?>
</head>

<body>

<div class="container-fluid">
    <div class="row">       

        <!-- MAIN CONTENT -->
        <div class="col-md-10 p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Bonjour Dr. <?= $prenom . " " . $nom ?></h2>

                <span class="badge bg-primary fs-6">
                    <?= $is_admin ? "Administrateur" : "Médecin" ?>
                </span>
            </div>

            <!-- Stat Cards -->
            <div class="row mb-4">

                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <h4>👤 Patients</h4>
                        <h2><?= $totalPatients ?></h2>
                        <a href="patients.php" class="btn btn-sm btn-outline-primary">Gérer</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <h4>🩺 Consultations</h4>
                        <h2><?= $totalConsultations ?></h2>
                        <a href="consultations.php" class="btn btn-sm btn-outline-primary">Gérer</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow p-3">
                        <h4>📅 Rendez-vous</h4>
                        <h2><?= $totalRdv ?></h2>
                        <a href="appointments.php" class="btn btn-sm btn-outline-primary">Gérer</a>
                    </div>
                </div>

            </div>

            <!-- Quick actions -->
