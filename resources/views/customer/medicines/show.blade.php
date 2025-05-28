<x-app-customer-layout>



    <div class="min-h-[calc(100vh-4rem)] flex flex-col md:flex-row items-center justify-center py-16 px-4 lg:px-12 xl:px-24 md:py-32 bg-white dark:bg-gray-900 md:gap-6 transition-all duration-300">

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
                <input type="number" name="quantity" value="1" min="1">
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