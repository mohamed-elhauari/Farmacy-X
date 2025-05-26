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

    <div class=" pb-12 pt-6 px-4 lg:px-12 xl:px-24 ">
        
        <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nº lot</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="lot-99" required />
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité (pièce)</label>
                <input type="number" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="0" required />
            </div>
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix d'achat (MAD)</label>
                <input type="text" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="19.5" required />
            </div>  
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date éxpiration</label>
                <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="2028-01-31" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
            </div>
            <button type="submit" class="md:col-span-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ajouter au stock</button>
        </form>

    </div>



</x-app-dashboard-layout>