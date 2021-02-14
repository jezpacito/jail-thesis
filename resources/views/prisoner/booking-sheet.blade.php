<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="validationCustom01">Reference No.</label>
        <input type="text" class="form-control" id="validationCustom01" placeholder="Reference No"  name="reference_no" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationCustom02">Agency</label>
        <input type="text" class="form-control" id="validationCustom02" value="PGO-Jail Division" name="agency" readonly>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="validationCustom02">Agency Address</label>
        <input type="text" class="form-control" id="validationCustom02" value="Baluntay, Alabel Sarangani Province" name="agency_address" readonly>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <label class="form-control-label mr-3" for="input-country">Category of Prisoner</label>
    <div class="col-md-12 mb-3">
        <select name="category_prisoner"  class="form-control" id="cars">
            <option  value="provincial">Provincial</option>
            <option  value="insular">Insular</option>
            <option  value="under_inves">Under Investigation</option>
            <option  value="safekeeping">Safekeeping</option>
            <option  value="municipal">Municipal</option>
            <option  value="others">Others</option>

        </select>
        <div class="invalid-feedback">
            Please provide a valid state.
        </div>
    </div>
</div>
