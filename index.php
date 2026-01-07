<?php
// Load configurations
require_once 'config.php';
require_once 'systems/systems-data.php';
require_once 'systems/system-card.php';

// Language detection - default to English
$language = isset($_GET['lang']) && $_GET['lang'] === 'fil' ? 'fil' : 'en';

// Language texts
$texts = [
    'en' => [
        'all_systems' => 'All Government Systems',
        'click_any' => 'Click any system to access its dedicated portal',
        'simple_process' => 'Simple Access Process',
        'browse' => 'Browse',
        'browse_desc' => 'Find the service you need',
        'click' => 'Click',
        'click_desc' => 'Go directly to the system',
        'use' => 'Use',
        'use_desc' => 'Access the specific service',
        'access_system' => 'Access System'
    ],
    'fil' => [
        'all_systems' => 'Lahat ng Sistema ng Pamahalaan',
        'click_any' => 'Pindutin ang anumang sistema upang ma-access ang dedicated portal nito',
        'simple_process' => 'Simpleng Proseso ng Pag-access',
        'browse' => 'Mag-browse',
        'browse_desc' => 'Hanapin ang serbisyong kailangan mo',
        'click' => 'Pindutin',
        'click_desc' => 'Direktang pumunta sa sistema',
        'use' => 'Gamitin',
        'use_desc' => 'I-access ang partikular na serbisyo',
        'access_system' => 'I-access ang Sistema'
    ]
];

$t = $texts[$language];

// Start output
include 'header.php';
?>

<!-- Systems Grid Section -->
<section id="systems" class="py-12 sm:py-16 md:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center"><?php echo $t['all_systems']; ?></h2>
        <p class="text-gray-600 text-center mb-8"><?php echo $t['click_any']; ?></p>
        
        <!-- System Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php
            // Render all systems dynamically
            foreach ($all_systems as $system) {
                $url = $system_urls[$system['id']] ?? '#';
                echo render_system_card($system, $url, $t['access_system']);
            }
            ?>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-12 sm:py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center"><?php echo $t['simple_process']; ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3"><?php echo $t['browse']; ?></h3>
                <p class="text-gray-600"><?php echo $t['browse_desc']; ?></p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3"><?php echo $t['click']; ?></h3>
                <p class="text-gray-600"><?php echo $t['click_desc']; ?></p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-white text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3"><?php echo $t['use']; ?></h3>
                <p class="text-gray-600"><?php echo $t['use_desc']; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Language Switcher -->
<div class="fixed bottom-4 right-4 z-40">
    <div class="bg-white rounded-lg shadow-lg p-3 flex space-x-2">
        <a href="?lang=en" class="px-3 py-1.5 <?php echo $language === 'en' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700'; ?> rounded-md text-sm font-medium transition-colors duration-200">
            EN
        </a>
        <a href="?lang=fil" class="px-3 py-1.5 <?php echo $language === 'fil' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700'; ?> rounded-md text-sm font-medium transition-colors duration-200">
            FIL
        </a>
    </div>
</div>

<?php
// Load footer
include 'footer.php';
?>