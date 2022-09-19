@props(['heading'])
<section class="px-6 max-w-4xl mx-auto py-8">

        <h1 class="text-lg font-bold mb-6 pb-2 border-b">{{ $heading }}</h1>

        <div class="flex">
            <aside class="w-48">
                <h3 class="font-semibold mb-6">Links</h3>
                <ul>
                    <li>
                        <a href="/Information" class="{{request()->is('Information') ? 'text-blue-500' : ''}}">Information</a>
                    </li>
                    <li>
                        <a href="/product/create" class="{{request()->is('product/create') ? 'text-blue-500' : ''}}">New Product</a>
                    </li>
                    <li>
                        <a href="/my_products" class="{{request()->is('my_products') ? 'text-blue-500' : ''}}">My products</a>
                    </li>
                    <li>
                        <a href="/product/sales" class="{{request()->is('product/sales') ? 'text-blue-500' : ''}}">Sales</a>
                    </li>
                    <li>
                        <a href="/orders" class="{{request()->is('orders') ? 'text-blue-500' : ''}}" >My Orders</a>
                    </li>
                </ul>
            </aside>

            <main class="flex-1 max-w-lg mx-auto mt-1 bg-white-100 border border-gray-200 pt-2 px-6 rounded-xl">
                {{ $slot }}
            </main>
        </div>



</section>
