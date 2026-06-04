@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6">

        <h1 class="text-4xl font-semibold leading-tight mb-5">
            Nyari kerja yang cocok, 
            sekarang jadi lebih gampang.
        </h1>

        <p class="text-gray-600 mb-8 text-sm leading-relaxed max-w-xl">
            Nggak perlu scroll panjang atau daftar ribet. 
            Temukan lowongan yang relevan dan langsung apply dalam beberapa langkah.
        </p>

        <div class="flex gap-3">
            <a href="/jobs" class="bg-black text-white px-5 py-2.5 rounded-md text-sm hover:opacity-90">
                Lihat lowongan
            </a>

            <a href="/register" class="border px-5 py-2.5 rounded-md text-sm hover:bg-gray-50">
                Daftar
            </a>
        </div>

    </div>
</section>

<!-- JOB LIST (dummy dulu) -->
<section id="jobs" class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6">

        <h2 class="text-xl font-semibold mb-8">
            Lowongan terbaru
        </h2>

        <div class="space-y-4">

            <div class="bg-white p-5 rounded-lg border hover:shadow-sm transition">
                <h3 class="font-semibold">Backend Developer</h3>
                <p class="text-gray-500 text-sm">Bandung • Fulltime</p>

                <div class="mt-3 flex justify-between items-center">
                    <span class="text-xs text-gray-400">Dipost 2 hari lalu</span>

                    <button class="text-sm text-black font-medium">
                        Lihat detail →
                    </button>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection