@extends('layouts.main_dashboard')
@section('custom-style')

<style>
    /* custom css */
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Activity</h1>
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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-primary text-white-all">
                  <li class="breadcrumb-item"><a href="{{ url('dashboard/activity') }}">Activity</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="card-body">
          <form action="{{ route('update-activity', $data->slug) }}" method="POST" enctype= multipart/form-data>
            @csrf
            @method('PATCH')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" value="{{ $data->title }}" class="form-control" name="title">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-6 col-md-3 col-lg-3">Date</label>
                <div class="col-sm-12 col-md-7">
                    <input type="date" value="{{ $data->date }}" class="form-control" name="date">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-6 col-md-3 col-lg-3">Time</label>
                <div class="col-sm-12 col-md-7">
                    <input type="time" value="{{ $data->time }}" class="form-control" name="time">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Body</label>
                <div class="col-sm-12 col-md-7">
                    <input id="body" type="hidden" name="body" value="{{ $data->body }}">
                    <trix-editor input="body" ></trix-editor >
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-6 col-md-3 col-lg-3">Image</label>
                <div class="col-sm-12 col-md-7">
                    <figure class="imagecheck-figure">
                        <img id="img-preview" src="{{ asset($data->image) }}" alt="image" class="imagecheck-image">
                    </figure>
                    <input type="file" value="" class="form-control" name="image" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])" >
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Publish</button>
                </div>
              </div>
          </form>
        </div>
    </div>

</section>
@endsection
@section('script')
{{-- <script>
    document.addEventListener('trix-file-accept', function(e)){
        e.preventDefault();
    };

</script> --}}
@endsection
