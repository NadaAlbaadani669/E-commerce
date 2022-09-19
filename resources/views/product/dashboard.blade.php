{{-- @props(['address']) --}}
<x-layout>
    <x-setting heading="information">
        <div class="mb-4">
            <h2 class="text-2xl font-semibold leading-tight">Address</h2>
        </div>
       @if ($addres !== null)
            <h4>{{$addres->addres}}</h4>
        @else
        <form action="/add/address" method="POST">
            @csrf
            <label for="address">Your have no address please add one:</label><br><br>
            <textarea name="address" id="address" rows="4" cols="40" class="border border-black rounded p-2" required></textarea><br><br>
            <button type="submit" class="bg-blue-400 text-white rounded mb-8 py-2 px-4 hover:bg-500">Add Address</button>
        </form>
       @endif
    </x-setting>
</x-layout>
