@extends('layouts.admin')
@section('main-content')

    <div class="card">
        <div class="card-header">
            Staff Info
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">First Name</label>
                        <input  readonly="readonly"type="text" class="form-control"  placeholder="{{$staff->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input readonly="readonly" type="text" class="form-control"  placeholder="{{$staff->last_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input readonly="readonly" type="email" class="form-control" id="inputEmail4" placeholder="{{$staff->email}}">
                    </div>

                </div>
                <a href="/staff"  type="submit" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div>

@endsection
