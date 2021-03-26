@extends('pages.layout.app')
@section('content')
{{-- <style>
    .myclass { background-color:blue; font-weight:bold;}
</style> --}}

<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>

    </script>

</head>
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<main class="h-full overflow-y-auto">

    <div class="container px-6 mx-auto grid">

        <div class="main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">

            <div class="bg-blue-800 p-2 shadow text-xl text-white flex justify-between items-center">
                <h3 class="font-bold pl-2">Tetapan Tarikh Arahan Pemotongan</h3>
                <span class=" text-base pr-2 ">
                    {{-- Negeri : {{ session()->get('authenticatedUser')['state_name'] }} --}}
                    CAWANGAN : {{ session()->get('authenticatedUser')['branch_name'] }}
                </span>
            </div>
            <br>

            <body>
                <div class="container">
                    <div class="response"></div>
                    <i class="text-red-500">*Penting pastikan tarikh yang dipilih adalah hari bekerja!!!<br></i>
                    <div id='calendar'>

                    </div>
                </div>
            </body>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        let id = null;
        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //   [
        //         {
        //         title: 'Event Title1',
        //         start: '2020-12-06T13:13:55.008',
        //         end: '2020-12-06T13:13:55.008'
        //         },
        //         {
        //         title: 'Event Title2',
        //         start: '2020-12-06T13:13:55.008',
        //         end: '2020-12-06T13:13:55.008'
        //         }
        //     ]
        var calendar = $('#calendar').fullCalendar({
            editable: false,
            events: SITEURL + "/api",
            displayEventTime: false,
            selectOverlap: false,
            //   editable: true,
            eventRender: function(event, element, view) {
                console.log(event)
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            businessHours: {
                    daysOfWeek: [1, 2, 3, 4, 5],
            },

            selectable: true,
            //   selectHelper: true,
            select: function(starts, end, allDay) {
                var title = $.fullCalendar.formatDate(starts, "DD-MM-Y");
                if (title) {
                    var starts = $.fullCalendar.formatDate(starts, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + "/fullcalendareventmaster/create",
                        data: 'title=' + title + '&starts=' + starts + '&end=' + end,
                        type: "POST",
                        success: function(data) {
                            id = data.id
                            console.log(data.id)
                            //var deleteMsg = confirm("pastikan tarikh yang dipilih adalah hari bekerja!!!");
                            //if (deleteMsg) {
                                // displayMessage("Berjaya Tambah")
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berjaya Tambah',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            //}
                            console.log(id);
                            calendar.fullCalendar('renderEvent', {
                                    //   backgroundColor:"#bce8f1",
                                    //   borderColor :'#bce8f1',
                                    title: title,
                                    start: starts,
                                    end: end,
                                    allDay: allDay,
                                    id: id
                                },
                                true
                            );
                        }
                    });
                }
                calendar.fullCalendar('unselect');
            },
            //   eventDrop: function (event, delta) {
            //               var starts = $.fullCalendar.formatDate(event.starts, "Y-MM-DD");
            //               var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
            //               $.ajax({
            //                   url: SITEURL + '/fullcalendareventmaster/update',
            //                   data: '&title=' + event.title + '&starts=' + starts + '&end=' + end + '&id=' + event.id,
            //                   type: "POST",
            //                   success: function (response) {
            //                       displayMessage("Berjaya Dikemaskini");
            //                   }
            //               });
            //           },
            eventClick: function(event) {
                console.log(event)
                console.log(event.id);
                //var deleteMsg = confirm("adakah anda mahu padam data ini?");
                //if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalendareventmaster/delete',
                        data: "&id=" + event.id,
                        success: function(response) {
                            if (parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berjaya Padam',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                //   displayMessage("Berjaya Padam");
                            }
                        }
                    });
                //}
            }
        });
    });

    function displayMessage(message) {
        $(".response").html("" + message + "");
        setInterval(function() {
            $(".success").fadeOut();
        }, 1000);
    }
</script>

</html>
@endsection