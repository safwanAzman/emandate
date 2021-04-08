@extends('pages.layout.app')
@section('content')
<main class="h-full">
	<div class="container px-6 mx-auto grid">
		<div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">			
			<x-general.title-header title="Maklumat Detail ENRP"/>
			<div class="container my-12 mx-auto px-4 md:px-12">
				<x-general.grid mobile="1" gap="5" sm="1" md="2" lg="2" xl="2" class="col-span-6">
          @foreach ($NERPS_details as $item)
					<div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Nama Fail</p>
              <p>{{ $item->filename }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">No Akaun</p>
              <p>{{ $item->payrefnum }}</p>
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
              <p class="text-lg font-semibold">Bahagian</p>
              <p>{{ $item->section }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Kad Pengenalan</p>
              <p>{{ $item->idnum }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Jumlah Potongan</p>
              <p>{{ number_format(substr($item->debitamt,8,6)) }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Skim</p>
              <p>{{ $item->purpose }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Status</p>
              <p>{{ $item->approval_desc }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Tarikh Mula Arahan Potongan</p>
              <p>{{ substr($item->effdate,0,2).'-'.substr($item->effdate,2,2).'-'.substr($item->effdate,4,4) }}</p>
            </div>
          </div>
          <div class="bg-white shadow-lg p-4 rounded-lg">
            <div class="">
              <p class="text-lg font-semibold">Tarikh Akhir Arahan Potongan</p>
              <p>{{ substr($item->expdate,0,2).'-'.substr($item->expdate,2,2).'-'.substr($item->expdate,4,4) }}</p>
            </div>
          </div>
          @endforeach
				</x-general.grid>
        <div class="flex flex-wrap justify-center mt-16">
          <a href="{{ url('linkmainenrp/'.$item->hcrdate.'')}}" class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Back</a>
        </div>
			</div>
		</div>
	</div>
</main>
@endsection