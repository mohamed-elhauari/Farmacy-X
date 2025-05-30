<x-app-customer-layout>



    <div class="min-h-[calc(100vh-4rem)] flex flex-col md:flex-row items-center justify-center py-16 px-4 lg:px-12 xl:px-24 md:py-20 bg-white dark:bg-gray-900 md:gap-6 transition-all duration-300">

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
                    <b class="text-gray-600 dark:text-gray-300">Type :</b> {{ $medicine->form }} {{ $medicine->dosage }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Catégorie :</b> {{ $medicine->category }}
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Statut :</b>
                    @if($medicine->prescription_required)
                        Disponible sur ordonnance
                    @else
                        Disponible sans ordonnance
                    @endif
                </li>
                <li>
                    <b class="text-gray-600 dark:text-gray-300">Prix Public (PPV) :</b> {{ $medicine->ppv }} MAD
                </li>
            </ul>

            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
                
                <div class="relative flex items-center max-w-[8rem] mt-4">
                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input type="text" name="quantity" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="1" required />
                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
                
                <button type="submit" class="flex mt-5 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                    </svg>
                    AJOUTER AU PANIER
                </button>
            </form>
            
        </div>

    </div>

</x-app-customer-layout>