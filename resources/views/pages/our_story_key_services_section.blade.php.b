<style>
.home-key-service-card {
    background: rgba(232, 223, 217, 0.5);
    border: 2px solid var(--secondary-green);
    border-radius: 10px;
    padding: 60px;
    text-align: center;
    min-width: fit-content;
    min-height: auto;
    margin-bottom: 3rem;
}

.card-icon img {
    width: 48px;
    margin-bottom: 15px;
}

.card-content h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 8px;
}

.card-content .subtitle {
    font-size: 14px;
    color: #555;
}

.learn-more-btn {
    background: var(--secondary-green);
    border-radius: 10px;
    border: none;
    color: var(--white);
    padding: 0.5rem 3rem;
    font-size: 14px;
    cursor: pointer;
    position: relative;
}

.learn-more-btn .underline {
    display: block;
    height: 2px;
    width: 40px;
    background: #333;
    margin: 6px auto 0;
}

/* MODAL */
.service-modal {
    padding: 1.5rem;
    position: fixed;
    inset: 0;
    display: none;
    z-index: 999;
}

.service-modal.active {
    /* display: block; */
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
}

.modal-box {
    position: absolute;
    background: #f6f3ef;
    width: 90%;
    max-width: 420px;
    margin: 10vh auto;
    padding: 30px;
    border-radius: 12px;
    z-index: 2;
    text-align: center;
}

.modal-footer {
    margin-top: 20px;
}

/* .modal-close {
    position: absolute;
    right: 15px;
    top: 10px;
    border: none;
    background: none;
    font-size: 24px;
    cursor: pointer;
} */
    
</style>

<div class="home-key-service-card">
    <div class="card-icon">
        <img src="{{ asset('images/icon-chart.png') }}" alt="Business Consultancy">
    </div>

    <div class="card-content">
       
</div>


<!-- Modal -->
<div class="service-modal" id="serviceModal">
    <div class="modal-overlay"></div>

    <div class="modal-box">
        <!-- <button class="modal-close modal-close-btn">&times;</button> -->
        <div class="modal-content"></div>

        <div class="modal-footer" style="text-align: center; padding-top: 2rem;">
            <button class="modal-close learn-more-btn">Close</button>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.learn-more-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        // Prevent close button triggering open
        if (this.classList.contains('modal-close')) return;

        const card = this.closest('.home-key-service-card');
        const modal = document.getElementById('serviceModal');
        const modalBox = modal.querySelector('.modal-box');

        const icon = card.querySelector('.card-icon').querySelector('img').getAttribute('src');
        const title = card.querySelector('.card-content h3').innerHTML;
        const text = card.querySelector('.hover-text').innerHTML;

        // console.log(icon, title, text);

        document.querySelector('.modal-content').innerHTML = `
            <div class="modal-header" style="text-align: center; padding-bottom: 2rem;">
                <img src="${icon}" alt="${title}" style="width: 25px;">
                <p style="font-weight: 450; font-size: 18px;">${title}</p>
            </div>
            <div class="modal-body" style="text-align: justify;">
                ${text}
            </div>
        `;
        document.getElementById('serviceModal').classList.add('active');

        
        // 🔹 Position modal above the card
        // const cardRect = card.getBoundingClientRect();
        // const modalRect = modalBox.getBoundingClientRect();

        // let top = cardRect.top - modalRect.height - 20;
        // let left = cardRect.left + (cardRect.width / 2) - (modalRect.width / 2);

        // // Prevent overflow
        // if (top < 20) {
        //     top = cardRect.bottom + 20; // open below if no space above
        // }

        // if (left < 10) left = 10;
        // if (left + modalRect.width > window.innerWidth) {
        //     left = window.innerWidth - modalRect.width - 10;
        // }

        // modalBox.style.top = `${top + window.scrollY}px`;
        // modalBox.style.left = `${left}px`;

    });
});

// Close modal (button + overlay)
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('modal-close') ||
        e.target.classList.contains('modal-overlay')) {
        closeModal();
    }
});

// document.querySelector('.modal-close').addEventListener('click', closeModal);
// document.querySelector('.modal-overlay').addEventListener('click', closeModal);

function closeModal() {
    document.getElementById('serviceModal').classList.remove('active');
}
</script>
