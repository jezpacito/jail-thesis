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
                            <h6 class="m-0 font-weight-bold text-primary">List of Rooms</h6>
                            <!-- Button trigger modal -->
                            {{-- //start modal --}}
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                                Add Room
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
                                        <form  action="{{ route('rooms.store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Room Name</label>
                                              <input type="text" class="form-control" name="name" placeholder="Enter Room Name">
                                              {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Price</label>
                                                <input type="number" class="form-control"   name="price" >
                                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Room description</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
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
                                        <th>Room Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($rooms as $room )
                                            <tr>
                                                <td>{{ $room->name }}</td>

                                                <td>Price: {{ $room->price }} | Status:  @if($room->isVacant ==true)
                                                   <span class="text-primary">Available </span>
                                                   @else
                                                   <span class="text-danger"> Occupied</span>
                                                @endif </td>

                                                <td>
                                                    <a href="/rooms/{{$room->id}}/edit " class="btn btn-primary btn-sm"> Update </a>
                                                    <a href="#" class="btn btn-primary btn-sm"> Make room available/unavailable </a>
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
