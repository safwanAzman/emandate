<style>
table.acct {
    font-family: verdana,arial,sans-serif;
    font-size: 12px;
    color: #333333;
    border-collapse: collapse;
}
.bold{
    font-weight: bold;
}
td{
    padding-top: 10px;
}
</style>

<div x-data="{ active: 0 }">
    <div class="flex bg-white shadow-xl my-4">
        <x-tab.title name="0" livewire="">
            <div class="flex font-semibold">
                <x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Kedudukan Akaun
            </div>
        </x-tab.title>
        <x-tab.title name="1" livewire="">
            <div class="flex font-semibold">
                <x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Rekod Bayaran Balik
            </div>
        </x-tab.title>
    </div>

    <!--Kedudukan Akaun content -->
    <x-tab.content name="0">
        <div class="py-4 px-2">
            <div class="flex space-x-2">
                <p class="font-semibold">Status :</p>
                @foreach ($trafik as $item)
                
                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">NOD</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">SMN</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">BNC</p>
                    </span>
                    
                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">WSS</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">JDS</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">RAMCI</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">CTOS</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">PS</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">PS2.0</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">PHCCC</p>
                    </span>

                    <span class="bg-orange-500 font-semibold px-2 py-1 rounded-full flex items-center">
                        <p class="text-white text-xs">eMan</p>
                    </span>
                @endforeach

            </div>
        </div>
        <div style=" width:100%;" class="overflow-x-auto bg-gray-100 px-2 py-2">
            <table class="acct">
                <tbody>
                    <tr>
                        <td colspan="3" class="bg-gray-700 text-white p-2">Amaun Keseluruhan</td>
                        <td style="width: 1%;"></td>
                        <td colspan="3" class="bg-gray-700 text-white p-2">Kedudukan Terkini</td>
                    </tr>
                    <tr>
                        <td style="width: 14%;">Tempoh Pembiayaan</td>
                        <td class="bold">{{$data[0]->duration}} Bulan</td>
                        <td class="bold">{{number_format($data[0]->profit_rate,2)}} % Setahun</td>
                        <td style="width: 1%;"></td>
                        <td style="width: 10%;"></td>
                        <td class="bold" style="width: 10%;">Telah diBayar</td>
                        <td class="bold" style="width: 10%;">Belum Dibayar</td>
                    </tr>
                    <tr>
                        <td>Amaun Pengeluaran</td>
                        <td class="bold" colspan="2">RM {{number_format($data[0]->disbursed_amount,2)}}</td>
                        <td></td>
                        <td>Amaun Pokok</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->amaun_pokok,2)}}</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->cost_outstanding,2)}}</td>
                    </tr>
                    <tr>
                        <td>Caj Keseluruhan</td>
                        <td class="bold" colspan="2">RM {{number_format($data[0]->tot_profit_unearned,2)}}</td>
                        <td></td>
                        <td>Amaun Caj</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->tot_profit_earned,2)}}</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->uei_outstanding,2)}}</td>
                    </tr>
                    <tr>
                        <td>Simpanan Keseluruhan</td>
                        <td class="bold" colspan="2">RM {{number_format($data[0]->savings_to_paid,2)}}</td>
                        <td></td>
                        <td colspan="2">Baki Pembiayaan</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->bal_outstanding,2)}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Keseluruhan</td>
                        <td class="bold" colspan="2">RM {{number_format($data[0]->total,2)}}</td>
                        <td></td>
                        <td colspan="2">Amaun Rebat</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->rebate_amount,2)}}</td>
                    </tr>
                    <tr>
                        <td>Baki Belum diKeluarkan</td>
                        <td class="bold" colspan="2">RM {{number_format($data[0]->undrawn_amount,2)}}</td>
                        <td></td>
                        <td colspan="2">Jumlah Simpanan</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->savings_balance,2)}}</td>
                    </tr>
                    <tr>
                        <td>Tarikh Mula | Akhir Bayar</td>
                        <td class="bold" style="width: 5%;">{{isset($data[0]->start_instal_date) ? date("d-m-Y", strtotime(substr($data[0]->start_instal_date,0,10))):''}}</td>
                        <td class="bold" style="width: 10%;">{{isset($data[0]->expiry_date) ? date("d-m-Y", strtotime(substr($data[0]->expiry_date,0,10))):''}}</td>
                        <td></td>
                        <td colspan="2"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="bg-gray-700 text-white p-2">Status Kredit | NPL </td>
                        <td></td>
                        <td colspan="3" class="bg-gray-700 text-white p-2">Owings</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="bold">Status</td>
                        <td class="bold">Tarikh Berlaku</td>
                        <td></td>
                        <td colspan="2">Jumlah Owings</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->total_owings,2)}}</td>
                    </tr>
                    <tr>
                        <td>Status Kredit</td>
                        <td class="bold">{{$data[0]->credit_status}}</td>
                        <td class="bold">{{ isset($data[0]->credit_status_chgdate) ? date("d-m-Y", strtotime(substr($data[0]->credit_status_chgdate,0,10))):''}}</td>
                        <td></td>
                        <td colspan="2">Owings Telah Bayar</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->owings_paid,2)}}</td>
                    </tr>
                    <tr>
                        <td>Status NPL</td>
                        <td class="bold">{{$data[0]->npf_status}}</td>
                        <td class="bold">{{isset($data[0]->npf_changed_date) ? date("d-m-Y", strtotime(SUBSTR($data[0]->npf_changed_date,0,10))):''}}</td>
                        <td></td>
                        <td colspan="2">Baki Owings</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->owing_amt,2)}}</td>
                    </tr>
                    <tr>
                        <td>Tunggakan</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->instal_arrears,2)}}</td>
                        <td class="bold">{{$data[0]->instal_mode}} &nbsp Kali Bayaran</td>
                        <td></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="bg-gray-700 text-white p-2">Butiran Pembayaran | Ansuran </td>
                    </tr>
                    <tr>
                        <td colspan="2">Ansuran Terakhir diTerima</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->last_pymt_amt,2)}}</td>
                        <td></td>
                        <td colspan="2">Tarikh Terakhir diTerima</td>
                        <td class="bold">{{isset($data[0]->last_payment_date) ? date("d-m-Y", strtotime(substr($data[0]->last_payment_date,0,10))):''}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Bil. | No. Pembayaran</td>
                        <td class="bold">{{$data[0]->instalment_no}}</td>
                        <td></td>
                        <td colspan="2">Jumlah Pembayaran</td>
                        <td class="bold">RM {{NUMBER_FORMAT($data[0]->payment_amount,2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Tarikh Pembayaran Terkini</td>
                        <td class="bold">{{isset($data[0]->last_payment_date) ? date("d-m-Y", strtotime(substr($data[0]->last_payment_date,0,10))):''}}</td>
                        <td></td>
                        <td colspan="2">Sila Bayar Sebelum</td>
                        <td class="bold">{{isset($data[0]->last_instal_due_date) ? date("d-m-Y", strtotime(substr($data[0]->last_instal_due_date,0,10))):''}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Bayaran Seterusnya Pada</td>
                        <td class="bold">{{isset($data[0]->instal_due_date) ? date("d-m-Y", strtotime(SUBSTR($data[0]->instal_due_date,0,10))):''}}</td>
                        <td></td>
                        <td>Ansuran</td>
                        <td class="bold">RM{{NUMBER_FORMAT($data[0]->install_amt,2)}}</td>
                        <td class="bold">{{$data[0]->instmode}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Tarikh Mula Bayar</td>
                        <td class="bold">{{isset($data[0]->start_instal_date) ? date("d-m-Y", strtotime(SUBSTR($data[0]->start_instal_date,0,10))):''}}</td>
                        <td></td>
                        <td>Kemaskini Akhir</td>
                        <td class="bold">{{isset($data[0]->last_modified_date) ? date("d-m-Y", strtotime(substr($data[0]->last_modified_date,0,10))):''}}</td>
                        <td class="bold"> Oleh  {{$data[0]->last_modified_user}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-tab.content>
    <!--End Kedudukan Akaun content -->

    <!--Rekod Bayaran Balik -->
    <x-tab.content name="1">
        <x-table.table>
            <x-slot name="thead">
                <x-table.table-header class="text-left" value="No.Resit" sort="" />
                <x-table.table-header class="text-left" value="Amaun Resit" sort="" />
                <x-table.table-header class="text-left" value="Pegawai Kutipan" sort="" />
                <x-table.table-header class="text-left" value="Tarikh Resit" sort="" />
                <x-table.table-header class="text-left" value="No.Kelompok" sort="" />
                <x-table.table-header class="text-left" value="Jenis Resit" sort="" />
                <x-table.table-header class="text-left" value="No.Cek" sort="" />
                <x-table.table-header class="text-left" value="Kod Bank" sort="" />
                <x-table.table-header class="text-left" value="Key-In Officer" sort="" />
                <x-table.table-header class="text-left" value="Tarikh Transaksi" sort="" />
                <x-table.table-header class="text-left" value="Status Resit" sort="" />
                <x-table.table-header class="text-left" value="Pengesahan" sort="" />

            </x-slot>
            <x-slot name="tbody">
                @foreach ($resit as $item)
                    <tr>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->resit_no}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{number_format($item->resit_amount,2)}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->collector}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->resitdt}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->bis_no}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->type}} 
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->cheque_no}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->cheque_bank_code}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->officer_incharge}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->trx_date}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->status_resit}}
                        </x-table.table-body>
                        <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                            {{$item->vld_status}}
                        </x-table.table-body>
                    </tr>
                @endforeach
            </x-slot>
        </x-table.table>
    </x-tab.content>
    <!--End Rekod Bayaran Balik -->
</div>