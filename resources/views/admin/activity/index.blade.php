@extends('layouts.main_dashboard')
@section('custom-style')

<style>
    /* custom css */
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Activity</h1>
    </div>

    <div class="card">
        <div class="card-body text-center">
          <p class="mb-2">Create activity now!</p>
          <a class="btn btn-primary" href="{{ url('dashboard/activity/add') }}">Create Activity</a>
        </div>
    </div>
    @if (Session::get('success'))
    <div class="btn btn-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if (Session::get('error'))
    <div class="btn btn-danger">
        {{ Session::get('error') }}
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

    @section('modal')
    <div class="modal fade" id="modal-edit-activity" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-label"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" class="activity-form-edit" enctype="multipart/form-data">
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
          <h4>Activity</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-activity">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($datas as $data)
                  <tr>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->date }} - {{ $data->time }} </td>
                    <td>{{ $data->created_at }}</td>
                    <td data-width="300">
                        <button class="btn btn-warning my-2 detail" data-slug="{{ $data->slug }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        @if($data->user_id == Auth::user()->id)
                        <a href="{{ route('edit-activity', $data->slug) }}" class="btn btn-info" >
                            <i class="far fa-edit"></i>
                        </a>
                        @endif
                        @if($data->user_id == Auth::user()->id || Auth::user()->role == 'admin')
                        <button class="btn btn-danger my-2 delete" data-slug="{{ $data->slug }}" data-title="{{ $data->title }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        @endif
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
        $('#table-activity').DataTable();
    });

    $(".detail").on('click', function(){
        var slug = $(this).data('slug');
        $('#modal-label').text('Detail Activity');
        $('.modal-footer').addClass('d-none');
        $.ajax({
                url: `/dashboard/activity/${slug}/detail`,
                method: "GET",
                success: function(data){
                    $('#modal-edit-activity').find('.modal-body').html(data);
                    $('#modal-edit-activity').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
        })
    });


    $('.delete').click(function(e){
        e.preventDefault();
        var slug = $(this).attr('data-slug');
        var title = $(this).attr('data-title');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this activity with title : "+title+"!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/dashboard/activity/"+slug+"/delete"
                swal("activity has been deleted", {
                    icon: "success",
                });
            }
        });
    });
</script>
@endsection
