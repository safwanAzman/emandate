<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Senarai Laporan Sekatan Pemotongan" />
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian Tarikh Sekatan"  wire:model="findmainrptholdall"/>
            </div>
            <x-general.grid mobile="1" gap="5" sm="2" md="2" lg="2" xl="2" class="col-span-6 px-6">
                @forelse ($rpt_holdall as $item)
                    <x-card.card-list 
                        title="Tarikh Sekatan" 
                        value="{{ substr($item->blockpayment_date,0,4).'-'.substr($item->blockpayment_date,5,2).'-'.substr($item->blockpayment_date,8,2) }}">

                        <a href="{{ url('linkrptholdall/'.$item->blockpayment_date.'')}}" class="rounded-full py-3 px-3 bg-blue-700 hover:bg-blue-600 flex items-center">
                            <x-heroicon-o-eye class="w-5 h-5 text-white" />
                        </a>
                        <a href="{{ route('export-holdall',['id' => $item->blockpayment_date]) }}" class="rounded-full py-3 px-3 bg-green-700 hover:bg-green-600 flex items-center">
                            <x-heroicon-o-download class="w-5 h-5 text-white" />
                        </a>
                    </x-card.card-list>
                    @empty
                    <div class="col-span-12 intro-y md:col-span-12 py-4 px-2 border-2 border-gray-200">
                        <div class="flex justify-center">
                            <p class="font-semibold">Tiada data </p>
                        </div>
                    </div>
                @endforelse
            </x-general.grid>
        </div>
    </div>
</div>