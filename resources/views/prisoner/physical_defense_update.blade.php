@extends('layouts.admin')

@section('main-content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Prison Information</h1>
                    </div>
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Prisoner Personal Data</h6>
                                        <a href="/prisoner/{{$prisoner->id}}/physical_details" style="margin-right:5px " >
                                            <span class="material-icons">edit</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <p><b>Prisoner's Name: </b>{{$prisoner->firstname}} {{$prisoner->middlename}} "{{$prisoner->alias}}" {{$prisoner->lastname}}</p>
                                    <p><b>Place of Birth:</b> {{$prisoner->place_of_birth}}</p>
                                    <p><b>Permanent Address:</b> {{$prisoner->permanent_address}}</p>
                                    <p><b>Previous Address:</b> {{$prisoner->previous_address}}</p>
                                    <p><b>Civil Status:</b> {{$prisoner->status}} | Age: {{$prisoner->age}} | Gender: {{$prisoner->gender}}</p>
                                    <p><b>Birthdate:</b> {{$prisoner->birthdate}}</p>
                                    <p><b>Nationality:</b> {{$prisoner->nationality}}</p>
                                    <p><b>Religion:</b> {{$prisoner->physicalDetails->religion}}</p>
                                    <p><b>Occupation:</b> {{$prisoner->occupation}}</p>
                                    <p><b>Nearest Kin:</b> {{$prisoner->physicalDetails->nearest_kin}}</p>
                                    <p><b>Nearest Kin Address:</b> {{$prisoner->physicalDetails->address_nearest_kin}}</p>
                                </div>
                            </div>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Physical Details</h6>
                                        <a href="#" style="margin-right:5px " >
                                            <span class="material-icons">edit</span>
                                        </a>
                                    </div>
                                </div>

                                <form action="{{url('/prisoner').'/'.$prisoner->id.'/'.'physicalDefense'}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Height</small>
                                                <input  class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="height"   value="{{$prisoner->physicalDetails->height}}">
                                            </div>
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Weight</small>
                                                <input  class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="weight"   value="{{$prisoner->physicalDetails->weight}}">
                                            </div>
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Hair</small>
                                                <input  class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="hair"   value="{{$prisoner->physicalDetails->hair}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Complexion</small>
                                                <input  class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="complexion"   value="{{$prisoner->physicalDetails->complexion}}">
                                            </div>
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Bertillon Marks</small>
                                                <input  class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="bertillon_marks"   value="{{$prisoner->physicalDetails->bertillon_marks}}">
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-secondary mt-2 " type="submit">Update</button>
                                        <a href="{{url('/prisoner').'/'.$prisoner->id}}" class="btn btn-primary btn-sm mt-2">
                                            Cancel
                                        </a>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <!-- Dropdown Card Example -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <div style="display: flex; justify-content: space-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Jail Booking Sheet & Offense Data</h6>
                                        <a href="/prisoner/{{$prisoner->id}}/jailBookingOffense" style="margin-right:5px " >
                                            <span class="material-icons">edit</span>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <p><b>Reference No.</b> {{$prisoner->booking->reference_no}}</p>
                                    <p><b>Agency:</b> {{$prisoner->booking->agency}}</p>
                                    <p><b>Agency Address:</b> {{$prisoner->booking->agency_address}}</p>
                                    <p><b>Prisoner Category:</b> {{$prisoner->booking->category_prisoner}}</p>
                                    <hr>
                                    <p><b>Crime Committed:</b> {{$prisoner->offenseData->crime_committed}}</p>
                                    <p><b>Criminal Case No.</b>{{$prisoner->offenseData->criminal_case_no}}</p>
                                    <p><b>Trial Court:</b> {{$prisoner->offenseData->trial_court}}</p>
                                    <p><b>Sentence Term:</b> {{$prisoner->offenseData->sentence_term}}</p>
                                    <p><b>Date of Imprisonment:</b> {{$prisoner->offenseData->date_imprisonment}}</p>
                                    <p><b>Place of Imprisonment:</b> {{$prisoner->offenseData->place_imprisonment}}</p>
                                    <p><b>Date Sentence Commence:</b> {{$prisoner->offenseData->date_sentence_commence}}</p>
                                    <p><b>Previous Criminal Record:</b> {{$prisoner->offenseData->prev_crim_record}}</p>
                                    <p><b>Date Release:</b>{{$prisoner->offenseData->date_release}}</p>
                                    <p><b>Sentence by:</b> {{$prisoner->offenseData->sentence_by}}</p>
                                    <p><b>Sentence:</b> {{$prisoner->offenseData->sentence}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

@endsection
