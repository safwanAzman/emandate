<x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-2">
    <x-table.table>
        <x-slot name="thead">
            <x-table.table-header class="text-left" value="Rujukan Fail RES" sort="" />
            <x-table.table-header class="text-left" value="Mod Bayaran" sort="" />
            <x-table.table-header class="text-left" value="Tarikh Potongan" sort="" />
            <x-table.table-header class="text-left" value="BankID" sort="" />
            <x-table.table-header class="text-left" value="Amaun(RM)" sort="" />
            <x-table.table-header class="text-left" value="Kod Status" sort="" />
            <x-table.table-header class="text-left" value="Status" sort="" />
        </x-slot>
        <x-slot name="tbody">
            @foreach ($filelist_res as $item)
            <tr>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    {{ $item->filename }}
                </x-table.table-body>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    {{ $item->hmode }}
                </x-table.table-body>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    {{ isset($item->hdate) ? ($item->hdate):'' }}
                </x-table.table-body>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    {{ $item->bankid }}
                </x-table.table-body>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    {{ $item->tranamt }}
                </x-table.table-body>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    R{{ $item->status }}
                </x-table.table-body>
                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                    {{ SUBSTR($item->status_desc,0,30) }}
                </x-table.table-body>
            </tr>
            @endforeach
        </x-slot>
    </x-table.table>
</x-general.grid>