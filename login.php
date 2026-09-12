<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$phone = trim($_POST['phone'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($phone === '' || $password === '') {
    header('Location: index.php?error=empty');
    exit;
}

// Normalize phone: keep only digits, so "+91 98765 43210" and "9876543210" both match
$phoneDigits = preg_replace('/\D/', '', $phone);

$stmt = mysqli_prepare($conn, 'SELECT id, name, phone, password_hash FROM users WHERE phone = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 's', $phoneDigits);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
if (!$user) {
    header('Location: index.php?error=invalid');
    exit;
}

// Success — log the user in
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

header('Location: dashboard.php');
exit;