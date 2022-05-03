@extends('layouts.main_page')
@section('custom-style')

<style>
    .article-body-image{
        filter: grayscale(40%);
    }
    .article-body-title h2{
        font-size: 1.5rem;
        font-weight: bold;
        color: white;
        background: rgba(0, 0, 0, 0.5);
        padding: 10px;
        margin: 0;
    }
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="section-title">Gallery</h1>
    </div>
    <div class="section-body">
        <p>Show {{ $paginator->perPage() }} of {{ $paginator->total() }} data</p>

        @if($paginator->total() <= 0)
        <span>No data found</span>
        @endif

        <div class="row">
            @foreach ($datas as $data)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <article class="article">
                  <div class="article-header">
                    <div class="chocolat-parent">
                        <a href="{{ asset($data->image) }}" class="chocolat-image" title="{{ $data->title }}" width="55">
                        <div>
                            <img alt="image" src="{{ asset($data->image) }}" class="article-image article-body-image" >
                        </div>
                        </a>
                    </div>
                    <div class="article-title article-body-title">
                        <h2>{{ $data->title }}</h2>
                    </div>
                  </div>
                </article>
            </div>
            @endforeach
        </div>

        @if($paginator->hasPages() )
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    {{ $paginator->links('partials.paginate') }}
                </div>
            </div>
        </div>
        @endif

    </div>
  </section>


@endsection
@section('script')
<script>
    Chocolat(document.querySelectorAll('.chocolat-image'), {
    // options here
    })
</script>
@endsection
