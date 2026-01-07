<?php
// Caloocan City Portal Configuration
define('PORTAL_NAME', 'GoServePH Service Portal');
define('CITY_NAME', 'GoServePH');
define('BASE_URL', 'http://localhost/caloocan-portal');

// CSS Classes for EIS Design System
define('CSS_SYSTEM_CARD', 'system-card glass-card card-hover glow-on-hover');
define('CSS_ICON_CONTAINER', 'system-icon-container feature-icon logo-float');
define('CSS_PRIMARY_BTN', 'btn-primary glow-on-hover');
define('CSS_SECONDARY_BTN', 'btn-secondary');
define('CSS_INPUT', 'input-modern');

// System URLs - UPDATE THESE WITH REAL URLs
$system_urls = [
    'citizen' => 'https://citizen-system.caloocan.gov.ph',
    'permits' => 'https://permits-system.caloocan.gov.ph',
    'social' => 'https://social-services.caloocan.gov.ph',
    'health' => 'https://health-system.caloocan.gov.ph',
    'education' => 'https://education-system.caloocan.gov.ph',
    'drrm' => 'https://drrm-system.caloocan.gov.ph',
    'urban' => 'https://urban-planning.caloocan.gov.ph',
    'revenue' => 'https://treasury-system.caloocan.gov.ph',
    'transport' => 'https://transport-system.caloocan.gov.ph',
    'assets' => 'https://public-asset.goserveph.com'
];

// Add to your config.php
$system_logos = [
    'citizen' => 'assets/icons/citizen-logo.png',
    'permits' => 'assets/icons/default-icon.jpg',
    'social' => 'assets/icons/ssm-logo.png',
    'health' => 'assets/icons/default-icon.jpg',
    'education' => 'assets/icons/default-icon.jpg',
    'drrm' => 'assets/icons/default-icon.jpg',
    'urban' => 'assets/icons/default-icon.jpg',
    'revenue' => 'assets/icons/default-icon.jpg',
    'transport' => 'assets/icons/default-icon.jpg',
    'assets' => 'assets/icons/pafm-logo.png',
];

// SSO Configuration (for Phase 2)
define('SSO_ENABLED', false);
define('SSO_ENDPOINT', 'https://auth.caloocan.gov.ph');
?>