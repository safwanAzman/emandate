<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Senarai Maklumat Laporan Sekatan Pemotongan" />
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian No Akaun" wire:model="findrptenrp"/>
            </div>
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Nama Fail" sort="" />
                        <x-table.table-header class="text-left" value="No Akaun" sort="" />
                        <x-table.table-header class="text-left" value="Kad Pengenalan" sort="" />
                        <x-table.table-header class="text-left" value="Nama" sort="" />
                        <x-table.table-header class="text-left" value="Skim" sort="" />
                        <x-table.table-header class="text-left" value="Mula E-Mandate" sort="" />
                        <x-table.table-header class="text-left" value="Tamat E-Mandate" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($rptdetails_enrp as $item) 
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->filename,0,8) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->payrefnum }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->idnum }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->buyername,0,20) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->effdate,0,2).'/'.substr($item->effdate,2,2).'/'.substr($item->effdate,4,4) }} 
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->expdate,0,2).'/'.substr($item->expdate,2,2).'/'.substr($item->expdate,4,4) }} 
                                </x-table.table-body>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
                {{ $rptdetails_enrp->links() }}
            </x-general.grid>
        </div>
    </div>
</div>