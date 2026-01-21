<?php if (isset($success) && $success): ?>
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-6 mb-8 rounded-r-lg">
        <p class="font-bold text-lg">Registration Successful!</p>
        <p class="mt-2">Your account has been created. You can now log in to any system.</p>
        <a href="index.php" class="mt-4 inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
            Return to Home
        </a>
    </div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-6 mb-8 rounded-r-lg">
        <p class="font-semibold">Please correct the following:</p>
        <ul class="list-disc pl-5 mt-2 space-y-1">
            <?php foreach ($errors as $err): ?>
                <li><?php echo htmlspecialchars($err); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (!isset($success) || !$success): ?>
    <form method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">First Name <span class="text-red-500">*</span></label>
                <input type="text" name="firstName" value="<?php echo htmlspecialchars($formData['firstName'] ?? ''); ?>" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-secondary focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="lastName" value="<?php echo htmlspecialchars($formData['lastName'] ?? ''); ?>" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-secondary focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Middle Name</label>
                <input type="text" name="middleName" value="<?php echo htmlspecialchars($formData['middleName'] ?? ''); ?>" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
                <label class="inline-flex items-center mt-2 text-sm text-gray-600">
                    <input type="checkbox" id="noMiddleName" class="mr-2"> No middle name
                </label>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Suffix (optional)</label>
                <input type="text" name="suffix" value="<?php echo htmlspecialchars($formData['suffix'] ?? ''); ?>" placeholder="Jr., Sr., III" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700">Email Address <span class="text-red-500">*</span></label>
            <input type="email" name="regEmail" value="<?php echo htmlspecialchars($formData['regEmail'] ?? ''); ?>" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-custom-secondary focus:border-transparent">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="password" id="regPassword" name="regPassword" minlength="10" required class="w-full px-4 py-3 border border-gray-300 rounded-lg pr-12 focus:ring-2 focus:ring-custom-secondary focus:border-transparent">
                    <button type="button" class="absolute inset-y-0 right-0 px-4 text-gray-500 toggle-password" data-target="regPassword">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
                <ul id="pwdChecklist" class="text-xs text-gray-600 mt-2 space-y-1">
                    <li class="req-item" data-check="length"><span class="req-dot"></span> At least 10 characters</li>
                    <li class="req-item" data-check="upper"><span class="req-dot"></span> Has uppercase letter</li>
                    <li class="req-item" data-check="lower"><span class="req-dot"></span> Has lowercase letter</li>
                    <li class="req-item" data-check="number"><span class="req-dot"></span> Has a number</li>
                    <li class="req-item" data-check="special"><span class="req-dot"></span> Has a special character</li>
                </ul>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Confirm Password <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="password" id="confirmPassword" name="confirmPassword" minlength="10" required class="w-full px-4 py-3 border border-gray-300 rounded-lg pr-12 focus:ring-2 focus:ring-custom-secondary focus:border-transparent">
                    <button type="button" class="absolute inset-y-0 right-0 px-4 text-gray-500 toggle-password" data-target="confirmPassword">
                        <i class="far fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Terms & Privacy Checkboxes -->
        <div class="space-y-4 pt-4 border-t border-gray-200">
            <label class="flex items-start text-sm text-gray-700">
                <input type="checkbox" name="agreeTerms" id="agreeTerms" required class="mt-1 mr-3">
                <span>I have read, understood, and agree to the 
                    <button type="button" class="text-custom-secondary hover:underline font-medium ml-1" id="openTerms">Terms of Use</button>
                </span>
            </label>
            <label class="flex items-start text-sm text-gray-700">
                <input type="checkbox" name="agreePrivacy" id="agreePrivacy" required class="mt-1 mr-3">
                <span>I have read, understood, and agree to the 
                    <button type="button" class="text-custom-secondary hover:underline font-medium ml-1" id="openPrivacy">Data Privacy Policy</button>
                </span>
            </label>
        </div>

        <div class="flex justify-end space-x-4 pt-6">
            <a href="index.php" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">Cancel</a>
            <button type="submit" class="px-8 py-3 bg-custom-secondary text-white rounded-lg font-semibold hover:opacity-90 transition">Create Account</button>
        </div>
    </form>
<?php endif; ?>