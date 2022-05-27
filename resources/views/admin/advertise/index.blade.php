@extends('layouts.main_dashboard')
@section('custom-style')

<style>
    // custom style
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Advertise</h1>
    </div>

    <div class="card">
        <div class="card-body text-center">
          <p class="mb-2">Create advertisement now!</p>
          <button class="btn btn-primary" id="modal-add">Create Advertisement</button>
        </div>
    </div>
    @if (Session::get('success'))
    <div class="btn btn-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('admin.advertise.modal_add')
    @section('modal')
    <div class="modal fade" id="modal-edit-advertise" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-label"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" class="advertise-form-edit" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update">Save changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    @endsection

    <div class="card">
        <div class="card-header">
          <h4>Advertise</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-advertise">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Link</th>
                  <th>Created Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->link }}</td>
                    <td>{{ $data->created_at }}</td>
                    @switch($data->status)
                        @case(0)
                            <td>
                                <div class="badge badge-danger">Inactive</div>
                            </td>
                            @break
                        @case(1)
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            @break

                        @default

                    @endswitch
                    <td data-width="300">
                        <button class="btn btn-warning my-2 detail" data-slug="{{ $data->slug }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        @if($data->user_id == Auth::user()->id)
                        <button class="btn btn-info edit" data-slug="{{ $data->slug }}">
                            <i class="far fa-edit"></i>
                        </button>
                        @endif
                        @if($data->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                        <button class="btn btn-danger my-2 delete" data-slug="{{ $data->slug }}" data-title="{{ $data->title }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        @endif
                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list"></i>
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item change-status" data-slug="{{ $data->slug }}" data-status="{{ $data->status }}">Change Status</button>
                        </div>
                    </td>
                </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>

</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#table-advertise').DataTable();
    });

    $("#modal-add").fireModal({
        title: 'Add Advertise',
        body: $("#modal-add-advertise"),
        footerClass: 'bg-whitesmoke',
        autoFocus: false,
    });

    $(".detail").on('click', function(){
        var slug = $(this).data('slug');
        $('#modal-label').text('Detail advertise');
        $('.modal-footer').addClass('d-none');
        $.ajax({
                url: `/dashboard/advertise/${slug}/detail`,
                method: "GET",
                success: function(data){
                    $('#modal-edit-advertise').find('.modal-body').html(data);
                    $('#modal-edit-advertise').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
        })
    });


    $(".edit").on('click', function() {
        var slug = $(this).data('slug');
        $('#modal-label').text('Edit advertise');
        $('.modal-footer').removeClass('d-none');
        $.ajax({
                url: `/dashboard/advertise/${slug}/edit`,
                method: "GET",
                success: function(data){
                    $('#modal-edit-advertise').find('.modal-body').html(data);
                    $('#modal-edit-advertise').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
        })
    });

    $(".update").on('click', function() {
        var id = $('#myTabContent').find('#id_data').val();
        let formData = $('.advertise-form-edit').serialize();
        $.ajax({
                url: `/dashboard/advertise/${id}`,
                method: "PATCH",
                data: formData,
                success: function(data){
                    $('#modal-edit-advertise').modal('hide');
                    window.location.assign('/dashboard/advertise');
                },
                error: function(error){
                    console.log(error);
                }
        })
    });

    $('.change-status').click(function(e){
        e.preventDefault();
        var slug = $(this).attr('data-slug');
        var status = $(this).attr('data-status');
        if(status==0){
            var convert_status_text = "Active";
        }else{
            var convert_status_text = "Inactive";
        }
        swal({
            title: "Are you sure?",
            text: "changing to status advertise " + convert_status_text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willChange) => {
            if (willChange) {
                window.location = "/dashboard/advertise/"+slug+"/change-status";
            }
        });
    });

    $('.delete').click(function(e){
        e.preventDefault();
        var slug = $(this).attr('data-slug');
        var title = $(this).attr('data-title');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this advertise with title : "+title+"!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/dashboard/advertise/"+slug+"/delete";
                swal("advertise has been deleted", {
                    icon: "success",
                });
            }
        });
    });
</script>
@endsection
