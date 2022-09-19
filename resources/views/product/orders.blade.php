
<x-layout>
    <x-setting heading="My Orders">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Orders</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Quantity
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Price
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Payment Method
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item )
                                {{-- @php
                                    $products = $items::select('name')->where('buyer_id','=',Auth::id())->distinct('product_id')->get();
                                @endphp --}}
                                <tr>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex items-center">
                                            <div>
                                                @php $path =asset('storage/'.$item->product->image);@endphp
                                                <img src="{{$path}}" alt="product image" class="w-8">
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$item->product->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">{{$item->quantity}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{$item->product->price * $item->quantity}}$

                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{$item->payment_method}}

                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-setting>

</x-layout>
