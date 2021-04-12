@extends('layouts.admin')
@section('main-content')

    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Add Staff
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Staff</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" class="user" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row">

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName"
                                                       placeholder="First Name"  >
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text"  name="last_name" value="{{ old('last_name') }}" class="form-control form-control-user @error('last_name') is-invalid @enderror" id="exampleLastName"
                                                       placeholder="Last Name">
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                     </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="text"name="username" class="form-control form-control-user @error('username') is-invalid @enderror" id="exampleInputEmail"
                                                   placeholder="User Name">
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <input type="email"name="email" value="{{ old('email') }}" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail"--}}
{{--                                                   placeholder="Email Address">--}}
{{--                                            @error('email')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                     </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Register') }}
                                        </button>

                                        <hr>
                                        <input type="hidden" value="staff"  name="role">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                                    <button type="button" class="btn btn-primary">Save changes</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>RFID UUID</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}} {{$user->last_name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->rfid_uuid}}</td>
                                        @if($user->status ==1)
                                        <td class="text-primary"><b>Active</b></td>
                                        @else
                                            <td class="text-danger"><b>Inactive</b></td>
                                        @endif
                                        <td class="text-center">
                                            <div class="text-center">
                                                @if($user->status ==1)
                                                    <form method="POST" action="{{url('/status').'/'.$user->id}}" autocomplete="off">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                        <input type="hidden" name="_method" value="PUT">
                                                        <button  class="border-0 btn bg-white" type="submit">
                                                         <span class="material-icons">
                                                             settings_applications
                                                        </span>
                                                        </button>

                                                    </form>
                                                @else
                                                    <form method="POST" action="/status/{{$user->id}}" autocomplete="off">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <button  class="border-0 btn bg-white" type="submit">
                                                         <span class="material-icons">
                                                             settings_applications
                                                        </span>
                                                        </button>
                                                    </form>
                                                    @endif
                                                <a href="view/staff/{{$user->id}}">
                                                    <span class="material-icons">preview</span>
                                                </a>
                                            </div>
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
