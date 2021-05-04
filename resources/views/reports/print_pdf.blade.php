<!DOCTYPE html>
<html>
<title>Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
    {{-- <h2>List of Prisoners for this Month of {{$month_name}}</h2> --}}
{{--    <p>The w3-striped class adds zebra-stripes to a table:</p>--}}

    <table class="w3-table w3-striped">
        <tr>
            <th>Guest Name</th>
            <th>Booking Date</th>
            <th>Booking Type</th>
            <th>Number of Person</th>
            <th>Cottage Name</th>
            {{-- <th>Cottage Type</th> --}}
        </tr>
        @forelse($bookings as $booking)

        <tr>
                <td>{{ $booking->guest->name }} {{ $booking->guest->last_name }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->time_type }}</td>
                <td>{{ $booking->number_persion }}</td>
                <td>{{ $booking->cottage->name}}</td>
                {{-- <td>{{ $booking->cottage->category->cottage_type}}</td> --}}
        </tr>
            @empty
          <h2> NO RECORD</h2>
                @endforelse

    </table>
</div>

</body>
</html>
