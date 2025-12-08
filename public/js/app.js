document.addEventListener('DOMContentLoaded', function () {
    const serviceCards = document.querySelectorAll('.key-service-card');

    serviceCards.forEach(card => {
        card.addEventListener('click', function (e) {
            e.stopPropagation();

            const isAlreadyActive = this.classList.contains('active');

            serviceCards.forEach(card => card.classList.remove('active'));

            if (!isAlreadyActive) {
                this.classList.add('active');
            }
        });
    });

    document.addEventListener('click', function (e) {
        serviceCards.forEach(card => card.classList.remove('active'));
    });

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
    let isAutoPlaying = false;
    const wrapper = document.getElementById('carouselWrapper');
    const cards = document.querySelectorAll('.key-service-card');
    const totalCards = cards.length;
    const dotsContainer = document.getElementById('carouselDots');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

// Calculate cards per view based on screen size - 2 on desktop, 1 on mobile
    function getCardsPerView() {
        // const width = window.innerWidth;
        // if (width >= 768) return 2; // 2 cards on tablet and desktop
        return 1; // 1 card on mobile
    }

// Calculate total pages based on cards per view
    function getTotalPages() {
        return Math.ceil(totalCards / getCardsPerView());
    }

// Create dots based on total pages
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
        const maxIndex = Math.max(0, (totalPages - 1) * cardsPerView);

        currentIndex += direction * cardsPerView;

        if (currentIndex < 0) {
            currentIndex = maxIndex;
        } else if (currentIndex > maxIndex) {
            currentIndex = 0;
        }

        updateCarousel();
        resetAutoPlay();
    }

// Go to specific slide
    function goToSlide(page) {
        const cardsPerView = getCardsPerView();
        const totalPages = getTotalPages();

        // Ensure page is within valid range
        page = Math.max(0, Math.min(page, totalPages - 1));
        currentIndex = page * cardsPerView;

        updateCarousel();
        resetAutoPlay();
    }

// Update carousel position
    function updateCarousel() {
        if (cards.length === 0) return;

        const cardWidth = cards[0].offsetWidth + 30; // card width + gap
        const offset = currentIndex * cardWidth;

        wrapper.style.transform = `translateX(-${offset}px)`;
        wrapper.style.transition = 'transform 0.3s ease-in-out';
        updateDots();
        updateButtons();
    }

// Update button states
    function updateButtons() {
        if (!prevBtn || !nextBtn) return;

        const cardsPerView = getCardsPerView();
        const totalPages = getTotalPages();
        const currentPage = Math.floor(currentIndex / cardsPerView);

        prevBtn.disabled = totalPages <= 1 || currentPage === 0;
        nextBtn.disabled = totalPages <= 1 || currentPage === totalPages - 1;
    }

// Auto-play functionality
    function startAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
        }

        autoPlayInterval = setInterval(() => {
            const cardsPerView = getCardsPerView();
            const totalPages = getTotalPages();

            if (totalPages <= 1) return; // Don't auto-play if only one page

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
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
        }
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

        if (!btn || !text) return;

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
            const oldCardsPerView = getCardsPerView(); // Store before recalculation
            // Recalculate based on new screen size
            const newCardsPerView = getCardsPerView();

            // Adjust currentIndex when switching between single and multiple cards
            if (oldCardsPerView !== newCardsPerView) {
                const currentPage = Math.floor(currentIndex / Math.max(1, oldCardsPerView));
                currentIndex = currentPage * newCardsPerView;
            }

            createDots();
            updateCarousel();
        }, 250);
    });

// Event listeners for navigation buttons
    if (prevBtn) {
        prevBtn.addEventListener('click', () => moveCarousel(-1));
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => moveCarousel(1));
    }

// Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            moveCarousel(-1);
        } else if (e.key === 'ArrowRight') {
            moveCarousel(1);
        }
    });

// Touch swipe support
    let startX = 0;
    let endX = 0;

    if (wrapper) {
        wrapper.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            stopAutoPlay();
        });

        wrapper.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            handleSwipe();
        });

        // Pause on hover
        wrapper.addEventListener('mouseenter', stopAutoPlay);
        wrapper.addEventListener('mouseleave', () => {
            if (isAutoPlaying) startAutoPlay();
        });
    }

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Swipe left - next
                moveCarousel(1);
            } else {
                // Swipe right - previous
                moveCarousel(-1);
            }
        }

        // Restart auto-play after swipe
        if (isAutoPlaying) {
            setTimeout(startAutoPlay, 1000);
        }
    }

// Initialize carousel
    function initCarousel() {
        if (cards.length === 0) {
            console.warn('No carousel cards found');
            return;
        }

        // Set initial card widths based on cards per view
        updateCardWidths();
        createDots();
        updateButtons();
        updateCarousel();

        if (isAutoPlaying && getTotalPages() > 1) {
            startAutoPlay();
        }
    }

// Update card widths based on responsive breakpoints
    function updateCardWidths() {
        const cardsPerView = getCardsPerView();
        const containerWidth = wrapper.parentElement.offsetWidth;
        const gap = 30;

        // Calculate card width based on cards per view and container width
        const cardWidth = (containerWidth - ((cardsPerView - 1) * gap)) / cardsPerView;

        /*cards.forEach(card => {
            card.style.flex = `0 0 ${cardWidth}px`;
            card.style.maxWidth = `${cardWidth}px`;
        });*/
    }

// Initialize when DOM is loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCarousel);
    } else {
        initCarousel();
    }

// Update card widths on resize
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            updateCardWidths();
            updateCarousel();
        }, 250);
    });

// Export functions for global access if needed
    window.carousel = {
        moveCarousel,
        goToSlide,
        toggleAutoPlay,
        resetAutoPlay
    };

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

    const fadeSections = document.querySelectorAll('.fade-in-section');

    const fadeInObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                fadeInObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    });

    fadeSections.forEach(section => {
        fadeInObserver.observe(section);
    });


    const carouselContainer = document.querySelector('.carousel-container');
    let wheelTimeout = null;

    if (!carouselContainer) {
        return;
    }

    carouselContainer.addEventListener('wheel', function (e) {
        e.preventDefault();

        if (wheelTimeout) return;

        if (e.deltaY > 0) {
            moveCarousel(1);
        } else {
            moveCarousel(-1);
        }

        wheelTimeout = setTimeout(() => {
            wheelTimeout = null;
        }, 400);
    }, { passive: false });

});


document.addEventListener("DOMContentLoaded", () => {

});

