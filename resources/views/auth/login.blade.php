@extends('layout.master')

@section('title', 'login')

@section('content')
    <section class="log-register-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="login-reg-tabs">

                        <div class="col-12">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $error }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{(\Illuminate\Support\Facades\Route::current()->uri=='login')?'active':''}}"
                                    id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                                    type="button" role="tab" aria-controls="login" aria-selected="false">
                                    login
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link {{(\Illuminate\Support\Facades\Route::current()->uri=='register')?'active':''}}"
                                    id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                                    type="button" role="tab" aria-controls="register" aria-selected="true">
                                    register
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div
                                class="tab-pane fade {{(\Illuminate\Support\Facades\Route::current()->uri=='login')?'active show':''}}"
                                id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <form action="{{route('login')}}" method="post">
                                    @csrf
{{--                                    <input type="hidden" name="_token" value="">--}}
{{--                                    <input type="hidden" name="_method" value="post">--}}
                                    <div class="form-group">
                                        <input type="text" name="phone" value="" class="form-control"
                                               placeholder="Enter your phone number">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control mb-0" id=""
                                               placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary login-btn">Login Now</button>
                                    <div class="w-100 text-center">
                                        <a href="#" class="forget-pass">
                                            Forgot your password?
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <div
                                class="tab-pane reg-tabs fade {{(\Illuminate\Support\Facades\Route::current()->uri=='register')?'active show':''}}"
                                id="register" role="tabpanel"
                                aria-labelledby="register-tab">
                                <form action="{{route('register')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="first_name" value="" class="form-control"
                                               placeholder="Enter first name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="last_name" value="" class="form-control"
                                               placeholder="Enter last name">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" value="" class="form-control"
                                               placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" value="" class="form-control"
                                               placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="reg_no" value="" class="form-control"
                                               placeholder="Enter registration number">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control"
                                               placeholder="Confirm password">
                                    </div>
                                    {{--                                    <input type="hidden" name="form_action" value="signup">--}}
                                    <button type="submit" class="btn btn-primary login-btn">Create account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
