<!DOCTYPE html>
<html>
<title>Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
     <h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;
         IML ECO PARK REPORTS</h2>
{{--    <p>The w3-striped class adds zebra-stripes to a table:</p>--}}

    <table class="w3-table w3-striped">
        <tr>
            <th>Guest Name</th>
            <th>Booking Date</th>
            <th>Cottage Name</th>
             <th>Amount Paid</th>
        </tr>
        @forelse($histories as $history)
        <tr>
                <td>{{$history->guest->name}}</td>
                <td>{{ $history->date_booked }}</td>
                <td>{{ $history->room->name }}</td>
                  <td>1200</td>
                {{-- <td>{{ $booking->cottage->category->cottage_type}}</td> --}}
        </tr>
            @empty
          <h2> NO RECORD</h2>
                @endforelse

    </table>
</div>

</body>
</html>
