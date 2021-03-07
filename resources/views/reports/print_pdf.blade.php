<!DOCTYPE html>
<html>
<title>Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
    <h2>List of Prisoners for this Month of {{$month_name}}</h2>
{{--    <p>The w3-striped class adds zebra-stripes to a table:</p>--}}

    <table class="w3-table w3-striped">
        <tr>
            <th>Prisoner's Name</th>
            <th>Status</th>
            <th>Interviewer</th>
        </tr>
        @forelse($datas as $data)

        <tr>
                <td>{{$data->prisoner->firstname}} {{$data->prisoner->alias}} {{$data->prisoner->lastname}}</td>
                <td>{{$data->prisoner->status}}</td>
                <td>{{$data->prisoner->interviewer}}</td>
        </tr>
            @empty
          <h2> NO RECORD</h2>
                @endforelse

    </table>
</div>

</body>
</html>
