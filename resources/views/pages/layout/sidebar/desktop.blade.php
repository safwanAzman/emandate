<!-- Desktop sidebar -->
<aside class="z-20 flex-shrink-0 hidden w-60 overflow-y-auto bg-blue-900 rounded-tr-3xl rounded-br-3xl md:block">
    <div class="animate">
        <div class="text-white">
            <div class="flex p-2  bg-blue-900">
                <div class="flex mx-auto">
                    <img src="{{asset('img/logo.png')}}" class="w-auto h-24"/>
                </div>
            </div>
            <div>
                <ul class="mt-6 leading-10">

                    {{-- START DASHBOARD --}}
                    <x-sidebar.nav-item title="DASHBOARD" route="{{ route('dashboard') }}" uri="/">
                        <x-heroicon-o-chart-pie class="w-7 h-7" />
                    </x-sidebar.nav-item>
                    {{-- END DASHBOARD --}}

                    {{-- START EMANDED --}}
                    <x-sidebar.dropdown-nav-item active="open" title="e-MANDATE" uri="emandate/*">
                        <x-slot name="icon">
                            <x-heroicon-o-archive class="w-7 h-7" />
                        </x-slot>
                        <div class="leading-5">
                            <x-sidebar.dropdown-item title="HOME" href="{{ route('emandate.dashboard') }}" uri="emandate/emandate-dashboard">
                                <x-slot name="icon">
                                    <x-heroicon-o-home class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>

                            <x-sidebar.dropdown-item title="ENRP" href="{{ route('searchenrp.index') }}" uri="emandate/search_mainenrp">
                                <x-slot name="icon">
                                    <x-heroicon-o-clipboard-list class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>

                            <x-sidebar.dropdown-item title="CFT" href="{{ route('searchcft.index') }}" uri="emandate/search_cftlist">
                                <x-slot name="icon">
                                    <x-heroicon-o-clipboard-list class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>

                            <x-sidebar.dropdown-item title="CARIAN" href="{{ route('search.index') }}" uri="emandate/search-box">
                                <x-slot name="icon">
                                    <x-heroicon-o-document-search class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>

                            <x-sidebar.dropdown-item title="LAPORAN" href="{{ route('report.dashboard') }}" uri="emandate/emandate-report">
                                <x-slot name="icon">
                                    <x-heroicon-o-clipboard-list class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>

                            <x-sidebar.dropdown-item title="RUJUKAN KOD" href="{{ route('RujukanKod.index') }}" uri="emandate/RujukanKod">
                                <x-slot name="icon">
                                    <x-heroicon-o-collection class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>

                            @if (session('authenticatedUser')['branch_code'] == '0009')
                            <x-sidebar.dropdown-item title="TETAPAN TARIKH" href="{{ route('fullcalander.index') }}" uri="emandate/fullcalendareventmaster">
                                <x-slot name="icon">
                                    <x-heroicon-o-calendar class="w-5 h-5" />
                                </x-slot>
                            </x-sidebar.dropdown-item>
                            @endif

                        </div>
                    </x-sidebar.dropdown-nav-item>
                    {{-- END EMANDED --}}
                </ul>
            </div>
        </div>
    </div>
</aside>