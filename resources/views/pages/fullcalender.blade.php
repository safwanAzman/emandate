@extends('pages.layout.app')
@section('content')

<main class="h-full">
	<div class="container px-6 mx-auto grid">
		<div class="rounded-lg main-content flex-1 bg-gray-50 mt-12 md:mt-2 pb-24 md:pb-5">			
			<x-general.title-header title="Tetapan Tarikh Arahan Pemotongan"/>
			<div class="container my-12 mx-auto px-4 md:px-12">
				<x-general.grid mobile="1" gap="1" sm="1" md="4" lg="1" xl="1" class="col-span-6">
                    <p class="text-red-500">*Penting pastikan tarikh yang dipilih adalah hari bekerja!!!<br></p>
					<div id='calendar'></div>
				</x-general.grid>
			</div>
		</div>
	</div>
</main>

@push('js')
<script>
    $(document).ready(function() {
        let id = null;
        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
@endpush
@endsection