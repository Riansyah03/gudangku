<div class='fixed bottom-0 w-full md:hidden border-t-4 border-sky-500 p-3 bg-sky-800'>
    <div class='container mx-auto px-4 text-white'>
        <div class='grid grid-cols-5 gap-6 justify-items-center'>
            <x-landing.mobile-nav-link url="{{ route('home') }}"
                class="{{ Route::is('home*') ? 'border-2 border-sky-500 bg-sky-800 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                </svg>
            </x-landing.mobile-nav-link>
            <x-landing.mobile-nav-link url="{{ route('category.index') }}"
                class="{{ Route::is('category*') ? 'border-2 border-sky-500 bg-sky-800 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 4h6v6h-6z"></path>
                    <path d="M4 14h6v6h-6z"></path>
                    <circle cx="17" cy="17" r="3"></circle>
                    <circle cx="7" cy="7" r="3"></circle>
                </svg>
            </x-landing.mobile-nav-link>
            <x-landing.mobile-nav-link url="{{ route('product.index') }}"
                class="{{ Route::is('product*') ? 'border-2 border-sky-500 bg-sky-800 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                    <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                    <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                </svg>
            </x-landing.mobile-nav-link>
            @guest
                <x-landing.mobile-nav-link url="{{ route('register') }}"
                    class="{{ Route::is('register') ? 'border-2 border-sky-500 bg-sky-800 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 11h6m-3 -3v6"></path>
                    </svg>
                </x-landing.mobile-nav-link>
                <x-landing.mobile-nav-link url="{{ route('login') }}"
                    class="{{ Route::is('login') ? 'border-2 border-sky-500 bg-sky-800 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        <path d="M16 11l2 2l4 -4"></path>
                    </svg>
                </x-landing.mobile-nav-link>
            @endguest
            @auth
                <x-landing.mobile-nav-link url="{{ route('backoffice.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 9l3 3l-3 3"></path>
                        <line x1="13" y1="15" x2="16" y2="15"></line>
                        <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                    </svg>
                </x-landing.mobile-nav-link>
                <x-landing.mobile-nav-link url="{{ route('cart.index') }}"
                    class="{{ Route::is('cart*') ? 'border-2 border-sky-500 bg-sky-800 text-white relative' : 'relative' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="7 10 12 4 17 10"></polyline>
                        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                        <circle cx="12" cy="15" r="2"></circle>
                    </svg>
                    <div
                        class="text-sm absolute -right-2 -top-1 bg-rose-500 rounded-full px-2 group-hover:bg-rose-700 font-mono">
                        {{ Auth::user()->carts()->count() }}
                    </div>
                </x-landing.mobile-nav-link>
            @endauth
        </div>
    </div>
</div>