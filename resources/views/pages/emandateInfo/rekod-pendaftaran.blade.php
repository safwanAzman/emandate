<x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-2">
    <div class="flex flex-col mx-4">
        <div class="-my-2 overflow-x-auto">
            <div class="py-2 align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <table class="data-table min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th data-priority="1" class="uppercase text-xs text-white text-left">Rekod</th>
                                    <th data-priority="2" class="uppercase text-xs text-white text-left">Tarikh Berjaya Daftar</th>
                                    <th data-priority="3" class="uppercase text-xs text-white text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($INFOS as $item)
                                    <tr>
                                        <td class="text-sm text-left">{{ $item->recnum }}</td>
                                        <td class="text-sm text-left">{{ isset($item->effdate) ? date('d-m-Y',strtotime($item->effdate)):'' }}</td>
                                        <td class="text-sm text-left">{{ $item->approved_desc }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
</x-general.grid>