@extends('layouts.admin')
@section('main-content')

    <div class="card">
        <div class="card-header">
            <h3>   Room Info</h3>
        </div>
            <div class="m-2">
            </div>
        <div class="card-body">
            <form action={{ url("cottage/$cottage->id")}} method="Post">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Cottage Name</label>
                        <input  type="text" class="form-control"  name="name" value="{{$cottage->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Cottage Night Rate</label>
                        <input  type="text" class="form-control" name="nightRate" value="{{$cottage->nightRate}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Cottage Day Rate</label>
                        <input  type="text" class="form-control" name="dayRate" value="{{$cottage->dayRate}}">
                    </div>


                </div>
                <a href="/cottage" class="btn btn-primary">Back</a>
                <button class="btn btn-secondary m-lg-2" type="submit">Update</button>
            </form>
        </div>
    </div>

@endsection
