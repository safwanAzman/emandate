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
        <div class="flex flex-col lg:flex-row bg-white shadow-lg mb-4">
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
                <p class="font-semibold mb-2 block lg:hidden">Status :</p>
                <div class="flex space-x-2 overflow-y-auto">
                    <p class="font-semibold hidden lg:block">Status :</p>
                    @foreach ($trafik as $item)
    
                        <div class="{{ $item->nod > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">NOD</p>
                        </div>
    
                        <div class="{{ $item->saman > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">SMN</p>
                        </div>
    
                        <div class="{{ $item->bankcrupt > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">BNC</p>
                        </div>
                        
                        <div class="{{ $item->wss > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">WSS</p>
                        </div>
    
                        <div class="{{ $item->jds > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">JDS</p>
                        </div>
    
                        <div class="{{ $item->ramci > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">RAMCI</p>
                        </div>
    
                        <div class="{{ $item->ctos > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">CTOS</p>
                        </div>
    
                        <div class="{{ $item->ps1 == 'Y' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">PS</p>
                        </div>
    
                        <div class="{{ $item->phccc > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">PHCCC</p>
                        </div>
    
                        <div class="{{ $item->emandate > 0 ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-900' }} font-semibold px-2 py-1 rounded-full flex items-center">
                            <p class="text-xs">eMan</p>
                        </div>
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
    
            <div class="flex flex-col mx-4">
                <div class="-my-2 overflow-x-auto">
                    <div class="py-2 align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                            <table class="data-table min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-800">
                                        <tr>
                                            <th data-priority="1" class="uppercase text-xs text-white text-left">No.Resit</th>
                                            <th data-priority="2" class="uppercase text-xs text-white text-left">Amaun Resit</th>
                                            <th data-priority="3" class="uppercase text-xs text-white text-left">Pegawai Kutipan</th>
                                            <th data-priority="4" class="uppercase text-xs text-white text-left">Tarikh Resit</th>
                                            <th data-priority="5" class="uppercase text-xs text-white text-left">No.Kelompok</th>
                                            <th data-priority="6" class="uppercase text-xs text-white text-left">Jenis Resit</th>
                                            <th data-priority="7" class="uppercase text-xs text-white text-left">No.Cek</th>
                                            <th data-priority="8" class="uppercase text-xs text-white text-left">Kod Bank</th>
                                            <th data-priority="9" class="uppercase text-xs text-white text-left">Key-In Officer</th>
                                            <th data-priority="10" class="uppercase text-xs text-white text-left">Tarikh Transaksi</th>
                                            <th data-priority="11" class="uppercase text-xs text-white text-left">Status Resit</th>
                                            <th data-priority="12" class="uppercase text-xs text-white text-left">Pengesahan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($resit as $item)
                                            <tr>
                                                <td class="text-sm text-left">{{$item->resit_no}}</td>
                                                <td class="text-sm text-left">{{number_format($item->resit_amount,2)}}</td>
                                                <td class="text-sm text-left">{{$item->collector}}</td>
                                                <td class="text-sm text-left whitespace-no-wrap">{{$item->resitdt}}</td>
                                                <td class="text-sm text-left">{{$item->bis_no}}</td>
                                                <td class="text-sm text-left">{{$item->type}} </td>
                                                <td class="text-sm text-left">{{$item->cheque_no}}</td>
                                                <td class="text-sm text-left">{{$item->cheque_bank_code}}</td>
                                                <td class="text-sm text-left">{{$item->officer_incharge}}</td>
                                                <td class="text-sm text-left">{{$item->trx_date}}</td>
                                                <td class="text-sm text-left">{{$item->status_resit}}</td>
                                                <td class="text-sm text-left">{{$item->vld_status}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
        </x-tab.content>
        <!--End Rekod Bayaran Balik -->
    </div>