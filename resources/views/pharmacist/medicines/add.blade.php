<x-app-dashboard-layout>

    <div class="min-h-[calc(100vh-8rem)] content-center place-self-center">

        
        <h2 class="text-4xl font-bold dark:text-white mb-16">Ajouter un <span class="text-green-700 hover:text-green-800">médicament</span> au stock</h2>


        <div class="mb-16  md:w-96">
            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code CIP (Code Identifiant de Présentation)</label>
            <input placeholder="100100100100" type="text" id="default-input" class="px-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800  text-center inline-flex items-center mt-3">
                <svg class="mr-2 w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                </svg>
            Ajouter médicament
            </button>

        </div>

    </div>

</x-app-dashboard-layout>