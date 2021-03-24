@extends('layouts.admin')
@section('main-content')
    <h1> Prisoner's Personal Data</h1>
    <form class="needs-validation" novalidate action="{{route('prisoner.store')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name"  name="firstname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Middle name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Middle name" name="middlename" >
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Middle name" name="lastname" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom03">Alias</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Alias" name="alias" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom03">Place of Birth</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Place of Birth" name="place_of_birth" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="validationCustom03">Permanent Address</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Permanent Address" name="permanent_address" >
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Previous Address</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Previous Address" name="previous_address" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationCustom04">Civil Status</label>
{{--                <input type="text" class="form-control" id="validationCustom04" placeholder="Civil Status" required name="status">--}}
                <select name="status"  class="form-control" id="cars">
                    <option  value="single">Single</option>
                    <option  value="married">Married</option>
                    <option  value="divorce">Divorce</option>
                    <option value="separated">Separated</option>
                </select>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
{{--            <div class="col-md-3 mb-3">--}}
{{--                <label for="validationCustom05">Age</label>--}}
{{--                <input type="number" class="form-control" id="validationCustom05" placeholder="Age" required name="age">--}}
{{--                <div class="invalid-feedback">--}}
{{--                    Please provide a valid zip.--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-3 mb-3">
                <label for="validationCustom03">Gender</label>
                <select name="gender"  class="form-control" id="cars">
                    <option  value="female">Female</option>
                    <option  value="male">Male</option>
                </select>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label>Birthdate</label>
                <input type="date" class="form-control" id="validationCustom05" required name="birthdate">

            </div>

            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Occupation</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Occupation" name="occupation" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">Nationality</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="Nationality" name="nationality" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationCustom03">RFID Number</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="RFID Number" name="rfid_uuid" required>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
         </div>
            <hr>
            <h2> Physical/Personal Details</h2>
        @include('prisoner.physical-details')

         <hr>
         <p>Contact Person to be informed in case of sickness or death:</p>
           @include('prisoner.family')
         <div class="col-md-6 mb-3">
            <label>Working Experience (Before Detention)</label>
         </div>

            @include('prisoner.work-experience')

            <div class="col-md-6 mb-3">
            <label>Hobbies and Skills</label>
         </div>
         <div class="col-md-6 mb-3 text-center">
            @include('prisoner.skills-hobbies')
         </div>
          <div class="col-md-6 mb-3">
            <label for="validationCustom03">Interviewer Name</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Interviewer Name" name="interviewer" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <label for="validationCustom03">Designation</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Designation" name="designation" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
         </div>
         <hr>
          <h2>Jail Booking Sheet</h2>
         @include('prisoner.booking-sheet')
        <hr>
        <h2>Offense Data</h2>
        @include('prisoner.offense-data')
         <button class="btn btn-primary" style="margin-top: 30px" type="submit">Submit form</button>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
