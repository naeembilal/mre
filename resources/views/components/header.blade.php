<style>
    nav {
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        background: #fff;
        box-shadow: none;
        position: relative;
        transform: translateY(0);
        transition: transform 0.4s ease, box-shadow 0.3s ease;
        will-change: transform, box-shadow;
        /*padding: 15px 30px;*/
    }

    nav.scrolled {
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(0);
        /*padding: 10px 30px;*/
    }

    nav.is-hidden {
        /* transform: translateY(-120%); */
    }

    .certification-badge {
        display: flex;
        align-items: center;
        height: 100%;
        margin-top: 1rem;
    }

    .certification-badge img {
        height: 125px;
        width: auto;
        object-fit: contain;
    }

    nav{
        height: 106px;
    }
    .nav-links{
        margin-right: 3rem;
    }

    @media (max-width: 968px) {
        .hero{
            margin-top: 5rem;
        }
        nav {
            justify-content: flex-start;
            /* position: relative; */
            position: fixed;
            height: 90px;
            transform: unset;
            transition: unset;
            will-change: unset;

            /* box-shadow: none;
            transform: translateY(0);
            transition:
            background-color 0.3s ease,
            box-shadow 0.3s ease,
            transform 0.3s ease;
            will-change: transform; */
        }

        nav.scrolled {
            position: fixed;
        }
        .file-upload-text{
            text-align: -webkit-center;
            padding-bottom: 1rem;
        }
        .certification-badge {
            margin-top: 0rem;
        }
        .certification-badge img {
            height: 90px;
        }
        .nav-links{
            margin-right: 0rem;
        }
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

    <div class="certification-badge">
        <img src="{{asset('images/MRE_BH_English_2025_Certification_Badge.png')}}" alt="Great Place To Work Certified">
    </div>

{{--    <a href="#" class="cta-button">Go To FMS</a>--}}

    <div class="nav-overlay" id="navOverlay"></div>
</nav>
