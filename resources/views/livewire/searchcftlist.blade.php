<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <div class="relative">
            <x-general.title-header title="Senarai Maklumat Fail Dihantar Ke Bank (CFT)" />
            <a href="{{ route('searchcft.index')}}" class="text-blue-700 absolute top-0 right-0 mx-2 my-2 rounded-md bg-white py-1 px-1 flex items-center">
                <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" /> 
                <p class="text-sm font-semibold">Kembali</p>
            </a>
        </div>		
        
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian No Akaun / No Kad Pengenalan"  wire:model="listcft"/>
            </div>
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Nama Fail" sort="" />
                        <x-table.table-header class="text-left" value="No Akaun" sort="" />
                        <x-table.table-header class="text-left" value="Nama" sort="" />
                        <x-table.table-header class="text-left" value="Kad Pengenalan" sort="" />
                        <x-table.table-header class="text-left" value="Jumlah Trans" sort="" />
                        <x-table.table-header class="text-left" value="Bilangan Percubaan" sort="" />
                        <x-table.table-header class="text-left" value="Tindakan" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($filelist_CFT as $item)
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->filename,0,11) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->payrefno }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->buyername,0,20) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->ic }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->tranamt }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->noretry }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    <a href = "{{ url('linkcft/'.$item->ic.'/'.$item->filename)}}" 
                                        class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <x-heroicon-o-eye class="w-5 h-5" />
                                        <p class="ml-1">Papar </p>
                                    </a> 
                                </x-table.table-body>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
                {{ $filelist_CFT->links() }}
            </x-general.grid>
        </div>
    </div>
</div>