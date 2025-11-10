@extends('layouts.app')

@section('content')

    {{-- HERO --}}
    <section class="bg-[url('/assets/images/hero-bg.png')] bg-cover bg-center py-32 text-navy">
        <div class="max-w-6xl mx-auto px-6">
            <h1 class="text-6xl font-extrabold">Your Story</h1>
            <p class="text-lg mt-4">Discover a workplace defined by excellence and driven by purpose.</p>
        </div>
    </section>

    {{-- LIFE AT MRE --}}
    <section class="bg-navy py-20">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-5 gap-6 justify-items-center">
            @foreach(range(1,10) as $i)
                <img src="{{ asset('assets/images/life-'.$i.'.jpg') }}" alt="Life at MRE"
                     class="rounded-md shadow-lg rotate-{{ rand(-6,6) }}">
            @endforeach
        </div>
    </section>

    {{-- HR MESSAGE --}}
    <section class="bg-white py-24 text-navy">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">From The HR Team</h2>
            <p class="max-w-2xl mx-auto text-base leading-relaxed mb-10">
                Lorem ipsum is simply dummy text of the printing and typesetting industry.
            </p>
        </div>

        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-6 px-6">
            @foreach(range(1,3) as $i)
                <div class="bg-sand p-6 rounded-lg shadow">
                    <p class="italic text-sm mb-4">“Lorem ipsum is simply dummy text of the printing and typesetting
                        industry.”</p>
                    <p class="font-semibold text-xs">– Employee Name</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CAREER FORM --}}
    <section class="bg-sand py-24">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-start">
            <div>
                <h2 class="text-4xl font-extrabold mb-6">Grow With Purpose</h2>
                <p class="text-base text-navy/80">
                    At MRE, growth isn’t just about moving upward, it’s about evolving in every direction.
                    We invest in people, nurture talent, and create space for meaningful progress.
                </p>
            </div>

            <form class="space-y-4 bg-white p-8 rounded-xl shadow">
                <input type="text" placeholder="Name"
                       class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none">
                <input type="email" placeholder="Email"
                       class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none">
                <input type="text" placeholder="Phone"
                       class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none">
                <select class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none">
                    <option>Select Department</option>
                </select>
                <div class="flex gap-2 items-center">
                    <label class="bg-navy text-white text-sm px-3 py-2 rounded-md cursor-pointer">
                        <input type="file" hidden> Choose File
                    </label>
                    <span class="text-sm text-gray-500">Upload CV</span>
                </div>
                <textarea placeholder="Type Your Message Here" rows="4"
                          class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none"></textarea>
                <button type="submit" class="bg-navy text-white font-semibold w-full py-3 rounded-md">Submit</button>
            </form>
        </div>
    </section>

@endsection
