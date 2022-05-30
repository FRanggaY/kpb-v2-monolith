@extends('layouts.main_dashboard')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-stats">
                    <div class="card-stats-title">User Statistics
                    </div>
                    <div class="card-stats-items">
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $datas['user_total_admin'] }}</div>
                        <div class="card-stats-item-label">Admin</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $datas['user_total_user'] }}</div>
                        <div class="card-stats-item-label">User</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Users</h4>
                    </div>
                    <div class="card-body">
                        {{ $datas['user_total'] }}
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-stats">
                    <div class="card-stats-title">Gallery Statistics
                    </div>
                    <div class="card-stats-items">
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $datas['gallery_active'] }}</div>
                        <div class="card-stats-item-label">Active</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $datas['gallery_unactive'] }}</div>
                        <div class="card-stats-item-label">Unactive</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-image"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Gallery</h4>
                    </div>
                    <div class="card-body">
                      {{ $datas['gallery_total'] }}
                    </div>
                  </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                  <div class="card-stats">
                    <div class="card-stats-title">Advertise
                    </div>
                    <div class="card-stats-items">
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $datas['advertise_active'] }}</div>
                        <div class="card-stats-item-label">Active</div>
                      </div>
                      <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $datas['advertise_unactive'] }}</div>
                        <div class="card-stats-item-label">Unactive</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-icon shadow-primary bg-primary">
                    <i class="fas fa-box"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Advertise</h4>
                    </div>
                    <div class="owl-carousel owl-theme" id="advertise-carousel">
                        @foreach ($datas['advertise_data'] as $item)
                        <div class="card">
                            <img src="{{ $item->image  }}" class="card-img-top">
                            <div class="card-body">
                            <a href="{{ $item->link }}" target="_blank" class="btn btn-outline-primary">{{ $item->title }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="card">
                    <div class="card card-statistic-2 m-0">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="far fa-calendar"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                            <h4>Activity</h4>
                            </div>
                            <div class="card-body">
                                {{ $datas['activity_total'] }}
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4>Activities Today</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($datas['activity_today'] as $item)
                                <li class="media">
                                    <div class="media-body">
                                        @if($item->image)
                                        <img class="mr-3" width="200" src="{{ asset($item->image) }}" alt="photo">
                                        @endif
                                        <div class="float-right text-primary">{{ $item->time }}</div>
                                        <div class="media-title">{{ $item->title }}</div>
                                        <span class="text-small text-muted">{{ date('j F Y', strtotime($item->date)) }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        @if(count($datas['activity_today'])<=0)
                        <div class="text-center pt-1 pb-1">
                            <span class="text-muted">No Activities Today</span>
                        </div>
                        @else
                        <div class="text-center pt-1 pb-1">
                            <a href="{{ url('dashboard/activity') }}" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
  </section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            margin:50,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                480 : {
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        });
    });
</script>
@endsection
