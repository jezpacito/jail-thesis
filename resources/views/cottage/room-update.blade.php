@extends('layouts.admin')
@section('main-content')

    <div class="card">
        <div class="card-header">
            <h3>   Room Info</h3>
        </div>
            <div class="m-2">
            </div>
        <div class="card-body">
            <form action="{{ url("rooms/$room->id}")}}" method="Post">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Room Name</label>
                        <input  type="text" class="form-control"  name="name" value="{{$room->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input  type="text" class="form-control" name="price" value="{{$room->price}}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlTextarea1">Room description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ $room->description}}</textarea>
                      </div>

                </div>
                <a href="/rooms" class="btn btn-primary">Back</a>
                <button class="btn btn-secondary m-lg-2" type="submit">Update</button>
            </form>
        </div>
    </div>

@endsection
