@extends('layout.master')

@section('title', 'Course Details')

@section('content')
<section class="about-banner-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="sub-header">
                    {{$data->webinar_name}}
                    </h3>
                <div class="banner-breadcrumb">
                    <div class="swm-breadcrumbs">
                        <a href="{{url('/')}}" class="swm-bc-trail-begin">Home</a>
                        <span class="swm-bc-sep"></span>
                        <span class="swm-bc-trail-end">Webinar</span>
                        <span class="swm-bc-sep"></span>
                        <span class="swm-bc-trail-end">{{$data->webinar_name}}</span>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="course-details-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="details-header">
                    <h3>{{$data->webinar_name}}</h3>
                    <ul class="nav">

                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <i class="icofont-calendar"></i>
                              {{date('d-m-Y',strtotime($data->webinar_time))}}
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <i class="icofont-clock-time"></i>
                              {{date('H:i A',strtotime($data->webinar_time))}} UTC+6
                          </a>
                        </li>

                      </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="sub-title">
                    <span>about Webinar</span>
                </div>

                <div class="clear"></div>
                <div class="webinar-description">
                  <div class="host-details">
                    <h4>Host: {{$data->faculty->people_name}}</h4>
                    <span>{{$data->faculty->designation}}</span>
                    <span>{{$data->faculty->people_description}}</span>
                  </div>
                    <p>{!! $data->webinar_description !!}</p>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <p>Webinar Link : <a href="{{ $data->link }}" class="btn btn-success rounded-0">Click Here to join</a></p>
                    @else
                        <p><a href="{{route('login')}}"  style="color: red;">Please Login first to view the webinar link</a></p>
                    @endif

{{--                    <div class="calendar-main">--}}
{{--                        <ul class="nav">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="" class="nav-link"> <i class="icofont-calendar"></i> Google calendar</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="" class="nav-link"> <i class="icofont-calendar"></i> iCal Export</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="host-image">
                    <img src="{{ asset(get_image_from_json($data->image)) }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
