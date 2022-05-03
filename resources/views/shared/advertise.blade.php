@extends('layouts.main_page')
@section('custom-style')

<style>
    // custom style
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="section-title">Advertise</h1>
    </div>
    <div class="section-body">
        <p>Show {{ $paginator->perPage() }} of {{ $paginator->total() }} data</p>

        @if($paginator->total() <= 0)
        <span>No data found</span>
        @endif

        <div class="row">
            @foreach ($datas as $data)
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <article class="article article-style-c">
                    @switch($data->image)
                        @case(null)
                            @break
                        @case(!null)
                        <div class="article-header">
                            <div class="chocolat-parent">
                                <a href="{{ asset($data->image) }}" class="chocolat-image" title="{{ $data->title }}" width="55">
                                <div>
                                    <img alt="image" src="{{ asset($data->image) }}" class="article-image article-body-image" >
                                </div>
                                </a>
                            </div>
                        </div>
                        @break
                        @default
                    @endswitch
                    <div class="article-details">
                        <div class="article-title">
                            @switch($data->link)
                                @case(null)
                                <h6 class="font-weight-bold">{{ $data->title }}</h6>
                                @break
                                @case(!null)
                                <h2><a href="{{ $data->link }}" target="_blank">{{ $data->title }}</a></h2>
                                @break
                                @default
                            @endswitch
                        </div>
                        <div class="article-user">
                            @switch($data->user->profile_picture)
                                @case(null)
                                    <img alt="image" src="{{ asset("assets/img/avatar/avatar-1.png") }}" class="rounded-circle author-box-picture" width="55" >
                                    @break
                                @case(!null)
                                    <img alt="image" src="{{ asset($data->user->profile_picture) }}" class="rounded-circle author-box-picture" width="55" >
                                    @break
                                @default

                            @endswitch
                          <div class="article-user-details">
                            <div class="user-detail-name">
                              <span>{{ $data->user->name }}</span>
                            </div>
                            <div class="text-job">{{ $data->user->position_kpb }} / {{ $data->user->position_department }}</div>
                          </div>
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
