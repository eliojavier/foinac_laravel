@extends('layouts.admin')

@section('content')
    <div id="stats-container" style="height: 250px;"></div>
    <button id="button">OK</button>
@endsection
@section('scripts')
    {{--<script>--}}
        {{--var data = '{{ $bank_interests }}';--}}
        {{--console.log(data);--}}
        {{--new Morris.Line({--}}
            {{--// ID of the element in which to draw the chart.--}}
            {{--element: 'stats-container',--}}
            {{--data: data,--}}
            {{--xkey: 'id',--}}
            {{--ykeys: ['monto'],--}}
            {{--labels: ['Monto']--}}
        {{--});--}}
    {{--</script>--}}

    <script>
        $("#button").click(function(){
            // Create a function that will handle AJAX requests
            function requestData(chart) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "interesesbanco" // This is the URL to the API
                })
                        .done(function (data) {console.log(data);
                            // When the response to the AJAX request comes back render the chart with new data
                            chart.setData(data);
                        })
                        .fail(function () {
                            // If there is no communication between the server, show an error
                            alert("error occured");
                        });
            }

            var chart = Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'stats-container',
                data: [0, 0], // Set initial data (ideally you would provide an array of default data)
                xkey: 'fecha', // Set the key for X-axis
                ykeys: ['monto'], // Set the key for Y-axis
                labels: ['Intereses'] // Set the label when bar is rolled over
            });

            // Request initial data for the past 7 days:
            requestData(chart);
        });
    </script>
@endsection


