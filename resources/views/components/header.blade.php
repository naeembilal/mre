<style>
    nav {
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        background: #fff;
        box-shadow: none;
        /*transition: all 0.3s ease;*/
        /*padding: 15px 30px;*/
    }

    nav.scrolled {
        position: fixed;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /*padding: 10px 30px;*/
    }
</style>

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
                Your Story
            </a>
        </li>
        <li>
            <a class="{{request()->route()->getName() === 'contact' ? 'active' : ''}}" href="/contact">
                Contact
            </a>
        </li>
{{--        <li><a href="#" class="cta-button mobile-cta-button">Go To FMS</a></li>--}}
    </ul>

{{--    <a href="#" class="cta-button">Go To FMS</a>--}}

    <div class="nav-overlay" id="navOverlay"></div>
</nav>
