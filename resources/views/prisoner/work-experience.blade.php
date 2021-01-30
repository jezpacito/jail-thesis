
<div class="input-group control-group2 after-addMore1">
    <div class="col-md-3 mb-3">
        <label>Employeer Name</label>
        <input type="text" class="form-control" id="validationCustom05" placeholder="Name" required name="employeer_name[]">
    </div>
    <div class="col-md-3 mb-3">
        <label>Occupation</label>
        <input type="text" class="form-control" id="validationCustom05" placeholder="Occupation" required name="occupation_work[]">
    </div>
    <div class="col-md-3 mb-3">
        <label> Date Employed</label>
        <input type="date" class="form-control" id="validationCustom05" placeholder="Contact Number" required name="date_employed[]">
    </div>

    <div class="input-group-btn">
        <button class="btn btn-success addMore1" style="margin-top: 30px"  class="form-control" type="button">+</button>
    </div>
</div>
<div class="copy2 hide">
    <div class="control-group input-group" style="margin-top:10px">
        <div class="col-md-3 mb-3">
            <label>Employeer Name</label>
            <input type="text" class="form-control" id="validationCustom05" placeholder="Name" required name="employeer_name[]">
        </div>
        <div class="col-md-3 mb-3">
            <label>Occupation</label>
            <input type="text" class="form-control" id="validationCustom05" placeholder="Occupation" required name="occupation_work[]">
        </div>
        <div class="col-md-3 mb-3">
            <label> Date Employed</label>
            <input type="date" class="form-control" id="validationCustom05" placeholder="Contact Number" required name="date_employed[]">
        </div>

        <div class="input-group-btn" >
            <button class="btn btn-danger remove" style="margin-top: 30px" type="button">X</button>
        </div>
    </div>
</div>
<hr>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".addMore1").click(function(){
            var html = $(".copy2").html();
            $(".after-addMore1").after(html);
        });
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group2").remove();
        });
    });
</script>
