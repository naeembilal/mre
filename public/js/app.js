document.addEventListener('DOMContentLoaded', function () {
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }

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
