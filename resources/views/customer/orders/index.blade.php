<x-app-customer-layout>

    <div class="min-h-[calc(100vh-4rem)] place-items-center px-6 xl:px-24 py-10 sm:py-14 bg-white md:py-24 dark:bg-gray-900">
        
        <h3 class="text-3xl font-bold dark:text-white mb-8 md:mb-12">Mes <span class="text-green-600 dark:text-green-500">commandes</span></h3>

       <form method="GET" action="{{ route('customer.orders.index') }}" class="mb-8 flex flex-wrap gap-4 items-center justify-self-start xl:ml-32">

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
            </select>

            <!-- Sort Direction -->
            <select name="direction" class="px-4 py-2 pr-10 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 focus:ring-2 focus:ring-green-500">
                <option value="asc" {{ request('direction', 'desc') == 'asc' ? 'selected' : '' }}>Ascendant</option>
                <option value="desc" {{ request('direction', 'desc') == 'desc' ? 'selected' : '' }}>Descendant</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="px-4 py-2 rounded-md bg-green-600 text-white hover:bg-green-700 transition-colors">Appliquer</button>

            <!-- Reset Button -->
            <a href="{{ route('customer.orders.index') }}" class="px-4 py-2 rounded-md bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600">Réinitialiser</a>
        </form>

        <!-- Orders -->
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full lg:w-[1080px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Commande ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Médicaments
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Montant total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Statut
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date de commande
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                #CMD{{ $order->id }}
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
                                {{ $order->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                Aucune commande trouvée.
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

</x-app-customer-layout>