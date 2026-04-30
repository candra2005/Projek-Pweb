document.addEventListener('DOMContentLoaded', function () {

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
                navbar.style.background = 'rgba(255, 255, 255, 0.97)';
            } else {
                navbar.style.boxShadow = '0 2px 4px rgba(0,0,0,0.05)';
                navbar.style.background = 'rgba(255, 255, 255, 0.85)';
            }
        });
    }

    // Hamburger menu toggle
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    if (hamburger && navLinks) {
        hamburger.addEventListener('click', function () {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('open');
        });

        // Close menu when a link is clicked
        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                hamburger.classList.remove('active');
                navLinks.classList.remove('open');
            });
        });
    }

    // Auto-hide flash alerts
    const alerts = document.querySelectorAll('.alert-auto-hide');
    if (alerts.length > 0) {
        setTimeout(function () {
            alerts.forEach(function (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function () { alert.style.display = 'none'; }, 500);
            });
        }, 5000);
    }

    // Scroll-reveal animation for cards
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.product-card').forEach(function (card) {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        observer.observe(card);
    });

});
