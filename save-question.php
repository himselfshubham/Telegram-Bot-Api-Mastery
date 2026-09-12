<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: question-creation.php');
    exit;
}

$question           = trim($_POST['question'] ?? '');
$option1            = trim($_POST['option1'] ?? '');
$option2            = trim($_POST['option2'] ?? '');
$option3            = trim($_POST['option3'] ?? '');
$option4            = trim($_POST['option4'] ?? '');
$correct_option     = trim($_POST['correct_option'] ?? '');
$answer_description = trim($_POST['answer_description'] ?? '');

// Validation
if (
    $question === '' || strlen($question) > 300 ||
    $option1 === '' || $option2 === '' || $option3 === '' || $option4 === '' ||
    !in_array($correct_option, ['1', '2', '3', '4'], true) ||
    $answer_description === ''
) {
    header('Location: question-creation.php?status=error');
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    'INSERT INTO question_bank (question, option1, option2, option3, option4, correct_option, answer_description, created_by)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
);

mysqli_stmt_bind_param(
    $stmt,
    'sssssisi',
    $question,
    $option1,
    $option2,
    $option3,
    $option4,
    $correct_option,
    $answer_description,
    $_SESSION['user_id']
);

if (mysqli_stmt_execute($stmt)) {
    header('Location: question-creation.php?status=success');
} else {
    header('Location: question-creation.php?status=error');
}
exit;
