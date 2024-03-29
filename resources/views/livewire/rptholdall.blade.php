<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Senarai Maklumat Laporan Sekatan Pemotongan" />
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian No Akaun" wire:model="findrptholdall"/>
            </div>
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Tarikh Sekatan Pemotongan" sort="" />
                        <x-table.table-header class="text-left" value="Cawangan" sort="" />
                        <x-table.table-header class="text-left" value="Tarikh Terakhir Pemotongan Berjaya" sort="" />
                        <x-table.table-header class="text-left" value="No Akaun" sort="" />
                        <x-table.table-header class="text-left" value="Kad Pengenalan" sort="" />
                        <x-table.table-header class="text-left" value="Sekatan Oleh" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($rptdetails_holdall as $item) 
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->blockpayment_date,0,4).'-'.substr($item->blockpayment_date,5,2).'-'.substr($item->blockpayment_date,8,2) }} 
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->branch_name }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->lastsuccess_date,0,4).'-'.substr($item->lastsuccess_date,5,2).'-'.substr($item->lastsuccess_date,8,2) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->fms_acct_no,0,14) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->idnum }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->blockedby }}
                                </x-table.table-body>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
                {{ $rptdetails_holdall->links() }}
            </x-general.grid>
        </div>
    </div>
</div>