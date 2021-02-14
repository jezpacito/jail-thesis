@extends('layouts.admin')

@section('main-content')

    <div class="card">
        <h5 class="card-header">Jail Guard Registration Form</h5>
        <div class="card-body">
            <form action="{{route('guard.store')}}" method="Post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">First Name</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="First Name" name="firstname" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Last Name</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name" name="lastname" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Middle Name</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Middle Name" name="middlename" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Contact No.</label>
                        <input type="number" class="form-control" id="inputAddress" placeholder="Contact no." name="contact_no" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Email (optional)</label>
                        <input type="email" class="form-control" id="inputAddress" placeholder="Email" name="email" required>
                    </div>

                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="address" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
