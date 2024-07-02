<div class="max-w-4xl mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Your Transactions</h2>
    <table class="w-full table-auto">
        <thead>
        <tr>
            <th class="border px-4 py-2">Date</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td class="border px-4 py-2">{{ $transaction->date }}</td>
                <td class="border px-4 py-2">{{ $transaction->description }}</td>
                <td class="border px-4 py-2">{{ $transaction->amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
