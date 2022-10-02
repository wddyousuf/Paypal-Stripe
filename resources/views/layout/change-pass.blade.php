@extends('layout.master')

@section('title', 'Change Password')

@section('content')
<section class="userprofile-main">
    <div class="userprofile-banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4>Change Password</h4>
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
                    <form action="" method="post" class="commom-form">

                        <fieldset class="common-fieldset">
                            <legend class="common-legend">Change Information</legend>

                            <div class="row g-3 align-items-center">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="" class="col-form-label">old Password:<sup
                                            class="text-danger">*</sup></label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <input type="text" name="" value="" class="form-control"
                                        placeholder="Please Enter old Password">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="" class="col-form-label">new password :<sup
                                            class="text-danger">*</sup></label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <input type="text" name="" readonly="" value=""
                                        class="form-control" placeholder="Please Enter Your new password">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <label for="" class="col-form-label">confirm password :<sup
                                            class="text-danger">*</sup></label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                    <input type="text" name="" readonly="" value=""
                                        class="form-control" placeholder="Please Enter Your confirm password">
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
