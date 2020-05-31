<h1>My purchases</h1>

@if($purchases->count())
    <table class="table text-sm">
        <thead>
        <tr>
            <th>Date</th>
            <th>Product</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
            <tr>
                <td>{{ $purchase->created_at }}</td>
                <td>{{ $purchase->product->name }}
                    <div class="td-secondary-line">
                        {{ $purchase->price }}
                    </div>
                </td>
                <td class="td-action"><a href="{{ $purchase->receipt_url }}" target="_blank" rel="noopener noreferrer">View receipt</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
@else
    <p>You haven't made any purchases yet. Head over to the <a href="{{ route('buy')}}">shop</a>!</p>
@endif
