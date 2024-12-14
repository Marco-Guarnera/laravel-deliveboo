<h1>Nuovo ordine ricevuto</h1>
<p>Ciao {{ $order->restaurant->name }},</p>
<p>Hai ricevuto un nuovo ordine da {{ $order->customer_name }}.</p>
<p><strong>Dettagli ordine:</strong></p>
<ul>
    <li>Totale: €{{ $order->total_price }}</li>
    <li>Indirizzo: {{ $order->customer_address }}</li>
</ul>
