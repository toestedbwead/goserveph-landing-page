<?php
session_start();
require_once '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    $_SESSION['admin_error'] = "Email and password are required.";
    header("Location: login.php");
    exit;
}

$stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id, $hashed_password, $role);
$stmt->fetch();

if ($stmt->num_rows === 1 && $role === 'superadmin' && password_verify($password, $hashed_password)) {
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id']   = $id;
    $_SESSION['email']     = $email;
    $_SESSION['role']      = $role;
    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION['admin_error'] = "Invalid credentials or not authorized as superadmin.";
    header("Location: login.php");
    exit;
}

$stmt->close();
$conn->close();
?>