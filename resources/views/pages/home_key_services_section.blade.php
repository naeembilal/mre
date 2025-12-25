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
    display: block;
    /* display: flex; */
    /* align-items: center; */
    /* justify-content: center; */
}

.modal-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
}

.modal-box {
    /* position: absolute; */
    position: fixed;
    background: #f6f3ef;
    width: 90%;
    max-width: 420px;
    padding: 30px;
    border-radius: 12px;
    z-index: 2;
    text-align: center;
    margin: 0;
    /* margin: 10vh auto; */
}

.modal-footer {
    margin-top: 20px;
}

.home-consultation-btn {
    background: var(--secondary-green);
    border-radius: 10px;
    border: none;
    color: var(--white);
    padding: 0.5rem 1rem;
    font-size: 15px;
    cursor: pointer;
    position: relative;
}

.home-consultation-btn-container {
    display: block;
    position: absolute;
    bottom: 5rem;
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
        <h3>Business Consultancy</h3>
        <p class="subtitle">Strategy, Structure, Process Optimization</p>

        <!-- Hidden detailed text -->
        <div class="hover-text d-none">
            We drive meaningful change by aligning your strategy, structure, and processes with
            high-level organizational goals. We specialize in providing the data-driven insights
            needed for continuous improvement and sustainable growth across your enterprise.
            <br><br>
            Our Results-Oriented Methodology uses deep data analysis to diagnose challenges and
            deliver actionable, strategic recommendations. We facilitate smooth transformations
            and significant efficiency improvements to achieve tangible growth.
        </div>
    </div>

    <button class="learn-more-btn" type="button">
        Learn More
    </button>
</div>

<div class="home-key-service-card">
    <div class="card-icon">
        <img src="{{ asset('images/icon-gear.png') }}" alt="Operations Management">
    </div>

    <div class="card-content">
        <h3>Operations Management</h3>
        <p class="subtitle">Workflow, Resource Planning, Regional Coverage</p>

        <!-- Hidden detailed text -->
        <div class="hover-text d-none">
            We manage the entire operational lifecycle with full attendance, payroll, and HR
            automation. This includes smart leave management, scheduling, deployment, and
            contract-based staffing enforcement. Our platform delivers control through smart
            patrols, Fleet asset management, and advanced reporting and analytics.
            <br><br>
            Operations are compliant and highly efficient, supported by automated worker and
            manager communication (alerts/exceptions). We also manage approval workflows and
            complex dispatch generation to deliver full efficiency end-to-end.
        </div>
    </div>

    <button class="learn-more-btn" type="button">
        Learn More
    </button>
</div>


<div class="home-key-service-card">
    <div class="card-icon">
        <img src="{{ asset('images/icon-people.png') }}" alt="HR & Talent Solutions">
    </div>

    <div class="card-content">
        <h3>HR & Talent Solutions</h3>
        <p class="subtitle">Recruitment, Onboarding, Talent Lifecycle</p>

        <!-- Hidden detailed text -->
        <div class="hover-text d-none">
            Smart Staffing, Seamless Success. We transform recruitment into a streamlined,
            automated process from global talent sourcing to onboarding and post-hire support.
            We manage temporary staff, direct hires, and specialized experts across various
            roles.
            <br><br>
            With a diverse pool of 27+ nationalities, we deliver quality candidates who fit your
            culture and drive results. We take care of all the people logistics so your team can
            focus on achieving more and accelerating business growth.
        </div>
    </div>

    <button class="learn-more-btn" type="button">
        Learn More
    </button>
</div>

<div class="home-key-service-card">
    <div class="card-icon">
        <img src="{{ asset('images/icon-project.png') }}" alt="Project Management">
    </div>

    <div class="card-content">
        <h3>Project Management</h3>
        <p class="subtitle">Planning, Execution, Technology Integration</p>

        <!-- Hidden detailed text -->
        <div class="hover-text d-none">
            We deliver complex project portfolios using expert agile and project management
            methodologies. Our focus is aligning business objectives with technology teams to
            ensure effective, timely, and integrated delivery.
            <br><br>
            We leverage advanced technology and data analytics, combining business analysis and
            expertise to streamline project delivery. Achieve faster, risk-managed delivery and
            successfully execute complex technology roadmaps on time and within scope.
        </div>
    </div>
    <button class="learn-more-btn" type="button">
        Learn More
    </button>
</div>

<div class="home-key-service-card">
    <div class="card-icon">
        <img src="{{ asset('images/icon-automation.png') }}" alt="Automation">
    </div>

    <div class="card-content">
        <h3>Automation</h3>
        <p class="subtitle">Digital Systems, Paperless Processes, AI Integration</p>

        <!-- Hidden detailed text -->
        <div class="hover-text d-none">
            MRE champions a secure, paperless, automated, and digital approach. We leverage
            technology as a catalyst for significant operational improvement, maximizing speed
            and minimizing human error through digital enablement.
            <br><br>
            We identify pain points and optimize processes through full automation and cloud
            optimization. This includes process automation and end-to-end digital transformation,
            ensuring optimized IT operations and the agility to scale your business.
        </div>
    </div>
    <button class="learn-more-btn" type="button">
        Learn More
    </button>
</div>

<!-- Modal -->
<div class="service-modal" id="serviceModal">
    <div class="modal-overlay"></div>

    <div class="modal-box">
        <!-- <button class="modal-close modal-close-btn">&times;</button> -->
        <div class="modal-content"></div>

        <div class="modal-footer" style="text-align: center; padding-top: 3rem;">
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

        modal.querySelector('.modal-content').innerHTML = `
            <div class="modal-header" style="text-align: center; padding-bottom: 2rem;">
                <img src="${icon}" alt="${title}" style="width: 25px;">
                <p style="font-weight: 450; font-size: 18px;">${title}</p>
            </div>
            <div class="modal-body" style="text-align: justify;">
                ${text}
            </div>
              <div class="home-consultation-btn-container">
                <button type="button" class="home-consultation-btn"
                    onclick="window.location.href='{{route('contact')}}'">
                    Request A Consultation</button>
            </div>
        `;

        modalBox.style.visibility = 'hidden';
        modal.classList.add('active');
        // document.getElementById('serviceModal').classList.add('active');

        
        // 🔹 WAIT FOR RENDER (IMPORTANT)
        requestAnimationFrame(() => {
            const cardRect = card.getBoundingClientRect();
            const modalRect = modalBox.getBoundingClientRect();

            let top = cardRect.top - modalRect.height - 12;
            let left = cardRect.left + (cardRect.width / 2) - (modalRect.width / 2);

            // Open below if no space above
            if (top < 10) {
                top = cardRect.bottom + 12;
            }

            // Clamp horizontally
            left = Math.max(10, Math.min(left, window.innerWidth - modalRect.width - 10));

            modalBox.style.top = `${top}px`;
            modalBox.style.left = `${left}px`;
            modalBox.style.visibility = 'visible';
        });

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

