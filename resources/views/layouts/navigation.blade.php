<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <img src="{{ asset('logo.png') }}" class="h-8 w-auto" alt="Logo">
                        <span class="font-black text-lg tracking-tighter text-gray-900">DigitalAPP</span>
                    </a>
                </div>

                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-xs font-bold uppercase tracking-widest">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('autorizar.index')" :active="request()->routeIs('autorizar.*')" class="text-xs font-bold uppercase tracking-widest">
                        {{ __('Acessos') }}
                    </x-nav-link>

                    <x-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.*')" class="text-xs font-bold uppercase tracking-widest">
                        {{ __('Clientes') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">
                
                <x-dropdown align="right" width="80">
                    <x-slot name="trigger">
                        <button class="relative p-2 text-gray-400 hover:text-black hover:bg-gray-50 rounded-xl transition-all duration-300 focus:outline-none group">
                            <svg class="h-6 w-6 transform group-hover:rotate-12 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                            
                            <span class="absolute top-2 right-2 flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-red-600"></span>
                            </span>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-100 bg-gray-50/50">
                            <h3 class="text-[10px] font-black uppercase tracking-[0.15em] text-gray-400">
                                Centro de Alertas
                            </h3>
                        </div>
                        
                        <div class="max-h-64 overflow-y-auto">
                            <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50 group">
                                <div class="flex justify-between items-start">
                                    <p class="text-[11px] font-bold text-gray-900 uppercase tracking-tight group-hover:text-indigo-600 transition-colors">Novo Registro</p>
                                    <span class="text-[9px] text-gray-300 font-bold uppercase">5m</span>
                                </div>
                                <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">Tech Solutions finalizou o cadastro.</p>
                            </a>

                            <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50 group">
                                <div class="flex justify-between items-start">
                                    <p class="text-[11px] font-bold text-gray-900 uppercase tracking-tight group-hover:text-indigo-600 transition-colors">Segurança</p>
                                    <span class="text-[9px] text-gray-300 font-bold uppercase">1h</span>
                                </div>
                                <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">Backup Firestore concluído.</p>
                            </a>
                        </div>

                        <a href="#" class="block text-center py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 hover:text-black border-t border-gray-100 bg-gray-50/50 transition-colors">
                            Ver tudo
                        </a>
                    </x-slot>
                </x-dropdown>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-xs font-black uppercase tracking-widest text-gray-500 bg-gray-50 rounded-xl hover:text-black transition duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ms-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Perfil') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-bold">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>