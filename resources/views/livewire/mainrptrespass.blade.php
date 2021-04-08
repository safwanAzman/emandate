<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Senarai Laporan Transaksi" />
        <div class="container">
            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian Tarikh Transaksi" wire:model="findmainrptrespass"/>
            </div>
            <x-general.grid mobile="1" gap="5" sm="2" md="2" lg="2" xl="2" class="col-span-6 px-6">
                @forelse ($rpt_respass as $item)
                    <x-card.card-list 
                        title="Tarikh Transaksi" 
                        value="{{ substr($item->hdate,0,2).'-'.substr($item->hdate,3,2).'-'.substr($item->hdate,6,5) }}">

                        <a href="{{ url('linkrptrespasses/'.$item->filename.'')}}" class="rounded-full py-3 px-3 bg-blue-700 hover:bg-blue-600 flex items-center">
                            <x-heroicon-o-eye class="w-5 h-5 text-white" />
                        </a>
                        <a href="{{ route('export-respass',['id' => $item->filename]) }}" class="rounded-full py-3 px-3 bg-green-700 hover:bg-green-600 flex items-center">
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
            <div class="flex flex-wrap justify-center mt-8">
                <a href="/emandate/emandate-report" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Back</a>
            </div>
        </div>
    </div>
</div>