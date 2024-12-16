@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Lista degli Ordini</h1>
        <!-- Bottone per visualizzare le statistiche -->
        <a href="{{ route('orders.statistics') }}" class="btn btn-primary mb-4">Visualizza Statistiche</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome Cliente</th>
                    <th>Email Cliente</th>
                    <th>Numero Telefono</th>
                    <th>Indirizzo Cliente</th>
                    <th>Prezzo Totale</th>
                    <th>Ristorante</th>
                    <th>Data Creazione</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>{{ $order->customer_number }}</td>
                        <td>{{ $order->customer_address }}</td>
                        <td>&euro; {{ number_format($order->total_price, 2) }}</td>
                        <td>{{ $order->restaurant->name }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            {{-- <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Dettagli</a> --}}
                            {{-- <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo ordine?')">Elimina</button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Nessun ordine trovato.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginazione -->
        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
