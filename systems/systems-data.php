<?php
$all_systems = [
    [
        'id' => 'citizen',
        'name' => 'Citizen Information & Engagement',
        'description' => 'Registry, feedback, certificates, surveys & alerts',
        'icon' => 'users', // Simple icon identifier
        'color' => 'primary',
        'modules' => ['Citizen Registry', 'Feedback Portal', 'Certificate Issuance', 'Survey Tools', 'Notification System']
    ],
    [
        'id' => 'permits',
        'name' => 'Permits & Licensing',
        'description' => 'Business, building, transport permits & e-tracker',
        'icon' => 'file-text',
        'color' => 'secondary',
        'modules' => ['Business Permits', 'Building Permits', 'Transport Permits', 'Barangay Integration', 'E-Permit Tracker']
    ],
    [
        'id' => 'social',
        'name' => 'Social Services',
        'description' => 'AICS, PWD, senior, solo parent & livelihood programs',
        'icon' => 'heart',
        'color' => 'accent',
        'modules' => ['AICS Program', 'PWD Services', 'Senior Citizen Services', 'Solo Parent Support', 'Livelihood Programs']
    ],
    [
        'id' => 'health',
        'name' => 'Health & Sanitation',
        'description' => 'Health services, permits, immunization & surveillance',
        'icon' => 'medical',
        'color' => 'green',
        'modules' => ['Health Center Services', 'Sanitation Permits', 'Immunization Tracker', 'Wastewater Services', 'Health Surveillance']
    ],
    [
        'id' => 'education',
        'name' => 'Education & Scholarship',
        'description' => 'Scholarships, school aid, student registry & reports',
        'icon' => 'graduation',
        'color' => 'blue',
        'modules' => ['Scholarship Portal', 'School Aid Distribution', 'Student Registry', 'School Database', 'Education Reports']
    ],
    [
        'id' => 'drrm',
        'name' => 'Disaster & Emergency',
        'description' => 'Hazard maps, relief goods, incident reporting & warnings',
        'icon' => 'alert-triangle',
        'color' => 'red',
        'modules' => ['Hazard Maps', 'Relief Distribution', 'Incident Reporting', 'Early Warning System', 'DRRM Coordination']
    ],
    [
        'id' => 'urban',
        'name' => 'Urban Planning & Housing',
        'description' => 'Zoning clearance, housing registry, building review',
        'icon' => 'building',
        'color' => 'purple',
        'modules' => ['Zoning Clearance', 'Housing Registry', 'Building Review', 'Occupancy Monitoring', 'Project Coordination']
    ],
    [
        'id' => 'revenue',
        'name' => 'Revenue & Treasury',
        'description' => 'Tax collection, business fees, digital payments & reports',
        'icon' => 'dollar-sign',
        'color' => 'yellow',
        'modules' => ['Property Tax', 'Business Fees', 'Market Rentals', 'Digital Payments', 'Treasury Reports']
    ],
    [
        'id' => 'transport',
        'name' => 'Transport & Mobility',
        'description' => 'PUV database, franchise mgmt, traffic tickets & parking',
        'icon' => 'truck',
        'color' => 'teal',
        'modules' => ['PUV Database', 'Franchise Management', 'Traffic Ticketing', 'Vehicle Inspection', 'Parking Management']
    ],
    [
        'id' => 'assets',
        'name' => 'Public Assets & Facilities',
        'description' => 'Cemetery, parks, facility reservations, water supply',
        'icon' => 'home',
        'color' => 'indigo',
        'modules' => ['Cemetery Management', 'Parks Scheduling', 'Facility Reservations', 'Water Supply Requests', 'Asset Tracker']
    ]
];
?>