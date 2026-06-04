<nav class="w-full bg-white border-b-4 border-black">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" class="text-xl font-black tracking-tight text-black border-2 border-black px-3 py-1 shadow-[3px_3px_0px_black]">
            HireFlow
        </a>

        <!-- Menu -->
        <div class="hidden md:flex items-center gap-8 text-sm font-bold text-black">
            <a href="/" class="hover:bg-yellow-300 px-3 py-1 border border-black shadow-[2px_2px_0px_black] transition">
                Home
            </a>
            <a href="/jobs" class="hover:bg-yellow-300 px-3 py-1 border border-black shadow-[2px_2px_0px_black] transition">
                Jobs
            </a>
        </div>

        <!-- Right -->
        <div class="relative">

            @auth
            <!-- DROPDOWN BUTTON -->
            <button onclick="toggleMenu()"
                class="flex items-center gap-2 text-sm font-bold text-black border-2 border-black px-3 py-1 shadow-[3px_3px_0px_black] hover:translate-x-1 hover:translate-y-1 transition bg-white">

                {{ auth()->user()->name }}

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- DROPDOWN MENU -->
            <div id="dropdownMenu"
                 class="hidden absolute right-0 mt-3 w-48 bg-white border-4 border-black shadow-[6px_6px_0px_black] py-2 text-sm">

                <a href="{{ route('profile.edit') }}"
                   class="block px-4 py-2 font-bold text-black hover:bg-yellow-300 border-b border-black">
                    Profile
                </a>

                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 font-bold text-black hover:bg-yellow-300 border-b border-black">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 font-bold text-black hover:bg-red-300">
                        Logout
                    </button>
                </form>

            </div>

            @else
                <!-- GUEST -->
                <a href="/login"
                   class="text-black font-bold border-2 border-black px-3 py-1 shadow-[3px_3px_0px_black] hover:translate-x-1 hover:translate-y-1 transition mr-3">
                    Login
                </a>

                <a href="/register"
                   class="bg-yellow-300 text-black font-bold border-2 border-black px-3 py-1 shadow-[3px_3px_0px_black] hover:translate-x-1 hover:translate-y-1 transition">
                    Daftar
                </a>
            @endauth

        </div>

    </div>
</nav>

<!-- SCRIPT DROPDOWN -->
<script>
    function toggleMenu() {
        const menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        const menu = document.getElementById('dropdownMenu');
        const button = event.target.closest('button');

        if (!event.target.closest('#dropdownMenu') && !button) {
            menu.classList.add('hidden');
        }
    });
</script>