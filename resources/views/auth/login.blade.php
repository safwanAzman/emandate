@extends('pages.layout.base')
@section('body')

<style>
    .input {
        transition: border 0.2s ease-in-out;
        min-width: 280px
    }

    .input:focus+.label,
    .input:active+.label,
    .input.filled+.label {
        font-size: .75rem;
        transition: all 0.2s ease-out;
        top: -0.1rem;
        color: #667eea;
    }

    .label {
        transition: all 0.2s ease-out;
        top: 0.4rem;
        left: 0;
    }
</style>

<section class="relative flex flex-col md:flex-row h-screen  bg-gradient-to-r from-blue-900 via-blue-800 to-blue-700">
    <div class="absolute top-0 left-0 py-4 px-4 animate_animated animate_lightSpeedInLeft">
        <h1 class="text-3xl text-blue-400 font-semibold">e<span class="text-white">-Mandate</span></h1>
    </div>
    <div
        class="md:max-w-md lg:max-w-full md:mx-auto mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">
        <div class="animate_animated animate_zoomIn w-full h-100  py-8 px-4 ">
            <div class="flex justify-center">
                <div>
                    <img src="{{asset('assets/img/tekun-nasional-logo.png')}}" class="w-64 h-64">
                    <h2 class="mt-2 text-4xl font-semibold text-white text-center">
                        Log Masuk
                    </h2>
                </div>
            </div>
            <form class="mt-6 max-w-md mx-auto w-full" action="{{ route('loggingin') }}" method="POST">
                @if(session()->has('loginerror'))
                <x-general.alert.base class="bg-red-200 border-2 border-red-300 rounded-md p-2 text-sm my-2">
                    <x-slot name="message">{{ session()->get('loginerror') }}</x-slot>
                </x-general.alert.base>
                @endif
                @csrf
                <div class="mb-6 relative">
                    <input
                        class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-blue-600 focus:outline-none active:outline-none active:border-blue-600"
                        id="idpengguna" name="idpengguna" type="text" autofocus>
                    <label for="email"
                        class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base cursor-text">
                        ID Pengguna
                    </label>
                </div>
                <div class="mb-6 relative">
                    <input
                        class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-blue-600 focus:outline-none active:outline-none active:border-blue-600"
                        id="katalaluan" name="katalaluan" type="password" autofocus>
                    <label for="password"
                        class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base  cursor-text">
                        Kata Laluan
                    </label>
                </div>

                <button type="submit" id="blogin" name="buttonlogin" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-500 text-white font-semibold rounded-lg px-4 py-3 mt-6
                    focus:outline-none">
                    Masuk
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white hidden lg:block w-full md:w-1/2 xl:w-2/4 h-full bg-no-repeat bg-cover bg-center" style="border-top-left-radius: 10rem; border-bottom-left-radius: 10rem;
        background-image: url(https://i.pinimg.com/originals/c2/65/46/c265462322417d3251f7f403c0ae5d7b.gif);">
        <div class="flex justify-center items-center px-6 text-center font-semibold">
            <div>
                <img src="{{asset('img/bg.png')}}" class="w-auto" />
            </div>
        </div>
    </div>
</section>

<script>
    var toggleInputContainer = function(input) {
        if (input.value != "") {
            input.classList.add('filled');
        } else {
            input.classList.remove('filled');
        }
    }
    var labels = document.querySelectorAll('.label');
    for (var i = 0; i < labels.length; i++) {
        labels[i].addEventListener('click', function() {
            this.previousElementSibling.focus();
        });
    }
    window.addEventListener("load", function() {
        var inputs = document.getElementsByClassName("input");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('keyup', function() {
                toggleInputContainer(this);
            });
            toggleInputContainer(inputs[i]);
        }
    });
</script>

<!-- end new laywout -->
@endsection