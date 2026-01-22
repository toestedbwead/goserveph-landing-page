<?php
session_start();
require_once '../includes/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'superadmin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id  = (int)$_POST['user_id'];
    $new_role = $_POST['new_role'];

    if (in_array($new_role, ['citizen', 'admin', 'superadmin'])) {
        $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $new_role, $user_id);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: dashboard.php");
exit;
?>