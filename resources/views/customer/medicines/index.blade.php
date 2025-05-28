<x-app-customer-layout>

    <div class="place-items-center px-6 xl:px-24 py-10 sm:py-14 bg-white md:py-24 dark:bg-gray-900">
        
        <h3 class="text-3xl font-bold dark:text-white mb-8 md:mb-12">Commander un <span class="text-green-600 dark:text-green-500">médicament</span></h3>

        <!-- Filter & Sorts -->

        <form method="GET" action="{{ route('customer.medicines.index') }}" class="mb-8 flex flex-wrap gap-4 justify-self-start xl:ml-7">
            <!-- Filter by Category -->
            <select name="category" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" 
                        {{ request('category') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>

            <!-- Filter by Prescription -->
            <select name="prescription" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="">Toutes</option>
                <option value="true" {{ request('prescription') == 'true' ? 'selected' : '' }}>
                    Avec ordonnance
                </option>
                <option value="false" {{ request('prescription') == 'false' ? 'selected' : '' }}>
                    Sans ordonnance
                </option>
            </select>

            <!-- Sort Options -->
            <select name="sort" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="name" {{ request('sort', 'name') == 'name' ? 'selected' : '' }}>
                    Trier par nom
                </option>
                <option value="quantity" {{ request('sort') == 'quantity' ? 'selected' : '' }}>
                    Trier par quantité
                </option>
            </select>

            <select name="direction" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="asc" {{ request('direction', 'asc') == 'asc' ? 'selected' : '' }}>
                    Ascendant
                </option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>
                    Descendant
                </option>
            </select>

            <button type="submit" class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 transition-colors">Appliquer</button>
            <a href="{{ route('customer.medicines.index') }}" class="px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">Réinitialiser</a>
        </form>

        <!-- Medicines grid -->
        <div class="max-w-screen-xl grid grid-cols-1 sm:place-items-start sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-4">

            @forelse ($medicines as $medicine)
                <div class="w-full bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
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
        </div>
        <!-- Pagination -->
        <div class="my-2 mx-4 mt-10">
            {{ $medicines->links() }}
        </div>
    </div>

</x-app-customer-layout>