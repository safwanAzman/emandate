
<div class="container px-6 mx-auto grid">
    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
    <div class="container">
        <div wire:loading wire:target="generateExcel">
            @include('pages.loading.loading')
        </div>
        <div class="relative">
            <x-general.title-header title="Laporan Senarai Result" />
            <a href="{{ route('report.dashboard')}}" class="text-blue-700 absolute top-0 right-0 mx-2 my-2 rounded-md bg-white py-1 px-1 flex items-center">
                <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" /> 
                <p class="text-sm font-semibold">Kembali</p>
            </a>
        </div>
        <div class="relative px-5 pt-5 pb-2">
            <form wire:submit.prevent="">
                <div class="flex flex-col items-start justify-between sm:flex-row sm:items-center">
                    <div class="flex flex-wrap items-center">
                        <div class="mr-0 md:mr-2 w-64">
                            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="report_date">Result Transaksi:</label>
                            <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none" wire:model="status">
                                <option value="%%">All</option>
                                @foreach ($res as $item)
                                    <option value="{{ $item->status }}">{{ $item->status_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mr-0 md:mr-2">
                            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="report_date">Start Date:</label>
                            <input
                                class="block transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                type="date"
                                wire:model="startMon"
                            >
                        </div>
                        <div class="mr-0 md:mr-2">
                            <label class="block text-sm font-semibold leading-5 text-gray-700"  for="report_date">End Date:</label>
                            <input
                                class="block transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                type="date"
                                wire:model="endMon"
                            >
                        </div>
                        <div class="mt-5 mr-0 md:mr-2">
                            <button wire:click="generateExcel" class="inline-flex items-center px-4 py-2 font-semibold text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none" >
                                <x-heroicon-o-document-report class="w-6 h-6 mr-2"/>
                                <span>Excel</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
