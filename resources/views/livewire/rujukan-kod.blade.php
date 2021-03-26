

<main class="h-full pb-16 overflow-y-auto">
  <div class="container">
    <div class="container px-6 mx-auto">
      <div class="bg-blue-800 p-2 shadow text-xl text-white flex justify-between items-center">
        <h3 class="font-bold pl-2">Rujukan Kod Transaksi</h3>
        <span class=" text-base pr-2 ">
          {{-- Negeri : {{ session()->get('authenticatedUser')['state_name'] }} --}}
                  CAWANGAN : {{ session()->get('authenticatedUser')['branch_name'] }}
        </span>
    </div>
          <!--start tables-->
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
      <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
          <div class="flex justify-between">
              <div class="inline-flex rounded w-7/12 px-2 lg:px-6 h-10 bg-transparent">
                  {{-- <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
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
                      placeholder="Carian No Akaun / No Kad Pengenalan"
                      aria-label="Search"
                      wire:model="searchTerm"
                      />
                    </div> --}}
              </div>
              <button class="bg-gray-200 hover:bg-green-300 text-blue-500 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                <span>
                  <a href = "{{ route('export-kodRujukan')}}"> Muat Turun </a>
                  
                </span>
            </button>

          </div>
      </div>
      <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
          <table class="min-w-full">
              <thead>
                  <tr>
                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Kod Rujukan</th>
                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Penerangan Status</th>
                      <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Kod Status</th>
                      
                  </tr>
              </thead>
              <tbody class="bg-white">
                @foreach ($MDT_OFNI_DESC as $item)
                <tr>
    
                          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">
    
                                      {{ $item->approved }} 
    
                                    </div>
                                </div>
                            </div>
                        </td>
    
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                          <div class="flex items-center">
                              <div>
                                  <div class="text-sm leading-5 text-gray-800">
      
                                    {{ $item->approved_desc }}<br>
                                    <i class = "text-xs text-blue-400">({{ $item->bahasa }})</i>
      
                                  </div>
                              </div>
                          </div>
                      </td>
    
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                          <div class="flex items-center">
                              <div>
                                  <div class="text-sm leading-5 text-gray-800">
    
                                    {{ $item->re_code }}
    
                                  </div>
                              </div>
                          </div>
                      </td>
                </tr>
                @endforeach
              </tbody>
          </table>
          <br>
        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
        </div>
      </div>
    </div>
    <!-- end tables -->
    <div>
  </div>
</main>