@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Courses</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Manage Courses</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    <i class="mr-1 text-info"></i>
                                    Courses
                                    {{-- @dd($data) --}}
                                    <a href="{{ route('courseToStudent', $data->id) }}" class="btn btn-info float-right "><i
                                            class="fa fa-plus-circle ml-1 mr-1"></i>Add Courses</a>

                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">


                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Student Name</th>
                                            <th>Price</th>
                                            <th>Payment Status</th>
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
                                            <td colspan="2">Total</td>
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
                        </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->




        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
