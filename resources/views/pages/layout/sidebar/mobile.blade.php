    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    ></div>
    
    <aside
    class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto  bg-gray-900 dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20"
    @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu"
    >
    
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
                            <x-heroicon-o-cube class="w-5 h-5" />
                        </x-slot>
                    </x-sidebar.dropdown-item>

                    <x-sidebar.dropdown-item title="ENRP" href="{{ route('searchenrp.index') }}" uri="emandate/search_mainenrp">
                        <x-slot name="icon">
                            <x-heroicon-o-cube class="w-5 h-5" />
                        </x-slot>
                    </x-sidebar.dropdown-item>

                    <x-sidebar.dropdown-item title="CFT" href="{{ route('searchcft.index') }}" uri="emandate/search_cftlist">
                        <x-slot name="icon">
                            <x-heroicon-o-cube class="w-5 h-5" />
                        </x-slot>
                    </x-sidebar.dropdown-item>

                    <x-sidebar.dropdown-item title="CARIAN" href="{{ route('search.index') }}" uri="emandate/search-box">
                        <x-slot name="icon">
                            <x-heroicon-o-cube class="w-5 h-5" />
                        </x-slot>
                    </x-sidebar.dropdown-item>

                    <x-sidebar.dropdown-item title="LAPORAN" href="{{ route('report.dashboard') }}" uri="emandate/emandate-report">
                        <x-slot name="icon">
                            <x-heroicon-o-cube class="w-5 h-5" />
                        </x-slot>
                    </x-sidebar.dropdown-item>

                    <x-sidebar.dropdown-item title="RUJUKAN KOD" href="{{ route('RujukanKod.index') }}" uri="emandate/RujukanKod">
                        <x-slot name="icon">
                            <x-heroicon-o-cube class="w-5 h-5" />
                        </x-slot>
                    </x-sidebar.dropdown-item>

                    @if (session('authenticatedUser')['branch_code'] == '0009')
                    <x-sidebar.dropdown-item title="TETAPAN TARIKH" href="{{ route('fullcalander.index') }}" uri="emandate/fullcalendareventmaster">
                        <x-slot name="icon">
                            <x-heroicon-o-cube class="w-5 h-5" />
                        </x-slot>
                    </x-sidebar.dropdown-item>
                    @endif

                </div>
            </x-sidebar.dropdown-nav-item>
            {{-- END EMANDED --}}
        </ul>
    </div>
    </aside>