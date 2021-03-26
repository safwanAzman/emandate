@extends('pages.layout.app')
@section('content')
<main class="h-full">
	<div class="container px-6 mx-auto grid">
		<div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">			
			<x-general.title-header title="Laporan E-mandate"/>
			<div class="container my-12 mx-auto px-4 md:px-12">
				<x-general.grid mobile="1" gap="5" sm="1" md="4" lg="4" xl="4" class="col-span-6">

          <x-card.card-icon title="Laporan ENRP" color="blue" route="{{ route('report.enrp') }}">
            <x-heroicon-o-document-text class="w-6 h-6" />
          </x-card.card-icon> 

          <x-card.card-icon title="Laporan Transaksi Lulus" color="green" route="{{ route('report.respass') }}">
            <x-heroicon-o-document-text class="w-6 h-6" />
          </x-card.card-icon> 

          <x-card.card-icon title="Laporan Customer On Hold" color="yellow" route="{{ route('report.holdall') }}">
            <x-heroicon-o-document-text class="w-6 h-6" />
          </x-card.card-icon> 

          <x-card.card-icon title="Laporan Transaksi Gagal" color="red" route="{{ route('report.resfail') }}">
            <x-heroicon-o-document-text class="w-6 h-6" />
          </x-card.card-icon> 

				</x-general.grid>
			</div>
		</div>
	</div>
</main>
@endsection