@extends('layouts.admin')

@section('content')
    <div id="chart" style="height: 250px;"></div>
    <button id="button">OK</button>
@endsection

@section('scripts')
    <script>
        $("#button").click(function(){
            $.get("interesesBanco", function(data, status){
                datos = data;
                console.log((data));
                alert("Data: " + data + "\nStatus: " + status);

                new Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'chart',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: data,
                    // The name of the data record attribute that contains x-values.
                    xkey: 'fecha',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['monto'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Value']
                });
            });
            console.log((datos));

        });
    </script>

@endsection