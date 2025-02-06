
@extends('layout')


@section('document')
    Dashboard
@endsection
@section('content')
<script src="{{asset('scripts/scripts_dashboard.js')}}"></script>
<div class="row">
    <div class="col-md-4">
        <div class="card text-center p-4">
            <i class="fas fa-users fa-2x mb-2"></i>
            <h5>Total de Colaboradores</h5>
            <h2>{{$totalRegistros}}</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center p-4">
            <i class="fas fa-briefcase fa-2x mb-2"></i>
            <h5>Total de Vagas abertas</h5>
            <h2>{{$vagas_abertas}}</h2>
        </div>
    </div>
    
</div>
        
    
    <div class="row">
        <!-- Pie Chart -->

        
        <!-- <div class="col-sm-12 col-md-4">
            <div class="card chart-container">
                <h5>Contratações recentes</h5>
                <canvas id="pieChart"></canvas>      
            </div>
        </d> -->
         
        
        
        
        <!-- Line Chart -->
        
    </div>


    <div id="chart_div" style="width: 100%; height: 400px;"></div>
            <canvas id="lineChart"></canvas>
        </div>

<!-- <div class="col-sm-12 col-md-8" >
        <div class="card chart-container" style="width: 100%">
            <h5>Movimentações Admissões/Demissões</h5>
            
    </div> -->
    
    

    
</main>

</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Mês', 'Total Contratações', 'Total Desligamentos'],
                @foreach ($monthlyData as $month => $data)
                    ['{{ DateTime::createFromFormat('!m', $month)->format('F') }}', {{ $data['hires'] }}, {{ $data['terminations'] }}],
                @endforeach
            ]);

            var options = {
                title: 'Total Contratações/Demissões',
                hAxis: {title: 'Mês', titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
</script>

    
@endsection



   
