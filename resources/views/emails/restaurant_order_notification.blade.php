<h1>Nuovo ordine ricevuto</h1>
<p>Ciao {{ $order->restaurant->name }},</p>
<p>Hai ricevuto un nuovo ordine da {{ $order->customer_name }}.</p>

<p><strong>Dettagli ordine:</strong></p>
<ul>
    <li>Totale: €{{ number_format($order->total_price, 2) }}</li>
    <li>Indirizzo: {{ $order->customer_address }}</li>
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

<p>Grazie per aver utilizzato la nostra piattaforma!</p>
