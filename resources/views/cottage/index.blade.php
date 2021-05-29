@extends('layouts.admin')
@section('main-content')

    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                                                                                   href="https://datatables.net">official DataTables documentation</a>.</p>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Cottages</h6>
                            <!-- Button trigger modal -->
                            {{-- //start modal --}}
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                                Add Cottage
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form  action="{{ route('cottage.store') }}" enctype='multipart/form-data' method="post">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Cottage Name</label>
                                              <input type="text" class="form-control" name="cottage_name" placeholder="Enter Cottage Name">
                                              {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cottage Night Rate</label>
                                                <input type="number" class="form-control"  value=850 name="nightRate" readonly>
                                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputEmail1">Cottage Dat Rate</label>
                                                <input type="number" class="form-control"  value=650  name="dayRate"  readonly>
                                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Upload Image</label>
                                                <input type='file' name='file' class="form-control">
                                              </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </form>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                {{-- //end modal --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Cottage Name</th>
                                        <th>Night Rate</th>
                                        <th>Day Rate</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($cottages as $cottage )
                                            <tr>
                                                <td>{{ $cottage->name }}</td>

                                                <td>Price: {{ $cottage->nightRate }} | Status:  @if($cottage->isNightAvailable ==true)
                                                   <span class="text-primary">Available </span>
                                                   @else
                                                   <span class="text-danger"> Occupied</span>
                                                @endif </td>

                                                <td>Price: {{ $cottage->dayRate }} | Status:  @if($cottage->isDayAvailable ==true)
                                                    <span class="text-primary">Available </span>
                                                    @else
                                                    <span class="text-danger"> Occupied</span>
                                                 @endif </td>

                                                <td>
                                                    <a  href="/cottage/{{$cottage->id}}/edit" class="btn btn-primary btn-sm"> Update</a>
                                                    <a  href="/cottage/night/{{$cottage->id}}" class="btn btn-warning btn-sm"> Available/Unavailable (Night) </a>
                                                    <a  href="/cottage/day/{{$cottage->id}}" class="btn btn-success btn-sm"> Available/Unavailable (Day) </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>



@endsection
