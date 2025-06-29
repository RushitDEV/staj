document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Gothic typing effect for hero title
    function gothicTypingEffect() {
        const heroTitle = document.querySelector('.gothic-hero-title');
        if (heroTitle) {
            const text = heroTitle.innerHTML;
            heroTitle.innerHTML = '';
            let i = 0;

            function typeWriter() {
                if (i < text.length) {
                    heroTitle.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(typeWriter, 100);
                }
            }

            // Start typing effect after a delay
            setTimeout(typeWriter, 1000);
        }
    }

    // Parallax effect for hero section
    function gothicParallaxEffect() {
        const hero = document.querySelector('.gothic-hero');
        if (hero) {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                hero.style.transform = `translateY(${rate}px)`;
            });
        }
    }

    // Gothic hover effects for product cards
    function initGothicProductEffects() {
        const productCards = document.querySelectorAll('.gothic-product-card');

        productCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('pulse');

                // Add gothic glow effect
                this.style.boxShadow = '0 0 30px rgba(139, 0, 0, 0.5)';
            });

            card.addEventListener('mouseleave', function() {
                this.classList.remove('pulse');
                this.style.boxShadow = '';
            });
        });
    }

    // Gothic form validation with dark theme
    function initGothicFormValidation() {
        const contactForm = document.querySelector('#contact form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const message = document.getElementById('message').value.trim();

                // Clear previous error styles
                document.querySelectorAll('.gothic-form-control').forEach(input => {
                    input.classList.remove('gothic-error');
                });

                let hasError = false;

                if (!name) {
                    document.getElementById('name').classList.add('gothic-error');
                    hasError = true;
                }

                if (!email || !isValidEmail(email)) {
                    document.getElementById('email').classList.add('gothic-error');
                    hasError = true;
                }

                if (!message) {
                    document.getElementById('message').classList.add('gothic-error');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();
                    showGothicAlert('Lütfen tüm alanları doğru şekilde doldurun.', 'error');
                    return false;
                }
            });
        }
    }

    // Gothic alert system
    function showGothicAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert gothic-alert-${type === 'error' ? 'danger' : 'success'} fade-in`;
        alertDiv.innerHTML = `
            <i class="fas fa-${type === 'error' ? 'exclamation-triangle' : 'check-circle'} me-2"></i>
            ${message}
        `;

        const container = document.querySelector('.gothic-contact .container');
        container.insertBefore(alertDiv, container.firstChild);

        // Remove alert after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    // Email validation
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Gothic scroll animations
    function initGothicScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.gothic-product-card, .gothic-review-card, .gothic-stat-card').forEach(el => {
            observer.observe(el);
        });
    }

    // Gothic cursor effect
    function initGothicCursor() {
        const cursor = document.createElement('div');
        cursor.className = 'gothic-cursor';
        cursor.innerHTML = '🦇';
        document.body.appendChild(cursor);

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });

        // Hide cursor on mobile
        if (window.innerWidth <= 768) {
            cursor.style.display = 'none';
        }
    }

    // Gothic loading screen
    function initGothicLoader() {
        const loader = document.createElement('div');
        loader.className = 'gothic-loader';
        loader.innerHTML = `
            <div class="gothic-loader-content">
                <i class="fas fa-skull gothic-loader-icon"></i>
                <p>Karanlık yükleniyor...</p>
            </div>
        `;
        document.body.appendChild(loader);

        window.addEventListener('load', () => {
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.remove();
                }, 500);
            }, 1000);
        });
    }

    // Gothic stats counter animation
    function initGothicStatsCounter() {
        const stats = document.querySelectorAll('.gothic-stat-number');

        const animateCounter = (element) => {
            const target = parseInt(element.textContent);
            const increment = target / 50;
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 50);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        });

        stats.forEach(stat => observer.observe(stat));
    }

    // Initialize all gothic effects
    gothicTypingEffect();
    gothicParallaxEffect();
    initGothicProductEffects();
    initGothicFormValidation();
    initGothicScrollAnimations();
    initGothicCursor();
    initGothicLoader();
    initGothicStatsCounter();

    // Add gothic error class to CSS
    const style = document.createElement('style');
    style.textContent = `
        .gothic-error {
            border-color: #ff4444 !important;
            box-shadow: 0 0 10px rgba(255, 68, 68, 0.3) !important;
        }

        .gothic-cursor {
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            font-size: 20px;
            transform: translate(-50%, -50%);
            transition: all 0.1s ease;
        }

        .gothic-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #000000, #4b0082, #8b0000);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            transition: opacity 0.5s ease;
        }

        .gothic-loader-content {
            text-align: center;
            color: white;
        }

        .gothic-loader-icon {
            font-size: 4rem;
            color: #8b0000;
            animation: pulse 2s infinite;
            margin-bottom: 20px;
        }
    `;
    document.head.appendChild(style);
});
