<nav>
    <div class="logo header-logo">
        <a href="/"><img src="{{asset('images/logo.svg')}}"></a>
    </div>

    <button class="menu-toggle" id="menuToggle" aria-label="Toggle navigation menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <ul class="nav-links" id="navLinks">
        <li>
            <a class="{{request()->route()->getName() === 'our-story' ? 'active' : ''}}" href="/our-story">
                Our Story
            </a>
        </li>
        <li>
            <a class="{{request()->route()->getName() === 'careers' ? 'active' : ''}}" href="/careers">
                Careers
            </a>
        </li>
        <li>
            <a class="{{request()->route()->getName() === 'contact' ? 'active' : ''}}" href="/contact">
                Contact
            </a>
        </li>
        <li><a href="#" class="cta-button mobile-cta-button">Go To FMS</a></li>
    </ul>

    <a href="#" class="cta-button">Go To FMS</a>

    <div class="nav-overlay" id="navOverlay"></div>
</nav>
