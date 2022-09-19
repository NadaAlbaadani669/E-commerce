<x-layout>
    <x-setting heading="Products' Sales">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">My Products</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">

                            <tbody>
                                @foreach ($products as $product )
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm w-2/5">
                                        <div class="flex items-center">
                                            <div>
                                                <a href="/product/{{$product->name}}">
                                                    @php $path =asset('storage/'.$product->image);@endphp
                                                    <img src="{{$path}}" alt="" class="w-8">
                                                </a>
                                            </div>
                                            <div class="ml-3">
                                                <a href="/product/{{$product->name}}">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$product->name}}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="text-blue-600 font-large text-sm">
                                            <a href="/product/{{ $product->id }}/edit">Edit</a>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <form method="POST" action="/product/delete/{{ $product->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 font-large text-sm">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>

</x-layout>
