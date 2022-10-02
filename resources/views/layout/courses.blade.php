@extends('layout.master')

@section('title', 'Courses')

@section('content')
    <section class="about-banner-main" style="background: url('/images/programs/course.jpg') !important;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="sub-header">Courses</h3>
                    <div class="banner-breadcrumb">
                        <div class="swm-breadcrumbs">
                            <a href="{{url('/')}}" class="swm-bc-trail-begin">Home</a>
                            <span class="swm-bc-sep"></span>
                            <span class="swm-bc-trail-end">knowldge-hub</span>
                            <span class="swm-bc-sep"></span>
                            <span class="swm-bc-trail-end">Courses</span>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="courses-main">
        <div class="container">
            <div class="row">
                @foreach($data as $category)
                    @if($category->courses->count()>0)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="courses-model">
                                <h3>{{$category->name}} courses</h3>
                                @foreach($category->courses as $course)
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-xs-12 col-sm-12 col-md-4">
                                                <img src="{{ asset(get_image_from_json($course->image)) }}"
                                                     class="img-fluid" alt="...">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$course->course_name}}</h5>
                                                    <p class="card-text">{!! $course->course_description !!}</p>
                                                                              <a class="btn btn-success rounded-0" href="{{route('course_registration',$course->id)}}">Course Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


@endsection
