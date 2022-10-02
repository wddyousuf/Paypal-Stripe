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
                      <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                         type="button" role="tab" aria-controls="login" aria-selected="false">
                      login
                      </button>
                   </li>
                   <li class="nav-item" role="presentation">
                      <button class="nav-link " id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                         type="button" role="tab" aria-controls="register" aria-selected="true">
                      register
                      </button>
                   </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                   <div class="tab-pane fade active show" id="login" role="tabpanel"
                      aria-labelledby="login-tab">
                      <form action="" method="post">
                         <input type="hidden" name="_token" value="">
                         <input type="hidden" name="_method" value="post">
                         <div class="form-group">
                            <input type="text" name="phone" value="" class="form-control"
                               placeholder="Enter email address">
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
                   <div class="tab-pane reg-tabs fade " id="register" role="tabpanel"
                      aria-labelledby="register-tab">
                      <form action="" method="post">
                        
                         <div class="form-group">
                            <input type="text" name="first_name" value="" class="form-control"
                               placeholder="Enter first name">
                         </div>
                         <div class="form-group">
                            <input type="text" name="last_name" value="" class="form-control"
                               placeholder="Enter last name">
                         </div>
                         <div class="form-group">
                            <input name="email" type="text" value="" class="form-control"
                               placeholder="Enter your email">
                         </div>
                         <div class="form-group">
                            <input type="text" name="phone" value="" class="form-control"
                               placeholder="Enter phone number">
                         </div>
                         <div class="form-group">
                            <input type="text" name="medical_college" value="" class="form-control"
                               placeholder="Enter medical college Name">
                         </div>
                         <div class="form-group">
                            <input type="text" name="country" value="" class="form-control"
                               placeholder="Enter your country Name">
                         </div>
                         <div class="form-group">
                            <input type="text" name="state" value="" class="form-control"
                               placeholder="Enter your state">
                         </div>
                         <div class="form-group">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Course</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                         </div>
                         <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                         </div>
                         <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Confirm password">
                         </div>
                         <input type="hidden" name="form_action" value="signup">
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
