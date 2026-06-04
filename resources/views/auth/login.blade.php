<x-guest-layout>

<div class="min-h-screen flex items-center justify-center px-6 bg-white">

    <div class="w-full max-w-sm border-4 border-black p-6 shadow-[8px_8px_0px_black] bg-white">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 font-bold text-black" :status="session('status')" />

        <!-- Header -->
        <div class="mb-8 border-b-4 border-black pb-4">
            <h1 class="text-2xl font-black text-black">
                Login
            </h1>
            <p class="text-sm font-medium text-black mt-1">
                Masuk untuk melamar pekerjaan
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black] focus:translate-x-1 focus:translate-y-1 transition"
                >

                <div class="mt-2 text-sm text-red-600 font-bold">
                    <x-input-error :messages="$errors->get('email')" />
                </div>
            </div>

            <!-- Password -->
            <div>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    autocomplete="current-password"
                    class="w-full border-3 border-black px-3 py-2 text-sm font-bold shadow-[3px_3px_0px_black] focus:translate-x-1 focus:translate-y-1 transition"
                >

                <div class="mt-2 text-sm text-red-600 font-bold">
                    <x-input-error :messages="$errors->get('password')" />
                </div>
            </div>

            <!-- Remember -->
            <label class="flex items-center gap-2 text-sm font-bold text-black">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="border-2 border-black"
                >
                Remember me
            </label>

            <!-- Forgot -->
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm font-black underline hover:bg-yellow-300 inline-block">
                    Forgot password?
                </a>
            @endif

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-yellow-300 border-4 border-black text-black font-black py-2 shadow-[5px_5px_0px_black] hover:translate-x-1 hover:translate-y-1 transition mt-4"
            >
                LOGIN
            </button>

        </form>

    </div>

</div>

</x-guest-layout>