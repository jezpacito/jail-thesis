@extends('layouts.admin')
@section('main-content')

    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
{{--                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>--}}
{{--                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.--}}
{{--                        For more information about DataTables, please visit the <a target="_blank"--}}
{{--                                                                                   href="https://datatables.net">official DataTables documentation</a>.</p>--}}

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Jail Guard's List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Guard Name</th>
                                        <th>Email</th>
                                        <th>Residence</th>
                                        <th>Contact No.</th>
                                        <th>Status</th>
                                        <th>Added by</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($guards as $guard)
                                        <tr>
                                            @if($guard->creator !=null)

                                            <td>{{$guard->firstname}} {{$guard->middlename}} {{$guard->lastname}}</td>
                                            <td>{{$guard->email}}</td>
                                            <td>{{$guard->address}}</td>
                                            <td>{{$guard->contact_no}}</td>
                                            @if($guard->isDischarge ===true)
                                                <td>Active</td>
                                                @else
                                                <td><span class="text-danger"> Discharged</span></td>
                                            @endif
                                          
                                            <td>{{$guard->creator->name}} {{$guard->creator->last_name}}</td>
                                            <td>
                                                <div style="display: flex">
                                                    <a href="/guard/{{$guard->id}}/edit" style="margin-right:5px " >
                                                        <span class="material-icons">preview</span>
                                                    </a>
                                                </div>
                                                {{-- action="/status/{{$user->id}}"  --}}
                                                <form method="POST" action="/status/guard/{{$guard->id}}"autocomplete="off">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <button  class="border-0 btn bg-white" type="submit">
                                                     <span class="material-icons">
                                                         settings_applications
                                                    </span>
                                                    </button>
                                                </form>
                                            </td>
                                            @else
                                            <span class="text-danger"> no jail guard register</span>
                                            @endif
                                        </tr>
                                      
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{$guards->links()}}
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>



@endsection
