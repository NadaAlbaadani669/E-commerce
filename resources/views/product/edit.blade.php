<x-layout>
    <x-setting :heading="'Edit Product: '.$product->name">
        <form method="POST" action="/product/{{ $product->id }}" enctype="multipart/form-data" class="mt-10">
            @csrf
            @method('PATCH')
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Name</label>
                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="name" id="name" value="{{$product->name}}" required><br>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase fond-bold text-xs text-gray-700 ">Slug</label>
                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="slug" id="slug" value="{{ old('slug') }}{{$product->slug}}" required><br>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="price" class="block mb-2 uppercase fond-bold text-xs text-gray-700 ">Price</label>
                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="price" id="price" value="{{$product->price}}" required><br>
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="category" class="p-2 block mb-2 uppercase fond-bold text-xs text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                        @php $categories  = \App\Models\Category::all(); @endphp
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$product->category_id}}>{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    @error('body')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div> <br>
                <div class="flex mt-1 mb-2">
                    <div class="flex-1">
                        <label for="image" class="block mb-2 uppercase fond-bold text-xs text-gray-700 ">Image</label>
                        <input class="border border-gray-400 p-2 w-full rounded-xl" type="file" name="image" id="image" value="{{ old('image') }}" ><br>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <img src="{{ asset('storage/'. $product->image)}}" alt="{{$product->name}}" class="rounded-xl ml-6" width="80">
                </div>
                <div class="mb-6">
                    <label for="quantity" class="block mb-2 uppercase fond-bold text-xs text-gray-700 ">Quantity</label>
                    <input class="border border-gray-400 p-2 w-full rounded-xl" type="text" name="quantity" id="quantity" value="{{$product->quantity}}" required><br>
                </div>
                <div class="mt-6">
                    <label for="description" class="block mb-2 uppercase fond-bold text-xs text-gray-700">Description</label>
                    <textarea name="description" class="p-2 w-full text-xs focus:outline-none focus:ring border border-gray-400 rounded-xl" rows="5" required>{{$product->description}}</textarea>
                    @error('description')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>


                <div class="mb-6 mt-4">
                    <button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-500" type="submit">Update</button>
                </div>


            </div>

        </form>
    </x-setting>

</x-layout>
