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
    display: none;
    margin-top: 1rem;
}

/* SweetAlert2 Customization */
.swal2-popup.service-modal-swal {
    background: #f6f3ef;
    border-radius: 12px;
    padding: 2rem;
    max-width: 420px;
    /* animation: swal2-show-subtle 0.15s ease-out !important; */
}

.slow-animation-show {
  animation: swal2-show 0.7s; 
}

.slow-animation-hide {
  animation: swal2-hide 0.25s; 
}

@keyframes swal2-show-subtle {
    0% {
        transform: scale(0.98);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.swal2-backdrop-show {
    animation: swal2-backdrop-show-subtle 0.15s ease-out !important;
}

@keyframes swal2-backdrop-show-subtle {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.swal2-popup.service-modal-swal .swal2-header {
    padding: 0;
    margin-bottom: 1.5rem;
}

.swal2-popup.service-modal-swal .service-modal-icon {
    width: 25px;
    margin-bottom: 0.5rem;
}

.swal2-popup.service-modal-swal .service-modal-title {
    font-weight: 450;
    font-size: 18px;
    margin: 0;
    color: #000;
}

.swal2-popup.service-modal-swal .swal2-html-container {
    text-align: justify;
    margin: 0;
    padding: 0;
}

.swal2-popup.service-modal-swal .swal2-actions {
    margin-top: 1.5rem;
    gap: 0.5rem;
}

.swal2-popup.service-modal-swal .swal2-confirm.service-consultation-btn {
    background: var(--secondary-green);
    border-radius: 10px;
    border: none;
    color: var(--white);
    padding: 0.5rem 1rem;
    font-size: 15px;
    width: auto;
    margin: 0;
}

.swal2-popup.service-modal-swal .swal2-cancel {
    background: transparent;
    border: 2px solid var(--secondary-green);
    border-radius: 10px;
    color: var(--secondary-green);
    padding: 0.5rem 3rem;
    font-size: 14px;
    width: auto;
    margin: 0;
}

.swal2-popup.service-modal-swal{
    max-width: 320px;
}
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

    <button class="learn-more-btn" type="button" onclick="showServiceModal(this)">
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

    <button class="learn-more-btn" type="button" onclick="showServiceModal(this)">
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

    <button class="learn-more-btn" type="button" onclick="showServiceModal(this)">
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
    <button class="learn-more-btn" type="button" onclick="showServiceModal(this)">
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
    <button class="learn-more-btn" type="button" onclick="showServiceModal(this)">
        Learn More
    </button>
</div>


<script>
function showServiceModal(button) {
    const card = button.closest('.home-key-service-card');
    const icon = card.querySelector('.card-icon img').src;
    const title = card.querySelector('.card-content h3').innerHTML;
    const text = card.querySelector('.hover-text').innerHTML;
    const contactUrl = '{{ route('contact') }}';

    Swal.fire({
        customClass: {
            popup: 'service-modal-swal',
            confirmButton: 'service-consultation-btn',
            cancelButton: 'swal2-cancel'
        },
        html: `
            <div style="text-align: center; padding-bottom: 2rem;">
                <img src="${icon}" alt="${title}" class="service-modal-icon">
                <p class="service-modal-title">${title}</p>
            </div>
            <div style="text-align: justify;">
                ${text}
            </div>
            <div class="home-consultation-btn-container">
                <button type="button" class="home-consultation-btn consultation-link-btn">
                    Request A Consultation
                </button>
            </div>
        `,
        showCancelButton: true,
        cancelButtonText: 'Close',
        confirmButtonText: '',
        confirmButtonColor: 'transparent',
        cancelButtonColor: 'transparent',
        buttonsStyling: false,
        allowOutsideClick: true,
        allowEscapeKey: true,
        showConfirmButton: false,
        // animation: true,
        // timerProgressBar: false,
        didOpen: () => {
            const consultationBtn = document.querySelector('.consultation-link-btn');
            if (consultationBtn) {
                consultationBtn.addEventListener('click', function() {
                    window.location.href = contactUrl;
                });
            }
        },
        showClass: {
            popup: 'slow-animation-show'
        },
        hideClass: {
            popup: 'slow-animation-hide'
        }
    });
}
</script>

