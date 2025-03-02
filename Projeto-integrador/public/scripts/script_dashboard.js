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