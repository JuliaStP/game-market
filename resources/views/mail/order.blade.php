Customer {{ $user->id }} ordered following items: <br>

<br>
@forelse($order->goods as $good)
    {{ $good->id }} {{ $good->title }}
@empty
    No orders
@endforelse
