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
                    <a href="{{ route('courses.create') }}" class="btn btn-info float-right "><i class="fa fa-plus-circle ml-1 mr-1"></i>Add Courses</a>

                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body">


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Course Name</th>
                          <th>Course Code</th>
                          <th>Course Price</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key=>$course)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_price }}</td>
                            <td>
                                <a title="Edit" href="{{ route('courses.edit',$course->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                <a title="Details" href="{{ route('course_details',$course->id) }}" class="btn btn-primary btn-xs">Course Details</a>
                                <form method="POST" action="{{ route('courses.destroy', $course->id) }}">
                                    @csrf
                                    @method('delete')
                                    <a type="submit" id="delete" class="badge btn btn-danger btn-xs" title='Delete'>delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
