@props(['product'])
<article
                {{$attributes->merge(['class'=> "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"])}}>
                <div class="py-6 px-5">
                    <div class="space-x-2">
                        <x-category-button :category="$product->category" />
                    </div>
                    <br>
                    <div class="mt-8 flex flex-col justify-between">
                        <header>


                            <div class="mt-4">
                                <a href="/product/{{$product->name}}">
                                    @php $path =asset('storage/'.$product->image);@endphp
                                    <img src="{{$path}}" alt="{{$product->name}}" class="rounded-xl" width="150px" height="200px"> <br>
                                    <h1 class="text-3xl">
                                        {{$product->name}}
                                    </h1>
                                </a>
                                <span class="mt-2 block text-gray-400 text-xs">
                                    <p>
                                        price : {{$product->price}} $.
                                    </p>
                                </span>
                            </div>
                        </header>

                        <div class="text-sm mt-4">
                            <p>
                               {{$product->description}}
                            </p>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <div class="flex items-center text-sm">
                                <div class="ml-3">
                                    {{-- <a href="/?seller={{$product->user->name}}"><h5 class="font-bold">Seller: {{$product->user->name}}</h5></a> --}}

                                </div>
                            </div>
                            <div class="flex items-left text-sm">
                                @auth
                                    <form action="/addToCart" method="POST">
                                        @csrf
                                        @php @endphp
                                        <input type="hidden" value=""  name="cart_id">
                                        <input type="hidden" value="{{auth()->user()->id}}" name="customer_id">
                                        <input type="hidden" value="{{$product->id}}" name="product_id">
                                        <input type="hidden" value=1 name="quantity">
                                        <input type="hidden" value="{{$product->price}}" name="price">
                                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-500">Add To Cart</button>
                                    </form>
                                @endauth

                            </div>

                        </footer>
                    </div>
                </div>
            </article>
