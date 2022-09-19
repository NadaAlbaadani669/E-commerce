<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">

            <p class="flex text-m pr-10 uppercase">Welcome {{auth()->user()->name}}</p>

        </button>
    </x-slot>

    <ul>
        <li>
            <a href="/Information" class="text-m uppercase">Account</a>
        </li>
        <li>
            <a href="/logout" class="text-m uppercase ">Log out</a>
        </li>
    </ul>




</x-dropdown>
