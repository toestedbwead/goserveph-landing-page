<?php
session_start();
require_once '../includes/database.php';  

// If already logged in as superadmin, go to dashboard
if (isset($_SESSION['logged_in']) && $_SESSION['role'] === 'superadmin') {
    header("Location: dashboard.php");
    exit;
}

$error = $_SESSION['admin_error'] ?? '';
unset($_SESSION['admin_error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Login - GoServePH</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f3f4f6; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white p-10 rounded-xl shadow-2xl w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-green-600">Superadmin Login</h1>
            <p class="text-gray-600 mt-2">Access user management</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login_process.php" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" name="email" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                       placeholder="admin@example.com">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" name="password" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                       placeholder="••••••••">
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-200">
                Login
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">
            <a href="../index.php" class="text-green-600 hover:underline">Back to Main Portal</a>
        </p>
    </div>

</body>
</html>