@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            @if (isset($editData))
                                Edit Course
                            @else
                                Add Course
                            @endif
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">
                                @if (isset($editData))
                                    Edit Course
                                @else
                                    Add Course
                                @endif
                            </li>
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
                                    <a href="{{ route('courses.index') }}" class="btn btn-info float-right "><i
                                            class="fa fa-list fa-xs ml-1 mr-1"></i>Manage Courses</a>
                                </h3>
                                <div class="col-md-4">
                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert">&times;
                                                </button>
                                                <strong>{{ $error }}</strong>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form
                                    action="{{ (@$editData)?route('courses.update',$editData->id):route('courses.store') }}"
                                    method="post" id="myForm" name="addCourse" class="ml-4" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($editData))
                                        @method('put')
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="course_name">Course Name</label>
                                            <input type="text" id="course_name" value="{{ @$editData->course_name }}"
                                                   class="form-control" name="course_name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="course_price">Course Price</label>
                                            <input type="text" id="course_price" value="{{ @$editData->course_price }}"
                                                   class="form-control" name="course_price">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="discounted_price">Discounted Price</label>
                                            <input type="text" id="discounted_price"
                                                   value="{{ @$editData->discounted_price }}" class="form-control"
                                                   name="discounted_price">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="course_code">Course Code</label>
                                            <input type="text" id="course_code"
                                                   value="{{ @$editData->course_code }}" class="form-control"
                                                   name="course_code">
                                        </div>
                                    </div>

                                    <div>
                                        <input type="submit" value="{{ (@$editData)?'Update Course':'Add Course' }}"
                                               class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




@endsection


