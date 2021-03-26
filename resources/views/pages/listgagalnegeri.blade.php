@extends('pages.layout.app')
@section('content')

<style>
    @media (min-width: 1280px){
      .container {
      max-width: 100vw !important;
     }
    }

    /*DROPDOWN CSS*/
    .dropdown:hover .dropdown-menu {
    display: block;
    }

</style>


<div class="container px-6 mx-auto grid">

    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

      <div class="bg-blue-800 p-2 shadow text-xl text-white">
          <h3 class="font-bold pl-2">Bilangan Permohonan Dalam Process Mengikut Negeri</h3>
      </div>
      
   {{--  {{ session()->get('authenticatedUser')['state_code'] }}  --}}

            <div class="flex flex-wrap">
           
                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Flag_of_Johor.svg/100px-Flag_of_Johor.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Johor</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalJhr->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>
                  
                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Flag_of_Kedah.svg/100px-Flag_of_Kedah.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Kedah</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalKdh->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/Flag_of_Kelantan.svg/100px-Flag_of_Kelantan.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Kelantan</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalKltn->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_Malacca.svg/100px-Flag_of_Malacca.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Melaka</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalMlk->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_Negeri_Sembilan.svg/100px-Flag_of_Negeri_Sembilan.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Negeri Sembilan</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalN9->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Flag_of_Pahang.svg/100px-Flag_of_Pahang.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Pahang</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalPhg->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Flag_of_Perak.svg/100px-Flag_of_Perak.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Perak</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalPrk->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Flag_of_Perlis.svg/100px-Flag_of_Perlis.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Perlis</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalPrls->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Penang_%28Malaysia%29.svg/120px-Flag_of_Penang_%28Malaysia%29.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Pulau Pinang</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalPP->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Flag_of_Sabah.svg/100px-Flag_of_Sabah.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Sabah</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalSbh->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Flag_of_Sarawak.svg/100px-Flag_of_Sarawak.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Sarawak</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalSrwk->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Flag_of_Selangor.svg/100px-Flag_of_Selangor.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Selangor</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalSlngr->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Flag_of_Terengganu.svg/100px-Flag_of_Terengganu.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">Terengganu</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalTrg->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

                  <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                              <div class="p-3 mr-4 text-white-500 bg-white-100 rounded-full dark:text-white-100 dark:bg-white-500">
                                    <img src= "https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Flag_of_Kuala_Lumpur%2C_Malaysia.svg/100px-Flag_of_Kuala_Lumpur%2C_Malaysia.svg.png"
                                          width="60" height="30"/>
                              </div>
                              <div class="flex flex-row items-center">
                                    <div class="flex-1 text-right md:text-left">
                                          <h5 class="font-bold uppercase text-gray-600">W.P Kuala Lumpur</h5>
                                          <h3 class="font-bold text-2xl"> {{($gagalKl->count())}} 
                                    </div>
                              </div>      
                        </div>
                  </div>

            </div> <!--end div for flex flex-wrap -->

            <a href= '{{ url("emandate-dashboard") }}' >
                  <div class="py-8 bg-grey-lighter hover:bg-grey-light text-indigo-darker rounded rounded-t-none text-center uppercase font-bold flex items-center justify-center"><span>Back</span>
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="icon fill-current w-4 h-4 ml-2">
                          <path d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z" class="heroicon-ui"></path>
                      </svg>
                  </div>
              </a>
           


      </div>  
@endsection