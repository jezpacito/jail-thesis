@extends('layouts.admin')
@section('main-content')

    <div class="card">
        <div class="card-header">
            <h3>   Staff Info</h3>
        </div>
            <div class="m-2">
            </div>
        <div class="card-body">
            <form action="{{url('/staff/update').'/'.$staff->id}}" method="Post">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">First Name</label>
                        <input  type="text" class="form-control"  name="name" value="{{$staff->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input  type="text" class="form-control" name="last_name" value="{{$staff->last_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Username</label>
                        <input  type="text" class="form-control" id="inputEmail4" name="username" value="{{$staff->username}}">
                    </div>

                </div>
                <a href="/staff" class="btn btn-primary">Back</a>
                <button class="btn btn-secondary m-lg-2" type="submit">Update</button>
            </form>
        </div>
    </div>

@endsection
