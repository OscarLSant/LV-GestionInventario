<nav x-data="{ open: false }" class="border-b border-gray-100 bg-black">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-black">
        <div class="flex justify-between h-16">
            <div class="flex" >
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    
                <img class="logo-img" src="https://dewey.tailorbrands.com/production/brand_version_mockup_image/990/8452403990_3018ec8e-61f5-40ee-905f-41c112b3d8a2.png?cb=1688612061" alt="" role="none" width="50%" height="50%">
                    
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                    class=" text-red-100 hover:text-red-300 focus:outline-none transition ease-in-out duration-150">
                    
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

<<<<<<< HEAD
                @can('usuarios')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">
                            {{ __('Gestión de usuarios') }}
                        </x-nav-link>
                    </div>
                @endcan
                
                @can('clientes')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                            {{ __('Gestión de Clientes') }}
                        </x-nav-link>
                    </div>
                @endcan
                

                @can('proveedores')
                <div class="hidden sm:flex sm:items-center sm:ml-6">
=======
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" 
                    class=" text-red-100 hover:text-red-300 focus:outline-none transition ease-in-out duration-150">
                        {{ __('Gestión de usuarios') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')"
                    class=" text-red-100 hover:text-red-300 focus:outline-none transition ease-in-out duration-150">
                        {{ __('Clientes') }}
                    </x-nav-link>
                </div>


                <div class="hidden sm:flex sm:items-center sm:ml-6" >
>>>>>>> cf54dfab821726d2a147761f51cb00567ddff43d
                    <x-dropdown width="48">
                        <x-slot name="trigger">
                            <button
                            class="inline-flex items-center px-3 py-2  text-sm leading-4 font-medium rounded-md text-yellow-100 bg-black hover:text-yellow-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ __('Gestión de Productos') }}</div>
                            </button>
                        </x-slot>
<<<<<<< HEAD
    
                        
                        <x-slot name="content">
                            @can('categorias')
                                <x-dropdown-link :href="route('categorias.index')">
                                    {{ __('Categorías') }}
                                </x-dropdown-link>
                            @endcan
    
                            @can('productos')
                                <x-dropdown-link :href="route('productos.index')">
                                    {{ __('Productos') }}
                                </x-dropdown-link>
                            @endcan
                            
                            @can('proveedores')
                                <x-dropdown-link :href="route('proveedores.index')">
                                    {{ __('Proveedores') }}
                                </x-dropdown-link>
                            @endcan
                            
=======

                        <x-slot name="content">
                            <x-dropdown-link :href="route('categorias.index')"
                            class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                                {{ __('Categorías') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('productos.index')"
                            class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                                {{ __('Productos') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('proveedores.index')"
                            class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                                {{ __('Proveedores') }}
                            </x-dropdown-link>
>>>>>>> cf54dfab821726d2a147761f51cb00567ddff43d
                        </x-slot>
                    </x-dropdown>
                </div>
                @endcan

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2  text-sm leading-4 font-medium rounded-md text-yellow-100 bg-black hover:text-yellow-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ __('Gestión de Existencias') }}</div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
<<<<<<< HEAD
                            @can('stocks')
                                <x-dropdown-link :href="route('stocks.index')">
                                    {{ __('Stocks') }}
                                </x-dropdown-link>
                            @endcan
                            
                            @can('ventas')
                                <x-dropdown-link :href="route('ventas.index')">
                                    {{ __('Ventas') }}
                                </x-dropdown-link>
                            @endcan
                            
                            @can('venta_stocks')
                                <x-dropdown-link :href="route('venta_stocks.index')">
                                    {{ __('Ventas/Stocks') }}
                                </x-dropdown-link>
                            @endcan
                            
=======
                            <x-dropdown-link :href="route('stocks.index')"
                            class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                                {{ __('Stocks') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('ventas.index')"
                            class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                                {{ __('Ventas') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('venta_stocks.index')"
                            class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                                {{ __('Ventas/Stocks') }}
                            </x-dropdown-link>
>>>>>>> cf54dfab821726d2a147761f51cb00567ddff43d

                        </x-slot>
                    </x-dropdown>
                </div>



            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6" >
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                        class="inline-flex items-center px-3 py-2  text-sm leading-4 font-medium rounded-md text-yellow-100 bg-black hover:text-yellow-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')"
                        class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                class=" text-yellow-800 hover:text-yellow-500 focus:outline-none transition ease-in-out duration-150">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden" >
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" >
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        @can('usuarios')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">
                    {{ __('Gestión de usuarios') }}
                </x-responsive-nav-link>
            </div>
        @endcan
        
        @can('clientes')
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('clientes.index')" :active="request()->routeIs('clientes.index')">
                    {{ __('Gestión de Clientes') }}
                </x-responsive-nav-link>
            </div>
        @endcan
        
        @can('categorias')
            <div class="pt-2 pb-3 space-y-1">
                <x-dropdown-link :href="route('categorias.index')">
                    {{ __('Categorías') }}
                </x-dropdown-link>
            </div>
        @endcan
        
        @can('productos')
            <div class="pt-2 pb-3 space-y-1">
                <x-dropdown-link :href="route('productos.index')">
                    {{ __('Productos') }}
                </x-dropdown-link>
            </div>
        @endcan
        
        @can('proveedores')
            <div class="pt-2 pb-3 space-y-1">
                <x-dropdown-link :href="route('proveedores.index')">
                    {{ __('Proveedores') }}
                </x-dropdown-link>
            </div>
        @endcan
        
        @can('stocks')
            <div class="pt-2 pb-3 space-y-1">
                <x-dropdown-link :href="route('stocks.index')">
                    {{ __('Stocks') }}
                </x-dropdown-link>
            </div>
        @endcan
        
        @can('ventas')
            <div class="pt-2 pb-3 space-y-1">
                <x-dropdown-link :href="route('ventas.index')">
                    {{ __('Ventas') }}
                </x-dropdown-link>
            </div>
        @endcan
        
        @can('venta_stocks')
            <div class="pt-2 pb-3 space-y-1">
                <x-dropdown-link :href="route('venta_stocks.index')">
                    {{ __('Ventas/Stocks') }}
                </x-dropdown-link>
            </div>
        @endcan
        

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200" >
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>