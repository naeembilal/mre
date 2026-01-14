@extends('layouts.app')
@section('title', 'Contact')

@section('content')
    <section class="story-hero-wrapper fade-in-section">
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

    <section class="contact-wrapper fade-in-section">
        <div class="contact-container">
            <!-- Left Side - Contact Information -->
            <div class="contact-info-panel animate-slide-left">
                <div class="contact-info-text">
                    <span class="contact-phone-line">Bahrain:&nbsp; <a class="contact-phone" href="tel:+97377996666">+973 77996666</a></span>

                    <span class="contact-phone-line">Dubai:&nbsp; <a class="contact-phone" href="tel:+97377996666">+973 77996666</a></span>

                    <a href="mailto:contact@mre.co" class="contact-email">contact@mre.co</a>

                    <span class="contact-hours">
                        Office Hours:
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
                <form id="contactForm">
                    @csrf
                    <div class="contact-form-group">
                        <input
                            type="text"
                            name="contactName"
                            class="form-input"
                            placeholder="Name"
                            required
                        >
                    </div>

                    <div class="contact-form-group">
                        <input
                            type="text"
                            name="contactSubject"
                            class="form-input"
                            placeholder="Subject"
                            required
                        >
                    </div>

                    <div class="contact-form-group">
                        <textarea
                            name="contactMessage"
                            class="form-input"
                            placeholder="Type Your Message Here"
                            required
                        ></textarea>
                    </div>
                    <div class="form-button-12">
                        <div class="form-button-12-6">
                            <button id="contactSubmitBtn" type="button" class="contact-submit-button">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
