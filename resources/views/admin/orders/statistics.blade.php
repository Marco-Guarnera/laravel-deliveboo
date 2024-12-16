@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Statistiche degli Ordini</h1>

        <!-- Aggiungi il bottone per tornare alla lista degli ordini -->
        <a href="{{ route('orders.index') }}" class="btn btn-secondary mb-4">Torna alla lista ordini</a>

        <!-- Canvas per il grafico -->
        <canvas id="salesChart"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'bar', // Tipo di grafico, può essere 'bar', 'line', 'pie', ecc.
                data: {
                    labels: @json(
                        $orders->map(function ($order) {
                            return Carbon\Carbon::create($order->year, $order->month, 1)->format('F Y');
                        })),
                    datasets: [{
                        label: 'Vendite Totali (€)',
                        data: @json(
                            $orders->map(function ($order) {
                                return $order->total_sales;
                            })),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Mese / Anno'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Vendite (€)'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
@endsection
