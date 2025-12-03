<?php
require 'db.php'; // Your database connection

// Fetch all medecin records
$sql = "SELECT code_medecin, passcode FROM medecin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $plain_password = $row['passcode'];
        // Hash the current password
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
        // Update the database
        $update_sql = "UPDATE medecin SET passcode = ? WHERE code_medecin = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("si", $hashed_password, $row['code_medecin']);
        $stmt->execute();
        echo "Updated password for medecin code " . $row['code_medecin'] . "<br>";
    }
    echo "All passwords hashed successfully.";
} else {
    echo "No records found.";
}
?>