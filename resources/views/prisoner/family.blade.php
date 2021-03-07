
        <div class="input-group control-group after-add-more">
            <div class="col-md-3 mb-3">
                <label>Name</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Name"  name="name[]">
            </div>
            <div class="col-md-3 mb-3">
                <label>Address</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Address"  name="address[]">
            </div>
            <div class="col-md-3 mb-3">
                <label>Contact Number</label>
                <input type="number" class="form-control" id="validationCustom05" placeholder="Contact Number"
                       name="contact[]">
            </div>
{{--            <input type="text" class="form-control" id="validationCustom05" placeholder="Relationship" required name="relationship[]">--}}
            <div class="col-md-2 mb-3">
                <label>Relationship</label>
                <select name="relationship[]"  style="margin-right: 5px" class="form-control" id="cars">
                    <option >none</option>
                    <option  value="spouse">Spouse</option>
                    <option  value="children">Children</option>
                    <option  value="parent">Parents</option>
                    <option  value="brother/sister">Brother/Sisters</option>
                    <option value="friend">Nearest Friends</option>
                    <option value="others">Other Persons</option>
                </select>
            </div>

            <div class="input-group-btn">
                <button class="btn btn-success add-more" style="margin-top: 30px"  class="form-control" type="button">+</button>
            </div>
        </div>
    <div class="copy hide">
        <div class="control-group input-group" style="margin-top:10px">
            <div class="col-md-3 mb-3">
                <label>Name</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Name"  name="name[]">
            </div>
            <div class="col-md-3 mb-3">
                <label>Address</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Address"  name="address[]">
            </div>
            <div class="col-md-3 mb-3">
                <label>Contact Number</label>
                <input type="number" class="form-control" id="validationCustom05" placeholder="Contact Number"  name="contact[]">
            </div>
            {{--            <input type="text" class="form-control" id="validationCustom05" placeholder="Relationship" required name="relationship[]">--}}
            <div class="col-md-2 mb-3">
                <label>Relationship</label>
                <select name="relationship[]"  style="margin-right: 5px" class="form-control" id="cars">
                    <option >none</option>
                    <option  value="spouse">Spouse</option>
                    <option  value="children">Children</option>
                    <option  value="parent">Parents</option>
                    <option  value="brother/sister">Brother/Sisters</option>
                    <option value="friend">Nearest Friends</option>
                    <option value="others">Other Persons</option>
                </select>
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
        $(".add-more").click(function(){
            var html = $(".copy").html();
            $(".after-add-more").after(html);
        });
        $("body").on("click",".remove",function(){
            $(this).parents(".control-group").remove();
        });
    });
</script>
