<?php
// Load configurations
require_once 'config.php';
require_once 'systems/systems-data.php';
require_once 'systems/system-card.php';

// Start output
include 'header.php';
?>

<!-- Systems Grid Section -->
<section id="systems" class="py-12 sm:py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center">All Government Systems</h2>
        <p class="text-gray-600 text-center mb-8">Click any system to access its dedicated portal</p>
        
        <!-- System Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
            // Render all systems dynamically
            foreach ($all_systems as $system) {
                $url = $system_urls[$system['id']] ?? '#';
                echo render_system_card($system, $url);
            }
            ?>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-12 sm:py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Simple Access Process</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Browse</h3>
                <p class="text-gray-600">Find the service you need</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Click</h3>
                <p class="text-gray-600">Go directly to the system</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Use</h3>
                <p class="text-gray-600">Access the specific service</p>
            </div>
        </div>
    </div>
</section>

<?php
// Load footer
include 'footer.php';
?>