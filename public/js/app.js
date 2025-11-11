document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');
    const navOverlay = document.getElementById('navOverlay');

    // Add event listeners
    menuToggle.addEventListener('click', toggleMenu);
    navOverlay.addEventListener('click', toggleMenu);

// Close menu when clicking on a link (for mobile)
    document.querySelectorAll('.nav-links a, .mobile-cta-button').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 968) {
                toggleMenu();
            }
        });
    });

// Close menu on window resize if it goes beyond mobile breakpoint
    window.addEventListener('resize', () => {
        if (window.innerWidth > 968) {
            // Remove active classes
            navLinks.classList.remove('active');
            menuToggle.classList.remove('active');
            navOverlay.classList.remove('active');

            // Reset body overflow
            document.body.style.overflow = '';

            // Update aria-expanded attribute
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

// Close menu with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && navLinks.classList.contains('active')) {
            toggleMenu();
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', function (event) {
        const nav = document.querySelector('nav');
        const navLinks = document.getElementById('navLinks');
        const menuToggle = document.querySelector('.menu-toggle');

        if (!nav.contains(event.target) && navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
        }
    });

// Close menu when clicking on a link
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', function () {
            document.getElementById('navLinks').classList.remove('active');
        });
    });

    let currentIndex = 0;
    let autoPlayInterval;
    let isAutoPlaying = true;
    const wrapper = document.getElementById('carouselWrapper');
    const cards = document.querySelectorAll('.key-service-card');
    const totalCards = cards.length;
    const dotsContainer = document.getElementById('carouselDots');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

// Calculate cards per view based on screen size
    function getCardsPerView() {
        const width = window.innerWidth;
        if (width >= 1024) return 2;
        return 1;
    }

// Calculate total pages
    function getTotalPages() {
        return Math.ceil(totalCards / getCardsPerView());
    }

// Create dots
    function createDots() {
        dotsContainer.innerHTML = '';
        const totalPages = getTotalPages();
        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('div');
            dot.className = 'dot';
            if (i === 0) dot.classList.add('active');
            dot.onclick = () => goToSlide(i);
            dotsContainer.appendChild(dot);
        }
    }

// Update dots
    function updateDots() {
        const dots = document.querySelectorAll('.dot');
        const currentPage = Math.floor(currentIndex / getCardsPerView());
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentPage);
        });
    }

// Move carousel
    function moveCarousel(direction) {
        const cardsPerView = getCardsPerView();
        const totalPages = getTotalPages();
        const maxIndex = (totalPages - 1) * cardsPerView;

        currentIndex += direction * cardsPerView;

        if (currentIndex < 0) {
            currentIndex = maxIndex;
        } else if (currentIndex > maxIndex) {
            currentIndex = 0;
        }

        updateCarousel();
    }

// Go to specific slide
    function goToSlide(page) {
        currentIndex = page * getCardsPerView();
        updateCarousel();
        resetAutoPlay();
    }

// Update carousel position
    function updateCarousel() {
        const cardWidth = cards[0].offsetWidth;
        const gap = 30;
        const offset = currentIndex * (cardWidth + gap);

        wrapper.style.transform = `translateX(-${offset}px)`;
        updateDots();
        updateButtons();
    }

// Update button states
    function updateButtons() {
        const cardsPerView = getCardsPerView();
        const totalPages = getTotalPages();
        const currentPage = Math.floor(currentIndex / cardsPerView);

        prevBtn.disabled = currentPage === 0;
        nextBtn.disabled = currentPage === totalPages - 1;
    }

// Auto-play functionality
    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            const cardsPerView = getCardsPerView();
            const totalPages = getTotalPages();
            const currentPage = Math.floor(currentIndex / cardsPerView);

            if (currentPage === totalPages - 1) {
                currentIndex = 0;
            } else {
                currentIndex += cardsPerView;
            }
            updateCarousel();
        }, 4000);
    }

    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    function resetAutoPlay() {
        if (isAutoPlaying) {
            stopAutoPlay();
            startAutoPlay();
        }
    }

    function toggleAutoPlay() {
        const btn = document.getElementById('autoPlayBtn');
        const text = document.getElementById('autoPlayText');

        isAutoPlaying = !isAutoPlaying;

        if (isAutoPlaying) {
            btn.classList.add('playing');
            text.textContent = '⏸ Pause Auto-play';
            startAutoPlay();
        } else {
            btn.classList.remove('playing');
            text.textContent = '▶ Start Auto-play';
            stopAutoPlay();
        }
    }

// Handle window resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            currentIndex = 0;
            createDots();
            updateCarousel();
        }, 250);
    });

// Initialize
    createDots();
    updateButtons();
    startAutoPlay();

// Pause on hover
    wrapper.addEventListener('mouseenter', stopAutoPlay);
    wrapper.addEventListener('mouseleave', () => {
        if (isAutoPlaying) startAutoPlay();
    });
});

// Toggle menu function
function toggleMenu() {
    const isActive = navLinks.classList.contains('active');

    // Toggle active classes
    navLinks.classList.toggle('active');
    menuToggle.classList.toggle('active');
    navOverlay.classList.toggle('active');

    // Prevent body scroll when menu is open
    document.body.style.overflow = isActive ? '' : 'hidden';

    // Update aria-expanded attribute for accessibility
    menuToggle.setAttribute('aria-expanded', !isActive);
}

