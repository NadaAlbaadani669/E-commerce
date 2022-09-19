@props(['products'])


<div class="lg:grid lg:grid-cols-8">
    @foreach ($products as $product )
    @if($product->quantity !== 0)
        <x-product-card :product="$product" class="{{$loop->iteration <3 ? 'col-span-3' : 'col-span-2'}}" />
    @endif

    @endforeach


</div>

