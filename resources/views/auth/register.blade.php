<x-guest-layout>

<div class="min-h-screen flex items-center justify-center px-6 bg-white">

    <div class="w-full max-w-sm border-4 border-black p-6 shadow-[8px_8px_0px_black] bg-white">

        <!-- Header -->
        <div class="mb-8 border-b-4 border-black pb-4">
            <h1 class="text-2xl font-black text-black">
                Daftar
            </h1>
            <p class="text-sm text-black font-medium mt-1">
                Buat akun untuk mulai melamar kerja
            </p>
        </div>

        <!-- Error -->
        @if ($errors->any())
            <div class="mb-5 border-2 border-red-600 p-3 shadow-[3px_3px_0px_black] text-sm text-black font-bold">
                @foreach ($errors->all() as $error)
                    <p>⚠ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <input 
                type="text" 
                name="name"
                placeholder="Nama"
                value="{{ old('name') }}"
                class="w-full border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black] focus:translate-x-1 focus:translate-y-1 transition"
                required
            >

            <input 
                type="email" 
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                class="w-full border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black] focus:translate-x-1 focus:translate-y-1 transition"
                required
            >

            <input 
                type="password" 
                name="password"
                placeholder="Password"
                class="w-full border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black] focus:translate-x-1 focus:translate-y-1 transition"
                required
            >

            <input 
                type="password" 
                name="password_confirmation"
                placeholder="Konfirmasi Password"
                class="w-full border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black] focus:translate-x-1 focus:translate-y-1 transition"
                required
            >

            <button 
                type="submit"
                class="w-full bg-yellow-300 border-3 border-black text-black font-black py-2 shadow-[5px_5px_0px_black] hover:translate-x-1 hover:translate-y-1 transition"
            >
                DAFTAR
            </button>

        </form>

        <!-- Login -->
        <p class="text-xs text-black font-medium mt-6 text-center border-t-4 border-black pt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-black underline hover:bg-yellow-300 px-1">
                Login
            </a>
        </p>

    </div>

</div>

</x-guest-layout>