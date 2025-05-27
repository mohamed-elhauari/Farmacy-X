<x-app-dashboard-layout>

    <div class="flex flex-col md:flex-row items-center justify-center py-12 px-4 lg:px-12 xl:px-24 bg-gray-100 dark:bg-gray-900 md:gap-6 transition-all duration-300">

        <div class="grid grid-cols-2 gap-2 max-w-lg">
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
        </div>

        <div class="w-full sm:w-[512px]">

            <h1 class="mb-4 mt-8 md:mt-2 text-start text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Doliprane,<span class="text-green-600 dark:text-green-500"> (Paracétamol - SANOFI)</span></h1>

            <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Code :</b> 1001001001
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Forme :</b> Comprimé
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Dosage :</b> 1000mg
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Catégorie :</b> Antidouleur et anti-inflammatoire
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Statut :</b> Disponible sans ordonnance
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Prix Public (PPV) :</b> 15.50 MAD
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Seuil :</b> 50 pièces
                </li>
            </ul>

        </div>

    </div>



    <div class="pb-12 pt-6 px-4 lg:px-12 xl:px-24">

        <button type="button" class="w-full max-w-64 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-4 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800  text-center inline-flex items-center mt-3">
            <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>
            <a href="{{ route('pharmacist.medicines.add-infos') }}">Ajouter médicament</a>
        </button>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nº lot
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantité
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix d'achat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date récéption
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date expiration
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            lot-99
                        </th>
                        <td class="px-6 py-4">
                            200
                        </td>
                        <td class="px-6 py-4">
                            15.2 MAD
                        </td>
                        <td class="px-6 py-4">
                            21-05-2025
                        </td>
                        <td class="px-6 py-4">
                            30-12-2026
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            lot-99
                        </th>
                        <td class="px-6 py-4">
                            200
                        </td>
                        <td class="px-6 py-4">
                            15.2 MAD
                        </td>
                        <td class="px-6 py-4">
                            21-05-2025
                        </td>
                        <td class="px-6 py-4">
                            30-12-2026
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



</x-app-dashboard-layout>