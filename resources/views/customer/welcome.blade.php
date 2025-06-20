<x-app-customer-layout>

    <!-- Fast Se -->
    <section class="bg-gray-100 dark:bg-gray-900 py-8 px-4 mx-auto max-w-screen-xl min-h-[calc(100vh-4rem)] text-center lg:py-16 content-center">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Commandez vos médicaments en ligne</h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Retrouvez tous vos traitements et produits de pharmacie, réservez en quelques clics, et retirez-les en pharmacie ou faites-vous livrer à domicile.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            
            <form method="GET" action="{{ route('customer.medicines.index') }}" class="w-full sm:w-[500px] mx-auto mb-16">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Paracétamol, Ibuprofène, Amoxicilline..." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Rechercher</button>
                </div>
            </form>

        </div>
    </section>

    <!-- Mission -->
    <div class="flex flex-col md:flex-row items-center justify-center py-16 px-4 md:px-48 md:py-32 lg:px-56 xl:px-72 2xl:px-96 bg-white dark:bg-gray-800 md:gap-6 lg:gap-16 transition-all duration-300">
        <div class="flex-shrink-0 flex justify-center md:justify-center w-full md:w-auto mb-4 md:mb-0">
            <img src="{{ asset('images/logo.png') }}" class="h-36 w-36 object-contain mx-auto" alt="Farmacy-X Logo" />
        </div>
        <div class="flex flex-col items-center md:items-start text-center md:text-left w-full md:w-auto">
            <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 lg:text-4xl dark:text-white">Chez Farmacy-X,</h1>
            <p class="text-md font-normal text-gray-500 lg:text-lg dark:text-gray-400">Notre mission est de simplifier l’accès aux médicaments tout en garantissant sécurité, transparence et efficacité pour tous.</p>
        </div>
    </div>

    <!-- Statistics -->
    <div class="p-4 bg-gray-100 md:p-16 dark:bg-gray-900">
        <dl class="grid max-w-screen-xl grid-cols-1 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white sm:p-8">
            <div class="flex flex-col items-center">
                <dt class="mb-2 text-3xl font-extrabold">50K+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Commandes Traitées</dd>
            </div>
            <div class="flex flex-col items-center">
                <dt class="mb-2 text-3xl font-extrabold">150+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Pharmacies Partenaires</dd>
            </div>
            <div class="flex flex-col items-center">
                <dt class="mb-2 text-3xl font-extrabold">90%</dt>
                <dd class="text-gray-500 dark:text-gray-400">Médicaments Disponibles</dd>
            </div>
        </dl>
    </div>

    <!-- Popular medicines -->
    <div class="place-items-center px-6 py-10 sm:py-14 bg-white md:py-24 dark:bg-gray-800">
        
        <h3 class="text-3xl font-bold dark:text-white mb-8 md:mb-12">Médicaments <span class="text-green-600 dark:text-green-500"> populaires </span></h3>

        <div class="grid grid-cols-1 md:grid-cols-2 sm:place-items-start lg:grid-cols-3 gap-8">
            
            @forelse ($medicines as $medicine)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('customer.medicines.show', $medicine->id) }}">
                        <img class="rounded-t-lg" src="{{ $medicine->image_url ?? 'https://farmaciaherrera.com.mx/cdn/shop/files/7503004908691_a7cc7ac7-82e6-4e4a-9e90-cbd53f3e498b.jpg?v=1726159948' }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="{{ route('customer.medicines.show', $medicine->id) }}">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $medicine->commercial_name }}, ({{ $medicine->dci }} - {{ $medicine->laboratory }})
                            </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $medicine->form }} {{ $medicine->dosage }}<br>
                            Catégorie : {{ $medicine->category }}<br>
                            {{ $medicine->prescription_required ? 'Avec ordonnance' : 'Sans ordonnance' }}<br>
                            Prix : {{ $medicine->ppv }} MAD
                        </p>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 dark:text-gray-300">Aucun médicament disponible pour le moment.</p>
            @endforelse
            
            <a href="{{ route('customer.medicines.index') }}" class="text-center md:col-span-2 lg:col-span-3 w-full mt-4 py-2.5 px-6 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:border-green-200 hover:text-green-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-green-600 hover:dark:border-green-800">Voir tous les médicaments</a>

        </div>





    </div>


</x-app-customer-layout>
