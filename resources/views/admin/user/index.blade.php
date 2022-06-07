@extends('layouts.main_dashboard')
@section('custom-style')

<style>
    .form-section{
        display: none;
    }
    .form-section.current{
        display: inherit;
    }
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>User</h1>
    </div>

    <div class="card">
        <div class="card-body text-center">
          <p class="mb-2">Create account now!</p>
          <button class="btn btn-primary" id="modal-add">Create Account</button>
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

    @include('admin.user.modal_add')
    @section('modal')
    <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-label"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" class="user-form-edit" enctype="multipart/form-data">
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
          <h4>User</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-user">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Created Date</th>
                  <th>Work Unit</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($datas as $data)
                  <tr>
                    <td>
                        {{ $data->name }}
                        @switch($data->role)
                            @case("admin")
                                <div class="badge badge-info">Admin</div>
                                @break

                            @default

                        @endswitch
                    </td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->work_unit }}</td>
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
                        <button class="btn btn-warning my-2 detail" data-id="{{ $data->id }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button class="btn btn-info edit" data-id="{{ $data->id }}">
                            <i class="far fa-edit"></i>
                        </button>
                        <button class="btn btn-danger my-2 delete" data-id="{{ $data->id }}" data-name="{{ $data->name }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-list"></i>
                        </button>
                        <div class="dropdown-menu">
                            @if($data->role == "user")
                                <button class="dropdown-item change-role" data-id="{{ $data->id }}" data-role="{{ $data->role }}">Promote to Admin</button>
                            @else
                                <button class="dropdown-item change-role" data-id="{{ $data->id }}" data-role="{{ $data->role }}">Demote to User</button>
                            @endif
                            <button class="dropdown-item change-status" data-id="{{ $data->id }}" data-status="{{ $data->status }}">Change Status</button>
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
        $('#table-user').DataTable();
    });

    $("#modal-add").fireModal({
        title: 'Add User',
        body: $("#modal-add-user"),
        footerClass: 'bg-whitesmoke',
        autoFocus: false,
    });

    $(".detail").on('click', function(){
        var id = $(this).data('id');
        $('#modal-label').text('Detail User');
        $('.modal-footer').addClass('d-none');
        $.ajax({
                url: `/dashboard/user/${id}/detail`,
                method: "GET",
                success: function(data){
                    $('#modal-edit-user').find('.modal-body').html(data);
                    $('#modal-edit-user').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
        })
    });


    $(".edit").on('click', function() {
        var id = $(this).data('id');
        $('#modal-label').text('Edit User');
        $('.modal-footer').removeClass('d-none');
        $.ajax({
                url: `/dashboard/user/${id}/edit`,
                method: "GET",
                success: function(data){
                    $('#modal-edit-user').find('.modal-body').html(data);
                    $('#modal-edit-user').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
        })
    });

    $(".update").on('click', function() {
        var id = $('#myTabContent').find('#id_data').val();
        let formData = $('.user-form-edit').serialize();
        $.ajax({
                url: `/dashboard/user/${id}`,
                method: "PATCH",
                data: formData,
                success: function(data){
                    $('#modal-edit-user').modal('hide');
                    window.location.assign('/dashboard/user');
                },
                error: function(error){
                    //console.log(error);
                    console.log(formData);
                }
        })
    });

    $(".change-role").click(function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var role = $(this).attr('data-role');
        if(role=="user"){
            var convert_role_text = "admin";
        }else{
            var convert_role_text = "user";
        }
        swal({
            title: "Are you sure?",
            text: "changing to role user "+ convert_role_text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willChange) => {
            if (willChange) {
                window.location = "/dashboard/user/"+id+"/change-role/"+convert_role_text+"";
                // window.location = "/dashboard/user/"+id+"/change-role;
            }
        });
    });

    $('.change-status').click(function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        if(status==0){
            var convert_status_text = "Active";
        }else{
            var convert_status_text = "Inactive";
        }
        swal({
            title: "Are you sure?",
            text: "changing to status user " + convert_status_text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willChange) => {
            if (willChange) {
                window.location = "/dashboard/user/"+id+"/change-status";
            }
        });
    });

    $('.delete').click(function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user with name : "+name+"!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/dashboard/user/"+id+"/delete";
                swal("User has been deleted", {
                    icon: "success",
                });
            }
        });
    });

    $(function(){
        var $sections = $('.form-section');

        function navigateTo(index){
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }
        function curIndex(){
            return $sections.index($sections.filter('.current'));
        }
        $('.form-navigation .previous').click(function(){
            navigateTo(curIndex() - 1);
        });
        $('.form-navigation .next').click(function(){
            navigateTo(curIndex() + 1);
        });
        // $sections.each(function(index, section){
        //     $(section).find(':input').attr('data-parsley-group', 'block-' + index);
        // })
        navigateTo(0)
    })
</script>
@endsection
