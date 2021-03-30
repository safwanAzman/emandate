@extends('pages.layout.base')
@section('body')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Contact Form Template</title>
    <link rel="stylesheet" href="/build/tailwind.css" type="text/css" media="screen" title="no title" charset="utf-8" />
</head>

<body class>
    <div class="lg:flex">
        <div class="lg:w-1/2 xl:max-w-screen-sm">
            <div class="py-4 bg-indigo-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                <div class="cursor-pointer flex items-center">
                    <div>
                        <svg class="w-10 text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
                            viewBox="0 0 225 225" style="enable-background:new 0 0 225 225;" xml:space="preserve">
                            <style type="text/css">
                                .st0 {
                                    fill: none;
                                    stroke: currentColor;
                                    stroke-width: 20;
                                    stroke-linecap: round;
                                    stroke-miterlimit: 3;
                                }
                            </style>
                        </svg>
                    </div>
                    <!--logo-->
                    <div class="flex font-bold justify-center mt-3">
                        <img src="{{asset('assets/img/tekun-nasional-logo.png')}}" class="w-40 h-30 animate__animated animate__fadeInLeft">
                    </div>
                </div>
            </div>
            <div class="mt-2 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-2 xl:px-24 xl:max-w-2xl animate__animated animate__fadeInUp">
                <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                xl:text-bold">Log Masuk<br>e-Mandate</h2>
                <div class="mt-12">
                    <form class="mt-8" action="{{ route('loggingin') }}" method="POST">
                        @if(session()->has('loginerror'))
                        <x-general.alert.base class="bg-red-200 border-2 border-red-300 rounded-md p-2 text-sm my-2">
                            <x-slot name="message">{{ session()->get('loginerror') }}</x-slot>
                        </x-general.alert.base>
                        @endif
                        @csrf
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide">ID Pengguna</div>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                type="" placeholder="Tekun Nasional" id="idpengguna" name="idpengguna">
                        </div>
                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Kata Laluan
                                </div>
                            </div>
                            <input
                                class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                                type="password" placeholder="*****" id="katalaluan" name="katalaluan">
                        </div>
                        <div class="mt-10">
                            <button class="transition duration-500 bg-white hover:bg-blue-500 text-blue-400 p-4 w-full rounded-full tracking-wide
                            border border-blue-400 font-semibold font-display focus:outline-none focus:shadow-outlineshadow-lg
                            hover:text-white" id="blogin" name="buttonlogin">
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-gradient-to-r from-blue-300 to-blue-700 flex-1 h-screen">
            <div class="">
                <div class="hidden lg:flex items-center justify-center flex-none min-h-full">
                    <img src="{{asset('assets/img/login.png')}}" class="w-4/5 h-3/5 shadow-lg animate__animated animate__fadeInRight">
                </div>
            </div>
        </div>
    </div>

    <!-- end new laywout -->
    @endsection