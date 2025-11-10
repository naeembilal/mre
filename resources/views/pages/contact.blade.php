@extends('layouts.app')

@section('title', 'Contact Us - MRE')

@section('content')
    <!-- Hero Section - Exact Match -->
    <section class="relative bg-cream py-24 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="hero-pattern absolute inset-0"></div>
        </div>

        <div class="container mx-auto px-6 lg:px-12 relative z-10">
            <div class="max-w-2xl">
                <p class="text-navy/70 text-base mb-3 tracking-wide">Contact Us</p>
                <h1 class="text-[72px] leading-[1.1] font-bold text-navy mb-6">Get In Touch</h1>
                <p class="text-navy/60 text-lg">Together, shaping a smarter and more sustainable Bahrain</p>
            </div>
        </div>
    </section>

    <!-- Contact Form Section - Navy Background -->
    <section class="bg-[#2C4A62] py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                <!-- Left Column - Contact Info -->
                <div class="text-white space-y-8">
                    <div>
                        <p class="text-lg mb-2">
                            <span class="font-semibold">Bahrain:</span> +973 77996666
                        </p>
                    </div>

                    <div>
                        <p class="text-lg mb-2">
                            <span class="font-semibold">Dubai:</span> +973 77996666
                        </p>
                    </div>

                    <div>
                        <a href="mailto:contact@mre.co" class="text-lg hover:opacity-80 transition-opacity">contact@mre.co</a>
                    </div>

                    <div class="pt-8">
                        <p class="text-lg font-semibold mb-1">Office Hours: Sunday-Thursday | 8AM-5PM</p>
                    </div>

                    <div class="pt-4">
                        <p class="text-lg font-semibold mb-1">Office 41 Building 1529 Road 4627 Block</p>
                        <p class="text-lg">346, Manama sea front</p>
                    </div>
                </div>

                <!-- Right Column - Contact Form with darker background -->
                <div class="bg-[#3D5A73] rounded-2xl p-10">
                    @if(session('success'))
                        <div class="bg-[#6B7F75] text-white p-4 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <input
                                type="text"
                                name="name"
                                placeholder="Name"
                                class="w-full px-5 py-4 bg-[#E8E5E1] border-0 rounded-lg text-navy placeholder:text-navy/50 focus:outline-none focus:ring-2 focus:ring-[#6B7F75] text-base"
                                value="{{ old('name') }}"
                                required
                            >
                            @error('name')
                            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <input
                                type="text"
                                name="subject"
                                placeholder="Subject"
                                class="w-full px-5 py-4 bg-[#E8E5E1] border-0 rounded-lg text-navy placeholder:text-navy/50 focus:outline-none focus:ring-2 focus:ring-[#6B7F75] text-base"
                                value="{{ old('subject') }}"
                                required
                            >
                            @error('subject')
                            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                        <textarea
                            name="message"
                            placeholder="Type Your Message Here"
                            rows="5"
                            class="w-full px-5 py-4 bg-[#E8E5E1] border-0 rounded-lg text-navy placeholder:text-navy/50 focus:outline-none focus:ring-2 focus:ring-[#6B7F75] text-base resize-none"
                            required
                        >{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-center pt-6">
                            <button type="submit"
                                    class="bg-[#6B7F75] text-white px-20 py-3.5 rounded-lg hover:bg-[#8A9D93] transition-all duration-300 text-base font-medium">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
