@extends('layout')
@section('content')
<style type="text/css">
    .chartfont{
        font-size:35px;
        font-weight:900;
    }
    .div2 {
        background-color: white;
        border-radius:15px;
        padding:20px;
        justify-content: center;
    }

    .div3 {
        background-color: white;
        border-radius:15px;
        padding:20px;
        justify-content: center;
    }

</style>
    
<body>
    <br><br>
    <div class="container">
        <div class="chartfont div2" style="box-shadow: 0 0 20px 2px #295939">
            <h3 style="text-align: center"> Patients Entry </h3>
            
            <div class="chart" role="group" aria-label="Basic radio toggle button group">
                <a class="btn btn-outline-success" id="btnradio1" onclick="redirectToMonthChart()" role="button">Month</a>
                <a class="btn btn-outline-success" id="btnradio2" onclick="redirectToYearChart()" role="button">Year</a>
            </div>
            <canvas id="myChart" height="100%"></canvas>
        </div>
        <br><br>
        <div class="chartfont div3" style="box-shadow: 0 0 20px 2px #241468">
            <h3 style="text-align: center"> Patients Categories </h3><br>
            <canvas id="myChart2" height="50%"></canvas>
        </div>
        <br><br><br>
    </div>
</body>
  

<script type="text/javascript">

    var currentChartRoute = "{{ Route::currentRouteName() }}";
    var chartLinks = document.querySelectorAll('.chart a');

    if ("monthentrycharts" === currentChartRoute) {
        chartLinks[0].classList.add('active');
    }else{
        chartLinks[1].classList.add('active');
    }

    function redirectToMonthChart() {
        window.location.href = "{{ route('monthentrycharts') }}";
    }

    function redirectToYearChart() {
        window.location.href = "{{ route('yearentrycharts') }}";
        }

  
    var labels =  {{ Js::from($labels) }};
    var patients =  {{ Js::from($data) }};

    var catlabels =  {{ Js::from($catlabels) }};
    var catpatients =  {{ Js::from($catdata) }};
  
    const data = {
        labels: labels, 
        datasets: [{
            label: 'Patient count',
            backgroundColor: '#28DF99',
            borderColor: '#28DF99',
            data: patients,
        }]
    };
  
    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const data2 = {
        labels: catlabels, 
        datasets: [{
            label: 'patient count',
            data: catpatients,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgba(153, 102, 255)',
            'rgba(54, 162, 235)',
            'rgb(75, 192, 192)'
            ],
            borderWidth: 1
        }]
    };
    const config2 = {
        type: 'bar',
        data: data2,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
    };

    const data3 = {
        labels: labels, 
        datasets: [{
            label: 'Patient Entries By Month',
            backgroundColor: '#19A7CE',
            borderColor: '#19A7CE',
            data: patients,
        }]
    };
    const config3 = {
        type: 'line',
        data: data3,
        options: {}
    };
  
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );

    const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
    );


  
</script>
@endsection


