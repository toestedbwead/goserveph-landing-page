<?php
// Caloocan City Portal Configuration
define('PORTAL_NAME', 'GoServePH Service Portal');
define('CITY_NAME', 'Caloocan City');
define('EIS_NAME', 'GoServePH');
define('EIS_SLOGAN', 'Abot-Kamay mo ang Serbisyong Publiko');
define('BASE_URL', 'http://localhost/caloocan-portal');

// CSS Classes for EIS Design System
define('CSS_SYSTEM_CARD', 'system-card glass-card card-hover glow-on-hover');
define('CSS_ICON_CONTAINER', 'system-icon-container feature-icon logo-float');
define('CSS_PRIMARY_BTN', 'btn-primary glow-on-hover');
define('CSS_SECONDARY_BTN', 'btn-secondary');
define('CSS_INPUT', 'input-modern');

// System URLs - UPDATE THESE WITH REAL URLs
$system_urls = [
    'citizen' => 'https://citizen.goserveph.com',
    'permits' => 'https://e-plms.goserveph.com',
    'social' => 'https://social.goserveph.com',
    'health' => 'https://health.goserveph.com',
    'education' => 'https://educ.goserveph.com',
    'drrm' => 'https://disaster.goserveph.com',
    'urban' => 'https://urbanplanning.goserveph.com',
    'revenue' => 'https://revenuetreasury.goserveph.com',
    'transport' => 'https://tmm.goserveph.com',
    'assets' => 'https://public-asset.goserveph.com'
];

// System Logos Configuration
$system_logos = [
    'citizen' => 'assets/icons/citizen-logo.png',
    'permits' => 'assets/icons/default-icon.jpg',
    'social' => 'assets/icons/ssm-logo.png',
    'health' => 'assets/icons/default-icon.jpg',
    'education' => 'assets/icons/education-logo.jpg',
    'drrm' => 'assets/icons/drrm-logo.png',
    'urban' => 'assets/icons/default-icon.jpg',
    'revenue' => 'assets/icons/default-icon.jpg',
    'transport' => 'assets/icons/default-icon.jpg',
    'assets' => 'assets/icons/pafm-logo.png',
];

// SSO Configuration (for Phase 2)
define('SSO_ENABLED', false);
define('SSO_ENDPOINT', 'https://auth.caloocan.gov.ph');
?>