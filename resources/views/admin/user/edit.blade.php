<div class="card">
    <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
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
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                <input type="hidden" value="{{ $data->id }}" id="id_data" name="id">
                <div class="form-group row mt-2">
                    <label for="inputusername" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{ $data->name }}" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputusername" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{ $data->username }}" name="username" class="form-control" id="inputusername" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputemail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" value="{{ $data->email }}" name="email" class="form-control" id="inputemail" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="personal-detail" role="tabpanel" aria-labelledby="personal-detail-tab">
                <div class="form-group row mt-2">
                    <label for="inputnik" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                        <input type="number" value="{{ $data->nik }}" name="nik" class="form-control" id="inputnik" placeholder="NIK">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputnip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <input type="number" value="{{ $data->nip }}" name="nip" class="form-control" id="inputnip" placeholder="NIP">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <div class="col-form-label col-sm-3 pt-0">Gender</div>
                        <div class="col-sm-9">
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
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="address">{{ $data->address }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputnohp" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="col-sm-9">
                        <input type="number" name="no_hp" value="{{ $data->no_hp }}" class="form-control" id="inputnohp" placeholder="No. HP">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="document-detail" role="tabpanel" aria-labelledby="document-detail-tab">
                <div class="form-group row mt-2">
                    <label for="inputworkunit" class="col-sm-3 col-form-label">Work Unit</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{ $data->work_unit }}" name="work_unit" class="form-control" id="inputworkunit" placeholder="Work Unit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputpositionkpb" class="col-sm-3 col-form-label">Position KPB</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{ $data->position_kpb }}" name="position_kpb" class="form-control" id="inputpositionkpb" placeholder="Position KPB">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputpositiondepartment" class="col-sm-3 col-form-label">Position Department</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{ $data->position_department }}" name="position_department" class="form-control" id="inputpositiondepartment" placeholder="Position Department">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
