<!DOCTYPE html>
<html  x-data="data()" lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>TEKUN Nasional</title>
      <link rel="icon" href="https://static.imoney.my/articles/wp-content/uploads/2018/09/Tekun-Nasional-logo.png" type="image/gif" sizes="16x16">
      <!-- accordion -->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

      <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

      <!-- accordion -->
      <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

      <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>

      <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
      <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
      
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  


      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="https://unpkg.com/tippy.js@6"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
      integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-flash-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>

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

      </style>
	@livewireStyles

  </head>
  <body>
      @yield('body')
      <x-global-loading/>
      @livewireScripts
  </body>

    <script>
      tippy('.tooltipbtn', {
            content:(reference)=>reference.getAttribute('data-title'),
            onMount(instance) {
                instance.popperInstance.setOptions({
                placement :instance.reference.getAttribute('data-placement')
                });
            },
            allowHTML: true,
        });
    </script>
  @stack('js')
</html>