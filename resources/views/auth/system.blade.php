@extends('layout.master')

@section('title', 'login')

@section('content')
    <section class="log-register-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="login-reg-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="login-tab" data-bs-toggle="tab"
                                        data-bs-target="#login"
                                        type="button" role="tab" aria-controls="login" aria-selected="false">
                                    System login
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="login" role="tabpanel"
                                 aria-labelledby="login-tab">
                                <form action="{{ route('system.login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Enter email address">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"
                                               class="form-control mb-0 @error('password') is-invalid @enderror" id=""
                                               placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary login-btn">Login Now</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

