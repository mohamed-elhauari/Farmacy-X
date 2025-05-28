<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Farmacy-X') }}</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Boldonse&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-Outfit antialiased">

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            
            <!-- Navbar -->
            <nav class="w-full z-20 top-0 start-0 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="/" class="flex ms-2 md:me-8">
                        <img src="{{ asset('images/logo.png') }}" class="h-8 me-3" alt="Farmacy-X Logo" />
                        <span class="self-center text-xl font-boldonse font-bold sm:text-xl whitespace-nowrap text-gray-800 dark:text-white">Farmacy-X</span>
                    </a>
                    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button id="theme-toggle" type="button" class="md:mr-3 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                        </button>
                        @auth
                            <div class="flex items-center ms-3">
                                
                                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm pe-1 font-medium text-gray-700 rounded-full hover:text-green-600 dark:hover:text-green-500 md:me-0 dark:text-white" type="button">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 me-2 rounded-full" src="https://www.hunterlab.com/media/images/k8-77Tph4X3StM-unsplash-min.2e16d0ba.fill-692x346.jpg.pagespeed.ce.HbqvZu8Ter.jpg" alt="user photo">
                                    
                                    <svg class="w-2.5 h-2.5 ms-3 mt-1 text-gray-700 hover:text-green-600 dark:hover:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownAvatarName" class="p-2 z-10 w-64 hidden bg-white divide-y divide-gray-100 rounded-xl border border-gray-200 shadow-sm dark:bg-gray-700 dark:divide-gray-600 dark:border-gray-800">
                                    <div class="px-4 py-3 text-sm text-gray-700 dark:text-white">
                                        <div class="font-medium">{{ Auth::user()->name }}</div>
                                        <div class="truncate">{{ Auth::user()->email }}</div>
                                    </div>
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">

                                        @if(Auth::user()->role === 'pharmacist')
                                            <li>
                                                <a href="{{ route('dashboard.pharmacist') }}" class="block px-5 py-2.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                            </li>
                                        @elseif(Auth::user()->role === 'customer')
                                            <li>
                                                <a href="" class="block px-5 py-2.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mes médicaments</a>
                                            </li>
                                        @endif

                                    </ul>
                                    <a class="py-2" href="{{ route('logout') }}">
                                        <form method="POST" action="{{ route('logout') }}" class="flex font-medium items-center px-5 py-3 rounded-md text-sm text-green-600 dark:text-green-500 hover:bg-gray-100 dark:hover:bg-gray-600">
                                            @csrf
                                            <svg class="w-5 h-5 text-green-600 dark:text-green-500 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                                            </svg>
                                            <button type="submit">
                                                Se déconnecter
                                            </button>

                                        </form>
                                    </a>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Se connecter</a>
                        @endauth
                        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>
                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 dark:border-gray-700">
                            <li>
                                <a href="/" class="block py-2 px-3 text-white bg-green-700 rounded-sm md:bg-transparent md:text-green-700 md:p-0 md:dark:text-green-500" aria-current="page">Accueil</a>
                            </li>
                            <li>
                                <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-green-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                    Médicaments
                                    <svg class="w-2.5 h-2.5 ms-2.5 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Dropdown menu -->
                <div id="mega-menu-full-dropdown" class="hidden mt-1 bg-white border-gray-200 shadow-xs border-y dark:bg-gray-800 dark:border-gray-600">
                    <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:grid-cols-4 md:px-6">
                        @php
                            $sortedCategories = $categories->sort()->values();
                            $chunks = $sortedCategories->chunk(3);
                        @endphp
                        <ul>
                            <li>
                                <form method="GET" action="{{ route('customer.medicines.index') }}">
                                    <button type="submit" class="block w-full text-left p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <div class="font-semibold">Tous les catégories</div>
                                    </button>
                                </form>
                            </li>
                        </ul>
                        @foreach($chunks as $chunk)
                            <ul>
                                @foreach($chunk as $category)
                                    <li>
                                        <form method="GET" action="{{ route('customer.medicines.index') }}">
                                            <input type="hidden" name="category" value="{{ $category }}">
                                            <button type="submit" class="block w-full text-left p-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">
                                                <div class="font-semibold">{{ $category }}</div>
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                        
                    </div>
                </div>
            </nav>


            

            <!-- Main Content -->
            <div class="mx-auto">
                {{ $slot }}
            </div>

            
            <!-- Footer -->
            <footer class="bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <a href="/" class="flex ms-2 md:me-8">
                            <img src="{{ asset('images/logo.png') }}" class="h-8 me-3" alt="Farmacy-X Logo" />
                            <span class="self-center text-xl font-boldonse font-bold sm:text-xl whitespace-nowrap text-gray-800 dark:text-white">Farmacy-X</span>
                        </a>
                        <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">About</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline me-4 md:me-6">Médicaments</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="/" class="hover:underline">Farmacy-X™</a>. All Rights Reserved.</span>
                </div>
            </footer>



        </div>
    </body>
</html>
