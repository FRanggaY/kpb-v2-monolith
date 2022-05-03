@extends('layouts.main_page')
@section('custom-style')

<style>
    .gallery-articles{
        flex-direction: column;
        align-items: center;
    }
    .gallery-article{
        width: 100%;
    }
    @media (min-width: 992px) {
        .w-sm-50 {
            width: 70%;
        }
    }
    @media (min-width: 692px) {
        .gallery-articles{
            flex-direction: row;
        }
        .gallery-article{
            width: 50%;
        }
    }
</style>

@endsection
@section('content')
<section class="section">
    {{-- carousel --}}
    <div id="carouselExampleIndicators2" class="carousel slide w-sm-50 mx-auto" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="assets/img/news/img01.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Heading</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/news/img07.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Heading</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="assets/img/news/img08.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Heading</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-danger mt-4">
                    <div class="card-header">
                      <h4>Users</h4>
                      <div class="card-header-action">
                        <a href="{{ url('user') }}" class="btn btn-primary btn-icon icon-right">View All <i class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
                    <div class="card-body">
                        @if($datas['user_active']->count()<=2)
                            <div class="d-flex flex-wrap justify-content-center">
                                @foreach ($datas['user_active'] as $userdata)
                                <div class="m-5">
                                    <div class="user-item">
                                    @switch($userdata->profile_picture)
                                    @case(null)
                                        <img alt="image" src="{{ asset("assets/img/avatar/avatar-1.png") }}" class="img-fluid" width="100">
                                        @break
                                    @case(!null)
                                        <img alt="image" src="{{ $userdata->profile_picture }}" class="img-fluid" width="100">
                                        @break
                                    @default

                                    @endswitch
                                        <div class="user-details">
                                        <div class="user-name">{{ $userdata->name }}</div>
                                        <div class="text-job text-muted">{{ $userdata->position_kpb ?? '-' }} / {{ $userdata->position_department ?? '-' }}</div>
                                        </div>
                                </div>
                                </div>
                                @endforeach
                            </div>

                            @else
                            <div class="owl-carousel owl-theme" id="users-carousel">
                                @foreach ($datas['user_active'] as $userdata)
                                <div>
                                <div class="user-item">
                                    @switch($userdata->profile_picture)
                                    @case(null)
                                        <img alt="image" src="{{ asset("assets/img/avatar/avatar-1.png") }}" class="img-fluid">
                                        @break
                                    @case(!null)
                                        <img alt="image" src="{{ $userdata->profile_picture }}" class="img-fluid" >
                                        @break
                                    @default

                                @endswitch
                                    <div class="user-details">
                                    <div class="user-name">{{ $userdata->name }}</div>
                                    <div class="text-job text-muted">{{ $userdata->position_kpb ?? '-' }} / {{ $userdata->position_department ?? '-' }}</div>
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>
                <h2 class="section-title">Program</h2>
                <div class="owl-carousel owl-theme">
                    <div>
                        <article class="article article-style-b mx-2">
                            <div class="article-header">
                              <div class="article-image" data-background="assets/img/news/img13.jpg">
                              </div>
                            </div>
                            <div class="article-details">
                              <div class="article-title">
                                <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                              </div>
                              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. </p>
                            </div>
                        </article>
                    </div>
                    <div>
                        <article class="article article-style-b mx-2">
                            <div class="article-header">
                              <div class="article-image" data-background="assets/img/news/img13.jpg">
                              </div>
                            </div>
                            <div class="article-details">
                              <div class="article-title">
                                <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                              </div>
                              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. </p>
                            </div>
                        </article>
                    </div>
                    <div>
                        <article class="article article-style-b mx-2">
                            <div class="article-header">
                              <div class="article-image" data-background="assets/img/news/img13.jpg">
                              </div>
                            </div>
                            <div class="article-details">
                              <div class="article-title">
                                <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                              </div>
                              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. </p>
                            </div>
                        </article>
                    </div>
                    <div>
                        <article class="article article-style-b mx-2">
                            <div class="article-header">
                              <div class="article-image" data-background="assets/img/news/img13.jpg">
                              </div>
                            </div>
                            <div class="article-details">
                              <div class="article-title">
                                <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                              </div>
                              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Advertise</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($datas['advertise_active'] as $advertisedata)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                              <article class="article">
                                <div class="article-header">
                                    @switch($advertisedata->image)
                                    @case(null)
                                        <div class="article-image" data-background=""></div>
                                        @break
                                    @case(!null)
                                        <div class="article-image" data-background="{{ asset($advertisedata->image) }}"></div>
                                    @break
                                    @default
                                @endswitch

                                  <div class="article-title">
                                    @switch($advertisedata->link)
                                        @case(null)
                                        <h6 class="font-weight-bold" style="color: white">{{ $advertisedata->title }}</h6>
                                        @break
                                        @case(!null)
                                        <h2><a href="{{ $advertisedata->link }}" target="_blank">{{ $advertisedata->title }}</a></h2>
                                        @break
                                        @default
                                    @endswitch
                                  </div>
                                </div>
                              </article>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-right">
                            <a href="{{ url('advertise') }}" class="btn btn-primary ">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <h2 class="section-title">Activity</h2>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Today</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Tommorow</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                              <div class="activities mt-5">
                                  @foreach ($datas['activity_active_now'] as $activitydatanow)
                                  <div class="activity">
                                      <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fas fa-comment-alt"></i>
                                      </div>
                                      <div class="activity-detail">
                                        <div class="mb-2">
                                          <span class="text-job text-primary">{{ $activitydatanow->time }}</span>
                                          <span class="bullet"></span>
                                        </div>
                                        <span>
                                          {{ $activitydatanow->title }}
                                        </span>
                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                            </div>
                            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                <div class="activities mt-5">
                                    @foreach ($datas['activity_active_tommorow'] as $activitydatetommorow)
                                    <div class="activity">
                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                            <i class="fas fa-comment-alt"></i>
                                        </div>
                                        <div class="activity-detail">
                                            <div class="mb-2">
                                            <span class="text-job text-primary">{{ $activitydatetommorow->time }}</span>
                                            <span class="bullet"></span>
                                            </div>
                                            <span>
                                            {{ $activitydatetommorow->title }}
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ url('activity') }}" class="btn btn-primary ">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="section-title">Gallery</h2>
            <div>
                <a href="{{ url('gallery') }}" class="btn btn-primary ">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        @if($datas['gallery_active']->count()<=2)
            <div class="d-flex gallery-articles">
                @foreach ($datas['gallery_active'] as $gallerydata)
                <div class="m-2 gallery-article">
                    <article class="article">
                        <div class="article-header">
                          <div class="article-image" data-background="{{ asset($gallerydata->image) }}">
                          </div>
                          <div class="article-title">
                            <h2><span style="color: white">{{ $gallerydata->title }}</span></h2>
                          </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

        @else
        <div class="owl-carousel owl-theme">
            <div>
                <article class="article">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset($gallerydata->image) }}">
                        </div>
                        <div class="article-title">
                        <h2><span>{{ $gallerydata->title }}</span></h2>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        @endif

        <div class="hero align-items-center bg-success text-white my-5">
            <div class="hero-inner text-center">
              <h2>Join Us</h2>
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, molestias!</p>
              <div class="mt-4">
                <a href="https://bit.ly/calonppkpbn" target="_blank" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-sign-in-alt"></i> Join Us</a>
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
            loop:true,
            margin:10,
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
