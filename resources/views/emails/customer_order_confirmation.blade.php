<h1>Conferma ordine</h1>
<p>Ciao {{ $order->customer_name }},</p>
<p>Grazie per il tuo ordine! Ecco i dettagli:</p>
<ul>
    <li>Totale ordine: €{{ $order->total_price }}</li>
    <li>Ristorante: {{ $order->restaurant->name }}</li>
    <li>indirizzo ristorante: {{ $order->restaurant->address }}</li>
    <li>Verrà spedito all'indirizzo: {{ $order->customer_address }}</li>
</ul>

<p><strong>Piatti ordinati:</strong></p>
<ul>
    @foreach ($order->dishes as $dish)
        <li>
            {{ $dish->pivot->name }} - Quantità: {{ $dish->pivot->quantity }} - Prezzo unitario:
            €{{ number_format($dish->pivot->price, 2) }}
        </li>
    @endforeach
</ul>

<p>Grazie per aver ordinato dal nostro locale!</p>
