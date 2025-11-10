@extends('layouts.app')

@section('content')

    {{-- HERO --}}
    <section class="bg-[url('/assets/images/hero-bg.png')] bg-cover bg-center py-32 text-navy">
        <div class="max-w-6xl mx-auto px-6">
            <h1 class="text-6xl font-extrabold">Our Story</h1>
            <p class="text-lg mt-4 max-w-xl">Our purpose: build trust by showing credibility, leadership, and
                experience.</p>
        </div>
    </section>

    {{-- COMPANY BACKGROUND --}}
    <section class="bg-navy text-white py-20">
        <div class="max-w-6xl mx-auto px-6 space-y-10">
            <p>(Company Background) Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
            <div>
                <h3 class="font-semibold text-lg mb-2">Our Mission</h3>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div>
                <h3 class="font-semibold text-lg mb-2">Our Vision</h3>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div>
                <h3 class="font-semibold text-lg mb-2">Our Values</h3>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
    </section>

    {{-- MESSAGE --}}
    <section class="bg-sand py-20 text-center text-navy">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-6">A Word From The MRE Team</h2>
            <p class="text-base mb-10">Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>

            <div class="grid md:grid-cols-3 gap-6">
                @foreach(range(1,3) as $i)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <p class="italic text-sm mb-4">“Lorem ipsum is simply dummy text of the printing and typesetting
                            industry.”</p>
                        <p class="font-semibold text-xs">– Client Name</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ADVANTAGE --}}
    <section class="bg-white py-24 text-center text-navy">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-4xl font-extrabold mb-10">The MRE Advantage</h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="p-8 border rounded-xl">
                    <h3 class="font-semibold text-lg mb-2">Business Consultancy</h3>
                    <p class="text-sm mb-4">Strategy, Structure, Process Optimization</p>
                    <a href="#" class="underline font-medium text-sm">Learn More</a>
                </div>
                <div class="p-8 border rounded-xl">
                    <h3 class="font-semibold text-lg mb-2">Operations Management</h3>
                    <p class="text-sm mb-4">Workflow, Fleet Resource Planning, Regional Coverage</p>
                    <a href="#" class="underline font-medium text-sm">Learn More</a>
                </div>
                <div class="p-8 border rounded-xl">
                    <h3 class="font-semibold text-lg mb-2">HR & Recruitment</h3>
                    <p class="text-sm mb-4">Recruitment, Training, Offboarding</p>
                    <a href="#" class="underline font-medium text-sm">Learn More</a>
                </div>
            </div>
        </div>
    </section>

@endsection
