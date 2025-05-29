<x-app-customer-layout>

    <section class="min-h-[calc(100vh-4rem)] antialiased flex flex-col md:flex-row items-center justify-center py-16 px-4 lg:px-12 xl:px-24 md:py-32 bg-white dark:bg-gray-900 md:gap-6">

        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Panier des <span class="text-green-700 dark:text-green-600">médicaments</span> </h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

                
                
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-3xl">
                    <div class="space-y-6">

                        @if ($requiresPrescription)
                        <form method="POST" action="{{ route('order.create') }}" enctype="multipart/form-data">
                @csrf
                            <div class="flex justify-between items-center rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                <label class="text-sm font-medium text-gray-900 dark:text-white">Upload ordonnance *</label>
                                <input type="file" name="prescription" class="px-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                        <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Confirmer la commande</button>
                            
                            </div>
                            </form>
                        @endif

                        @foreach ($cart->items as $item)
                        
                            <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                    <label for="counter-input-{{ $item->id }}" class="sr-only">Choose quantity:</label>
                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <div class="flex items-center">
                                            <button type="button" id="decrement-button-{{ $item->id }}" data-input-counter-decrement="counter-input-{{ $item->id }}" class="inline-flex h-5 w-5 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" fill="none" viewBox="0 0 18 2"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/></svg>
                                            </button>
                                            <input type="text" id="counter-input-{{ $item->id }}" name="quantities[{{ $item->id }}]" class="w-10 border-0 bg-transparent text-center text-sm font-medium text-gray-900 dark:text-white focus:outline-none" value="{{ $item->quantity }}" required />
                                            <button type="button" id="increment-button-{{ $item->id }}" data-input-counter-increment="counter-input-{{ $item->id }}" class="inline-flex h-5 w-5 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" fill="none" viewBox="0 0 18 18"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/></svg>
                                            </button>
                                        </div>
                                        <div class="text-end md:order-4 md:w-32">
                                            <p class="text-base font-bold text-gray-900 dark:text-white">x {{ $item->medicine->ppv ?? '0.00' }} MAD</p>
                                        </div>
                                    </div>

                                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                        <p class="text-base font-medium text-gray-900 dark:text-white">
                                            {{ $item->medicine->commercial_name ?? 'N/A' }}, ({{ $item->medicine->dci ?? '' }}, {{ $item->medicine->laboratory ?? '' }})<br>
                                            Catégorie : <span class="font-light">{{ $item->medicine->category ?? 'Inconnue' }}</span> - {{ $item->medicine->prescription_required ? 'Sur ordonnance' : 'Sans ordonnance' }}
                                        </p>

                                        <div class="flex items-center gap-4">
                                            <form method="POST" action="">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                                    <svg class="me-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" /></svg>
                                                    Retirer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div class="min-w-64 space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Montant</p>

                        <div class="space-y-4">
                            <div class="space-y-2">

                            @foreach ($cart->items as $index => $item)
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Total article {{ $index + 1 }} </dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $item->quantity*$item->medicine->ppv }} MAD</dd>
                                </dl>
                            @endforeach
                            

                            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">{{ $totalAmount }} MAD</dd>
                            </dl>
                        </div>

                        <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Confirmer la commande</button>

                    </div>
                </div>

            </div>
        </div>

    </section>


</x-app-customer-layout>