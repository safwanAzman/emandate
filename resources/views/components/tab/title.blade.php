
    <div class="transform  hover:scale-105 transition duration-300  px-4 py-2 max-w-md rounded-lg cursor-pointer text-gray-500 text-sm hover:text-gray-700" x-on:click.prevent="active = {{ $name }}" x-bind:class="{'text-blue-500 ': active === {{ $name }} }" {{$livewire}}>
        <div class="flex">
            {{ $slot }}
        </div>
    </div>
