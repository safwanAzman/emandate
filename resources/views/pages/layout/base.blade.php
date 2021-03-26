<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Tekun Nasional</title>
      <link rel="icon" href="https://static.imoney.my/articles/wp-content/uploads/2018/09/Tekun-Nasional-logo.png" type="image/gif" sizes="16x16">
       <!-- accordion -->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
       <!-- accordion -->
       <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

      <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>

      <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
      <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
      
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script> --}}

      {{-- <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
      <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>
      <script src="{{ asset('assets/js/feather-min.js') }}" defer></script> --}}

      


      <!-- modal css -->
      <!-- modal css -->
      <style>
        [x-cloak] { display: none; }
        
      img {
      float: left;
      }

      .button {
      background-color: #008CBA; /* Green */
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      border-radius: 8px;
      transition-duration: 0.4s;
      cursor: pointer;
      }

      .btnsmall {
      background-color: #008CBA; /* Green */
      border: none;
      color: white;
      padding: 1px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 12px;
      margin: 4px 2px;
      border-radius: 8px;
      transition-duration: 0.4s;
      cursor: pointer;
      }

      .btnnormal {
      background-color: #008CBA; /* Green */
      border: none;
      color: white;
      padding: 8px 13px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 4px 2px;
      border-radius: 8px;
      transition-duration: 0.4s;
      cursor: pointer;
      }

      .button2 {
      background-color: white; 
      color: black; 
      border: 2px solid #008CBA;
      }

      .button2:hover {
      background-color: #008CBA;
      color: white;
      }

      .button3 {
      background-color: white; 
      color: black; 
      border: 2px solid red;
      }

      .button3:hover {
      background-color: red;
      color: white;
      }

      .button4 {
      background-color: white; 
      color: black; 
      border: 2px solid green;
      }

      .button4:hover {
      background-color: green;
      color: white;
      }

      .alert {
      padding: 10px 20px;
      background-color: lightblue;
      color: white;
      font-size: 15px;
      border-radius: 8px;

      }



      }

      </style>
	@livewireStyles
  </head>
  <body>
      @yield('body')
      <x-global-loading/>
      @livewireScripts
  </body>
</html>