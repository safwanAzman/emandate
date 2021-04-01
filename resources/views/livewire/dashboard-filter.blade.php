<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 ">			
        <x-general.title-header title="e-Mandate Dashboard"/>
        @if ( session()->get('authenticatedUser')['branch_type'] == 'HQ' )
        <div class="container bg-white ">
            <x-general.grid mobile="1" gap="5" sm="1" md="2" lg="2" xl="2" class="col-span-6 p-6">
                <!-- Start Negeri Dropdown -->
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700"> Negeri </label>
                    <select id="country" name="country" autocomplete="country" wire:model="country"
                        class="
                        mt-1 block w-full py-2 px-3 border 
                        border-gray-300 bg-white rounded-md shadow-sm focus:outline-none ">
                        <option selected>Pilih Negeri</option>
                        <option value='Malay'>SEMUA</option>
                        @foreach ($countries as $country)
                        <option value={{ $country->code }}>{{ $country->description }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- End Negeri Dropdown -->

                <!-- Start Cawangan Dropdown -->
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700"> Cawangan </label>
                    <select id="city" name="country" autocomplete="city" wire:model="city"
                        class="mt-1 block w-full py-2 px-3 border 
                        border-gray-300 bg-white rounded-md shadow-sm focus:outline-none">
                        <option selected>Pilih Cawangan</option>
                        <option value='All' selected>SEMUA</option>
                        @foreach ($cities as $city)
                        <option value={{ $city->branch_code }}>{{ $city->branch_name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- End Cawangan Dropdown -->
            </x-general.grid>
        </div>
        <div class="container bg-white">
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="3" xl="3" class="col-span-6 p-6">
                <x-card.card-info title="Bil Permohonan" textcolor="blue" bgcolor="blue" value="{{ ($posts->count()) }}"/>
                <x-card.card-info title="Bil Permohonan Lulus" textcolor="green" bgcolor="green" value="{{ ($postspass->count()) }}"/>
                <x-card.card-info title="Bil Permohonan Dalam Proses" textcolor="red" bgcolor="red" value="{{ ($postsfail->count()) }}"/>
            </x-general.grid>
        </div>
        <div class="container">
            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 p-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="Tarikh Permohonan" sort=""/>
                        <x-table.table-header class="text-left" value="Cawangan" sort=""/>
                        <x-table.table-header class="text-left" value="No Akaun" sort=""/>
                        <x-table.table-header class="text-left" value="Kad Pengenalan" sort=""/>
                        <x-table.table-header class="text-left" value="Nama" sort=""/>
                        <x-table.table-header class="text-left" value="Mula E-mandate" sort=""/>
                        <x-table.table-header class="text-left" value="Tamat E-mandate" sort=""/>
                        {{-- <x-table.table-header class="text-left" value="Status" sort=""/> --}}
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($postsdata as $item)
                            <tr>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ ($item->hcrdate) }}
                                </x-table.table-body>
                                <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ ($item->branch_name) }}
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
                                {{-- <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                    {{ $item->approval }}
                                </x-table.table-body> --}}
                            </tr>
                        @endforeach
                    </x-slot>
                </x-table.table>
                {{ $postsdata->links() }}
            </x-general.grid>
        </div>
        @else
        <div class="container bg-white rounded-b-2xl">
            <x-general.grid mobile="1" gap="5" sm="1" md="3" lg="3" xl="3" class="col-span-6 p-6">
                <x-card.card-info title="Bilangan Permohonan Daftar" textcolor="blue" bgcolor="blue" value="{{($posts->count())}}"/>
                <x-card.card-info title="Bilangan Permohonan Lulus" textcolor="green" bgcolor="green" value="{{($postspass->count())}}"/>
                <x-card.card-info title="Bilangan Permohonan Dalam Proses" textcolor="red" bgcolor="red" value="{{($postsfail->count())}}"/>
            </x-general.grid>
        </div>
        @endif
    </div>
    <div wire:loading>
        @include('pages.loading.loading')
    </div>
</div>