@extends('pages.layout.app')
@section('content')
<style>
  @media (min-width: 1280px){
    .container {
    max-width: 100vw !important;
   }
  }
</style>
<div class="container mt-4">
    <div class="row">
      <div class="col-md-8 offset-2">
        <div class="card">
          <div class="card-header bg-success text-white ">
          </div>
          <div class="card-body">
            @livewire('search')
          </div>
        </div>
      </div>
    </div>
</div>
@endsection