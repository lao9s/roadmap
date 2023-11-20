<header class="sticky top-0 z-10 w-full bg-dark-primary shadow text-white"
        x-data="{ open: false }">
    <div class="container px-4 mx-auto sm:px-6 md:px-8">
        <nav class="flex items-center justify-between py-4">
            <div class="flex items-center">
                <div class="mr-8">
                    <a class="text-2xl font-semibold tracking-tight"
                       href="{{ route('home') }}">
                        @if(!is_null($logo) && file_exists($logoFile = storage_path('app/public/'.$logo)))
                            <img src="{{ asset('storage/'.$logo) }}?v={{ md5_file($logoFile) }}" alt="{{ config('app.name') }}" class="h-12"/>
                        @else
                            {{ config('app.name') }}
                        @endif
                    </a>
                </div>

                <div class="hidden lg:flex space-x-4 relative z-10 pt-0 left-0 flex-row items-center">
                    <a href="{{ route('home') }}" class="font-bold transition-colors ease-in-out duration-200 {{ !request()->is('/') ? 'text-gray-400 hover:text-white' : 'text-white hover:text-white'  }}">{{ trans('general.dashboard') }}</a>

                    @if($roadmap_project_url = app(App\Settings\GeneralSettings::class)->roadmap_project_url)
                        <a href="/{{ $roadmap_project_url }}" class="font-bold transition-colors ease-in-out duration-200 {{ !request()->is($roadmap_project_url) ? 'text-gray-400 hover:text-white' : 'text-white'  }}">{{ trans('general.roadmap') }}</a>
                    @endif
                </div>
            </div>

            <ul class="items-center hidden space-x-3 text-sm font-medium text-gray-600 lg:flex">
                @if(app(App\Settings\GeneralSettings::class)->show_app_home_in_header)
                <li>
                    <a class="flex items-center font-bold transition-colors ease-in-out duration-200 text-gray-400 hover:text-white"
                       href=" {{ app(App\Settings\GeneralSettings::class)->app_home_url }}">
                        <x-icons.arrow-top-right class="mr-2"/>
                       {{ app(App\Settings\GeneralSettings::class)->app_home_name }}
                    </a>
                </li>
                @endif

                @guest
                    <li>
                        <x-button-secondary type="a" href="{{ route('login') }}">
                            <x-icons.user-circle class="xl:mr-2"/>
                            <span class="hidden xl:block">Log In</span>
                        </x-button-secondary>
                    </li>
                @endguest

                @auth
                    @if(auth()->user()->hasAdminAccess())
                        <li>
                            <a class="flex items-center justify-center w-10 h-10 text-red-500 transition rounded-full hover:bg-gray-500/5 focus:bg-blue-500/10 focus:outline-none"
                               href="{{ route('filament.pages.dashboard') }}">
                                <x-heroicon-o-cog class="w-7 h-7 text-white"/>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('profile') }}">
                            <div class="relative w-7 h-7 rounded-full">
                                <div class="absolute inset-0 bg-gray-200 rounded-full animate-pulse"></div>

                                <img class="absolute inset-0 object-cover rounded-full"
                                     src="{{ auth()->user()->getGravatar() }}"
                                     alt="{{ auth()->user()->name }}">
                            </div>
                        </a>
                    </li>
                @endauth

                <li>
                    <x-button color="secondary" onclick="Livewire.emit('openModal', 'modals.item.create-item-modal')">
                        <x-icons.plus class="xl:mr-2"/>
                        {{ trans('feature-requests.submit-feature-request') }}
                    </x-button>
                </li>
            </ul>

            <!-- Hamburger -->
            <div class="lg:hidden">
                <button
                    class="text-white flex items-center justify-center w-10 h-10 -mr-2 transition rounded-full focus:outline-none"
                    x-on:click="open = !open"
                    type="button">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4.75 5.75H19.25"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4.75 18.25H19.25"/>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4.75 12H19.25"/>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Mobile menu -->
        <nav class="-mx-2 lg:hidden pb-2"
             x-show="open"
             x-cloak>
            <div class="border-t border-brand-400"></div>

            <ul class="flex flex-col py-2 space-y-1 text-sm font-medium text-white">
                <li>
                    <a class="block p-2 transition rounded-lg focus:outline-none hover:bg-brand-500-400"
                       href="{{ route('home') }}">
                        {{ trans('general.dashboard') }}
                    </a>
                </li>

                <li>

                    @if($roadmap_project_url = app(App\Settings\GeneralSettings::class)->roadmap_project_url)
                        <a class="block p-2 transition rounded-lg focus:outline-none hover:bg-brand-500-400"
                           href="/{{ $roadmap_project_url }}">
                            {{ trans('general.roadmap') }}
                        </a>
                    @endif
                </li>

                @auth
                    <li>
                        <a class="block p-2 transition rounded-lg focus:outline-none hover:bg-brand-500-400"
                           href="{{ route('my') }}">
                            {{ trans('feature-requests.my-feature-requests') }}
                        </a>
                    </li>
                @endauth

                <li>
                    <a class="block p-2 transition rounded-lg focus:outline-none hover:bg-brand-500-400"
                       href="{{ route('profile') }}">
                        {{ trans('auth.profile') }}
                    </a>
                </li>

                <li>
                    <x-button onclick="Livewire.emit('openModal', 'modals.item.create-item-modal')">
                        {{ trans('feature-requests.submit-feature-request') }}
                    </x-button>
                </li>
            </ul>
        </nav>
    </div>
</header>
