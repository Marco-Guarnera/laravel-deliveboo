@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Orders Statistics</h1>

        <!-- Aggiungi il bottone per tornare alla lista degli ordini -->
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mb-4">Back to Orders List</a>

        <!-- Canvas per il grafico -->
        <canvas id="salesChart"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'bar', // Tipo di grafico
                data: {
                    labels: @json(
                        $orders->map(function ($order) {
                            return Carbon\Carbon::create($order->year, $order->month, 1)->format('F Y');
                        })),
                    datasets: [{
                        label: 'Total sales (€)',
                        data: @json($orders->pluck('total_sales')),
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
                                text: 'Month / Year'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Sales (€)'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
@endsection
