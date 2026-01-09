<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo PORTAL_NAME; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="website icon" type="png" href="assets/images/govserve.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4CAF50',
                        secondary: '#4A90E2',
                        accent: '#FDA811',
                        green: '#4CAF50',
                        blue: '#4A90E2',
                        red: '#F44336',
                        purple: '#9C27B0',
                        yellow: '#FFC107',
                        teal: '#009688',
                        indigo: '#3F51B5'
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-[#fbfbfb] font-sans">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <img src="assets/images/GSM_logo.png" alt="GoServePh Logo" class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain">
                    <div>
                        <h1 class="text-sm sm:text-lg md:text-xl font-bold text-primary"><?php echo EIS_NAME; ?></h1>
                        <p class="text-xs sm:text-sm text-secondary opacity-90"><?php echo EIS_SLOGAN; ?></p>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-700 p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                    <a href="index.php" class="text-gray-700 hover:text-secondary font-medium">Home</a>
                    <a href="#systems" class="text-gray-700 hover:text-secondary font-medium">Systems</a>
                    
                    <!-- login / registration button is supposed to be here -->
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section relative bg-cover bg-center bg-no-repeat min-h-[500px] pt-16" style="background-image: url('assets/images/gsmbg.png');">
        <div class="absolute inset-0 flex items-center justify-center text-center px-4">
            <div class="text-white max-w-3xl">
                    <!-- nothing here yet ! -->
            </div>
        </div>
    </div>