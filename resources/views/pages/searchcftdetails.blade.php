@extends('pages.layout.app')
@section('content')

<main class="h-full">
  @livewire('searchcftlist', ['id'=> $id] )
</main>

@endsection