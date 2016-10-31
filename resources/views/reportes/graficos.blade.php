@extends('layouts.admin')

@section('content')
    <button id="g_interesesbanco">Intereses banco</button>
    <button id="g_interesesbanco">Accionistas</button>
    <a href="{{ url('reportes/accionistas') }}">Accionistas</a>
    <div id="stats-container" style="height: 250px;"></div>

@endsection

@section('scripts')
    <script>
        $("#g_interesesbanco").click(function(){
            // AJAX request
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