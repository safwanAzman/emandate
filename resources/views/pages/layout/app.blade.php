@extends('pages.layout.base')
@section('body')
<style>
  @media (min-width: 1280px) {
    .container {
      max-width: 100vw !important;

    }
  }
</style>
<div class="flex h-screen bg-gray-200" :class="{ 'overflow-hidden': isSideMenuOpen }">

  @include('pages.layout.sidebar.desktop')
  @include('pages.layout.sidebar.mobile')

  <div class="flex flex-col flex-1 w-full">

    @include('pages.layout.sidebar.topbar')

    <main class="h-full pb-16 overflow-y-auto">
      @yield('content')

    </main>

  </div>
</div>
@endsection