@extends('pages.layout.app')
@section('content')

<main class="h-full">
  @livewire('rptholdall', ['id' => $id])
</main>

@endsection