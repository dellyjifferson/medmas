<?php
session_start();

if (!isset($_SESSION['code_medecin'])) {
    header("Location: login.php");
    exit;
}
