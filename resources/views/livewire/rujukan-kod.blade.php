<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Rujukan Kod Transaksi" />
        <div class="container">
            <div class="flex justify-end p-4 max-full">
                <a href = "{{ route('export-kodRujukan')}}" 
                    class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <x-heroicon-o-download class="w-5 h-5" />
                    <p class="ml-1">Muat Turun</p>
                </a> 
            </div>
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Penerangan Status" sort="" />
                        <x-table.table-header class="text-left" value="Kod Status" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($MDT_OFNI_DESC as $item) 
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->approved_desc }}<br>
                                    <p class = "text-xs text-blue-400">({{ $item->bahasa }})</p>
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->re_code }}
                                </x-table.table-body>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
            </x-general.grid>
        </div>
    </div>
</div>