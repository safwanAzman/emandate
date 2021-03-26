@extends('pages.layout.app')
@section('content')
{{-- <style>
  @media (min-width: 1280px){
      .container {
          max-width: 100vw !important;
      }
  }
</style> --}}

  {{-- <table>
      <thead>
        <tr>
          <td>NAMA FAIL</td>
          <td>NO AKAUN</td>
          <td>STATUS</td>
          <>
        </tr>
      </thead>
      <tbody>
        @foreach ($cftdata as $item)
        <tr>
          <td>
            {{ $item->filename }}
          </td>
          <td>
            {{ $item->buyeracc }}
          </td>
          <td>
            {{ $item->status }}
          </td>
        </tr>
        @endforeach
      </tbody>
  </table> --}}
  
   
  {{-- <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    <br>
      Senarai CFT E-Mandate
   </h4>

<div class = "container">

  <div class="w-full overflow-hidden rounded-lg shadow-xs">
   <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
      <thead>
        <tr
          class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-1 py-2">Nama Fail</th>
          <th class="px-1 py-2">No Account</th>
          <th class="px-1 py-2">Status</th>
        </tr>
      </thead>
      <tbody
        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($cftdata as $item)
        <tr class="text-gray-700 dark:text-gray-400">
          <td class="px-1 py-2">
            <div class="flex items-center text-sm">
              <!-- Avatar with inset shadow -->
              <div
                class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
              </div>
              {{ $item->filename }}
            </div>
          </td>

          <td class="px-1 py-2">
            <div class="flex items-center text-sm">
              <!-- Avatar with inset shadow -->
              <div
                class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
              </div>
              {{ $item->buyeracc }}
            </div>
          </td>

          <td class="px-1 py-2">
            <div class="flex items-center text-sm">
              <!-- Avatar with inset shadow -->
              <div
                class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
              </div>
              {{ $item->status }}
            </div>
          </td>
          
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  {{ $cftdata->links() }}
</div> --}}
{{-- @endsection --}}



<main class="h-full pb-16 overflow-y-auto">
<div class="container">
  <div class=" grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Senarai Fail CFT
    </h2>

    <input type="text"  class="form-control" placeholder="Search" wire:model="searchCFTTerm" /> 

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
                  placeholder="Search for filename"
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
              <th style='width: 200px;'>Nama Fail</th>
              <th style='width: 100px;'>No Akaun</th>
              <th style='width: 100px;'>Status</th>
              <th style='width: 100px;'>Action</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($cftdata as $item)
         
            <tr 
              {{-- class="text-gray-700 dark:text-gray-400"> --}}
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
             
              <td style='width: 200px;'>
                 {{ $item->filename }} 
              </td>
              <td style='width: 100px;'>
              <a href = "{{ url('linkcft/'.$item->buyeracc.'')}}"> {{ $item->buyeracc }}</a>
              </td>
              <td style='width: 100px;'>
                  {{ $item->status }}
              </td>

              <td style='width: 100px;'>
                <button class="btnsmall button3" onclick="window.location='#'">HOLD</button>
                <button class="btnsmall button4" onclick="window.location='#'">RE-ACTIVE</button>
              </td>  


            </tr>

          @endforeach
          </tbody>
        </table>
      </div>
      {{ $cftdata->links() }}
      <!--<div
        class="grid px-1 py-2 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
      >
        <span class="flex items-center col-span-3">
          Showing 21-30 of 100
        </span>
        <span class="col-span-2"></span>
        
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
          <nav aria-label="Table navigation">
            <ul class="inline-flex items-center">
              <li>
                <button
                  class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                  aria-label="Previous"
                >
                  <svg
                    aria-hidden="true"
                    class="w-4 h-4 fill-current"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                    ></path>
                  </svg>
                </button>
              </li>
              <li>
              <button
                  class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                >
                  1
                </button>
              </li>
              <li>
                <button
                  class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                >
                  2
                </button>
              </li>
              <li>
                <button
                  class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                >
                  3
                </button>
              </li>
              <li>
                <button
                  class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                >
                  4
                </button>
              </li>
              <li>
                <span class="px-3 py-1">...</span>
              </li>
              <li>
                <button
                  class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                >
                  8
                </button>
              </li>
              <li>
                <button
                  class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                >
                  9
                </button>
              </li>
              <li>
                <button
                  class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                  aria-label="Next"
                >
                  <svg
                    class="w-4 h-4 fill-current"
                    aria-hidden="true"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                    ></path>
                  </svg>
                </button>
              </li>
            </ul>
          </nav>
        </span>
      </div>  -->
    </div>

    <!-- With actions -->
    
  </div>
</div>

</main>
@endsection


