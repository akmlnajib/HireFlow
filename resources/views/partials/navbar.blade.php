<nav class="w-full border-b bg-white">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" class="text-lg font-semibold tracking-tight">
            HireFlow
        </a>

        <!-- Menu -->
        <div class="hidden md:flex items-center gap-8 text-sm text-gray-600">
            <a href="/" class="hover:text-black">Home</a>
            <a href="/jobs" class="hover:text-black">Jobs</a>
        </div>

        <!-- Right -->
        <div class="relative">

            @auth
            <!-- DROPDOWN BUTTON -->
            <button onclick="toggleMenu()" class="flex items-center gap-2 text-sm text-gray-600 hover:text-black">
                {{ auth()->user()->name }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- DROPDOWN MENU -->
            <div id="dropdownMenu"
                 class="hidden absolute right-0 mt-2 w-40 bg-white border rounded-md shadow-sm py-2 text-sm">

                <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">
                    Profile
                </a>

                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-black">
                        Logout
                    </button>
                </form>

            </div>

            @else
                <!-- GUEST -->
                <a href="/login" class="text-gray-600 hover:text-black mr-4">
                    Login
                </a>

                <a href="/register"
                   class="border px-4 py-1.5 rounded-md hover:bg-gray-100 transition">
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

    // klik luar untuk close
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('dropdownMenu');
        const button = event.target.closest('button');

        if (!event.target.closest('#dropdownMenu') && !button) {
            menu.classList.add('hidden');
        }
    });
</script>