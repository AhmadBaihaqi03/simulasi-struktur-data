<nav x-data="{ open: false }" class="bg-white border-b border-slate-100 shadow-sm">
    <style>
        /* Gaya Dropdown Melayang Tanpa Garis */
        .premium-dropdown [x-show="open"] {
            margin-top: 12px !important;
            border-radius: 24px !important;
            border: none !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08) !important;
            overflow: hidden;
            padding: 0 !important;
            background: white !important;
            animation: dropdownFadeIn 0.3s ease-out;
        }

        .premium-dropdown div, 
        .premium-dropdown button:focus, 
        .premium-dropdown div:focus {
            outline: none !important;
            box-shadow: none !important;
            --tw-ring-color: transparent !important;
        }

        @keyframes dropdownFadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Indikator Aktif Dashboard */
        .nav-link-active {
            color: #4F46E5 !important;
            position: relative;
        }
        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 15px;
            height: 4px;
            background: #4F46E5;
            border-radius: 10px 10px 0 0;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <svg width="32" height="32" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="6" y="22" width="10" height="10" rx="2" fill="#4F46E5"/>
                        <rect x="24" y="8" width="10" height="10" rx="2" fill="#1E293B"/>
                        <path d="M16 27C22 27 20 13 24 13" stroke="#6366F1" stroke-width="2" stroke-linecap="round" stroke-dasharray="2 2"/>
                        <path d="M22 15L24 13L22 11" stroke="#6366F1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-xl font-bold tracking-tighter text-slate-900">
                        Vi<span class="text-indigo-600">logic</span>
                    </span>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-bold no-underline transition-colors {{ request()->routeIs('dashboard') ? 'nav-link-active' : 'text-slate-400 hover:text-slate-600' }}">
                        {{ __('Dashboard') }}
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative premium-dropdown">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-2 py-1 border-none text-sm font-bold rounded-2xl text-slate-700 bg-transparent hover:bg-slate-50 transition-all duration-200 gap-3">
                                <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 fs-5 border border-slate-200 group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-colors">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="text-start hidden md:block leading-tight">
                                    <p class="mb-0 text-[14px] font-bold text-slate-800">{{ Auth::user()->name }}</p>
                                    <p class="mb-0 text-[10px] text-indigo-500 font-bold uppercase tracking-widest">Guru</p>
                                </div>
                                <i class="bi bi-chevron-down text-slate-300" style="font-size: 10px;"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="bg-white">
                                <div class="px-5 py-4 bg-slate-50/50">
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Email Anda</p>
                                    <p class="text-sm font-bold text-slate-700 truncate mb-0">{{ Auth::user()->email }}</p>
                                </div>

                                <div class="p-2">
                                    <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-3 px-3 py-3 rounded-2xl font-bold text-slate-600 hover:bg-indigo-50 hover:text-indigo-600 border-none transition-all duration-200">
                                        <div class="w-8 h-8 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-indigo-100 group-hover:text-indigo-600 transition-colors">
                                            <i class="bi bi-person-circle"></i>
                                        </div>
                                        <span>Profil Saya</span>
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                                class="flex items-center gap-3 px-3 py-3 rounded-2xl font-bold text-red-500 hover:bg-red-50 border-none transition-all duration-200"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                            <div class="w-8 h-8 rounded-xl bg-red-50 flex items-center justify-center text-red-500">
                                                <i class="bi bi-power"></i>
                                            </div>
                                            <span>Keluar Sistem</span>
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-xl text-slate-400 hover:bg-slate-50 transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>