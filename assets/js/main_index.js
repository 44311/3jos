
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        
        // Search toggle
        const searchToggle = document.querySelector('.search-toggle');
        const searchContainer = document.querySelector('.search-container');
        
        if (searchToggle && searchContainer) {
        searchToggle.addEventListener('click', function() {
            searchContainer.classList.toggle('active');
            
            // Focus on search input when opened
            if (searchContainer.classList.contains('active')) {
            setTimeout(() => {
                document.querySelector('.search-input').focus();
            }, 300);
            }
        });
        
        // Close search when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.search-container') && !event.target.closest('.search-toggle')) {
            searchContainer.classList.remove('active');
            }
        });
        }
        
        // Theme toggle (light/dark mode)
        const themeToggle = document.querySelector('.theme-toggle');
        const htmlElement = document.documentElement;
        
        if (themeToggle) {
        // Check for saved theme preference or prefer-color-scheme
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            htmlElement.classList.add('dark-mode');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
        
        themeToggle.addEventListener('click', function() {
            htmlElement.classList.toggle('dark-mode');
            
            if (htmlElement.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            } else {
            localStorage.setItem('theme', 'light');
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
            }
        });
        }
        
        // Back to top button
        const backToTopButton = document.querySelector('.back-to-top');
        
        if (backToTopButton) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
            backToTopButton.classList.add('active');
            } else {
            backToTopButton.classList.remove('active');
            }
        });
        
        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
            top: 0,
            behavior: 'smooth'
            });
        });
        }
        
        // Sticky header
        const header = document.querySelector('.header');
        let lastScrollTop = 0;
        
        if (header) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            
            if (scrollTop > 100) {
            header.classList.add('sticky');
            } else {
            header.classList.remove('sticky');
            }
            
            // Hide header when scrolling down, show when scrolling up
            if (scrollTop > lastScrollTop && scrollTop > 200) {
            header.style.transform = 'translateY(-100%)';
            } else {
            header.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });
        }
        
        // Newsletter form submission
        const newsletterForm = document.querySelector('.newsletter-form');
        
        if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            
            // Basic email validation
            if (isValidEmail(email)) {
            // Here you would typically send the data to your server
            alert('Bültenimize başarıyla abone oldunuz!');
            emailInput.value = '';
            } else {
            alert('Lütfen geçerli bir e-posta adresi giriniz.');
            }
        });
        
        // Email validation helper function
        function isValidEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        }
        
        // Initialize animations on scroll
        const animateOnScroll = function() {
        const elements = document.querySelectorAll('.post-card, .category-card, .author-spotlight');
        
        elements.forEach(function(element) {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.2;
            
            if (elementPosition < screenPosition) {
            element.classList.add('animate-in');
            }
        });
        };
        
        // Add animation classes to CSS
        const style = document.createElement('style');
        style.textContent = `
        .post-card, .category-card, .author-spotlight {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .animate-in {
            opacity: 1;
            transform: translateY(0);
        }
        `;
        document.head.appendChild(style);
        
        // Run animations on scroll and on load
        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            
            // Close mobile menu if open
            if (mobileMenu && mobileMenu.classList.contains('active')) {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
            }
        });
        });
    });            