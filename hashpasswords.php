<?php
require 'db.php';

// Hash a single medecin password by code_medecin from the query string
$code_medecin = filter_input(INPUT_GET, 'code_medecin', FILTER_VALIDATE_INT);

if ($code_medecin === null) {
    http_response_code(400);
    exit('Missing code_medecin parameter.');
}

if ($code_medecin === false) {
    http_response_code(400);
    exit('Invalid code_medecin parameter.');
}

$select_sql = 'SELECT passcode FROM medecin WHERE code_medecin = ?';
$select_stmt = $conn->prepare($select_sql);
$select_stmt->bind_param('i', $code_medecin);
$select_stmt->execute();
$select_stmt->bind_result($plain_password);

if (!$select_stmt->fetch()) {
    http_response_code(404);
    exit('Medecin not found.');
}

// Avoid rehashing passwords that already look hashed
$is_already_hashed = password_get_info($plain_password)['algo'] !== 0;

if ($is_already_hashed) {
    exit('Password already hashed for this medecin.');
}

$select_stmt->close();

$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

$update_sql = 'UPDATE medecin SET passcode = ? WHERE code_medecin = ?';
$update_stmt = $conn->prepare($update_sql);
$update_stmt->bind_param('si', $hashed_password, $code_medecin);

if ($update_stmt->execute()) {
    echo 'Updated password for medecin code ' . $code_medecin;
} else {
    http_response_code(500);
    echo 'Failed to update password.';
}
?>