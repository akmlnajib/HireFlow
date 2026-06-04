@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">

    <!-- Heading -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold">Lowongan Kerja</h1>
        <p class="text-gray-500 text-sm mt-1">
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
    <form method="GET" class="grid md:grid-cols-4 gap-3 mb-8">

        <!-- Search -->
        <input 
            type="text" 
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari posisi..."
            class="border rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-gray-300"
        >

        <!-- Location -->
        <select name="location" class="border rounded-md px-3 py-2 text-sm">
            <option value="">Semua Lokasi</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Bandung">Bandung</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Yogyakarta">Yogyakarta</option>
        </select>

        <!-- Type -->
        <select name="type" class="border rounded-md px-3 py-2 text-sm">
            <option value="">Semua Tipe</option>
            <option value="Full Time">Full Time</option>
            <option value="Contract">Contract</option>
        </select>

        <!-- Button -->
        <button class="border rounded-md text-sm hover:bg-gray-100">
            Filter
        </button>

    </form>

    <!-- Job List -->
    <div class="space-y-4">

        @forelse ($filtered as $job)
        <div class="border rounded-lg p-5 hover:bg-gray-50 transition">

            <div class="flex justify-between items-start">
                <div>
                    <h2 class="font-medium text-lg">
                        {{ $job['title'] }}
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        {{ $job['location'] }}
                    </p>

                    <div class="flex gap-3 text-xs text-gray-400 mt-3">
                        <span>{{ $job['type'] }}</span>
                        <span>{{ $job['work'] }}</span>
                        <span>{{ $job['salary'] }}</span>
                    </div>
                </div>

                <a href="#" class="text-sm border px-3 py-1.5 rounded-md hover:bg-gray-100">
                    Detail
                </a>
            </div>

        </div>
        @empty
        <p class="text-gray-500 text-sm">Lowongan tidak ditemukan.</p>
        @endforelse

    </div>

</div>
@endsection