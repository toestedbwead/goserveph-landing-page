<?php
// includes/register-processing.php

$errors = [];
$formData = $_POST ?? [];

$first_name   = trim($_POST['firstName'] ?? '');
$middle_name  = trim($_POST['middleName'] ?? '');
$last_name    = trim($_POST['lastName'] ?? '');
$suffix       = trim($_POST['suffix'] ?? '');
$email        = trim($_POST['regEmail'] ?? '');
$pass         = $_POST['regPassword'] ?? '';
$confirm_pass = $_POST['confirmPassword'] ?? '';
$agree_terms  = isset($_POST['agreeTerms']);
$agree_privacy = isset($_POST['agreePrivacy']);

// Validation
if (empty($first_name))      $errors[] = "First name is required.";
if (empty($last_name))       $errors[] = "Last name is required.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email address is required.";
}
if (empty($pass))            $errors[] = "Password is required.";
if ($pass !== $confirm_pass) $errors[] = "Passwords do not match.";
if (strlen($pass) < 10)      $errors[] = "Password must be at least 10 characters long.";
if (!preg_match('/[A-Z]/', $pass))     $errors[] = "Password must contain at least one uppercase letter.";
if (!preg_match('/[a-z]/', $pass))     $errors[] = "Password must contain at least one lowercase letter.";
if (!preg_match('/\d/', $pass))        $errors[] = "Password must contain at least one number.";
if (!preg_match('/[^A-Za-z0-9]/', $pass)) $errors[] = "Password must contain at least one special character.";
if (!$agree_terms)           $errors[] = "You must agree to the Terms of Use.";
if (!$agree_privacy)         $errors[] = "You must agree to the Data Privacy Policy.";

if (empty($errors)) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $errors[] = "This email is already registered.";
    }
    $stmt->close();

    if (empty($errors)) {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("
            INSERT INTO users (
                email, password, first_name, middle_name, last_name, suffix, role
            ) VALUES (?, ?, ?, ?, ?, ?, 'citizen')
        ");
        $stmt->bind_param("ssssss", $email, $hashed, $first_name, $middle_name, $last_name, $suffix);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
        $stmt->close();
    }
}
?>