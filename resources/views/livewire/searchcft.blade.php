<div class="container px-6 mx-auto grid">
	<x-minnor-loading/>
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Senarai Nama Fail Dihantar Ke Bank (CFT)" />
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian Tarikh Transaksi (Contoh : 25032021)"  wire:model="searchCFTTerm"/>
            </div>
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Nama Fail" sort="" />
                        <x-table.table-header class="text-left" value="Tarikh Potongan Berjaya" sort="" />
                        <x-table.table-header class="text-left" value="Tindakan" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($cftdata as $item)
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->filename }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ substr($item->hdate,6,2).'-'.substr($item->hdate,4,2).'-'.substr($item->hdate,0,4) }}  
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 flex justify-start">
                                    {{-- <a href = "{{ url('linkmainCFT/'.$item->filename.'')}}" onclick = "loading()" 
                                        class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                        <x-heroicon-o-eye class="w-5 h-5" />
                                        <p class="ml-1">Papar </p>
                                    </a>  --}}
                                    <a href="{{ route('export-cft',['id' => $item->filename]) }}" class="rounded-full py-3 px-3 bg-green-700 hover:bg-green-600 flex items-center">
                                        <x-heroicon-o-download class="w-5 h-5 text-white" />
                                    </a>
                                </x-table.table-body>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
				{{ $cftdata->links() }}
            </x-general.grid>
        </div>
    </div>
</div>