@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6">

        <h1 class="text-5xl font-black leading-tight mb-6 text-black">
            Nyari kerja yang cocok, 
            sekarang jadi lebih gampang.
        </h1>

        <p class="text-black mb-8 text-sm leading-relaxed max-w-xl border-l-4 border-black pl-4">
            Nggak perlu scroll panjang atau daftar ribet. 
            Temukan lowongan yang relevan dan langsung apply dalam beberapa langkah.
        </p>

        <div class="flex gap-3">
            @auth
            <a href="/jobs"
               class="bg-yellow-300 text-black px-6 py-3 text-sm font-bold border-3 border-black shadow-[4px_4px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
                Lihat lowongan
            </a>
            @else
            <a href="/jobs"
               class="bg-yellow-300 text-black px-6 py-3 text-sm font-bold border-3 border-black shadow-[4px_4px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
                Lihat lowongan
            </a>
            <a href="/register"
               class="bg-white text-black px-6 py-3 text-sm font-bold border-3 border-black shadow-[4px_4px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
                Daftar
            </a>
            @endauth
        </div>

    </div>
</section>

<!-- JOB LIST -->
<section id="jobs" class="py-20 bg-gray-100 border-t-4 border-black">
    <div class="max-w-5xl mx-auto px-6">

        <h2 class="text-2xl font-black mb-8 text-black">
            Lowongan terbaru
        </h2>

        <div class="space-y-5">

            <div class="bg-white p-6 border-4 border-black shadow-[6px_6px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
                
                <h3 class="font-black text-lg">Backend Developer</h3>
                <p class="text-black text-sm mt-1">Bandung • Fulltime</p>

                <div class="mt-4 flex justify-between items-center">
                    <span class="text-xs font-medium text-black border border-black px-2 py-1">
                        Dipost 2 hari lalu
                    </span>

                    <button class="text-sm font-black border-2 border-black px-3 py-1 hover:bg-black hover:text-white transition">
                        Lihat detail →
                    </button>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection