@extends('pages.layout.app')
@section('content')

<main class="h-full">
  @livewire('rptrespass', ['id' => $id])
</main>

@endsection