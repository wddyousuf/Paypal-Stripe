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

                        <fieldset class="common-fieldset">
                            <legend class="common-legend">
                                <i class="fa-regular fa-cart-shopping"></i> my Courses
                            </legend>
                            <div class="table-responsive">
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Course Name</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $price = 0;
                                        @endphp
                                        @foreach ($data->courses as $key => $course)
                                            @php
                                                if ($course->is_paid == 0) {
                                                    $price += $course->course->course_price;
                                                }

                                            @endphp
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $course->course->course_name }}</td>
                                                <td>{{ $course->course->course_price }}</td>
                                                <td>{{ $course->is_paid == 0 ? 'Unpaid' : 'Paid' }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total To Pay</td>
                                            <td>{{ $price }}</td>
                                            <td>
                                                @if ($price > 0)
                                                    <form action="{{ url('payment') }}" method="POST">
                                                        @csrf
                                                        <input type="radio" id="paypal" name="gateway" value="paypal">
                                                        <label for="paypal">paypal</label><br>
                                                        <input type="radio" id="stripe" name="gateway" value="stripe">
                                                        <label for="stripe">stripe</label><br>
                                                        <input type="hidden" name="amount" value="{{ $price }}">
                                                        <input type="hidden" name="student_id" value="{{ $data->id }}">
                                                        <button type="submit">Pay Now</button>
                                                    </form>
                                                @else
                                                    Paid
                                                @endif

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
