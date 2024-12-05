
@extends('layout')

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
    <div class="col-md-4">
        <div class="card text-center p-4">
            <i class="fas fa-chart-line fa-2x mb-2"></i>
            <h5>Crescimento média/mês</h5>
            <h2>??</h2>
        </div>
    </div>
</div>
        
    
    <div class="row">
        <!-- Pie Chart -->
        <div class="col-sm-12 col-md-4">
            <div class="card chart-container">
                <h5>Contratações recentes</h5>
                <canvas id="pieChart"></canvas>      
            </div>
        </div>
        
        <!-- Line Chart -->
        <div class="col-sm-12 col-md-8">
            <div class="card chart-container">
                <h5>Média/mês</h5>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Cargos</th>
                            <th>Colaboradores</th>
                            <th>Novas vagas</th>
                            <th>Média contratações</th>
                            <th>Cresc. anual(%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Suporte</td>
                            <td>55</td>
                            <td>2</td>
                            <td>1</td>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <td>Desenv.</td>
                            <td>27</td>
                            <td>2</td>
                            <td>1</td>
                            <td>1%</td>
                        </tr>
                        <tr>
                            <td>Adm.</td>
                            <td>8</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0%</td>
                        </tr>
                        <tr>
                            <td>Demais cargos</td>
                            <td>441</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</div>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>   
   /*     
        var ctxP = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
                labels: ['Suporte', 'Desenv.', 'Adm.'],
                datasets: [{
                    data: [16, 90, 7],
                    backgroundColor: ['#007bff', '#17a2b8', '#6c757d']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        // Line Chart
        var ctxL = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: ['Jul.', 'Ago.', 'Set.', 'Out.'],
                datasets: [{
                    label: 'Suporte',
                    data: [10, 15, 10, 20],
                    borderColor: '#007bff',
                    fill: false
                }, {
                    label: 'Desenv.',
                    data: [5, 10, 5, 15],
                    borderColor: '#17a2b8',
                    fill: false
                }, {
                    label: 'Adm.',
                    data: [2, 5, 2, 7],
                    borderColor: '#6c757d',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            }
        });
         */
    </script>
@endsection



   
