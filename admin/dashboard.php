<?php
session_start();
require_once '../includes/database.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'superadmin') {
    header("Location: login.php");
    exit;
}

// Fetch all users
$result = mysqli_query($conn, "SELECT id, email, first_name, last_name, role, created_at FROM users ORDER BY created_at DESC");
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Dashboard - GoServePH</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f3f4f6; }
    </style>
</head>
<body class="min-h-screen bg-gray-100">

    <nav class="bg-green-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Superadmin Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-sm">Logged in as <?php echo htmlspecialchars($_SESSION['email']); ?></span>
                <a href="logout.php" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Manage Users & Roles</h2>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($user['email']); ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                <?php echo $user['role'] === 'superadmin' ? 'bg-purple-100 text-purple-800' : ($user['role'] === 'admin' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'); ?>">
                                <?php echo htmlspecialchars($user['role']); ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $user['created_at']; ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <form method="POST" action="update_role.php" class="inline-flex items-center space-x-2">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <select name="new_role" class="border border-gray-300 rounded px-2 py-1 text-sm">
                                    <option value="citizen" <?php echo $user['role']=='citizen'?'selected':''; ?>>Citizen</option>
                                    <option value="admin"   <?php echo $user['role']=='admin'?'selected':''; ?>>Admin</option>
                                    <option value="superadmin" <?php echo $user['role']=='superadmin'?'selected':''; ?>>Superadmin</option>
                                </select>
                                <button type="submit" class="text-blue-600 hover:text-blue-800 font-medium">Update</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>