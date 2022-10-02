@extends('layout.master')

@section('title', 'Checkout')

@section('content')
<section class="checkout-main">
    <div class="container">
        <form action="{{route('place_order')}}" method="post" enctype="multipart/form-data">
            @csrf
            @php
            $price=0;
            $discount=0;
            @endphp
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="billing-address">
                        <fieldset class="billing-fieldset">
                            <legend class="rounded">user information</legend>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="first_name" class="form-label"> First Name </label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"
                                            placeholder="Enter your First name" required aria-required="true">

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="last_name" class="form-label"> Last Name </label>
                                        <input type="text" id="last_name" name=last_name"" class="form-control"
                                            placeholder="Enter your Last name" required aria-required="true">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label"> Email </label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Enter Your Email Address" required aria-required="true">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label"> Phone </label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            placeholder="Enter phone number" required aria-required="true">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="review-cart">
                        <div class="billing-address">

                            <fieldset class="billing-fieldset mb-3">
                                <legend>Review cart</legend>
                                <div class="table-responsive review-cart-table">
                                    <table class="table mb-0">

                                        <tbody>
                                        @foreach($data as $cart)

                                            <tr>

                                                <td>
                                                    <img src="{{ asset(get_image_from_json($cart->courses->image)) }}" alt="">


                                                </td>
                                                <td>
                                                    <a href="{{route('details',$cart->course_id)}}" class="d-block">{{$cart->courses->course_name}}</a>
                                                    <p>Categories:
                                                        <a href="#">{{$cart->courses->category->name}}</a>
                                                    </p>
                                                </td>
                                                @php
                                                $price+=$cart->courses->course_price;
                                                if($cart->courses->discounted_price != null){
                                                    $disc=$cart->courses->course_price-$cart->courses->discounted_price;
                                                }
                                                $discount+=$disc;
                                                $disc=0;
                                                @endphp
                                                <td class="text-end">
                                                    <p>1
                                                        X {{$cart->courses->course_price}} =
                                                        {{$cart->courses->course_price}}</p>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <div class="billing-address mb-0">

                                <fieldset class="billing-fieldset mb-3 ">
                                    <legend class="rounded">Payment Method</legend>

                                    <label for="" class="form-label"> Select payment method </label>
                                    <br>

{{--                                    <div class="form-check form-check-inline">--}}

{{--                                        <input class="form-check-input" type="radio" name="flexRadioDefault"--}}
{{--                                            id="flexRadioDefault1">--}}

{{--                                        <label class="form-check-label" for="">--}}
{{--                                            <img src="{{ 'images/icon/cod.png' }}" alt=""--}}
{{--                                                style="width: 65px">--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>

                                        <label class="form-check-label" for="">
                                            <img src="{{ 'images/icon/ssl.png' }}" alt=""
                                                style="width: 125px">
                                        </label>
                                    </div>


                                </fieldset>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="1" id=""
                                        name="" required="" aria-required="true">
                                    <label class="form-check-label" for="">
                                        I agree with
                                        <a href="" target="_blank">Terms &amp; Conditions,</a>
                                        <a href="" target="_blank"> Return & Refund Policy and </a>
                                        <a href="" target="_blank">privacy
                                            policy</a> of planetaryhealthacademia.org
                                    </label>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-body billing-address mb-0">
                            <fieldset class="billing-fieldset">
                                <legend class="rounded">Overview</legend>
                                <div class="table-responsive">
                                    <table class="table table-borderless over-viewtable mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total:</td>
                                                <td>{{$price}}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Discount:</td>
                                                <td>
                                                    <span id="">{{$discount}}</span>


                                                </td>
                                            </tr>
                                            <tr class="">
                                                <td>Tax:</td>

                                                <td>0

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="total-price-section">
                                    <div class="total-price">Total <span
                                            style="color: red !important;margin-top:10px !important;">*</span>
                                        <p
                                            style="margin-bottom: 0px !important;font-size:9px !important; display:contents !important;">
                                            VAT info included</p>

                                    </div>
                                    <div class="total-price" id=""><span id="total_price">{{$price-$discount}}</span>


                                    </div>
                                </div>
                                <div class="w-100">

                                    <button type="submit" class="btn btn-primary orderNowButton d" id="submit_btn">order now
                                    </button>
                                </div>
                            </fieldset>
                        </div>
                    </div>


                </div>
            </div>

        </form>
    </div>
</section>

@endsection
