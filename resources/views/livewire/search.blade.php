

<main class="h-full pb-16 overflow-y-auto">
<div class="container">
<div class="container px-6 mx-auto">
  <div class="bg-blue-800 p-2 shadow text-xl text-white flex justify-between items-center">
    <h3 class="font-bold pl-2">Senarai E-mandate Info</h3>
    <span class=" text-base pr-2 ">
      {{-- Negeri : {{ session()->get('authenticatedUser')['state_name'] }} --}}
              CAWANGAN : {{ session()->get('authenticatedUser')['branch_name'] }}
    </span>
</div>
      <!--start tables-->
 <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
  <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
      <div class="flex justify-between">
          <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
              <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                  <div class="flex">
                      <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                          <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                      </span>
                  </div>
                  <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin"
                  type="text"
                  placeholder="Carian No Akaun/Kad Pengenalan"
                  aria-label="Search"
                  wire:model="searchTerm"
                  />
                </div>
          </div>
      </div>
  </div>
  <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
      <table class="min-w-full">
          <thead>
              <tr>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">No Akaun</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Kad Pengenalan</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Status</th>
                  
              </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($MDT_PRNE as $item)
            <tr>

                      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 text-gray-800">

                                  {{ $item->payrefnum }} 

                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                      <div class="flex items-center">
                          <div>
                              <div class="text-sm leading-5 text-gray-800">
  
                                {{ $item->idnum }}</a>
  
                              </div>
                          </div>
                      </div>
                  </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                      <div class="flex items-center">
                          <div>
                              <div class="text-sm leading-5 text-gray-800">

                                {{ $item->buyername }}

                              </div>
                          </div>
                      </div>
                  </td>

                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm leading-5 text-gray-800">

                              {{ $item->approval_desc }}

                            </div>
                        </div>
                    </div>
                </td>  
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                {{-- <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                  <a href = "{{ url('linkviewsearch/'.$item->payrefnum.'')}}">  Papar </a> 
                </button> --}}
                <a href = "{{ url('linkviewsearch/'.$item->payrefnum.'')}}" class=" text-blue-500" wire:click="loading"> Papar </a>
            </td>
            </tr>
            @endforeach
          </tbody>
      </table>
      <br>
      {{ $MDT_PRNE->links() }}
    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
    </div>
  </div>
</div>
<div wire:loading.delay wire:target="loading">
  @include('pages.loading.loading')
</div>
<!-- end tables -->
<div>
</div>
</main>
<!--***************************************************************************************************************************-->
<!--
<main class="h-full pb-16 overflow-y-auto">
<div class="container">
  <div class=" grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Senarai E-Mandate Info
    </h2>
    
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
                  placeholder="Carian no akaun / no ic"
                  aria-label="Search"
                  wire:model="searchTerm"
                  class="form-control"
                />
          </div>
      </div>

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
            <th class="px-4 py-3" style="text-align:center; font-size: 15px">No Akaun</th>
          <th class="px-4 py-3" style="text-align:center; font-size: 15px">No Kad Pengenalan</th>
          <th class="px-4 py-3" style="text-align:center; font-size: 15px">Nama</th>
            
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($MDT_PRNE as $item)
         
            <tr 
        
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
             
              <td class="px-4 py-3" style="text-align:center; font-size: 12px">
              <a href = "{{ url('linkviewsearch/'.$item->payrefnum.'')}}">{{ $item->payrefnum }} 
              </td>
              <td class="px-4 py-3" style="text-align:center; font-size: 12px">
              {{ $item->idnum }}</a>
              </td>
              <td class="px-4 py-3" style="text-align:center; font-size: 12px">
                  {{ $item->buyername }}
              </td>
            </tr>

          @endforeach
          </tbody>
        </table>
      </div>
      {{ $MDT_PRNE->links() }}
      <div
        class="grid px-1 py-2 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
      >
        <span class="flex items-center col-span-3">
         
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
      </div>
    </div>  

  </div>
</div>

</main>  -->


