<x-app-dashboard-layout>

    <div class="min-h-[calc(100vh-12rem)]">

        
        <h2 class="text-4xl font-bold dark:text-white mb-8 mt-12">Liste des <span class="text-green-600 dark:text-green-500">commandes</span></h2>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Client / Commande ID
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
                            Date commande
                        </th>
                        <th scope="col" class="px-6 py-3">
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
                                {{ $order->created_at->format('d-m-Y') }}
                            </td>
                            <td class="px-6 py-4 text-left">
                                <div class="flex flex-col space-y-1">
                                    <a href="{{ route('orders.accept', $order->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Accepter</a>
                                    <a href="{{ route('orders.reject', $order->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Refuser</a>
                                    <a href="{{ route('orders.complete', $order->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Completer</a>
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