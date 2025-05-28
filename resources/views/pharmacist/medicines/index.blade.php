<x-app-dashboard-layout>

    <div class="min-h-[calc(100vh-8rem)]">

        
        <h2 class="text-4xl font-bold dark:text-white mb-8 mt-12">Liste des <span class="text-green-700 dark:text-green-600">médicaments</span></h2>


        <form method="GET" action="{{ route('pharmacist.medicines.index') }}" class="mb-8 flex flex-wrap gap-4 items-center">
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
            <a href="{{ route('pharmacist.medicines.index') }}" class="px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">Réinitialiser</a>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantité
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Seuil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nom commercial
                        </th>
                        <th scope="col" class="px-6 py-3">
                            CDI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Catégorie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Forme / Dosage
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ordonnance
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Voir</span>
                            <span class="sr-only">Modifier</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $medicine)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $medicine->code }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $medicine->quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $medicine->reorder_threshold }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $medicine->commercial_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $medicine->dci }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $medicine->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $medicine->form }} / {{ $medicine->dosage }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $medicine->prescription_required ? 'Oui' : 'Non' }}
                            </td>
                            <td class="px-6 py-4 text-left">
                                <a href="{{ route('pharmacist.medicines.addd-infos', $medicine->code) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Voir</a>
                                <a href="" class="font-medium text-green-600 dark:text-green-500 hover:underline">Modifier</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                Aucun médicament trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="my-2 mx-4">
                {{ $medicines->links() }}
            </div>
        </div>


    </div>

</x-app-dashboard-layout>