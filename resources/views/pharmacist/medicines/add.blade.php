<x-app-dashboard-layout>

    <div class="flex justify-end">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="inline-flex text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <svg class="w-5 h-5 mb-0.5 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/>
            </svg>
            Importer CSV
        </button>
    </div>

    <div class="min-h-[calc(100vh-12rem)] content-center place-self-center">

        <h2 class="text-4xl font-bold dark:text-white mb-16">Ajouter un <span class="text-green-600 dark:text-green-500">médicament</span> au stock</h2>

        <form action="{{ route('pharmacist.medicines.search') }}" method="POST">
            @csrf
            <div class="mb-16  md:w-96">
                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code CIP (Code Identifiant de Présentation)</label>
                <input placeholder="100100100100" type="text" id="code" name="code" required class="px-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">

                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800  text-center inline-flex items-center mt-3">
                    <svg class="mr-2 w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                    Ajouter au stock
                </button>
            </div>
        </form>

    </div>

    <!-- Pop-up import menu -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden lg:ml-24 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Ajouter des <span class="text-green-600 dark:text-green-500">médicaments</span> au stock
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <!-- Modal body -->
                <form method="POST" action="{{ route('pharmacist.medicines.store') }}" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="csv_file">
                            Importer le fichier CSV
                        </label>
                        <input class="p-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400"
                            id="csv_file" name="csv_file" type="file" accept=".csv" required>
                        
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            Importer
                        </button>
                        <button type="button" data-modal-hide="default-modal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-green-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>

            <!-- Add this script to handle form submission -->
            <script>
                document.getElementById('importForm').addEventListener('submit', function(e) {
                    const fileInput = document.getElementById('csv_file');
                    if (fileInput.files.length === 0) {
                        e.preventDefault();
                        alert('Veuillez sélectionner un fichier CSV');
                    }
                });
            </script>
        </div>
    </div>


</x-app-dashboard-layout>