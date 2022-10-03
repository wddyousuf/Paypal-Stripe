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
                                Edit Course to Student
                            @else
                                Add Course to Student
                            @endif
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">
                                @if (isset($editData))
                                    Edit Course to Student
                                @else
                                    Add Course to Student
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
                                    <a href="{{ route('students.index') }}" class="btn btn-info float-right "><i
                                            class="fa fa-list fa-xs ml-1 mr-1"></i>Manage students</a>
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
                                    action="{{ (@$editData)?route('students.update',$editData->id):route('courseAssign') }}"
                                    method="post" id="myForm" name="addCourse" class="ml-4" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($editData))
                                        @method('put')
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="course_id">Choose Courses for {{$data['student']->first_name}}</label>
                                            <select name="course_id[]" class="select2 form-control" multiple="multiple" id="course_id">
<option value="">Select Course</option>
@foreach ($data['courses'] as $course)
<option value="{{$course->id}}">{{$course->course_name}}</option>
@endforeach
                                            </select>
                                            <input type="hidden" name="student_id" value="{{$data['student']->id}}">
                                        </div>
                                    </div>

                                    <div>
                                        <input type="submit" value="{{ (@$editData)?'Update Course to Student':'Add Course to Student' }}"
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


