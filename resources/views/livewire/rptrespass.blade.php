<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <div class="relative">
            <x-general.title-header title="Senarai Maklumat Laporan Transaksi (Berjaya)" />
            <a href="{{ route('report.respass')}}" class="text-blue-700 absolute top-0 right-0 mx-2 my-2 rounded-md bg-white py-1 px-1 flex items-center">
                <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" /> 
                <p class="text-sm font-semibold">Kembali</p> 
            </a>
        </div>
        
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian No. Akaun / Kad Pengenalan" wire:model="findrptrespass"/>
            </div>
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Tarikh Transaksi" sort="" />
                        <x-table.table-header class="text-left" value="No Akaun" sort="" />
                        <x-table.table-header class="text-left" value="Kad Pengenalan" sort="" />
                        <x-table.table-header class="text-left" value="Jumlah Potongan" sort="" />
                        <x-table.table-header class="text-left" value="Status" sort="" />
                        <x-table.table-header class="text-left" value="Maklumat Status " sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($rptdetails_respass as $item)  
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->hdate,0,2).'-'.substr($item->hdate,3,2).'-'.substr($item->hdate,6,5) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->filler,0,14) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->ic }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->tranamt }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->status }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->approved_desc }}
                                </x-table.table-body>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
                {{ $rptdetails_respass->links() }}
            </x-general.grid>
        </div>
    </div>
</div>