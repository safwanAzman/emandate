@foreach ($INFOS as $item)
<table class="w-full">
    <tbody class="bg-white">
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Tarikh Terakhir Arahan Potongan
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ isset($item->lastcycle_date) ? date('d-m-Y',strtotime($item->lastcycle_date)):'' }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Tarikh Berikutnya Arahan Potongan
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ isset($item->lastcycle_date) ? date('d-m-Y',strtotime($item->nextcycle_date)):'' }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Amaun Potongan
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>RM {{ $item->instal_amt }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Bilangan Bulan <br>Gagal Potongan
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ $item->blockpayment_flag }}</p>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endforeach
