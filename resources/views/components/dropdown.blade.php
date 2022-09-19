@props(['trigger'])
<div x-data="{ show:false }" @click.away="show = false" class="mr-8 ">

    <div @click="show = !show">
        {{$trigger}}
    </div>

    <div x-show="show" class="px-10 py-2 absolute bg-gray-100 mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display:none">
        {{$slot}}
    </div>
</div>
