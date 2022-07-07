@foreach ($INFOS as $item)
{{-- {{dd($item)}} --}}
<div class="">
    
    <form method="post" action="{{ route('EmandateInfo.activestatus') }}">
        @csrf
        <input type="hidden" name="itemid" value="{{ $item->idnum }}">
        @if (session('authenticatedUser')['branch_code'] == '0009' ||
            session('authenticatedUser')['branch_code'] == '0004' ||
            session('authenticatedUser')['branch_code'] == '0016')
            @if ($item->code_blocked == '02')
            <div class="flex justify-between">
                <div>
                    <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none " id="action" name="action" disabled >
                        <option value="" {{$item->blocked_paymnt_status == null ? 'selected':''}}>
                            SILA PILIH</option>
                        <option value="0" {{$item->blocked_paymnt_status == 0 ? 'selected':''}}>
                            RE-ACTIVE</option>
                        <option value="1" {{$item->blocked_paymnt_status == 1 ? 'selected':''}}>
                            ON-HOLD</option>
                    </select>
                </div>

                <!-- start modal -->
                <div x-data="{ show: false }" x-cloak>
                    <div class="flex justify-center">
                        <button @click={show=true} type="button"
                            class="leading-tight bg-blue-500 text-gray-200 rounded px-6 py-2 text-sm focus:outline-none focus:border-white"
                            hidden>Tindakan
                        </Button>
                    </div>
                    <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                        <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
                            style="width: 600px; margin-top:315px">
                            <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                <div class="flex justify-between px-6 py-3 text-xl border-b font-bold items-center">
                                    <div class="">
                                        Ulasan/Keterangan
                                    </div>
                                    <div class="flex space-x-2 text-blue-600 font-semibold" id="myDIV" style="visibility: hidden;">
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
                                <div class="p-6 flex-grow">
                                    <!-- text area -->
                                    <label class="block">
                                        <textarea class="form-textarea mt-1 block w-full" rows="3" id="myTextarea"
                                            placeholder="Ulasan Tidak boleh melebihi 100 patah perkataan. @error('reasons') is-invalid @enderror"
                                            name="reasons" maxlength="100" required>{{ old('reasons') }}</textarea>
                                    </label>
                                    <!-- end text area -->
                                </div>
                                <div class="px-6 py-3 border-t">
                                    <div class="flex justify-end src=your-loader-url">
                                        <button @click={show=false} type="button"
                                            class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Tutup</Button>
                                        <button @click={show=true} type="sumbit"
                                            class="bg-blue-600 text-gray-200 rounded px-4 py-2" onclick = "loadingModal()">Simpan</Button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
                        </div>
                    </div>
                </div>
                <!-- end modal -->
            </div>
            @else
            <div class="flex flex-col justify-between px-4 py-4 space-y-4 border-b-2 md:space-y-0 lg:flex-row items-center">
            {{-- <div class="grid grid-cols-3 md:grid-cols-1 gap-3"> --}}
            {{-- <x-general.grid mobile="1" gap="0" sm="1" md="1" lg="1" xl="3" class="col-span-12"> --}}
                <div>
                    <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none " id="action" name="action" onchange="selBlock(this)">
                        <option value="99" {{$item->blocked_paymnt_status == null ? 'selected':''}} disabled>SILA PILIH</option>
                        <option value="0"
                            {{$item->blocked_paymnt_status == 0 and $item->blocked_paymnt_status != null  ? 'selected':''}}>
                            RE-ACTIVE
                        </option>
                        <option value="1"
                            {{$item->blocked_paymnt_status == 1 and $item->blocked_paymnt_status != null  ? 'selected':''}}>
                            ON-HOLD
                        </option>
                    </select>
                </div>

                    <div 
                        id="pilihTarikh" 
                        style="display: none;"
                        >
                        <div class="flex flex-col justify-between px-4 py-4 space-y-4 md:space-y-0 lg:flex-row items-center space-x-4">
                            <label class="text-sm font-semibold text-gray-700">
                                Tarikh Mula
                            </label>
                            <input
                                class="block transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                type="month"
                                id="start_date" name="start_date"
                            >
                            <label class="text-sm font-semibold text-gray-700 ">
                                Tarikh Akhir
                            </label>
                            <input
                                class="block transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
                                type="month"
                                id="end_date" name="end_date"
                            >
                        </div>
                    </div>
            
                <!-- start modal -->
                <div x-data="{ show: false }" x-cloak>
                    <div class="flex justify-center">
                        <button @click={show=true} type="button"
                            class="leading-tight bg-blue-500 text-gray-200 rounded px-6 py-2 text-sm focus:outline-none focus:border-white">
                            Tindakan
                        </Button>
                    </div>
                    <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                        <div @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full"
                            style="width: 600px; margin-top:315px">
                            <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                {{-- <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold"></button>  <!--&times;--> --}}
                                <div class="flex justify-between px-6 py-3 text-xl border-b font-bold items-center">
                                    <div class="">
                                        Ulasan/Keterangan
                                    </div>
                                    <div class="flex space-x-2 text-blue-600 font-semibold" id="myDIV" style="visibility: hidden;">
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
                                <div class="p-6 flex-grow">
                                    <!-- text area -->
                                    <label class="block">
                                        <textarea class="form-textarea mt-1 block w-full" rows="3" id="myTextarea"
                                            placeholder="Ulasan Tidak boleh melebihi 100 patah perkataan. @error('reasons') is-invalid @enderror"
                                            name="reasons" maxlength="100" required>{{ old('reasons') }}</textarea>
                                    </label>
                                    <!-- end text area -->
                                </div>
                                <div class="px-6 py-3 border-t">
                                    <div class="flex justify-end src=your-loader-url">
                                        <button @click={show=false} type="button"
                                            class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Tutup</Button>
                                        <button @click={show=true} type="sumbit"
                                            class="bg-blue-600 text-gray-200 rounded px-4 py-2" id="submit-tindakan" onclick ="loadingModal()">Simpan</Button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
                        </div>
                    </div>
                </div>
            {{-- </x-general.grid> --}}
                <!-- end modal -->
            </div>
            @endif
		@endif
    </form>
</div>
<table class="w-full mt-4">
    <tbody class="bg-white">
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Kod
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ $item->blocked_paymnt_status }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Status
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ $item->status_desc }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Tarikh Mula Sekatan
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ isset($item->start_date) ? date('d-m-Y',strtotime($item->start_date)):'-' }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Tarikh Bayar Semula
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ isset($item->end_date) ? date('d-m-Y',strtotime($item->end_date)):'-' }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Bilangan Gagal Bayar
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ $item->failed_count_mon }} Kali Gagal daripada 6</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Dikemaskini Oleh
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <p>{{ $item->blockedby }}</p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="px-4 py-4 border font-semibold">
                Ulasan/Keterangan:
            </td>
            <td class="px-4 py-4 border">
                <div class="flex-grow">
                    <div class="text-sm leading-5 text-gray-800">
                        <textarea class="form-textarea mt-1 block w-full" rows="3" disabled>{{ $item->reasons }}</textarea>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@endforeach
@push('js')

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

@push('js')

{{-- <script>
    $('#submit-tindakan').on('click', function (e) {
        e.preventDefault();
        var dt_start = $('#start_date').val();
        var dt_end = $('#end_date').val();
        if(dt_start == '' && dt_end != '')
        {
            swal.fire({
                icon: 'warning',
                title: "Sila pilih tarikh mula!",
                showConfirmButton: false,
            });
        }
        else if(dt_start != '' && dt_end == '')
        {
            swal.fire({
                icon: 'warning',
                title: "Sila pilih tarikh akhir!",
                showConfirmButton: false,
            });
        }
    });
</script> --}}

<script>
    function loadingModal()  {
        var x = document.getElementById("myDIV");
        var y = document.getElementById("myTextarea");
        if ($.trim(y.value) == '') {
            x.style.visibility = "hidden";
        }
        else {
            x.style.visibility = "visible";
        }
        
    }
</script>

<script>
    function selBlock(select) {
        if(select.value == "1"){
            document.getElementById('pilihTarikh').style.display = "inline-block";
        }
        else{
            document.getElementById('pilihTarikh').style.display = "none";
        }
    }
</script>

<script>
    //Display Only Date till today // 
    $(document).ready(function(){
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1; // getMonth() is zero-based
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        else
            month = month.toString();

        var minDate = year + '-' + month;
        $('#start_date').attr('min', minDate);
        $('#end_date').attr('min', minDate);
    });
</script>
    
<script>
    @if (session('alert'))
        // swal({{ session('alert') }});
        swal.fire({
            icon: 'warning',
            title: "Sila pilih tarikh mula dan tarikh akhir",
            showConfirmButton: false,
        });
    @endif
</script>
@endpush
