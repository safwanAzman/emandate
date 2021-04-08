@extends('pages.layout.app')
@section('content')

<main class="h-full">
	<div class="container px-6 mx-auto grid">
		<div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">			
			<x-general.title-header title="Info E-Mandate"/> 

			<div class="container bg-white">
				<x-general.grid mobile="1" gap="1" sm="2" md="2" lg="3" xl="3" class="col-span-6 py-4 px-4">
					@foreach ($INFOS as $item)
						<div>
							<label class="block text-sm font-semibold leading-5 text-gray-700 ">
								No Akaun
							</label>
							<div class="border-2 py-1 px-1 rounded-md text-sm">
								<p>{{ $item->fms_acct_no }}</p>
							</div>
						</div>
						<div>
							<label class="block text-sm font-semibold leading-5 text-gray-700 ">
								Kad Pengenalan
							</label>
							<div class="border-2 py-1 px-1 rounded-md text-sm">
								<p>{{ $item->idnum }}</p>
							</div>
						</div>
						<div>
							<label class="block text-sm font-semibold leading-5 text-gray-700 ">
								Nama Usahawan
							</label>
							<div class="border-2 py-1 px-1 rounded-md text-sm">
								<p>{{ $item->buyername }}</p>
							</div>
						</div>
					@endforeach
				</x-general.grid>
			</div>

			<div class="container grid grid-cols-12 gap-3"  x-data="{ active: 0 }">

				<!--Start tab navigator -->
				<div class="flex col-span-12 lg:col-span-3 xxl:col-span-3 lg:block">
					<div class="w-full my-5 mx-4 bg-white shadow-lg">
						<div class="p-4">
							<x-tab.title name="0" livewire="">
								<div class="flex font-semibold">
									<x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Maklumat Pendaftaran
								</div>
							</x-tab.title>
							<x-tab.title name="1" livewire="">
								<div class="flex font-semibold">
									<x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Arahan Potongan
								</div>
							</x-tab.title>
							<x-tab.title name="2" livewire="">
								<div class="flex font-semibold">
									<x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Status Arahan Potongan (CFT)
								</div>
							</x-tab.title>
							<x-tab.title name="3" livewire="">
								<div class="flex font-semibold">
									<x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Status Sekatan Akaun
								</div>
							</x-tab.title>
							<x-tab.title name="4" livewire="">
								<div class="flex font-semibold">
									<x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Rekod Transaksi
								</div>
							</x-tab.title>
							<x-tab.title name="5" livewire="">
								<div class="flex font-semibold">
									<x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>Rekod Pendaftaran
								</div>
							</x-tab.title>
							<x-tab.title name="6" livewire="">
								<div class="flex font-semibold">
									<x-heroicon-o-clipboard-list class="w-5 h-5 mr-2"/>e-FMS
								</div>
							</x-tab.title>
						</div>
					</div>
				</div>
				<!--End tab navigator -->

				<!--Start tab content -->
				<div class="my-5 mx-4 col-span-12 lg:col-span-9 xxl:col-span-9">
					<x-tab.content name="0">
						<div class="bg-white shadow-lg px-4 py-4 ">
							@include('pages.emandateInfo.maklumat-pendaftaran')
						</div>
					</x-tab.content>
					<x-tab.content name="1">
						<div class="bg-white shadow-lg px-4 py-4 ">
							@include('pages.emandateInfo.arahan-potongan')
						</div>
					</x-tab.content>
					<x-tab.content name="2">
						<div class="bg-white shadow-lg px-4 py-4 ">
							@include('pages.emandateInfo.ctf')
						</div>
					</x-tab.content>
					<x-tab.content name="3">
						<div class="bg-white shadow-lg px-4 py-4 ">
							@include('pages.emandateInfo.sekatan-akaun')
						</div>
					</x-tab.content>
					<x-tab.content name="4">
						<div class="bg-white shadow-lg  py-4 ">
							@include('pages.emandateInfo.rekod-transaksi')
						</div>
					</x-tab.content>
					<x-tab.content name="5">
						<div class="bg-white shadow-lg px-4 py-4 ">
							@include('pages.emandateInfo.rekod-pendaftaran')
						</div>
					</x-tab.content>
					<x-tab.content name="6">
						<div class="bg-white shadow-lg px-1 py-4 ">
							@include('pages.emandateInfo.efms')
						</div>
					</x-tab.content>
				</div>
				<!--End tab content -->
			</div>
			<div class="flex flex-wrap justify-center mt-8">
                <a href="/emandate/search-box" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Back</a>
            </div>
		</div>
	</div>
</main>

@endsection