@extends('layouts.scan-form')
@section('main-content')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <form class="contact-form" method="post">
        @csrf
            
            <div class="card text-center" >

                <div class="card-body">
                    <lable> TAP YOU RFID HERE</lable>
                    <input type="text" onfocus="this.value=''" class="form-control" name="card_id" id="my-input"><br>
                </div>
            </div>


    </form>
    <div class="form-status-holder"></div>

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

                    var status= 'saving';
                   var th= $('.form-status-holder').html(status);

                   window.onerror = function () {
                       alert("rfid card does not exist!");
                   }

                },
                success: function(data) {
                    var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
                    // Now show them we saved and when we did

                    //this will clear input after sending data to server
                    $('input[type="text"],textarea').val('');

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
