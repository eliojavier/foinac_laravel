@extends('layouts.admin')

@section('content')
    <div id="chart" style="height: 250px;"></div>
    <button id="button">OK</button>
@endsection

@section('scripts')
    <script>
        $("#button").click(function(){
            $.get("interesesBanco", function(data, status){
                console.log((data));
                alert("Data: " + data + "\nStatus: " + status);
            });
            console.log((data));
//            new Morris.Line({
//                // ID of the element in which to draw the chart.
//                element: 'chart',
//                // Chart data records -- each entry in this array corresponds to a point on
//                // the chart.
//                data: data,
//                // The name of the data record attribute that contains x-values.
//                xkey: 'fecha',
//                // A list of names of data record attributes that contain y-values.
//                ykeys: ['monto'],
//                // Labels for the ykeys -- will be displayed when you hover over the
//                // chart.
//                labels: ['Value']
//            });
        });
    </script>
    {{--<script type="text/javascript">--}}
    {{--var book = <?php echo json_encode($book, JSON_PRETTY_PRINT) ?>;--}}

    {{--//        var book = {--}}
    {{--//         "title": "JavaScript: The Definitive Guide",--}}
    {{--//         "author": "David Flanagan",--}}
    {{--//         "edition": 6--}}
    {{--//         };--}}
    {{--alert(book.title);--}}

    {{--new Morris.Line({--}}
    {{--// ID of the element in which to draw the chart.--}}
    {{--element: 'chart',--}}
    {{--// Chart data records -- each entry in this array corresponds to a point on--}}
    {{--// the chart.--}}
    {{--data: [--}}
    {{--{ year: '2008', value: 20 },--}}
    {{--{ year: '2009', value: 10 },--}}
    {{--{ year: '2010', value: 5 },--}}
    {{--{ year: '2011', value: 5 },--}}
    {{--{ year: '2012', value: 20 }--}}
    {{--],--}}
    {{--// The name of the data record attribute that contains x-values.--}}
    {{--xkey: 'year',--}}
    {{--// A list of names of data record attributes that contain y-values.--}}
    {{--ykeys: ['value'],--}}
    {{--// Labels for the ykeys -- will be displayed when you hover over the--}}
    {{--// chart.--}}
    {{--labels: ['Value']--}}
    {{--});--}}
    {{--</script>--}}

@endsection