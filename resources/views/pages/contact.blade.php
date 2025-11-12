@extends('layouts.app')
@section('title', 'Contact')

@section('content')
    <section class="story-hero-wrapper">
        <div class="story-hero-container">
            <div class="story-content-wrapper">
                <h2 class="story-tagline">Contact Us</h2>
                <h1 class="story-main-heading">Get In Touch</h1>
                <p class="story-purpose-text">
                    Together, shaping a smarter and more sustainable Bahrain
                </p>
            </div>
        </div>
    </section>

    <section class="contact-wrapper">
        <div class="contact-container">
            <!-- Left Side - Contact Information -->
            <div class="contact-info-panel animate-slide-left">
                <div class="contact-info-text">
                    <span class="contact-phone-line"><strong>Bahrain:</strong>&nbsp; +973 77996666</span>

                    <span class="contact-phone-line"><strong>Dubai:</strong>&nbsp; +973 77996666</span>

                    <a href="mailto:contact@mre.co" class="contact-email">contact@mre.co</a>

                    <span class="contact-hours">
                        <strong>Office Hours:</strong>
                        &nbsp; Sunday-Thursday | 8AM-5PM
                    </span>

                    <span class="contact-address">
                        Office 41 Building 1529 Road 4627 Block <br>
                        346,Manama sea front
                    </span>
                </div>
            </div>

            <!-- Right Side - Contact Form -->
            <div class="contact-form-wrapper animate-slide-right">
                <form method="POST">
                    @csrf
                    <div class="contact-form-group">
                        <input
                            type="text"
                            name="name"
                            class="contact-form-input"
                            placeholder="Name"
                            required
                        >
                    </div>

                    <div class="contact-form-group">
                        <input
                            type="text"
                            name="subject"
                            class="contact-form-input"
                            placeholder="Subject"
                            required
                        >
                    </div>

                    <div class="contact-form-group">
                        <textarea
                            name="message"
                            class="contact-form-textarea"
                            placeholder="Type Your Message Here"
                            required
                        ></textarea>
                    </div>

                    <button type="submit" class="contact-submit-button">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
