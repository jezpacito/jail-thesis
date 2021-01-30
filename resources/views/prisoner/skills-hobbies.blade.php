
<div class="input-group control-group1 after-addMore">
        <input type="text" class="form-control" id="validationCustom03" placeholder="Skills/Hobbies" name="skills[]" required>
    <div class="input-group-btn">
        <button class="btn btn-success addMore" class="form-control"style="margin-left: 10px" type="button">+</button>
    </div>
</div>
<div class="copy1 hide">
    <div class="control-group1 input-group" style="margin-top:10px">
            <input type="text" class="form-control" id="validationCustom03" placeholder="Skills/Hobbies" name="skills[]" required>
        <div class="input-group-btn" >
            <button class="btn btn-danger removed"  style="margin-left: 10px" type="button">X</button>
        </div>
    </div>
</div>
<hr>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".addMore").click(function(){
            var html = $(".copy1").html();
            $(".after-addMore").after(html);
        });
        $("body").on("click",".removed",function(){
            $(this).parents(".control-group1").remove();
        });
    });
</script>
