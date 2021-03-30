@extends('pages.layout.app')
@section('content')
<main class="h-full">
	<div class="container px-6 mx-auto grid">
		<div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">			
			<x-general.title-header title="Dashboard"/>
			<div class="container my-12 mx-auto px-4 md:px-12">
				<x-general.grid mobile="1" gap="5" sm="1" md="2" lg="4" xl="4" class="col-span-6">
					<x-card.card-bg  
						route="{{ route('emandate.dashboard') }}" 
						img="{{asset('img/emandate.jpg')}}" 
						title="E-Mandate"
					/>
				</x-general.grid>
			</div>
		</div>
	</div>
</main>
@endsection