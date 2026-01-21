<?php
require_once 'config.php';
require_once 'includes/database.php';  
$errors   = [];
$success  = false;
$formData = [
    'first_name'    => '',
    'middle_name'   => '',
    'last_name'     => '',
    'email'         => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name   = trim($_POST['first_name'] ?? '');
    $middle_name  = trim($_POST['middle_name'] ?? '');
    $last_name    = trim($_POST['last_name'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $pass         = $_POST['password'] ?? '';
    $pass_confirm = $_POST['password_confirm'] ?? '';

    $formData = [
        'first_name'    => $first_name,
        'middle_name'   => $middle_name,
        'last_name'     => $last_name,
        'email'         => $email
    ];

    // Validation
    if (empty($first_name))      $errors[] = "First name is required.";
    if (empty($last_name))       $errors[] = "Last name is required.";
    if (empty($email))           $errors[] = "Email is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (empty($pass))            $errors[] = "Password is required.";
    if ($pass !== $pass_confirm) $errors[] = "Passwords do not match.";
    if (strlen($pass) < 8)       $errors[] = "Password must be at least 8 characters long.";

    // Strong password check
    if (!preg_match('/[A-Z]/', $pass))     $errors[] = "Password must contain at least one uppercase letter.";
    if (!preg_match('/[a-z]/', $pass))     $errors[] = "Password must contain at least one lowercase letter.";
    if (!preg_match('/[0-9]/', $pass))     $errors[] = "Password must contain at least one number.";
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $pass)) {
        $errors[] = "Password must contain at least one special character (!@#$%^&* etc.).";
    }

    if (empty($errors)) {
        // Check email uniqueness
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
                INSERT INTO users (email, password, first_name, middle_name, last_name, role)
                VALUES (?, ?, ?, ?, ?, 'citizen')
            ");
            $stmt->bind_param("sssss", $email, $hashed, $first_name, $middle_name, $last_name);

            if ($stmt->execute()) {
                $success = true;
            } else {
                $errors[] = "Something went wrong. Please try again later.";
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4CAF50',
                        secondary: '#4A90E2',
                        accent: '#FDA811'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-[#fbfbfb] font-sans min-h-screen flex items-center justify-center p-4 md:p-8">

    <div class="form-container relative max-w-lg w-full bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl p-8 md:p-10 border border-gray-100">

        <!-- Close button -->
        <a href="index.php" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 transition-colors">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </a>

        <div class="text-center mb-8">
            <img src="assets/images/GSM_logo.png" alt="GoServePH Logo" class="mx-auto h-16 mb-4">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Create Your Account</h1>
            <p class="text-gray-600 mt-2">Join GoServePH to access government services easily</p>
        </div>

        <?php if ($success): ?>
            <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-5 mb-6 rounded-r-lg">
                <p class="font-semibold text-lg">Account Created Successfully!</p>
                <p class="mt-2">You can now use your email and password to log in to any system.</p>
                <a href="index.php" class="mt-4 inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                    Return to Home
                </a>
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-800 p-5 mb-6 rounded-r-lg">
                <p class="font-semibold">Please fix the following:</p>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    <?php foreach ($errors as $err): ?>
                        <li><?php echo htmlspecialchars($err); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!$success): ?>
            <form method="POST" class="space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">First Name <span class="text-red-500">*</span></label>
                        <input type="text" name="first_name" value="<?php echo htmlspecialchars($formData['first_name']); ?>"
                               class="input-modern w-full" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Middle Name</label>
                        <input type="text" name="middle_name" value="<?php echo htmlspecialchars($formData['middle_name']); ?>"
                               class="input-modern w-full">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-1">Last Name <span class="text-red-500">*</span></label>
                        <input type="text" name="last_name" value="<?php echo htmlspecialchars($formData['last_name']); ?>"
                               class="input-modern w-full" required>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($formData['email']); ?>"
                           class="input-modern w-full" required placeholder="example@domain.com">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" class="input-modern w-full" required>
                    <p class="text-sm text-gray-500 mt-1">Must be 8+ characters with uppercase, lowercase, number, and special character.</p>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">Confirm Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirm" class="input-modern w-full" required>
                </div>

                <button type="submit" class="btn-primary w-full py-3 text-lg font-semibold mt-2">
                    Create Account
                </button>

                <p class="text-center text-gray-600 mt-6">
                    Already have an account?  
                    <span class="text-gray-500">Log in directly in the system you need</span>
                </p>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>