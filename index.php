<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caloocan City Government Service Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="website icon" type="png" href="image/govserve.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4CAF50',
                        secondary: '#4A90E2',
                        accent: '#FDA811',
                        success: '#4CAF50',
                        dark: '#2d3748'
                    },
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#fbfbfb] font-sans">
    <!-- Navigation Bar -->
    <nav class="bg-primary shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo and City Name -->
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <img src="image/city.png" alt="Caloocan City Seal" class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12 object-contain">
                    <div>
                        <h1 class="text-sm sm:text-lg md:text-xl font-bold text-white">Caloocan City</h1>
                        <p class="text-xs sm:text-sm text-white opacity-90">Government Service Management Portal</p>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-white p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Right Side: Navigation Links, Auth Buttons, and Time/Date -->
                <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-4 lg:space-x-6">
                        <a href="#" class="text-white hover:text-gray-200 font-medium transition-colors duration-200">Home</a>
                        <a href="#systems" class="text-white hover:text-gray-200 font-medium transition-colors duration-200">All Systems</a>
                    </div>

                    <!-- Authentication Buttons -->
                    <div class="flex items-center space-x-2 lg:space-x-4">
                        <!-- Always show Login and Register buttons -->
                        <a href="login.php" class="bg-white hover:bg-gray-100 text-primary px-3 lg:px-6 py-2 rounded-lg font-medium transition-colors duration-200 inline-block text-sm lg:text-base">
                            Login
                        </a>
                        <a href="register.php" class="border-2 border-white text-white hover:bg-white hover:text-primary px-3 lg:px-6 py-2 rounded-lg font-medium transition-colors duration-200 inline-block text-sm lg:text-base">
                            Register
                        </a>
                    </div>

                    <!-- Live Time and Date -->
                    <div class="hidden lg:block text-right">
                        <div id="current-time" class="text-lg font-semibold text-white"></div>
                        <div id="current-date" class="text-sm text-white opacity-90"></div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="#" class="text-white hover:text-gray-200 font-medium transition-colors duration-200">Home</a>
                    <a href="#systems" class="text-white hover:text-gray-200 font-medium transition-colors duration-200">All Systems</a>
                    <div class="flex flex-col space-y-2">
                        <a href="login.php" class="bg-white hover:bg-gray-100 text-primary px-4 py-2 rounded-lg font-medium transition-colors duration-200 text-center">
                            Login
                        </a>
                        <a href="register.php" class="border-2 border-white text-white hover:bg-white hover:text-primary px-4 py-2 rounded-lg font-medium transition-colors duration-200 text-center">
                            Register
                        </a>
                    </div>
                    <div class="text-center text-white">
                        <div id="mobile-time" class="text-lg font-semibold"></div>
                        <div id="mobile-date" class="text-sm opacity-90"></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section relative bg-cover bg-center bg-no-repeat min-h-[300px] sm:min-h-[400px] md:min-h-[500px] lg:min-h-[600px]" style="background-image: url('banner.jpg'); background-color: #4CAF50;">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <div class="absolute inset-0 flex items-center justify-center text-center px-4">
            <div class="text-white max-w-3xl">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4">Government Service Portal</h1>
                <p class="text-lg sm:text-xl md:text-2xl opacity-90 mb-6">Access all 10 government service management systems in one place</p>
                <a href="#systems" class="inline-block bg-accent hover:bg-orange-500 text-white font-bold py-3 px-8 rounded-lg text-lg transition-colors duration-200">
                    Explore All Systems
                </a>
            </div>
        </div>
    </div>

    <!-- Systems Grid Section -->
    <section id="systems" class="py-12 sm:py-16 md:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center">Government Service Management Systems</h2>
            <p class="text-gray-600 text-center mb-8 sm:mb-12">Click on any system below to access its dedicated portal</p>
            
            <!-- System Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- System Card Template - REPLACE # WITH ACTUAL URLS -->
                <!-- 1. Citizen Information & Engagement -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://citizen-system.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-primary bg-opacity-10 flex items-center justify-center">
                                <!-- Replace with actual icon from Noun Project or other source -->
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Citizen Information & Engagement</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Registry, feedback, certificates, surveys & alerts</p>
                            <span class="mt-auto text-primary font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 2. Permits & Licensing Management -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://permits-system.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-secondary bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Permits & Licensing</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Business, building, transport permits & e-tracker</p>
                            <span class="mt-auto text-secondary font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 3. Social Services Management -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://social-services.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-accent bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Social Services</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">AICS, PWD, senior, solo parent & livelihood programs</p>
                            <span class="mt-auto text-accent font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 4. Health & Sanitation Management -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://health-system.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-green-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Health & Sanitation</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Health services, permits, immunization & surveillance</p>
                            <span class="mt-auto text-green-500 font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 5. Education & Scholarship Management -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://education-system.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-blue-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org2000/svg">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Education & Scholarship</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Scholarships, school aid, student registry & reports</p>
                            <span class="mt-auto text-blue-500 font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 6. Disaster Risk Reduction & Emergency Response -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://drrm-system.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-red-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.928-.833-2.698 0L4.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Disaster & Emergency</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Hazard maps, relief goods, incident reporting & warnings</p>
                            <span class="mt-auto text-red-500 font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 7. Urban Planning, Zoning & Housing -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://urban-planning.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-purple-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Urban Planning & Housing</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Zoning clearance, housing registry, building review</p>
                            <span class="mt-auto text-purple-500 font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 8. Revenue Collection & Treasury Services -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://treasury-system.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-yellow-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Revenue & Treasury</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Tax collection, business fees, digital payments & reports</p>
                            <span class="mt-auto text-yellow-500 font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 9. Transport & Mobility Management -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://transport-system.caloocan.gov.ph" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-teal-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Transport & Mobility</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">PUV database, franchise mgmt, traffic tickets & parking</p>
                            <span class="mt-auto text-teal-500 font-medium">Access System →</span>
                        </div>
                    </a>
                </div>

                <!-- 10. Public Assets & Facilities Management -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out transform border border-gray-200">
                    <a href="https://public-asset.goserveph.com" target="_blank" class="block">
                        <div class="p-6 flex flex-col items-center h-full">
                            <div class="w-20 h-20 mb-4 rounded-full bg-indigo-500 bg-opacity-10 flex items-center justify-center">
                                <svg class="w-10 h-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Public Assets & Facilities</h3>
                            <p class="text-gray-600 text-center text-sm mb-4">Cemetery, parks, facility reservations, water supply</p>
                            <span class="mt-auto text-indigo-500 font-medium">Access System →</span>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- System URLs Note -->
            <div class="mt-12 p-6 bg-primary bg-opacity-5 rounded-xl border border-primary border-opacity-20">
                <p class="text-center text-gray-700">
                    <strong>Note:</strong> Each system card links to its dedicated domain. Replace the placeholder URLs (e.g., <code>https://system-name.caloocan.gov.ph</code>) with your actual system URLs when they are ready.
                </p>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-12 sm:py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">How to Use the Portal</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Browse Systems</h3>
                    <p class="text-gray-600">Explore all 10 government service management systems from one central portal.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Click to Access</h3>
                    <p class="text-gray-600">Click on any system card to be redirected to its dedicated application.</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-white text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Future Single Login</h3>
                    <p class="text-gray-600">Coming soon: One login for all systems (SSO integration in Phase 2).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-lg font-bold text-white mb-4">Caloocan City Government Service Portal</h3>
                <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-8 mb-6">
                    <div class="flex items-center"><span class="text-gray-400 mr-2">📍</span>Caloocan City Hall, 123 Main St.</div>
                    <div class="flex items-center"><span class="text-gray-400 mr-2">📞</span>Tel: (02) 123-4567</div>
                    <div class="flex items-center justify-center"><span class="text-gray-400 mr-3">✉️</span>Email: info@caloocancity.gov.ph</div>
                </div>
                <p class="text-gray-500 text-sm mb-6 max-w-2xl mx-auto">
                    This portal provides centralized access to all 10 Government Service Management Systems of Caloocan City. Each system operates independently with its own login (Phase 1). Future updates will include single sign-on (SSO) functionality.
                </p>
            </div>

            <!-- Language Toggle -->
            <div class="flex justify-center items-center space-x-3 mb-6">
                <span class="text-white text-xs font-medium">Language:</span>
                <button id="lang-en" class="px-3 py-1.5 bg-primary hover:bg-green-600 text-white rounded-md text-sm font-medium transition-colors duration-200 active">English</button>
                <button id="lang-fil" class="px-3 py-1.5 bg-gray-600 hover:bg-gray-700 text-white rounded-md text-sm font-medium transition-colors duration-200">Filipino</button>
            </div>
            
            <div class="text-center text-gray-500 text-sm border-t border-gray-800 pt-6">
                &copy; 2025 Caloocan City Government | Government Service Management Portal. All rights reserved.
                <p class="mt-2 text-xs">Version 1.0 - Phase 1: Central Landing Page</p>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for mobile menu
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Update current time and date
        function updateDateTime() {
            const now = new Date();
            const timeElement = document.getElementById('current-time');
            const dateElement = document.getElementById('current-date');
            const mobileTimeElement = document.getElementById('mobile-time');
            const mobileDateElement = document.getElementById('mobile-date');

            const options = {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            };
            
            if(timeElement) timeElement.textContent = now.toLocaleTimeString('en-US', options);
            if(mobileTimeElement) mobileTimeElement.textContent = now.toLocaleTimeString('en-US', options);

            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            
            if(dateElement) dateElement.textContent = now.toLocaleDateString('en-US', dateOptions);
            if(mobileDateElement) mobileDateElement.textContent = now.toLocaleDateString('en-US', dateOptions);
        }

        updateDateTime(); // Initial call
        setInterval(updateDateTime, 1000); // Update every second

        // Close mobile menu when clicking outside (optional enhancement)
        document.addEventListener('click', function(event) {
            if (!mobileMenuBtn.contains(event.target) && !mobileMenu.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Language toggle functionality
        document.getElementById('lang-en').addEventListener('click', function() {
            this.classList.add('bg-primary');
            this.classList.remove('bg-gray-600');
            document.getElementById('lang-fil').classList.remove('bg-primary');
            document.getElementById('lang-fil').classList.add('bg-gray-600');
            // Add language change logic here
        });

        document.getElementById('lang-fil').addEventListener('click', function() {
            this.classList.add('bg-primary');
            this.classList.remove('bg-gray-600');
            document.getElementById('lang-en').classList.remove('bg-primary');
            document.getElementById('lang-en').classList.add('bg-gray-600');
            // Add language change logic here
        });
    </script>
</body>
</html>