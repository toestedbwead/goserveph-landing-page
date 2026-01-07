// Mobile menu toggle
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}

// Update date and time
function updateDateTime() {
    const now = new Date();
    const timeOptions = { hour: 'numeric', minute: 'numeric', hour12: true };
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    
    // Update all time/date elements on page
    document.querySelectorAll('.current-time').forEach(el => {
        el.textContent = now.toLocaleTimeString('en-US', timeOptions);
    });
    
    document.querySelectorAll('.current-date').forEach(el => {
        el.textContent = now.toLocaleDateString('en-US', dateOptions);
    });
}

// Initialize
updateDateTime();
setInterval(updateDateTime, 1000);