<section class="w-full border-b border-dashed border-sky-800 bg-sky-900 p-5">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('warehouse.png') }}" class="w-8 h-8 object-center object-cover" />
                <h1 class="text-white text-2xl font-semibold">FJBC</h1>
            </a>
            <div class="flex gap-4 text-white text-lg">
                @guest
                    <a href="{{ route('login') }}">Masuk</a>
                    <a>|</a>
                    <a href="{{ route('register') }}">Daftar</a>
                @endguest
                @auth
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('cart.index') }}" class="hidden md:flex relative">
                            <div class="text-sm absolute -right-2 -top-3 bg-rose-500 rounded-full px-2">
                                {{ Auth::user()->carts()->count() }}
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket"
                                width="32" height="32" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 10 12 4 17 10"></polyline>
                                <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                <circle cx="12" cy="15" r="2"></circle>
                            </svg>
                        </a>
                        <a href="{{ route('logout') }}"
                            class="border p-2 rounded-md hover:bg-sky-700 transition-colors duration-200 flex items-center gap-1"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                </path>
                                <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('backoffice.dashboard') }}"
                            class="hidden lg:flex border p-2 rounded-md hover:bg-sky-700 transition-colors duration-200 items-center gap-1">
                            Dashboard
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 9l3 3l-3 3"></path>
                                <line x1="13" y1="15" x2="16" y2="15"></line>
                                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                            </svg>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</section>
