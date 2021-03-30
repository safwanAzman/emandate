<x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-2">
    <x-table.table>
        <x-slot name="thead">
            <x-table.table-header class="text-left" value="Rekod" sort="" />
            <x-table.table-header class="text-left" value="Tarikh Berjaya Daftar" sort="" />
            <x-table.table-header class="text-left" value="Status" sort="" />
        </x-slot>
        <x-slot name="tbody">
            @foreach ($INFOS as $item)
                <tr>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{ $item->recnum }}
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{ isset($item->effdate) ? date('d-m-Y',strtotime($item->effdate)):'' }}
                    </x-table.table-body>
                    <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                        {{ $item->approved_desc }}
                    </x-table.table-body>
                </tr>
            @endforeach
        </x-slot>
    </x-table.table>
</x-general.grid>