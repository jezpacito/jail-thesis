@extends('layouts.admin')
@section('main-content')

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Prisoner's List</h6>
                        <div class="row mt-2">
                            <div class="ml-2 form-group">

                                @include('reports.monthly')
                            </div>
                            <div class="form-group ml-2 ">
                            @include('reports.yearly')
                            </div>
                            <div class=" form-group ml-2">
{{--                            @include('reports.quarterly')--}}
                            </div>
                        </div>
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
                                       <td>{{$prison->offenseData->date_imprisonment}}</td>
                                       <td>
                                          <div style="display: flex">

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
