<x-guest-layout>

<div class="min-h-screen flex items-center justify-center px-6 bg-white">

    <div class="w-full max-w-md border-4 border-black p-6 shadow-[8px_8px_0px_black] bg-white">

        <!-- Message -->
        <div class="mb-6 border-b-4 border-black pb-4">
            <h1 class="text-2xl font-black text-black mb-2">
                Verify Email
            </h1>

            <p class="text-sm font-medium text-black">
                Thanks for signing up! Please verify your email address before getting started.
            </p>
        </div>

        <!-- Status -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 border-2 border-green-600 p-3 shadow-[3px_3px_0px_black] text-sm font-bold text-black">
                A new verification link has been sent to your email.
            </div>
        @endif

        <!-- Actions -->
        <div class="flex flex-col gap-3">

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button type="submit"
                    class="w-full bg-yellow-300 border-4 border-black text-black font-black py-2 shadow-[5px_5px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
                    RESEND EMAIL
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-full border-4 border-black bg-white text-black font-black py-2 shadow-[5px_5px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
                    LOG OUT
                </button>
            </form>

        </div>

    </div>

</div>

</x-guest-layout>