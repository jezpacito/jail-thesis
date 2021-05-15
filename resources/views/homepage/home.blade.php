<!DOCTYPE html>
<html>
<title>Reservation System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>

<!-- Navbar (sit on top) -->
@include('sweetalert::alert')
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
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>IML ECO PARK</h1>
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
  {{-- <div class="w3-display-topleft w3-black w3-padding">{{ $cottage->category->cottage_type }} {{ $cottage->id }}</div> --}}


  <div class="w3-row-padding text-center">
      <h1>Cottages</h1>
    @foreach ($cottages as $cottage)

    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <img src="/img/cottage.jpg" alt="House" style="width:99%">
        {{-- <h3>{{ $cottage->id }}</h3> --}}
        <h3>{{ $cottage->name }}</h3>
        <p>{{ $cottage->description }}</p>
        @auth
        <p>Night Rate: {{ $cottage->nightRate }}
          |  @if($cottage->isNightAvailable ==true)

            <form method="Get" action="/checkout/{{ $cottage->id }}" >
              {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
              <input name="rate" value="night" type="hidden" value="secret">
              <button class="btn-primary btn-sm" type="submit"> Book Now for 850 </button>
            </form>

          @else
          <b> not available</b>
          @endif
        </p>
          <p>Day Rate: {{ $cottage->dayRate }} @if($cottage->isDayAvailable ==true)

            <form method="Get" action="/checkout/{{ $cottage->id }}" >
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <input name="rate" value="day" type="hidden" value="secret">
            <button class="btn-primary btn-sm" type="submit"> Book Now for 650</button>
          </form>
        @else
         <b> not available</b>
        @endif
        </p>

         @endauth

         @if (!Auth::check())
          <a class="btn-primary btn-sm btn-block w3-display-container" href="/login" role="button"><h5>Book Now</h5></a>
          @endif
      </div>
    </div>
    @endforeach

  </div>
  </div>



<div class="w3-row-padding text-center">
    <h1>Rooms</h1>
    @foreach ($rooms as $room)
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black ">{{ $room->name }}</div>
             <img src="/img/room1.jpg" alt="House" style="width:100%">
        </div>
      <div>
        <form method="Get" action="/checkout/{{ $room->id }}" >
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            <input name="room" value="room_booking" type="hidden" value="secret">
            <input name="price" value="{{ $room->price }}" type="hidden" value="secret">
            <button class="btn-primary btn-sm" type="submit"> Book Now </button>
          </form>
        <p> Room Price: {{ $room->price }}</p>
      </div>
    </div>
    @endforeach
</div>


  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 text-center"><strong>About us</strong></h3>

    <p>
    <p class="text-center">The Beautiful IML ECO PARK Tourist Destination</p>
<p class="text-center">You want a place where you can relax?There is a solution.The place of Maasim is known as  the most beautiful place, so here is the IML Eco Park to fulfill your dreams.
</p>
<p class="text-center">
It is evident that the Sarangani Province is taking their tourism industry seriously. It is the newest resort and recreational area called the IML Eco Park found at the peak of brgy.Lumasal in Maasim, Sarangani. This former hacienda is now open to the public and groomed to be the next important tourist attraction of Sarangani.

</p>
<p class="text-center">
IML’ stands for Irineo Miguel Lopez. The current owner is Mr. Jojo Lopez, former Mayor of Maasim, Sarangani and his beloved wife no other than Haydee Lopez. Jojo Lopez, ever the visionary town leader, can see where the municipality is heading. He was an excellent leader of his constituents by simply being a peace advocate. The IML Eco Park is barely months old and they’re adding more activities that aims to attract more tourists to visit the place. It is perfect for family and barkada trips. A 60 kilometer drives from General Santos City. This place is overlooking of Sarangani Bay and coconut plantation, so you may enjoy the fresh air and the nice view that will make you stress-free from the long and exhausting travel.

</p>



    </p>
    <p class="text-center">

<br>Contact</br>
<br>Lumsal Sarangani Province,</br>
<br>Bayan ng Maasim,</br>
<br>Sarangani,Philippines,</br>
<br>+639157375868</br>
    </P>

    <p>

    </p>
  </div>





<!-- Image of location/map -->
<div class="w3-container">
  <img src="/w3images/map.jpg" class="w3-image" style="width:100%">
  <div class="mapouter"><div class="gmap_canvas">
    {{-- <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> --}}
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.743570950557!2d124.84105691444827!3d5.891605131821436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f7b5f518bf307d%3A0xd60bf84bc9a26774!2sIML%20Ecopark!5e0!3m2!1sfil!2sph!4v1619191608493!5m2!1sfil!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    {{-- <a href="https://www.online-timer.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">adding google maps to wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> --}}

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
