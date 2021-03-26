@extends('pages.layout.app')
@section('content')

  <main class="h-full">
    @livewire('search-enrp-details', [
      'id'=> $id
    ])
  </main>
  
@endsection