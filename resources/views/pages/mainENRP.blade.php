@extends('pages.layout.app')
@section('content')
 <style>
  @media (min-width: 1280px){
      .container {
          max-width: 100vw !important;
      }
  }
</style> 

  {{-- <table>
      <thead>
        <tr>
          <td>FILENAME</td>
        </tr>
      </thead>
      <tbody>
        @foreach ($file_ENRP as $item)
        <tr>
          <td>
            {{ $item->filename }}
          </td>
        </tr>
        @endforeach
      </tbody>
  </table> --}}
  
<main class="h-full pb-16 overflow-y-auto">
  <div class=" grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Senarai Fail E-Mandate
    </h2>
    <!-- search section -->
  <div class="flex justify-center flex-1 lg:mr-32">
          <div
            class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
          >
            <div class="absolute inset-y-0 flex items-center pl-2">
              <svg
                class="w-4 h-4"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </div>
            <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                  type="text"
                  placeholder="Carian Nama Fail"
                  aria-label="Search"
                  wire:model="searchCFTTerm"
                  class="form-control"
                />
          </div>
      </div>
  
    <!-- With avatar -->
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
    </h4>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Nama File</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($file_ENRP as $item)
         
            <tr 
              {{-- class="text-gray-700 dark:text-gray-400"> --}}
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <td class="px-4 py-3">
                 <a href = "{{ url('link/'.$item->payrefnum.'')}}"> {{ $item->filename }} </a>
              </td>
              
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
  

    <!-- With actions -->
    
  </div>
</main>
@endsection


