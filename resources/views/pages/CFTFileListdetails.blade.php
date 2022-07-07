@extends('pages.layout.app')
@section('content')
<main class="h-full">
	<div class="container px-6 mx-auto grid">
		<div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">
      @foreach ($CFT_details as $item)
      <div class="relative">
        <x-general.title-header title="Maklumat Arahan Potongan Fail Dihantar Ke Bank (CFT)"/>
        <a href="{{ url('linkmainCFT/'.$item->filename.'')}}" class="text-blue-700 absolute top-0 right-0 mx-2 my-2 rounded-md bg-white py-1 px-1 flex items-center">
          <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" /> 
          <p class="text-sm font-semibold">Kembali</p>
        </a>
      </div>					
			@endforeach

			<div class="container my-12 mx-auto px-4 md:px-12">
				<x-general.grid mobile="1" gap="5" sm="1" md="2" lg="2" xl="2" class="col-span-6">
          @foreach ($CFT_details as $item)
					<div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Nama Fail</p>
              <p>{{ $item->filename }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">No. Akaun Bank</p>
              <p>{{ $item->accno }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Kad Pengenalan</p>
              <p>{{ $item->ic }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Nama Usahawan</p>
              <p>{{ $item->buyername }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Amaun Potongan</p>
              <p>{{ $item->tranamt }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Tarikh Mula Potongan</p>
              <p>{{ $item->cft_dt }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Bilangan Percubaan</p>
              <p>{{ $item->noretry }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Emandate</p>
              <p>{{ $item->mandate }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Status</p>
              <p>{{ $item->status_desc }}</p>
            </div>
          </div>
          @endforeach
				</x-general.grid>
			</div>
		</div>
	</div>
</main>
@endsection