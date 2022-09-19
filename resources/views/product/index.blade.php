
<x-layout>

    <header class="max-w-xl mx-auto mt-20 text-center">
       @include('product._header')
    </header>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($products->count())
            <x-products-grid :products="$products" />

            {{-- {{$posts->links()}}   to add the pagination --}}
        @else
            <p style="text-align: center">No Products to sell. Please check back later.</p>
        @endif


    </main>
</x-layout>
