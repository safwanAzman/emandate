@extends('pages.layout.app')
@section('content')

<main class="h-full">
  @livewire('rptenrp', ['id' => $id])
</main>

@endsection