@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">

    <!-- Heading -->
    <div class="mb-10 border-4 border-black p-5 shadow-[6px_6px_0px_black] bg-white">
        <h1 class="text-3xl font-black text-black">Lowongan Kerja</h1>
        <p class="text-black text-sm mt-2 font-medium">
            Cari pekerjaan berdasarkan posisi, lokasi, atau tipe kerja.
        </p>
    </div>

    @php
    $jobs = [
        ['title'=>'Frontend Developer','location'=>'Jakarta','type'=>'Full Time','work'=>'Remote','salary'=>'Rp 6 - 10 jt'],
        ['title'=>'Backend Engineer','location'=>'Bandung','type'=>'Full Time','work'=>'Onsite','salary'=>'Rp 8 - 12 jt'],
        ['title'=>'UI/UX Designer','location'=>'Surabaya','type'=>'Contract','work'=>'Hybrid','salary'=>'Rp 5 - 9 jt'],
        ['title'=>'Mobile Developer','location'=>'Yogyakarta','type'=>'Full Time','work'=>'Remote','salary'=>'Rp 7 - 11 jt'],
        ['title'=>'Data Analyst','location'=>'Jakarta','type'=>'Full Time','work'=>'Hybrid','salary'=>'Rp 6 - 9 jt'],
        ['title'=>'DevOps Engineer','location'=>'Jakarta','type'=>'Full Time','work'=>'Onsite','salary'=>'Rp 10 - 15 jt'],
    ];

    $search = request('search');
    $location = request('location');
    $type = request('type');

    $filtered = collect($jobs)->filter(function ($job) use ($search, $location, $type) {
        return 
            (!$search || str_contains(strtolower($job['title']), strtolower($search))) &&
            (!$location || $job['location'] == $location) &&
            (!$type || $job['type'] == $type);
    });
    @endphp

    <!-- Filter -->
    <form method="GET" class="grid md:grid-cols-4 gap-3 mb-10">

        <input 
            type="text" 
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari posisi..."
            class="border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black] focus:outline-none"
        >

        <select name="location"
            class="border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black]">
            <option value="">Semua Lokasi</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Bandung">Bandung</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Yogyakarta">Yogyakarta</option>
        </select>

        <select name="type"
            class="border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black]">
            <option value="">Semua Tipe</option>
            <option value="Full Time">Full Time</option>
            <option value="Contract">Contract</option>
        </select>

        <button
            class="bg-yellow-300 border-3 border-black font-black shadow-[4px_4px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
            FILTER
        </button>

    </form>

    <!-- Job List -->
    <div class="space-y-5">

        @forelse ($filtered as $job)
        <div class="border-4 border-black p-6 bg-white shadow-[6px_6px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">

            <div class="flex justify-between items-start gap-4">

                <div>
                    <h2 class="font-black text-lg text-black">
                        {{ $job['title'] }}
                    </h2>

                    <p class="text-black text-sm mt-1 font-medium">
                        📍 {{ $job['location'] }}
                    </p>

                    <div class="flex gap-2 text-xs mt-4">
                        <span class="border border-black px-2 py-1 font-bold">{{ $job['type'] }}</span>
                        <span class="border border-black px-2 py-1 font-bold">{{ $job['work'] }}</span>
                        <span class="border border-black px-2 py-1 font-bold">{{ $job['salary'] }}</span>
                    </div>
                </div>

                <a href="#"
                   class="border-3 border-black px-4 py-2 font-black shadow-[3px_3px_0px_black] hover:bg-yellow-300 transition">
                    DETAIL →
                </a>

            </div>

        </div>
        @empty
        <div class="border-4 border-black p-6 shadow-[6px_6px_0px_black]">
            <p class="text-black font-bold">Lowongan tidak ditemukan.</p>
        </div>
        @endforelse

    </div>

</div>
@endsection