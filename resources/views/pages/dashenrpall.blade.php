@extends('pages.layout.app')
@section('content')

<style>
  @media (min-width: 1280px){
      .container {
          max-width: 100vw !important;
      }
  }
</style>


<div class="card-body">
  @livewire('dashenrp', [
    'id'=> $id
  ])
{{-- 
  @livewire('dashenrp') --}}

</div>

@endsection