<div >
    <div class="empty-state">
        <h2 class="">{{ $data->title }}</h2>
        <p class="lead">
            {{ date('j F Y', strtotime($data->created_at)) }} - {{ $data->created_at->diffForHumans() }}
            <br>
            @if($data->link == null)
                Link : -
            @else
                Link : <a href="{{ $data->link }}" target="_blank">{{ $data->link }}</a>
            @endif
        </p>
    </div>

    @switch($data->image)
        @case(!null)
        <img alt="image" src="{{ asset($data->image) }}" class="img-fluid" >
            @break
        @default

    @endswitch
</div>
