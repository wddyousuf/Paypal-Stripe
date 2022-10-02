@extends('layout.master')

@section('title', 'Profile')

@section('content')


<section class="userprofile-main">
    <div class="userprofile-banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4>Profile - Manage my account</h4>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                @include('common.profile-sidebar')
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="personal-information">


                    <form action="" method="POST" class="commom-form">
                       
                        <fieldset class="common-fieldset">
                            <legend class="common-legend">Personal Information</legend>

                            <div class="row g-3 align-items-center">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="" class="col-form-label">First Name :<sup
                                            class="text-danger">*</sup></label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <input type="text" name="first_name" value=""
                                           class="form-control"
                                           placeholder="Please Enter First Name">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="" class="col-form-label">Last Name :<sup
                                            class="text-danger">*</sup></label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <input type="text" name="last_name" value=""
                                           class="form-control"
                                           placeholder="Please Enter Last Name">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="" class="col-form-label">Phone :<sup
                                            class="text-danger">*</sup></label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <input type="text" name="phone" readonly="" value=""
                                           class="form-control" placeholder="Please Enter Your phone">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="" class="col-form-label">e-mail :<sup
                                            class="text-danger">*</sup></label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <input type="email" name="email" value=""
                                           class="form-control"
                                           placeholder="Please Enter Your email">
                                </div>
                            </div>


                            <div class="w-100 text-end">
                                <button type="submit" class="btn  common-button common-effect">Update</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection