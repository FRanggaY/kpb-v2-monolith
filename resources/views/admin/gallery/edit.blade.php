<div class="card">
    <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">Gallery</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                <input type="hidden" value="{{ $data->id }}" id="id_data" name="id">
                <div class="form-group row mt-2">
                    <label class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" value="{{ $data->title }}" name="title" class="form-control" placeholder="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Image</label>
                    <div class="col-sm-9">
                        <figure class="imagecheck-figure">
                            <img id="img-preview" src="{{ asset($data->image) }}" alt="image" class="imagecheck-image">
                        </figure>
                        <input type="file" class="form-control" name="image" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
