<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    
        <div class="bg-blue-800 p-2 shadow text-xl text-white flex justify-between items-center">
            <h3 class="font-bold pl-2"> Senarai Maklumat Laporan ENRP</h3>
            <span class=" text-base pr-2 ">
              {{-- Negeri : {{ session()->get('authenticatedUser')['state_name'] }} --}}
                      CAWANGAN : {{ session()->get('authenticatedUser')['branch_name'] }}
            </span>
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
                                
                                <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin"
                                 type="text"
                                 placeholder="Carian No Akaun"
                                 aria-label="Search"
                                 wire:model="findrptenrp"
                              />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                    
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                

                            </tr>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama Fail</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">No Akaun</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Kad Pengenalan</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Nama</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Skim</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Mula E-Mandate</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Tamat E-Mandate</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($rptdetails_enrp as $item) 
                        <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-800">
    
                                                  {{ substr($item->filename,0,8) }}
    
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
    
                                            {{ $item->idnum }}
    
                                          </div>
                                      </div>
                                  </div>
                              </td> 
    
                              <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800">
    
                                          {{ substr($item->buyername,0,20) }}
    
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
    
                                    
                                      {{ substr($item->effdate,0,2).'/'.substr($item->effdate,2,2).'/'.substr($item->effdate,4,4) }} 
                                      
    
                                    </div>
                                </div>
                            </div>
                        </td> 
    
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                          <div class="flex items-center">
                              <div>
                                  <div class="text-sm leading-5 text-gray-800">
    
                                      {{ substr($item->expdate,0,2).'/'.substr($item->expdate,2,2).'/'.substr($item->expdate,4,4) }} 
                                    
                                  </div>
                              </div>
                          </div>
                      </td>
                      
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                 <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                 </div>
                 {{ $rptdetails_enrp->links() }}
                 <br>
              </div>
          <!--  END TABLES -->
      </div>
  </div>
  </div>

    <a href= '{{ url("main-enrp-report") }}' >
        <div class="py-8 bg-grey-lighter hover:bg-grey-light text-indigo-darker rounded rounded-t-none text-center uppercase font-bold flex items-center justify-center"><span>Back</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon fill-current w-4 h-4 ml-2">
                <path d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z" class="heroicon-ui"></path>
            </svg>
        </div>
    </a>
      
   <!--   <div class="flex flex-row flex-wrap flex-grow mt-2">
      </div>
  -->
    </div>
    </div>
    </main>