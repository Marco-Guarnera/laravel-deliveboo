<h1>Conferma ordine</h1>
<p>Ciao {{ $order->customer_name }},</p>
<p>Grazie per il tuo ordine! Ecco i dettagli:</p>
<ul>
    <li>Totale ordine: €{{ $order->total_price }}</li>
    <li>Ristorante: {{ $order->restaurant->name }}</li>
    <li>Verrà spedito all'indirizzo: {{ $order->customer_address }}</li>
</ul>
