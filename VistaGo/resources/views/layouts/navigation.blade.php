<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-[100]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex">
                <div class="shrink-0 flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="VistaGo Logo" class="w-8 h-8 object-contain">
                    <a href="/" class="text-2xl font-black tracking-tight text-slate-900">VistaGo</a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('explore')" :active="request()->routeIs('explore')">
                        {{ __('Explore Catalog') }}
                    </x-nav-link>

                    @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(Auth::user()->role === 'admin')
                    <x-nav-link :href="route('destinations.index')" :active="request()->routeIs('destinations.*')">
                        {{ __('Destinations') }}
                    </x-nav-link>
                    <x-nav-link :href="route('guides.index')" :active="request()->routeIs('guides.*')">
                        {{ __('Tour Guides') }}
                    </x-nav-link>
                    <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')">
                        {{ __('Manage Bookings') }}
                    </x-nav-link>
                    @else
                    <x-nav-link :href="route('tour_guides.index')" :active="request()->routeIs('tour_guides.index')">
                        {{ __('Tour Guides') }}
                    </x-nav-link>
                    <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')">
                        {{ __('My Bookings') }}
                    </x-nav-link>
                    @endif
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-gray-700 bg-white hover:text-indigo-600 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile Settings') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 font-medium transition mr-4">Log in</a>
                <a href="{{ route('register') }}" class="bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-800 font-medium transition shadow-sm text-sm">Sign Up</a>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('explore')" :active="request()->routeIs('explore')">
                {{ __('Explore Catalog') }}
            </x-responsive-nav-link>
            @auth
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(Auth::user()->role === 'admin')
            <x-responsive-nav-link :href="route('destinations.index')" :active="request()->routeIs('destinations.*')">
                {{ __('Destinations') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('guides.index')" :active="request()->routeIs('guides.*')">
                {{ __('Tour Guides') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')">
                {{ __('Manage Bookings') }}
            </x-responsive-nav-link>
            @else
            <x-responsive-nav-link :href="route('tour_guides.index')" :active="request()->routeIs('tour_guides.index')">
                {{ __('Tour Guides') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.*')">
                {{ __('My Bookings') }}
            </x-responsive-nav-link>
            @endif
            @endauth
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Log In') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Sign Up') }}
                </x-responsive-nav-link>
            </div>
            @endauth
        </div>
    </div>
</nav>