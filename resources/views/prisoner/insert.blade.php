@extends('layouts.admin')
@section('main-content')

    <style>
            /** {*/
            /*    box-sizing: border-box;*/
            /*}*/

        /*body {*/
        /*    background-color: #f1f1f1;*/
        /*}*/

        #regForm {
            /*background-color: #ffffff;*/
            /*margin: 40px auto;*/
            font-family: Raleway;
            padding: 10px;
            /*width: 70%;*/
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }
    </style>
    <form id="regForm" action="/post-test" method="post">
        @csrf
{{--        <div class="tab">--}}
{{--            <h1>Prisoner's Personal Profile</h1>--}}

{{--            <div class="form-row">--}}
{{--                <div class="col">--}}
{{--                    <label>First Name</label>--}}
{{--                    <p><input placeholder="First Name" oninput="this.className = ''" name="firstname"></p>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <label>Last Name</label>--}}
{{--                    <p><input placeholder="Last Name" oninput="this.className = ''" name="lastname"></p>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <label>Middle Name</label>--}}

{{--                    <p><input placeholder="Middle Name" oninput="this.className = ''" name="middlename"></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-row">--}}
{{--                <div class="col">--}}
{{--                    <label>Age</label>--}}
{{--                    <p><input placeholder="Age" oninput="this.className = ''" name="age"></p>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <label>Occupation</label>--}}
{{--                    <p><input placeholder="Occupation" oninput="this.className = ''" name="occupation"></p>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <label>Civil Status</label>--}}
{{--                    <p><input placeholder="Civil Status" oninput="this.className = ''" name="status"></p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <h1>Prison Record</h1>
            <div class="form-row">
                <div class="col">
                    <p><input placeholder="Nationality" oninput="this.className = ''" name="nationality"></p>
                </div>
                <div class="col">
                    <p><input placeholder="Crime" oninput="this.className = ''" name="crime"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <p><input placeholder="Criminal Case No." oninput="this.className = ''" name="case_no"></p>
                </div>
                <div class="col">
                    <p><input placeholder="Committing Authority" oninput="this.className = ''" name="authority"></p>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <p><input placeholder="Trial Court" oninput="this.className = ''" name="trial_court"></p>
                </div>
                <div class="col">
                    <p><input placeholder="Sentence by" oninput="this.className = ''" name="sentence_by"></p>
                </div>
            </div>

            <div>
                <div style="display: flex;justify-content: center">
                    <label> Minimum Sentence</label>
                </div>
                <div class="form-row">
                    <div class="col">
                        <p><input placeholder="Days" oninput="this.className = ''" name="min_days" type="number" ></p>
                    </div>
                    <div class="col">
                        <p><input placeholder="Months" oninput="this.className = ''" name="min_month" type="number"></p>
                    </div>
                    <div class="col">
                        <p><input placeholder="Years" oninput="this.className = ''" name="min_years" type="number"></p>
                    </div>
                </div>
            </div>
            <div>
                <div style="display: flex;justify-content: center">
                    <label> Maximum Sentence</label>
                </div>
                <div class="form-row">
                    <div class="col">
                        <p><input placeholder="Days" oninput="this.className = ''" name="max_days" type="number" ></p>
                    </div>
                    <div class="col">
                        <p><input placeholder="Months" oninput="this.className = ''" name="max_month" type="number"></p>
                    </div>
                    <div class="col">
                        <p><input placeholder="Years" oninput="this.className = ''" name="max_years" type="number"></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab">
            <p><input placeholder="Appeal to the Court of Appeal" oninput="this.className = ''" name="appeal"></p>
            <p><input placeholder="Commencing" oninput="this.className = ''" name="commencing"></p>

            <div>
                <div style="display: flex;justify-content: center">
                    <label> Expiration Sentence with G.C.T.A</label>
                </div>
                <div class="form-row">
                    <div class="col">
                        <p><input placeholder="Minimum" oninput="this.className = ''" name="expiration_sentence_min" type="number" ></p>
                    </div>
                    <div class="col">
                        <p><input placeholder="Maximum" oninput="this.className = ''" name="expiration_sentence_max" type="number"></p>
                    </div>
                </div>
            </div>
            <div>
                <label> Time Served with Good Conduct Time Allowance</label>

                <p><input oninput="this.className = ''" name="time_serv_good" type="date"></p>
                <div class="form-row">
                    <div class="col">
                        <p><input placeholder="Number Of Previous Conviction" oninput="this.className = ''" name="no_previous_conviction" type="number" ></p>
                    </div>
                    <div class="col">
                        <p><input placeholder="For What Crime .." oninput="this.className = ''" name="what_crime"></p>
                    </div>
                </div>
            </div>


        </div>
        <div class="tab">
            <div class="form-row">
                <div class="col">
                    <p><input placeholder="Where Confined" oninput="this.className = ''" name="where_confined" ></p>
                </div>
                <div class="col">
                    <p><input placeholder="For What Crime .." oninput="this.className = ''" name="what_crime"></p>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control"  oninput="this.className = ''" placeholder="REMARKS" name="remarks" rows="3"></textarea>
            </div>
        </div>
        {{--    <div class="tab">--}}
        {{--        <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>--}}
        {{--        <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>--}}
        {{--    </div>--}}

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".add-more").click(function(){
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });
            $("body").on("click",".remove",function(){
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endsection
