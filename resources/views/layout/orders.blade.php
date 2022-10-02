@extends('layout.master')

@section('title', 'Orders')

@section('content')
<section class="userprofile-main">
    <div class="userprofile-banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4>My orders</h4>
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
                            <legend class="common-legend">
                                <i class="fa-regular fa-cart-shopping"></i> my orders
                            </legend>
                            <div class="table-responsive">
                                <table class="table">

                                    <tbody>
                                        <tr class="">
                                            <td>#</td>
                                            <td>Order ID</td>
                                            <td class="text-center">Order date</td>
                                            <td class="text-center">Price</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Details</td>
                                        </tr>
                                        <tr>
                                            <td>01</td>
                                            <td>0158412</td>
                                            <td class="text-center">20/07/2022</td>
                                            <td class="text-center">1550</td>
                                            <td class="text-center">
                                                <span class="pending">pending</span>
                                            </td>
                                            <td class="text-center"><a href="#" class="">view order</a></td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>0158412</td>
                                            <td class="text-center">20/07/2022</td>
                                            <td class="text-center">1550</td>
                                            <td class="text-center">
                                                <span class="deliverd">deliverd</span>
                                            </td>
                                            <td class="text-center"><a href="#" class="">view order</a></td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>0158412</td>
                                            <td class="text-center">20/07/2022</td>
                                            <td class="text-center">1550</td>
                                            <td class="text-center">
                                                <span class="cancel">cancel</span>
                                            </td>
                                            <td class="text-center"><a href="#" class="">view order</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection