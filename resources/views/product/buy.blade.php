

<x-layout>
        <main class="max-w-6xl mx-auto mt-7 space-y-6">
            <h1  class="text-blue-500 text-xl">Chose Payment Method</h1>
            <section class="px-6 border border-gray-200 rounded-2xl pl-10 pt-5 w-5/12">

            <div class="mt-4 text-lg font-semibold">
                <form action="/product/finishBuying" method="POST">
                    @csrf
                    <input type="hidden" name="product" value="{{ $product->id}}">
                    <div>
                        <img src="{{asset('storage/'.$product->image)}}" alt="{{ $product->name }}" width="200" class="ml-20 mb-10 ">
                    </div>
                    <div class="mt-4">
                        <label for="name">Product Name: </label>
                        <output>{{ $product->name }}</output>
                    </div>
                    <div class="mt-4">
                        <label for="quantity">Total Amount:  </label>
                        <input type="hidden" value="{{ $quantity }}" name="quantity">
                        <output>{{ $quantity }}</output>
                    </div>
                    <div class="mt-4">
                        <label for="price">Total Price: </label>
                        <input type="hidden" value="{{ $price }}" name="price">
                        <output>{{ $price }} $</output>
                    </div>
                    <div class="mt-4">
                        <label for="payment_method">Payment Method:  </label><br>
                        <input name="payment_method" type="radio"  value="At the door" required>
                        <label for="at_the_door"> At the door</label> <br>
                        <input name="payment_method" type="radio"  value="Paypal">
                        <label for="paypal">Paypal</label> <br>
                    </div>
                    <div class="mt-4">
                        <label for="address">Address: </label>
                        <input type="hidden" value="{{ $address->addres }}" name="addres">
                        <output name="address">{{ $address->addres }}</output>
                    </div>
                    <div>
                        <button type="submit" class="my-6 bg-blue-500 py-2.5 px-6 text-white rounded ">Buy</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

</x-layout>
