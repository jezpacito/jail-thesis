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
                            <h6 class="m-0 font-weight-bold text-primary">Booking Details</h6>



                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Guest Name</th>
                                        <th>Booking Date</th>
                                        <th>Booking Type</th>
                                        <th>Number of Person</th>
                                        <th>Cottage Name</th>
                                         <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                        @forelse ($bookings as $booking )
                                        <tr>
                                            <td>{{ $booking->guest->name }} {{ $booking->guest->last_name }}</td>
                                            <td>{{ $booking->booking_date }}</td>
                                            <td>{{ $booking->time_type }}</td>
                                            <td>{{ $booking->number_persion }}</td>
                                            <td>{{ $booking->cottage->name}}</td>
                                            {{-- <td>{{ $booking->cottage->category->cottage_type}}</td> --}}
                                            <td>
                                                <a href="{{url('/finished/').'/'.$booking->id}}" class="btn btn-success">Finished</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <span class="text-danger"> <h2> no booking  </h2></span>

                                        @endforelse



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
