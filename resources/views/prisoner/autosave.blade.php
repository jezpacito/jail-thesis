@extends('layouts.admin')
@section('main-content')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <form class="contact-form" method="post">
        @csrf
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Assign RFID
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Register RFID</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                                <div class="card-body">
                                    <input type="text" onfocus="this.value=''" class="form-control" name="card_id" id="my-input"><br>
                                </div>

                        </div>

                    </div>
                </div>
            </div>

    </form>
    <div class="form-status-holder"></div>
<script>
    setInterval(
        function() {
            document.getElementById("my-input").value = "";
        }, 600);
</script>
    <script>
        var timeoutId;
        $('form input, form textarea').on('input propertychange change', function() {
            console.log('Textarea Change');

            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
                // Runs 1 second (1000 ms) after the last change
                saveToDB();
            }, 1000);
        });

        function saveToDB()
        {
            console.log('Saving to the db');
            form = $('.contact-form');
            $.ajax({
                url: "/contact-form",
                type: "POST",
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function(xhr) {
                    // Let them know we are saving
                    $('.form-status-holder').html('Saving...');
                },
                success: function(data) {
                    var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
                    // Now show them we saved and when we did
                    var d = new Date();
                    $('.form-status-holder').html('Saved! Last: ' + d.toLocaleTimeString());
                },
            });
        }

        // This is just so we don't go anywhere
        // and still save if you submit the form
        $('.contact-form').submit(function(e) {
            saveToDB();
            e.preventDefault();
        });
    </script>
    @endsection
