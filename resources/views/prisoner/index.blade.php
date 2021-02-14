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
                        <h6 class="m-0 font-weight-bold text-primary">Prisoner's List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Prison Name</th>
                                    <th>Civil Status</th>
                                    <th>Residence</th>
                                    <th>Age</th>
                                    <th>Prison No.</th>
                                    <th>Date Detained</th>
                                </tr>
                                </thead>
                                <tbody>

                               @foreach($prisoners as $prison)
                                   <tr>
                                       <td>{{$prison->firstname}} {{$prison->lastname}}</td>
                                       <td>{{$prison->status}}</td>
                                       <td>{{$prison->permanent_address}}</td>
                                       <td>{{$prison->age}}</td>
                                       <td>not yet</td>
                                       <td>{{$prison->created_at}}</td>
                                       <td>
                                          <div style="display: flex">
                                              <a href="#" style="margin-right:5px " >
                                                  <span class="material-icons">edit</span>
                                              </a>
                                              <a href="/prisoner/{{$prison->id}}">
                                                  <span class="material-icons">preview</span>
                                              </a>
                                          </div>
                                       </td>
                                   </tr>




                               @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{$prisoners->links()}}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>



@endsection
