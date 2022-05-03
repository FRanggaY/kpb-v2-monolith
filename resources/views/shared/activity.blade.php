@extends('layouts.main_page')
@section('custom-style')

<style>
    .cursor-pointer {
        cursor: pointer;
    }
    .fc-daygrid-day-top {
        justify-content: center;
        background-color: #f5f5f5;
    }
    #calender .fc-day-today {
        border-bottom: 2px solid green;
        color:green;
    }
    #calender .fc-day-sat {
        color:red;
    }
    #calender .fc-day-sun {
        color:red;
    }
    .fc-col-header-cell-cushion {
        font-weight: bold;
        text-align: center;
    }
    .fc-daygrid-day-frame{
        cursor: pointer;
    }
    .fc-daygrid-day-events{
        display: none;
    }
    .fc .fc-toolbar-title{
        font-size: 1rem;
    }
    @media (max-width: 575.98px) {
        .fc-overflow #calender {
            width: 100%;
        }
    }
    @media (max-width: 425px) {
        .fc-overflow #calender {
            width: 400px;
        }
    }
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="section-title">Activity ({{ date('j F Y', strtotime($date)) }}) </h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-xl-5 order-xl-12">
                <h2 class="section-title">Calender</h2>
                <div class="card">
                    <div class="card-body">
                      <div class="fc-overflow">
                        <div id="calender"></div>
                      </div>
                    </div>
                </div>
            </div>

            @section('modal')
            <div class="modal fade" id="modal-activity" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="modal-label"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form method="get" enctype="multipart/form-data">
                        {{ method_field('GET') }}
                        {{ csrf_field() }}
                        <div class="modal-body">

                        </div>
                    </form>
                </div>
                </div>
            </div>
            @endsection

            <div class="col-xl-7 order-xl-1">
                @foreach ($datas as $data)
                <div class="card card-danger mt-4">
                    <div class="card-header">
                        <div class="btn btn-info mx-2">{{ $data->time }}</div>
                        <div class="cursor-pointer detail" data-slug="{{ $data->slug }}">
                            <h4>{{ $data->title }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10 text-truncate">
                              {!! $data->body !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>
  </section>


@endsection
@section('script')
<script>
    $(document).ready(function(){
        showCalender();
        $(".fc-scrollgrid").removeClass("table-bordered");
    });

    $(".detail").on('click', function(){
        var slug = $(this).data('slug');
        $('#modal-label').text('Detail Activity');
        $.ajax({
                url: `/activity/${slug}/detail`,
                method: "GET",
                success: function(data){
                    $('#modal-activity').find('.modal-body').html(data);
                    $('#modal-activity').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
        })
    });

    function showCalender(){
        var calendarEl = document.getElementById('calender');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            editable: true,
            initialView: 'dayGridMonth',
            themeSystem: 'bootstrap',
            dateClick: function(info) {
                window.location = "/activity?date="+info.dateStr;
            },
            contentHeight: "auto",

        });
        calendar.render();
    }



</script>
@endsection
