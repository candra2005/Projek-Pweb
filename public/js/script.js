document.addEventListener('DOMContentLoaded', function() {
    // Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            } else {
                navbar.style.boxShadow = '0 2px 4px rgba(0,0,0,0.05)';
                navbar.style.background = 'rgba(255, 255, 255, 0.85)';
            }
        });
    }

    // Auto-hide alert messages after 5 seconds
    const alerts = document.querySelectorAll('.alert, [style*="background: #d4edda"]');
    if (alerts.length > 0) {
        setTimeout(function() {
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 500);
            });
        }, 5000);
    }
});
