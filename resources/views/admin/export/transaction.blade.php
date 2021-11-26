<table>
    <thead>
        <tr>
            <td>Product</td>
            <td>date</td>
            <td>price</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->productonetomany->name }}</td>
                <td>{{ $transaction->trx_date }}</td>
                <td>{{ $transaction->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>