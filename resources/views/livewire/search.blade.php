<div class="container px-6 mx-auto grid">
    <x-minnor-loading />
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Senarai e-Mandate Info" />
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian No Akaun/Kad Pengenalan" wire:model="searchTerm" />
            </div>
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="No" sort="" />
                        <x-table.table-header class="text-left" value="Cawangan" sort="" />
                        <x-table.table-header class="text-left" value="No Akaun" sort="" />
                        <x-table.table-header class="text-left" value="Kad Pengenalan" sort="" />
                        <x-table.table-header class="text-left" value="Nama" sort="" />
                        <x-table.table-header class="text-left" value="Status" sort="" />
                        <x-table.table-header class="text-left" value="Tindakan" sort="" />
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($MDT_PRNE as $item)
                        <tr>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ (($MDT_PRNE ->currentpage()-1) * $MDT_PRNE ->perpage()) + $loop->index + 1 }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $item->cawangan }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $item->payrefnum }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $item->idnum }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $item->buyername }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ $item->approval_desc }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                <a href="{{ url('linkviewsearch/'.$item->payrefnum.'')}}" onclick="loading()"
                                    class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                    <x-heroicon-o-eye class="w-5 h-5" />
                                    <p class="ml-1">Papar </p>
                                </a>
                            </x-table.table-body>
                        </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
                {{ $MDT_PRNE->links() }}
            </x-general.grid>
        </div>
    </div>
</div>