<?php
// register.php - main entry point

require_once 'config.php';
require_once 'includes/db.php';

// Handle form submission (include processing logic)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'includes/register-processing.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - <?php echo PORTAL_NAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-custom-bg min-h-screen flex flex-col">

    <?php include 'includes/header.php'; ?>

    <main class="flex-1 container mx-auto px-6 py-12">
        <div class="max-w-2xl mx-auto">

            <!-- Close button -->
            <div class="flex justify-end mb-4">
                <a href="index.php" class="text-gray-600 hover:text-gray-800 text-2xl">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-2xl p-8 glass-card glow-on-hover">
                <h1 class="text-3xl font-bold text-custom-secondary mb-2 text-center">Create Your Account</h1>
                <p class="text-center text-gray-600 mb-8">Join GoServePH to access government services securely</p>

                <?php include 'includes/register-form.php'; ?>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <?php
    // Include modals at the end of body
    include 'includes/modals/terms-modal.php';
    include 'includes/modals/privacy-modal.php';
    ?>

    <script>
        // Date & Time
        function updateDateTime() {
            const now = new Date();
            document.getElementById('currentDateTime').textContent = now.toLocaleString('en-PH', {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
                hour: '2-digit', minute: '2-digit', hour12: true
            }).toUpperCase();
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);

        // No middle name checkbox
        document.getElementById('noMiddleName')?.addEventListener('change', function() {
            const mid = document.querySelector('input[name="middleName"]');
            mid.disabled = this.checked;
            if (this.checked) mid.value = '';
        });

        // Password visibility toggles
        document.querySelectorAll('.toggle-password').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.target;
                const input = document.getElementById(id);
                input.type = input.type === 'password' ? 'text' : 'password';
                btn.querySelector('i').classList.toggle('fa-eye');
                btn.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });

        // Password strength checklist
        document.getElementById('regPassword')?.addEventListener('input', function() {
            const v = this.value;
            document.querySelector('[data-check="length"]').classList.toggle('met', v.length >= 10);
            document.querySelector('[data-check="upper"]').classList.toggle('met', /[A-Z]/.test(v));
            document.querySelector('[data-check="lower"]').classList.toggle('met', /[a-z]/.test(v));
            document.querySelector('[data-check="number"]').classList.toggle('met', /\d/.test(v));
            document.querySelector('[data-check="special"]').classList.toggle('met', /[^A-Za-z0-9]/.test(v));
        });

        // Modal open/close
        document.getElementById('openTerms')?.addEventListener('click', () => {
            document.getElementById('termsModal').classList.remove('hidden');
            document.getElementById('termsModal').classList.add('flex');
        });
        document.getElementById('openPrivacy')?.addEventListener('click', () => {
            document.getElementById('privacyModal').classList.remove('hidden');
            document.getElementById('privacyModal').classList.add('flex');
        });

        document.querySelectorAll('#closeTerms, #closeTermsBottom, #closePrivacy, #closePrivacyBottom').forEach(el => {
            el.addEventListener('click', () => {
                document.getElementById('termsModal')?.classList.add('hidden');
                document.getElementById('privacyModal')?.classList.add('hidden');
                document.getElementById('termsModal')?.classList.remove('flex');
                document.getElementById('privacyModal')?.classList.remove('flex');
            });
        });
    </script>
</body>
</html>