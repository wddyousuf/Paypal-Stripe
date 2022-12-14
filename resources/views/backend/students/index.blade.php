@extends('backend.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Manage Students</li>
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
                    <a href="{{ route('students.create') }}" class="btn btn-info float-right "><i class="fa fa-plus-circle ml-1 mr-1"></i>Add Students</a>

                    </h3>

                </div><!-- /.card-header -->
                <div class="card-body">


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SL No</th>
                          <th>Student Name</th>
                          <th>Registration No</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key=>$student)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student->first_name.' '.$student->last_name }}</td>
                            <td>{{ $student->reg_no }}</td>
                            <td>
                                <a title="Edit" href="{{ route('courses.edit',$student->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                <a title="Assign Course" href="{{ route('courseToStudent',$student->id) }}" class="btn btn-success btn-xs">Assign</a>
                                <a title="Assigned Courses" href="{{ route('assignedcourses',$student->id) }}" class="btn btn-success btn-xs">Assigned Courses</a>
                                <form method="POST" action="{{ route('courses.destroy', $student->id) }}">
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
