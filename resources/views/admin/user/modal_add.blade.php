<div class="card" class="modal-part" id="modal-add-user" >
    <div class="card-body">
        <form method="POST" action="{{ url('dashboard/user') }}" class="user-form">
            @csrf
            <div class="form-section">
                <div class="form-group">
                    <label class="col-form-label">Create User</label>
                </div>
                <div class="form-group row">
                    <label for="inputname" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="inputname" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputusername" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{ old('username') }}" name="username" class="form-control" id="inputusername" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputemail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="inputemail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputpassword" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password"  name="password" class="form-control" id="inputpassword" placeholder="Password">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-group">
                    <label class="col-form-label">Personal Detail <span>(Opsional)</span> </label>
                </div>
                <div class="form-group row">
                    <label for="inputnik" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                      <input type="number" name="nik" class="form-control" id="inputnik" placeholder="NIK">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputnip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                      <input type="number" name="nip" class="form-control" id="inputnip" placeholder="NIP">
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                      <div class="col-form-label col-sm-3 pt-0">Gender</div>
                      <div class="col-sm-9">
                        <div class="form-check">
                          <input class="form-check-input" name="gender" type="radio" name="gridRadios" id="gridRadios1" value="M" checked>
                          <label class="form-check-label" for="gridRadios1">
                          Male
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" name="gender" type="radio" name="gridRadios" id="gridRadios2" value="F">
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
                        <textarea class="form-control" name="address"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputnohp" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="col-sm-9">
                      <input type="number" name="no_hp" class="form-control" id="inputnohp" placeholder="No. HP">
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-group">
                    <label class="col-form-label">Document Detail <span>(Opsional)</span> </label>
                </div>
                <div class="form-group row">
                    <label for="inputworkunit" class="col-sm-3 col-form-label">Work Unit</label>
                    <div class="col-sm-9">
                      <input type="text" name="work_unit" class="form-control" id="inputworkunit" placeholder="Work Unit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputpositionkpb" class="col-sm-3 col-form-label">Position KPB</label>
                    <div class="col-sm-9">
                      <input type="text" name="position_kpb" class="form-control" id="inputpositionkpb" placeholder="Position KPB">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputpositiondepartment" class="col-sm-3 col-form-label">Position Department</label>
                    <div class="col-sm-9">
                      <input type="text" name="position_department" class="form-control" id="inputpositiondepartment" placeholder="Position Department">
                    </div>
                </div>
            </div>

            <div class="form-navigation">
                <button class="previous btn btn-info float-left" type="button" >Previous</button>
                <button class="next btn btn-info float-right" type="button" >Next</button>
                <button class="btn btn-primary float-right" type="submit" >Register</button>
            </div>
        </form>
    </div>
</div>
