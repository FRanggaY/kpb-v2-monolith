<div data-height="400">
    <div class="empty-state">
        <h2 class="">{{ $data->title }}</h2>
        <p class="lead">{{ date('j F Y', strtotime($data->date)) }} - {{ $data->time }}</p>
    </div>


    @switch($data->image)
        @case(!null)
        <img alt="image" src="{{ asset($data->image) }}" class="img-fluid" >
            @break
        @default

    @endswitch
    <div class="mt-4">
        {!! $data->body !!}
    </div>
</div>
