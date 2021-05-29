@extends('layouts.admin')
@section('main-content')

    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tablessss</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                                                                                   href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary mb-3   ">Booking Details</h6>
                            <a href="/generate/report/room" class="btn btn-primary btn-sm "> Reports Booking Room</a>
                            @include('reports.monthly')
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Guest Name</th>
                                        <th>Date Booked</th>
                                        <th>Room Name</th>
                                        <th>Partial Payment</th>
                                        <th>Total Amount Paid</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($histories as $history)
                                        <tr>
                                            <td>{{$history->guest->name  }}</td>
                                            <td>{{$history->date_booked}}</td>
                                            <td>{{$history->room->name}}</td>
                                             <td>1200</td>
                                             <td>{{ 1200 +1200 }} </td>
                                        </tr>
                                    @empty
                                        NO RECORD FOUND
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
