<x-app-dashboard-layout>

<div class="grid gap-4 md:gap-6">

    <!-- First row -->
    <div class="grid grid-cols-1 gap-4 md:gap-6 sm:grid-cols-2 xl:grid-cols-4">
    
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Total des Médicaments</span>
            </div>
            <div>
                <h4 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white/90">{{ $medicines->count() }}</h4>
            </div>
            
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg class="w-6 h-6 text-green-600 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Prod. Proches Péremption</span>
            </div>
            <div>
                <h4 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white/90">{{ $nearExpiryCount }}</h4>
            </div>
            
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Prod. Expirés</span>
            </div>
            <div>
                <h4 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white/90">{{ $expiredMedicinesCount }}</h4>
            </div>
            
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg class="w-6 h-6 text-green-600 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Stock Faible</span>
            </div>
            <div>
                <h4 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white/90">{{ $lowStockCount }}</h4>
            </div>
            
        </div>

    </div>

    <!-- Second row -->
    <div class="grid grid-cols-1 gap-4 md:gap-6 sm:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6 sm:col-span-2 h-60 content-center place-items-center">
            <canvas id="orderStatusChart" class="w-full h-40"></canvas>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg class="w-6 h-6 text-green-600 dark:text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Total des Commandes</span>
            </div>
            <div>
                <h4 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white/90">{{ $ordersCount }}</h4>
            </div>
            
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] p-6">

            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8.737 8.737a21.49 21.49 0 0 1 3.308-2.724m0 0c3.063-2.026 5.99-2.641 7.331-1.3 1.827 1.828.026 6.591-4.023 10.64-4.049 4.049-8.812 5.85-10.64 4.023-1.33-1.33-.736-4.218 1.249-7.253m6.083-6.11c-3.063-2.026-5.99-2.641-7.331-1.3-1.827 1.828-.026 6.591 4.023 10.64m3.308-9.34a21.497 21.497 0 0 1 3.308 2.724m2.775 3.386c1.985 3.035 2.579 5.923 1.248 7.253-1.336 1.337-4.245.732-7.295-1.275M14 12a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Total des Commandes en attente</span>
            </div>
            <div>
                <h4 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white/90">{{ $ordersPendingCount }}</h4>
            </div>
            
        </div>

    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">

        <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h3 class="text-md font-semibold text-green-600 dark:text-green-500">
                    Commandes Récentes
                </h3>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('pharmacist.orders.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    Voir tous
                </a>
            </div>
        </div>

        <div class="w-full overflow-x-auto">
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
                                <div class="flex items-center whitespace-nowrap">
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
                                    @elseif ($order->status !== 'completed')
                                        <a href="{{ route('orders.complete', $order->id) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Completer</a>
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
            
        </div>
        </div>
    </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('orderStatusChart').getContext('2d');
    const orderStatusChart = new Chart(ctx, {
        type: 'bar', // or 'pie'
        data: {
            labels: {!! json_encode($orderStatusCounts->keys()) !!},
            datasets: [{
                label: 'Nombre de Commandes',
                data: {!! json_encode($orderStatusCounts->values()) !!},
                backgroundColor: [
                    '#bbf7d0', // light green
                    '#86efac', // medium light green
                    '#4ade80', // medium green
                    '#22c55e', // vivid green
                    '#16a34a'  // dark green
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: true }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>




</x-app-dashboard-layout>
