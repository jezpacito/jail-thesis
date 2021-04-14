<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
        Add Finger Print
    </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Finger Print</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('add.fingerprint') }}" method="Post"> 
                @csrf
                <div class="form-row">
                    
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Finger Print ID</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="enter number from 1-27 only" name="fingerprint_id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>