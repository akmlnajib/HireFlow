<x-guest-layout>

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-sm">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-xl font-semibold text-gray-900">
                Daftar
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Buat akun untuk mulai melamar kerja
            </p>
        </div>

        <!-- Error -->
        @if ($errors->any())
            <div class="mb-5 text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <div>
                <input 
                    type="text" 
                    name="name"
                    placeholder="Nama"
                    value="{{ old('name') }}"
                    class="w-full border-b py-2 text-sm outline-none focus:border-black"
                    required
                >
            </div>

            <div>
                <input 
                    type="email" 
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    class="w-full border-b py-2 text-sm outline-none focus:border-black"
                    required
                >
            </div>

            <div>
                <input 
                    type="password" 
                    name="password"
                    placeholder="Password"
                    class="w-full border-b py-2 text-sm outline-none focus:border-black"
                    required
                >
            </div>

            <div>
                <input 
                    type="password" 
                    name="password_confirmation"
                    placeholder="Konfirmasi Password"
                    class="w-full border-b py-2 text-sm outline-none focus:border-black"
                    required
                >
            </div>

            <button 
                type="submit"
                class="w-full bg-black text-white py-2 text-sm mt-4"
            >
                Daftar
            </button>

        </form>

        <!-- Login -->
        <p class="text-xs text-gray-500 mt-6 text-center">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-black">Login</a>
        </p>

    </div>

</div>

</x-guest-layout>