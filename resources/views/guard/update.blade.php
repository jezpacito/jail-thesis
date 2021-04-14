@extends('layouts.admin')
@section('main-content')

    <div class="card">
        <div class="card-header">
            <h3> Guard Info</h3>
        </div>
        <div class="m-2">
        </div>
        <div class="card-body">
            <form action="{{url('guard').'/'.$guard->id}}" method="Post">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">First Name</label>
                        <input  type="text" class="form-control"  name="firstname" value="{{$guard->firstname}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input  type="text" class="form-control" name="lastname" value="{{$guard->lastname}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Middlename</label>
                        <input  type="text" class="form-control" id="inputEmail4" name="middlename" value="{{$guard->middlename}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Contact Number</label>
                        <input  type="number" class="form-control" id="inputEmail4" name="contact_no" value="{{$guard->contact_no}}">
                    </div>
                 
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Address</label>
                        <input  type="text" class="form-control" id="inputEmail4" name="address" value="{{$guard->address}}">
                    </div>

                </div>
                <a href="/staff" class="btn btn-primary">Back</a>
                <button class="btn btn-secondary m-lg-2" type="submit">Update</button>
            </form>
        </div>
    </div>

@endsection
