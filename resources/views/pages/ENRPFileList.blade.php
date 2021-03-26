@extends('pages.layout.app')

@section('content')
<style>
  @media (min-width: 1280px){
      .container {
          max-width: 100vw !important;
      }
  }
</style>
<div class="container px-6 mx-auto grid">
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

  <div class="bg-blue-800 p-2 shadow text-xl text-white">
      <h3 class="font-bold pl-2">Senarai Maklumat ENRP</h3>
  </div>
  <div class="flex flex-wrap">
           <!--  START TABLES  -->
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
                            <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px  border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs  lg:text-base text-gray-500 font-thin" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
              @foreach ($NERPS as $item)
              <!-- {{ $item->filename }} -->
               @endforeach
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama Fail</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">No Akaun</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Bahagian</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Kad Pengenalan</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Tujuan</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Mula Bayar</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Tamat Bayar</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Status</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">status2</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                      @foreach ($NERPS as $item)
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

                                            {{ $item->payrefnum }}

                                          </div>
                                      </div>
                                  </div>
                              </td> 

                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800">

                                          {{ $item->section }}

                                        </div>
                                    </div>
                                </div>
                            </td> 

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                              <div class="flex items-center">
                                  <div>
                                      <div class="text-sm leading-5 text-gray-800">

                                        {{ $item->idnum }}

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

                                    {{ $item->purpose }}

                                  </div>
                              </div>
                          </div>
                      </td> 

                      <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="flex items-center">
                            <div>
                                <div class="text-sm leading-5 text-gray-800">

                                  {{ $item->effdate }}

                                </div>
                            </div>
                        </div>
                    </td> 

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                      <div class="flex items-center">
                          <div>
                              <div class="text-sm leading-5 text-gray-800">

                                {{ $item->expdate }}
                                
                              </div>
                          </div>
                      </div>
                  </td> 

                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    <div class="flex items-center">
                        <div>
                            <div class="text-sm leading-5 text-gray-800">

                              {{ $item->approval }}
                              
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
                    <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                        <a href = "{{ url('link/'.$item->payrefnum.'')}}">  Papar </a> </button>
                </td>
             </tr>
             @endforeach
             </tbody>
        </table>
         <!--  END TABLES -->
         {{ $NERPS->links() }}
        </div>    
    </div>
</div>
</div>

<!--*******************************************************************************************************************************************************-->
@endsection


