<h2>Monitoring (oxirgi 10 tranzaksiya)</h2>
<table border="1">
    <tr>
        <th>Tur</th>
        <th>Qiymat</th>
        <th>Izoh</th>
        <th>Sana</th>
    </tr>
    @foreach($transactions as $transaction)
        <tr>
            <td>{{ $transaction->type }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->description }}</td>
            <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
        </tr>
    @endforeach
</table>
<a href="{{ route('transactions.index') }}">Ortga</a>
