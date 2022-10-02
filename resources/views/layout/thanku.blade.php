@extends('layout.master')

@section('title', 'Thank You')

@section('content')
<section class="pro-content empty-content thanku">
    <div class="container">

        <div class="row">
            <div class="col-5 mx-auto mt-4 text-center">
                <div class="pro-empty-page">
                    <h2 style="font-size: 70px;"><i style="color: green;" class="far fa-check-circle"></i></h2>
                    <h1>Thank You</h1>
                    <h5>
                        You have successfully placed your order
                     </h5>
                    <h3>Your Order Number is <span style="color: #cc9933">#1258214.</span>
                    </h3>
                    <a href="{{route('webinar')}}" class="btn btn-success mt-3">Continue Buying</a>
                </div>
            </div>

        </div>

    </div>


</section>
@endsection
