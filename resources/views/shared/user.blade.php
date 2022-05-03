@extends('layouts.main_page')
@section('custom-style')

<style>
   // custom style
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="section-title">User</h1>
    </div>
    <div class="section-body">
        <p>Show {{ $paginator->perPage() }} of {{ $paginator->total() }} data</p>

        @if($paginator->total() <= 0)
        <span>No data found</span>
        @endif

        <div class="row">
            @foreach ($datas as $data)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="mx-auto">
                            @switch($data->profile_picture)
                                @case(null)
                                    <div class="chocolat-parent">
                                        <a href="{{ asset("assets/img/avatar/avatar-1.png") }}" class="chocolat-image" title="{{ $data->name }}" width="55">
                                        <div>
                                            <img alt="image" src="{{ asset("assets/img/avatar/avatar-1.png") }}" class="rounded-circle" width="55" height="55">
                                        </div>
                                        </a>
                                    </div>
                                    @break
                                @case(!null)
                                    <div class="chocolat-parent">
                                        <a href="{{ asset($data->profile_picture) }}" class="chocolat-image" title="{{ $data->name }}" width="55">
                                        <div>
                                            <img alt="image" src="{{ asset($data->profile_picture) }}" class="rounded-circle" width="55" height="55">
                                        </div>
                                        </a>
                                    </div>
                                   @break
                                @default

                            @endswitch
                        </div>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Name  &nbsp;</td>
                                <td>:  &nbsp; </td>
                                <td class="font-weight-bold">{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td>Work Unit  &nbsp;</td>
                                <td>:  &nbsp;</td>
                                <td>{{ $data->work_unit ? $data->work_unit : '-' }}</td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-around">
                            @if($data->position_kpb)
                            <div class="btn btn-outline-primary p-2 mt-3">{{ $data->position_kpb}}</div>
                            @endif
                            @if($data->position_department)
                            <div class="btn btn-outline-primary p-2 mt-3">{{ $data->position_department}}</div>
                            @endif
                        </div>
                    </div>
                </div>
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
