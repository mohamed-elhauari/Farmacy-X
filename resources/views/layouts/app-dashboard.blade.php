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
            <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-4 py-4 lg:px-5 lg:pl-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start rtl:justify-end">
                            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                                <span class="sr-only">Open sidebar</span>
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                                </svg>
                            </button>
                            <a href="/" class="flex ms-2 md:me-24">
                                <img src="{{ asset('images/logo.png') }}" class="h-8 me-3" alt="Farmacy-X Logo" />
                                <span class="self-center text-xl font-boldonse font-bold sm:text-xl whitespace-nowrap text-gray-800 dark:text-white">Farmacy-X</span>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-sm p-2.5">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button>
                            <div class="flex items-center ms-3">
                                
                                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm pe-1 font-medium text-gray-700 rounded-full hover:text-green-600 dark:hover:text-green-500 md:me-0 dark:text-white" type="button">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 me-2 rounded-full" src="https://www.hunterlab.com/media/images/k8-77Tph4X3StM-unsplash-min.2e16d0ba.fill-692x346.jpg.pagespeed.ce.HbqvZu8Ter.jpg" alt="user photo">
                                    {{ Auth::user()->name }}
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
                                        <li>
                                            <a href="#" class="block px-5 py-2.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-5 py-2.5 rounded-md hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paramètres</a>
                                        </li>
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
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Sidebar -->
            <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-72 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 lg:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
                <div class="h-full px-5 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                    <ul class="space-y-4 font-medium text-sm">
                        <li class="mt-5">
                            <a href="{{ route('dashboard.pharmacist') }}" class="flex items-center p-3 text-gray-700 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"/>
                                </svg>
                                <span class="ms-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                        </li>
                        <li>
                            <button type="button" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-cmd" data-collapse-toggle="dropdown-cmd">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                                </svg>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Commandes</span>
                                <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <ul id="dropdown-cmd" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Liste des commandes</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Commandes en attente</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Commandes validées</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-mdc" data-collapse-toggle="dropdown-mdc">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9V6c0-.55228.44772-1 1-1h16c.5523 0 1 .44771 1 1v3M3 9v9c0 .5523.44772 1 1 1h16c.5523 0 1-.4477 1-1V9M3 9h18M8 9V5m4 4V5m4 4V5m-6 9h2m0 0h2m-2 0v-2m0 2v2"/>
                                </svg>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Médicaments</span>
                                <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <ul id="dropdown-mdc" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="{{ route('pharmacist.medicines.index') }}" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Liste des médicaments</a>
                                </li>
                                <li>
                                    <a href="{{ route('pharmacist.medicines.add-new') }}" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Ajouter un médicament</a>
                                </li>
                                <li>
                                    <a href="{{ route('pharmacist.medicines.add') }}" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Ajouter au stock</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mdc. en stock faible</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mdc. proches de péremption</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mdc. expirés</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-reports" data-collapse-toggle="dropdown-reports">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-700 dark:text-gray-400 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                                </svg>
                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Rapports</span>
                                <svg class="w-3 h-3 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <ul id="dropdown-reports" class="hidden py-2 space-y-2">
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Rapport de ventes</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center w-full p-3 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Rapport de stock</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="p-6 pt-24 lg:ml-72">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
