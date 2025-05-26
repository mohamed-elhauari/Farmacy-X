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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            10010001000
                        </th>
                        <td class="px-6 py-4">
                            199
                        </td>
                        <td class="px-6 py-4">
                            50
                        </td>
                        <td class="px-6 py-4">
                            Doliprane
                        </td>
                        <td class="px-6 py-4">
                            Paracétamol
                        </td>
                        <td class="px-6 py-4">
                            Antidouleur et anti-inflammatoire
                        </td>
                        <td class="px-6 py-4">
                            Comprimé / 1000mg
                        </td>
                        <td class="px-6 py-4">
                            Non
                        </td>
                        <td class="px-6 py-4 text-left">
                            <a href="{{ route('pharmacist.medicines.show') }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Voir</a>
                            <a href="#" class="font-medium text-green-600 dark:text-green-500 hover:underline">Modifier</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

</x-app-dashboard-layout>