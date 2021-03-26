@extends('pages.layout.app')
@section('content')
<style>
  @media (min-width: 1280px){
    .container {
    max-width: 100vw !important;
   }
  }

</style>
<main class="h-full pb-16 overflow-y-auto">
<div class="container px-6 mx-auto grid">
<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

  <div class="bg-blue-800 p-2 shadow text-xl text-white">
      <h3 class="font-bold pl-2"> Senarai Maklumat Fail CFT</h3>
  </div>

  <div class="flex flex-wrap">
       
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
                  <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-base text-gray-500 font-thin" placeholder="Search">
              </div>
          </div>
      </div>
  </div>
  <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
      <table class="min-w-full">
          <thead>
              <tr>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama Fail</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">No Akaun</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Kad Pengenalan</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Jumlah Trans</th>
                  <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Bilangan Percubaan</th>
              </tr>
          </thead>
          <tbody class="bg-white">
            @foreach ($CFT_DATALIST as $item)
            <tr>
                      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                          <div class="flex items-center">
                              <div>
                                  <div class="text-sm leading-5 text-gray-800">

                                    {{ $item->filename }}

                                  </div>
                              </div>
                          </div>
                      </td>

                      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 text-gray-800">

                                   {{ $item->accno }}

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

                              {{ $item->ic }}

                            </div>
                        </div>
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                  <div class="flex items-center">
                      <div>
                          <div class="text-sm leading-5 text-gray-800">

                            {{ $item->tranamt }}

                          </div>
                      </div>
                  </div>
              </td>

              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                <div class="flex items-center">
                    <div>
                        <div class="text-sm leading-5 text-gray-800">

                          {{ $item->noretry }}

                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                  <a href = "{{ url('linkcft/'.$item->ic.'')}}">  Papar </a> </button>
            </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
    </div>
  </div>
</div>
<!-- end tables -->

  <div class="flex flex-row flex-wrap flex-grow mt-2">

  </div>
</div>
</div>
{{ $CFT_DATALIST->links() }}
</main>

<!-- ***************************************************************************************************************************** -->
<!--
<main class="h-full pb-16 overflow-y-auto">
<div class = "container">
  <div class=" grid px-6 mx-auto">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Senarai Maklumat Fail CFT E-Mandate
    </h2>
  
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
    @foreach ($CFT_DATALIST as $item)
    {{ $item->filename }}
    @endforeach
    </h4>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Nama Fail</th>
              <th class="px-4 py-3">No Akaun</th>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">IC No</th>
              <th class="px-4 py-3">Jumlah Transaksi</th>
              <th class="px-4 py-3">Bilangan Percubaan</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
          @foreach ($CFT_DATALIST as $item)
         
            <tr 
            
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <td class="px-4 py-3">
              {{ $item->filename }} </a>
              </td>
              <td class="px-4 py-3">
              <a href = "{{ url('linkcft/'.$item->accno.'')}}">  {{ $item->accno }}
              </td>
              <td class="px-4 py-3">
                  {{ $item->buyername }}
              </td>
              <td class="px-4 py-3">
                  {{ $item->ic }}
              </td>
              <td class="px-4 py-3">
                  {{ $item->tranamt }}
              </td>
              <td class="px-4 py-3">
                  {{ $item->noretry }}
              </td>
              
            
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      {{ $CFT_DATALIST->links() }}
      
    </div>
    
  </div>
  </div>
</main> -->
@endsection


