<!DOCTYPE html>
<html>
<title>Reservation System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <img src="" class="w3-bar-item w3-button"><b>Reservation System</b>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
        @if (Auth::check()) 
          <a class="w3-bar-item w3-button" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
     @else

      <a href="/login" class="w3-bar-item w3-button">Login</a>
      <a href="/registration/guest" class="w3-bar-item w3-button">Registration</a>
      @endif
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="{{ url('/img/banner.jpg') }}" alt="Architecture" width="1500" height="100">
  <div class="w3-display-middle w3-margin-top w3-center">
      </h1>
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>IML Eco Park </h1>
      <div class=" w3-text-white w3-black w3-opacity-min">
        Maasim Sarangani Province
      </div>  
  </div>
</header>

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Projects</h3>
  </div>

  <div class="w3-row-padding">
   @forelse ( $cottages as  $cottage )  
   <div class="w3-col l3 m6 w3-margin-bottom">
    <div class="w3-display-container">
      <div class="w3-display-topleft w3-black w3-padding">{{ $cottage->category->cottage_type }}</div>
      <img src="{{ url('/img/cottage.jpg') }}" alt="House" style="width:100%">
      <!-- Button trigger modal -->
      @if(Illuminate\Support\Facades\Auth::check())
      <button type="button" class="btn w3-button w3-light-grey w3-block" data-toggle="modal" data-target="#exampleModal">
        <b> Book Now</b>
      </button>
      @else
      <a class="btn w3-button w3-light-grey w3-block" href="/login" role="button">Book Now</a>

      @endif
     

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('booking') }}">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Total Person</label>
            <input class="form-control" type="number" >
          </div>
          <div class="form-group"> 
            <label for="exampleFormControlTextarea1">Booking Date</label>
            <input type="datetime-local" class="form-control" id="birthdaytime" name="birthdaytime">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
    </div>
  </div>     
    
   @empty
     No Cottage Available
   @endforelse
  
  </div>

  

  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>

 

  
  
<!-- Image of location/map -->
<div class="w3-container">
  <img src="/w3images/map.jpg" class="w3-image" style="width:100%">
  <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://www.google.com/maps/place/IML+Ecopark/@5.8915998,124.8410623,17z/data=!3m1!4b1!4m5!3m4!1s0x32f7b5f518bf307d:0xd60bf84bc9a26774!8m2!3d5.8915998!4d124.8432456?hl=en-US" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.online-timer.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">adding google maps to wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
</div>

<!-- End page content -->
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
