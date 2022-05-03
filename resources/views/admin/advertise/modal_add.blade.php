<div class="card" class="modal-part" id="modal-add-advertise" >
    <div class="card-body">
        <form method="POST" action="{{ url('dashboard/advertise') }}" class="advertise-form" enctype="multipart/form-data">
            @csrf
            <div class="form-section">
                <div class="form-group">
                    <label class="col-form-label">Create Advertise</label>
                </div>
                <div class="form-group row">
                    <label for="inputtitle" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="inputtitle" placeholder="Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputlink" class="col-sm-3 col-form-label">Link (Opsional)</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{ old('link') }}" name="link" class="form-control" id="inputlink" placeholder="Link">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image (Opsional)</label>
                    <div class="col-sm-9">
                        <figure class="imagecheck-figure">
                            <img id="img-preview" src="" alt="image" class="imagecheck-image">
                        </figure>
                        <input type="file" value="{{ old('image') }}" class="form-control" name="image" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])" >
                    </div>
                </div>
            </div>

            <div class="form-navigation">
                <button class="btn btn-primary float-right" type="submit" >Publish</button>
            </div>
        </form>
    </div>
</div>
