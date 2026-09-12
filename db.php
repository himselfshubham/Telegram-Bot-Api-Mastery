<?php
// Database connection — update these 4 values for your server
$DB_HOST = 'mysql';
$DB_NAME = 'telegram_project';
$DB_USER = 'root';
$DB_PASS = 'root';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}