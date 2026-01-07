<?php
function render_system_card($system, $url) {
    global $system_logos; // Access the logos array
    
    $logo_path = $system_logos[$system['id']] ?? 'assets/images/logos/default-system.png';
    $color_class = "text-secondary";
    $system_class = "system-{$system['id']}";
    
    return "
    <div class='{$system_class} " . CSS_SYSTEM_CARD . " flex flex-col h-full'>
        <a href='{$url}' target='_blank' class='block flex flex-col h-full'>
            <div class='p-6 flex flex-col items-center h-full'>
                <!-- System Logo -->
                <div class='w-24 h-24 mb-4 flex items-center justify-center'>
                    <img src='{$logo_path}' 
                         alt='{$system['name']} Logo'
                         class='w-full h-full object-contain rounded-lg'
                         onerror=\"this.src='assets/images/logos/default-system.png'\" />
                </div>
                
                <!-- Title -->
                <h3 class='text-xl font-bold text-gray-800 text-center mb-2 min-h-[3.5rem] flex items-center justify-center'>
                    {$system['name']}
                </h3>
                
                <!-- Description -->
                <p class='text-gray-600 text-center text-sm mb-4 flex-grow'>
                    {$system['description']}
                </p>
                
                <!-- Access System -->
                <div class='mt-4 pt-4 border-t border-gray-200 w-full'>
                    <span class='{$color_class} font-medium hover:text-primary transition-colors inline-flex items-center justify-center w-full'>
                        Access System
                        <svg class='w-4 h-4 ml-2' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M14 5l7 7m0 0l-7 7m7-7H3'></path>
                        </svg>
                    </span>
                </div>
            </div>
        </a>
    </div>
    ";
}

function get_system_icon($icon_name) {
    // Simple icon mapping - replace with actual SVG files later
    $icons = [
        'users' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'file-text' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
        'heart' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>',
        'building' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>'
        // Add more icons as needed
    ];
    
    return $icons[$icon_name] ?? $icons['users'];
}
?>