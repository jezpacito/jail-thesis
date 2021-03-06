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

                                <div class="card-body">
                                    <p><b>Height:</b> {{$prisoner->physicalDetails->height}}
                                    <p><b>Weight:</b> {{$prisoner->physicalDetails->weight}}</p>
                                    <p><b>Hair:</b> {{$prisoner->physicalDetails->hair}}</p>
                                    <p><b>Complexion:</b> {{$prisoner->physicalDetails->complexion}}</p>
                                    <p><b>Bertillon Marks:</b> {{$prisoner->physicalDetails->bertillon_marks}}</p>

                                </div>
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
                                <form action="{{url('prisoner').'/'.$prisoner->id.'/jailBookingOffense'}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Reference No.</small>
                                                <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" readonly name="reference_no" value="{{$prisoner->booking->reference_no}} ">
                                            </div>
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Agency</small>
                                                <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="agency" readonly value="{{$prisoner->booking->agency}}">
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Crime Committed</small>
                                                <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="crime_committed" value="{{$prisoner->offenseData->crime_committed}}">
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Criminal Case No.</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0" type="text" name="criminal_case_no" value="{{$prisoner->offenseData->criminal_case_no}}">
                                        </div>

                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Trial Court</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0"  readonly type="text" name="trial_court" value="{{$prisoner->offenseData->trial_court}}">
                                        </div>

                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Sentence Term</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0"  readonly type="text" name="sentence_term" value="{{$prisoner->offenseData->sentence_term}}">
                                        </div>
                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Agency Address</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0"  readonly  type="text" name="agency_address" value="{{$prisoner->booking->agency_address}}">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                 <small id="emailHelp" class="form-text text-muted">Date of Imprisonment</small>
                                                  <input  class="m-lg-3" type="date" name="date_imprisonment"   value="{{$prisoner->offenseData->date_imprisonment}}">
                                            </div>

                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Date Sentence Commence</small>
                                                <input  class="m-lg-3" type="date" name="date_sentence_commence"   value="{{$prisoner->offenseData->date_sentence_commence}}">
                                            </div>

                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Date Release</small>
                                                <input  class="m-lg-3" type="date" name="date_release"   value="{{$prisoner->offenseData->date_release}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Place of Imprisonment</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0"  readonly type="text" name="sentence_term" value="{{$prisoner->offenseData->place_imprisonment}}">
                                        </div>

                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Previous Criminal Record</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0"   type="text" name="prev_crim_record" value="{{$prisoner->offenseData->prev_crim_record}}">
                                        </div>

                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Sentence by</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0"   type="text" name="sentence_by" value="{{$prisoner->offenseData->sentence_by}}">
                                        </div>

                                        <div class="form-group">
                                            <small id="emailHelp" class="form-text text-muted">Sentence</small>
                                            <input class="form-control form-control-sm border-top-0 border-left-0 border-right-0"   type="text" name="sentence" value="{{$prisoner->offenseData->sentence}}">
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <small id="emailHelp" class="form-text text-muted">Prisoner Category</small>
                                                <select name="category_prisoner"  class="form-control form-control-sm border-top-0 border-left-0 border-right-0" id="cars">
                                                    @if($prisoner->booking->category_prisoner =='provincial')
                                                    <option  value="provincial">Provincial</option>
                                                    <option  value="insular">Insular</option>
                                                    <option  value="under_investigation">Under Investigation</option>
                                                    <option  value="safekeeping">Safekeeping</option>
                                                    <option  value="municipal">Municipal</option>
                                                    <option  value="others">Others</option>
                                                    @elseif($prisoner->booking->category_prisoner =='insular')
                                                        <option  value="insular">Insular</option>
                                                        <option  value="provincial">Provincial</option>
                                                        <option  value="under_investigation">Under Investigation</option>
                                                        <option  value="safekeeping">Safekeeping</option>
                                                        <option  value="municipal">Municipal</option>
                                                        <option  value="others">Others</option>
                                                    @elseif($prisoner->booking->category_prisoner =='under_investigation')
                                                        <option  value="under_investigation">Under Investigation</option>
                                                        <option  value="insular">Insular</option>
                                                        <option  value="provincial">Provincial</option>
                                                        <option  value="safekeeping">Safekeeping</option>
                                                        <option  value="municipal">Municipal</option>
                                                        <option  value="others">Others</option>
                                                    @elseif($prisoner->booking->category_prisoner =='safekeeping')
                                                        <option  value="safekeeping">Safekeeping</option>
                                                        <option  value="under_investigation">Under Investigation</option>
                                                        <option  value="insular">Insular</option>
                                                        <option  value="provincial">Provincial</option>
                                                        <option  value="municipal">Municipal</option>
                                                        <option  value="others">Others</option>
                                                    @elseif($prisoner->booking->category_prisoner =='municipal')
                                                        <option  value="municipal">Municipal</option>
                                                        <option  value="safekeeping">Safekeeping</option>
                                                        <option  value="under_investigation">Under Investigation</option>
                                                        <option  value="insular">Insular</option>
                                                        <option  value="provincial">Provincial</option>
                                                        <option  value="others">Others</option>
                                                    @else($prisoner->booking->category_prisoner =='others')
                                                        <option  value="others">Others</option>
                                                        <option  value="municipal">Municipal</option>
                                                        <option  value="safekeeping">Safekeeping</option>
                                                        <option  value="under_investigation">Under Investigation</option>
                                                        <option  value="insular">Insular</option>
                                                        <option  value="provincial">Provincial</option>
                                                        @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-sm btn-secondary mt-2 ">Update</button>
                                    <a href="{{url('/prisoner').'/'.$prisoner->id}}" class="btn btn-primary btn-sm mt-2">
                                        Cancel
                                    </a>
                                </form>
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
