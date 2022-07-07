<div class="container px-6 mx-auto grid">
    <x-minnor-loading />

    @php
        $branch_code = session('authenticatedUser')['branch_code'];
        //dump($branch_code);
    @endphp
    

    <div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
        <x-general.title-header title="Senarai Nama (Tindakan Sekatan)" />
        <div class="container" x-data="{ show: false, fms_acct_no: '0'}" x-cloak>

            <div class="flex justify-start p-4 max-w-md">
                <x-form.search-input label="Carian : No Akaun / Nama" wire:model="searchTerm" />
            </div>

            <x-general.grid mobile="1" gap="5" sm="1" md="1" lg="1" xl="1" class="col-span-6 px-6">
                <x-table.table>
                    <x-slot name="thead">
                        <x-table.table-header class="text-left" value="No Akaun" sort="" />
                        <x-table.table-header class="text-left" value="Nama" sort="" />
                        <x-table.table-header class="text-left" value="No Akaun Belian" sort="" />
                        <x-table.table-header class="text-left" value="Tarikh Daftar" sort="" />
                        <x-table.table-header class="text-left" value="Bank ID" sort="" />
                        <x-table.table-header class="text-left" value="Bilangan Bulan" sort="" />
                        <x-table.table-header class="text-left" value="Tarikh Sekatan" sort="" />
                        <x-table.table-header class="text-left" value="Oleh" sort="" />
                        <x-table.table-header class="text-left" value="Status" sort="" />
                        <x-table.table-header class="text-left" value="Catatan" sort="" />
                        <x-table.table-header class="text-left" value="" sort="" />
                    </x-slot>

                    <x-slot name="tbody">
                        @forelse ($INFOS_ACTION as $item)
                        <tr>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700">
                                {{ ($item->fms_acct_no) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($item->buyername) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($item->buyeracct) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ substr($item->appdate,0,10) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($item->buybankid) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($item->blockpayment_flag) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ substr($item->blockpayment_date,0,10) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($item->blockedby) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($item->status_desc) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{ ($item->reasons) }}
                            </x-table.table-body>
                            <x-table.table-body colspan="" class="text-sm font-medium text-gray-700 ">
                                {{-- <a href = "{{ url('linkmainenrp/'.$item->fms_acct_no.'')}}" onclick = "loading()"
                                class="bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded
                                inline-flex items-center">
                                <x-heroicon-o-eye class="w-5 h-5" />
                                <p class="ml-1">Papar </p>
                                </a> --}}
                                <div>
                                    {{-- <button @click={show=true,fms_acct_no={{$item->fms_acct_no}}}  
                                        class="bg-orange-400 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded">Papar 
                                    </button> --}}
                                    <button @click={show=true}  
                                        class="bg-orange-400 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded">Papar 
                                    </button>
                                </div>
                                <form>
                                    <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                        <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
                                            style="width: 600px; margin-top:315px">
                                            <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                                <!-- start header Title -->
                                                <div class="flex justify-between px-6 py-3 text-xl border-b font-bold items-center">
                                                    <div class="">
                                                        Ulasan/Keterangan
                                                    </div>
                                                    <div wire:loading wire:target="activestatus">
                                                        <div class="flex space-x-2 text-blue-600 font-semibold">
                                                            <p class="text-sm">Sila tunggu sebentar </p>
                                                            <svg class="w-5 h-5 mr-2 animate-spin" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line>
                                                                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                                                <line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line>
                                                                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                                                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end header Title -->
                        
                                                <!-- start content -->
                                                    {{-- <span x-text=fms_acct_no></span> --}}
                                                    <div class="py-4 px-4">
                                                        <p id="acc"></p>
                                                        <p id="buyer"></p>
                                                        {{-- <p id="reasons"></p> --}}
                                                        Nombor Akaun : <b>{{ ($item->fms_acct_no) }}</b>
                                                        
                                                        <div>
                                                            <select class="mt-1 block w-1/2 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none " name="action" wire:model='status'>
                                                                <option value="99" >SILA PILIH</option>
                                                                <option value="1" id="desc">ON-HOLD</option>
                                                                <option value="0" id="desc">RE-ACTIVE</option>
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <!-- text area -->
                                                            <label class="block">
                                                                <textarea class="form-textarea mt-1 block w-full" rows="3" id="myTextarea"  wire:model='reasons'
                                                                    placeholder="Ulasan Tidak boleh melebihi 100 patah perkataan. @error('reasons') is-invalid @enderror"
                                                                    name="reasons" maxlength="100" required>{{ old('reasons') }} 
                                                                    {{-- <p id="reasons"></p> --}}
                                                                </textarea>
                                                            </label>
                                                            <!-- end text area -->
                                                        </div>
                                                    </div>
                                                <!-- end content -->
                        
                                                <!-- start footer -->
                                                <div class="px-6 py-3 border-t">
                                                    <div class="flex justify-end src=your-loader-url">
                                                        <button @click={show=false} type="button"
                                                            class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Tutup</Button>
                                                        <button @click={show=true} type="sumbit"  wire:click="activestatus({{ ($item) }})"
                                                            class="bg-blue-600 text-gray-200 rounded px-4 py-2">Simpan</Button>
                                                    </div>
                                                </div>
                                                <!-- end footer -->
                                            </div>
                                        </div>
                                        <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
                                        </div>
                                    </div>
                                </form>
                            </x-table.table-body>
                        </tr>
                        @empty
                            <tr> 
                                <x-table.table-body colspan="12" class="text-sm font-medium text-gray-700 text-center">
                                    Tiada Maklumat
                                </x-table.table-body>
                            </tr> 
                    @endforelse
                    </x-slot>
                </x-table.table>
                {{-- {{$INFOS_ACTION->links()}} --}}
            </x-general.grid>

        <!-- start modal -->
        
        <!-- end modal -->


        </div>
    </div>
</div>
<script>
    // function passvalue(item){
    //     document.getElementById("acc").innerHTML = item.fms_acct_no;
    //     // document.getElementById("buyer").innerHTML = item.buyername;
    //     // document.getElementById("desc").innerHTML = item.status_desc;
    //     document.getElementById("reasons").value = item.reasons;
    //     // document.getElementById("blocked_paymnt_status").innerHTML = item.blocked_paymnt_status;  
    // }

    function updateStatus(item){
        alert('asdasd')
         {{ route('EmandateInfo.activestatus') }}
    }

</script>



