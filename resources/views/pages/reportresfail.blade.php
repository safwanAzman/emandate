@extends('pages.layout.app')
@section('content')

<main class="h-full">
  @livewire('rptresfail', ['id' => $id])
</main>

@endsection