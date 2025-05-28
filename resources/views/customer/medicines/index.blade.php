<x-app-customer-layout>

    <div class="place-items-center px-6 xl:px-24 py-10 sm:py-14 bg-white md:py-24 dark:bg-gray-900">
        
        <h3 class="text-3xl font-bold dark:text-white mb-8 md:mb-12 underline underline-offset-4">Médicaments</h3>

        <!-- Filter & Sorts -->
        <div class="flex items-center justify-start py-4 md:py-8 flex-wrap">
            <button type="button" class="text-green-700 hover:text-white border border-green-600 bg-white hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-500 dark:bg-gray-900 dark:focus:ring-green-800">All categories</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Shoes</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Bags</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Electronics</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
            <button type="button" class="text-gray-900 border border-gray-200 hover:border-gray-300 dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800">Gaming</button>
        </div>

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