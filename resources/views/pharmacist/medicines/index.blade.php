<x-app-dashboard-layout>

    <div class="min-h-[calc(100vh-8rem)]">

        
        <h2 class="text-4xl font-bold dark:text-white mb-8 mt-12">Liste des <span class="text-green-700 dark:text-green-600">médicaments</span></h2>


        

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
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