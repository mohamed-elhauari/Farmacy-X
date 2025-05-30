<x-app-dashboard-layout>

    <div class="flex flex-col md:flex-row items-center justify-center py-12 px-4 lg:px-12 xl:px-24 bg-gray-100 dark:bg-gray-900 md:gap-6">

        <div class="grid grid-cols-2 gap-2 max-w-lg">
            <div>
                <img class="h-auto max-w-full rounded-lg border" src="{{ $medicine->image_url }} " alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg border" src="{{ $medicine->image_url }} " alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg border" src="{{ $medicine->image_url }} " alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg border" src="{{ $medicine->image_url }} " alt="">
            </div>
        </div>

        <div class="w-full sm:w-[512px]">

            <h1 class="mb-4 mt-8 md:mt-2 text-start text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">{{ $medicine->commercial_name }},<span class="text-green-600 dark:text-green-500"> ({{ $medicine->dci }} - {{ $medicine->laboratory }})</span></h1>

            <ul class="max-w-md space-y-1 text-gray-500 list-none list-inside dark:text-gray-400">
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Code :</b> {{ $medicine->code }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Forme :</b> {{ $medicine->form }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Dosage :</b> {{ $medicine->dosage }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Catégorie :</b> {{ $medicine->category }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Statut :</b> Disponible {{ $medicine->prescription_required ? 'avec ordonnance' : 'sans ordonnance' }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Prix Public (PPV) :</b> {{ $medicine->ppv }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Seuil :</b> {{ $medicine->reorder_threshold }} pièces
                </li>
            </ul>

        </div>

    </div>

    <div class=" pb-12 pt-6 px-4 lg:px-12 xl:px-24 ">
        
        <form method="POST" action="{{ route('pharmacist.medicines.store-medicine') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
                <div>
                    <label for="lot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nº lot</label>
                    <input name="lot" type="text" id="lot" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="lot-99" required />
                </div>
                <div>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité (pièce)</label>
                    <input name="quantity" type="number" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="0" required />
                </div>
                <div class="md:col-span-2">
                    <label for="purchase_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix d'achat (MAD)</label>
                    <input name="purchase_price" step="0.01" type="number" id="purchase_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="19.5" required />
                </div>  
                <div>
                    <label for="expiration_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date éxpiration</label>
                    <input name="expiration_date" type="date" id="expiration_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="2028-01-31" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
                </div>
                <div>
                    <label for="dco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DCO (Consérvation après Ouverture)</label>
                    <input name="dco" type="text" id="dco" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="6 mois" required />
                </div>
                <button type="submit" class="md:col-span-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Ajouter au stock</button>
            </div>
        </form>

    </div>



</x-app-dashboard-layout>