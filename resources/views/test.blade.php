<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
{{--<style>--}}
{{--    .form-box{--}}
{{--        border:1px solid #c1c1c1;--}}
{{--        color:#5cb55c;--}}
{{--    }--}}
{{--</style>--}}

<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12 form-box">
            <h1 class="text-center">Registration Form</h1> <hr>
            <form class="form-horizontal" action="/test-post"  method="POST" role="form">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="firstname">First Name:</label>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="text" class="form-control" id="firstname" placeholder="Enter First Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="lastname">Last Name:</label>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="email">Email:</label>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3" for="ContactNo">Contact No.</label>
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <div class="input-group control-group after-add-more">
                            <input type="text" name="addmore[]" id="ContactNo" class="form-control" placeholder="Enter Mobile No.">
                            <div class="input-group-btn">
                                <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="text" name="addmore[]" class="form-control" placeholder="Enter Other Mobile No.">
                        <div class="input-group-btn">
                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 text-center">
                        <button type="submit" class="btn btn-success btn-block submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
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
</html>
