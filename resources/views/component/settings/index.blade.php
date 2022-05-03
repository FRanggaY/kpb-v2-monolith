@extends('layouts.main_dashboard')
@section('custom-style')

<style>
    // custom style
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
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

    <div class="card">
        <div class="card-header">
          <h4>Edit Profile</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-4">
              <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="personal-detail-tab" data-toggle="tab" href="#personal-detail" role="tab" aria-controls="personal-detail" aria-selected="false">Personal Detail</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="document-detail-tab" data-toggle="tab" href="#document-detail" role="tab" aria-controls="document-detail" aria-selected="false">Document Detail</a>
                </li>
              </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <form action="{{ url('settings') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $data->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" value="{{ $data->username }}" name="username">
                            </div>
                            <div class="form-group ">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $data->email }}" name="email">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="personal-detail" role="tabpanel" aria-labelledby="personal-detail-tab">
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        @switch(Auth::user()->profile_picture)
                                            @case(null)
                                                <img alt="image" id="img-preview" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle" width="150" height="150">
                                                @break
                                            @case(!null)
                                                <img alt="image" id="img-preview" src="{{ asset($data->profile_picture) }}" class="rounded-circle" width="150">
                                                @break
                                            @default

                                        @endswitch
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <input type="file" class="form-control" name="profile_picture" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>NIK</label>
                                    <input type="number" class="form-control" value="{{ $data->nik }}" name="nik">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>NIP</label>
                                    <input type="number" class="form-control" value="{{ $data->nip }}" name="nip">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input" {{ $data->gender == "M" ? "checked" : ""  }} name="gender" type="radio" name="gridRadios" id="gridRadios1" value="M" >
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" {{ $data->gender == "F" ? "checked" : ""  }} name="gender" type="radio" name="gridRadios" id="gridRadios2" value="F">
                                        <label class="form-check-label" for="gridRadios2">
                                        Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address">{{ $data->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="number" name="no_hp" value="{{ $data->no_hp }}" class="form-control" >
                            </div>
                        </div>
                        <div class="tab-pane fade" id="document-detail" role="tabpanel" aria-labelledby="document-detail-tab">
                            <div class="form-group">
                                <label>Work Unit</label>
                                <input type="text" value="{{ $data->work_unit }}" name="work_unit" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Position KPB</label>
                                <input type="text" value="{{ $data->position_kpb }}" name="position_kpb" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Position Department</label>
                                <input type="text" value="{{ $data->position_department }}" name="position_department" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit" >Update Profile</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
          <h4>Change Password</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('change-password') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="text-right">
                    <button class="btn btn-primary" type="submit" >Change Password</button>
                </div>
            </form>
        </div>
    </div>

</section>
@endsection
@section('script')
<script>
    // custom script
</script>
@endsection
