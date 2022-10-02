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
                                Edit Student
                            @else
                                Add Student
                            @endif
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">
                                @if (isset($editData))
                                    Edit Student
                                @else
                                    Add Student
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
                                    <a href="{{ route('studentss.index') }}" class="btn btn-info float-right "><i
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
                                    action="{{ (@$editData)?route('students.update',$editData->id):route('students.store') }}"
                                    method="post" id="myForm" name="addCourse" class="ml-4" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($editData))
                                        @method('put')
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="first_name">Student First Name</label>
                                            <input type="text" id="first_name" value="{{ @$editData->first_name }}"
                                                   class="form-control" name="first_name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="last_name">Student Last Price</label>
                                            <input type="text" id="last_name" value="{{ @$editData->last_name }}"
                                                   class="form-control" name="last_name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label for="reg_no">Registration id</label>
                                            <input type="text" id="reg_no"
                                                   value="{{ @$editData->reg_no }}" class="form-control"
                                                   name="reg_no">
                                        </div>
                                    </div>

                                    <div>
                                        <input type="submit" value="{{ (@$editData)?'Update Student':'Add Student' }}"
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


