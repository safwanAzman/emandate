@foreach ($INFOS as $item)
<table class="w-full">
    <tbody class="bg-white">
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Tarikh Berjaya Daftar
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ isset($item->appdate) ? date('d-m-Y',strtotime($item->appdate)):'' }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Rujukan RHB-DDA Form
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ $item->recnum }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Tarikh Mula Arahan Potongan
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ isset($item->effdate) ? date('d-m-Y',strtotime($item->effdate)):'' }} </p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Tarikh Akhir Arahan Potongan
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ isset($item->expdate) ? date('d-m-Y',strtotime($item->expdate)):'' }} </p>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endforeach
