<x-app-dashboard-layout>

    <div class="min-h-[calc(100vh-12rem)]">

        
        <h2 class="text-4xl font-bold dark:text-white mb-8 mt-12">Liste des <span class="text-green-600 dark:text-green-500">commandes</span></h2>

        <form method="GET" action="{{ route('pharmacist.orders.index') }}" class="mb-8 flex flex-wrap gap-4 items-center">

            <input type="text" name="client" placeholder="Nom du client" value="{{ request('client') }}"
                class="px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
            
            <!-- Filter by Status -->
            <select name="status" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="">Tous les statuts</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>En cours</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Annulée</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Complétée</option>
            </select>

            <!-- Sort Field -->
            <select name="sort" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="date" {{ request('sort', 'date') == 'date' ? 'selected' : '' }}>Trier par date</option>
                <option value="amount" {{ request('sort') == 'amount' ? 'selected' : '' }}>Trier par montant</option>
                <option value="client" {{ request('sort') == 'client' ? 'selected' : '' }}>Trier par client</option>
            </select>

            <!-- Sort Direction -->
            <select name="direction" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="asc" {{ request('direction', 'desc') == 'asc' ? 'selected' : '' }}>Ascendant</option>
                <option value="desc" {{ request('direction', 'desc') == 'desc' ? 'selected' : '' }}>Descendant</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 transition-colors">Appliquer</button>

            <!-- Reset Button -->
            <a href="{{ route('pharmacist.orders.index') }}" class="px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">Réinitialiser</a>
        </form>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Client / Commande ID
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Médicaments
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Montant total
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Statut
                        </th>
                        <th scope="col" class="px-4 py-3">
                            ordonnance
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Date commande
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $order->customer->name }} <br> #CMD{{ $order->id }}
                            </th>
                            <td class="px-6 py-4">
                                @foreach ($order->items as $item)
                                    {{ $item->medicine->commercial_name ?? '' }}, ({{ $item->medicine->dci ?? '' }} - {{ $item->medicine->laboratory ?? '' }} ) x {{ $item->quantity ?? '' }} @if(!$loop->last) <br>@endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->total_amount }} MAD
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if ($order->status === 'pending')
                                        <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">En attente</span>
                                    @elseif ($order->status === 'completed')
                                        <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Complétée</span>
                                    @elseif ($order->status === 'cancelled')
                                        <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Annulée</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-900 dark:text-gray-300">{{ ucfirst($order->status) }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if ($order->prescription_id)
                                    <button data-modal-target="modal-{{ $order->id }}" data-modal-toggle="modal-{{ $order->id }}" class="block" type="button">
                                        <img src="{{ asset('storage/' . $order->prescription->file_path) }}" alt="Ordonnance" class="h-16 w-auto rounded shadow" />
                                    </button>
                                    <!-- Modal for this order -->
                                    <div id="modal-{{ $order->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-8 w-full max-w-lg max-h-full flex items-center justify-center bg-black bg-opacity-20 rounded-lg">
                                            <figure class="max-w-lg">
                                                <img src="{{ asset('storage/' . $order->prescription->file_path) }}" alt="Ordonnance" class="h-auto max-w-full rounded-lg shadow" />
                                            </figure>
                                        </div>
                                    </div>
                                @else
                                    - sans -
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $order->created_at->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 text-left">
                                <div class="flex flex-col space-y-1">
                                    @if ($order->status === 'pending')
                                        <a href="{{ route('orders.accept', $order->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Accepter</a>
                                        <a href="{{ route('orders.reject', $order->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Refuser</a>
                                    @elseif ($order->status !== 'completed' && $order->status !== 'cancelled')
                                        <a href="{{ route('orders.complete', $order->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Completer</a>
                                    @elseif ($order->status !== 'cancelled')

                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                Aucun médicament trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            <div class="my-2 mx-4">
                {{ $orders->links() }}
            </div>
        </div>


    </div>

</x-app-dashboard-layout>