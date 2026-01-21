<?php
require_once 'config.php';
require_once 'includes/database.php';

$errors   = [];
$success  = false;
$formData = ['full_name' => '', 'email' => '', 'contact_number' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name     = trim($_POST['full_name'] ?? '');
    $email         = trim($_POST['email'] ?? '');
    $contact       = trim($_POST['contact_number'] ?? '');
    $pass          = $_POST['password'] ?? '';
    $pass_confirm  = $_POST['password_confirm'] ?? '';

    $formData = ['full_name' => $full_name, 'email' => $email, 'contact_number' => $contact];

    // Basic validation
    if (empty($full_name))     $errors[] = "Full name is required.";
    if (empty($email))         $errors[] = "Email is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($pass))          $errors[] = "Password is required.";
    if ($pass !== $pass_confirm) $errors[] = "Passwords do not match.";
    if (strlen($pass) < 8)     $errors[] = "Password must be at least 8 characters.";

    if (empty($errors)) {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = "Email is already registered.";
        }
        $stmt->close();

        if (empty($errors)) {
            // Hash password
            $hashed = password_hash($pass, PASSWORD_DEFAULT);

            // Insert
            $stmt = $conn->prepare("
                INSERT INTO users (email, password, full_name, contact_number, role)
                VALUES (?, ?, ?, ?, 'citizen')
            ");
            $stmt->bind_param("ssss", $email, $hashed, $full_name, $contact);

            if ($stmt->execute()) {
                $success = true;
            } else {
                $errors[] = "Registration failed. Please try again.";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - <?php echo PORTAL_NAME; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { /* copy your colors from config here if needed */ }
    </script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-[#fbfbfb] font-sans min-h-screen flex items-center justify-center p-4">

    <div class="form-container max-w-md w-full bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl p-8 border border-gray-100">

        <div class="text-center mb-8">
            <img src="assets/images/GSM_logo.png" alt="Logo" class="mx-auto h-16 mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Create Account</h1>
            <p class="text-gray-600 mt-2">Join GoServePH and access all services</p>
        </div>

        <?php if ($success): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <p class="font-bold">Success!</p>
                <p>Account created. You can now log in to any system using your email and password.</p>
                <a href="index.php" class="mt-4 inline-block text-primary hover:underline font-medium">Back to Home</a>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <ul class="list-disc pl-5">
                    <?php foreach ($errors as $err): ?>
                        <li><?php echo htmlspecialchars($err); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!$success): ?>
            <form method="POST" class="space-y-5">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                    <input type="text" name="full_name" value="<?php echo htmlspecialchars($formData['full_name']); ?>"
                           class="input-modern w-full" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email Address</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($formData['email']); ?>"
                           class="input-modern w-full" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Contact Number (optional)</label>
                    <input type="tel" name="contact_number" value="<?php echo htmlspecialchars($formData['contact_number']); ?>"
                           class="input-modern w-full">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Password</label>
                    <input type="password" name="password" class="input-modern w-full" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Confirm Password</label>
                    <input type="password" name="password_confirm" class="input-modern w-full" required>
                </div>

                <button type="submit" class="btn-primary w-full py-3 text-lg">
                    Register
                </button>

                <p class="text-center text-gray-600 mt-4">
                    Already have an account?  
                    <!-- We can add login link later -->
                    <span class="text-gray-400">Log in per system</span>
                </p>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>