@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-building"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Asset</h4>
                            </div>
                            <div class="card-body">
                                {{$asset->count()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengadaan Bulan {{$bulan}}</h4>
                            </div>
                            <div class="card-body">
                                {{$pengadaan_bulan_ini->count()}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Nilai Asset</h4>
                            </div>
                            <div class="card-body">
                                Rp{{number_format($nilai_asset, 0, ',', '.')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nilai Pengadaan {{$tahun}}</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Persentase Kategori Asset</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="card-footer">
                            <marquee direction='left'>
                                <span class="text-primary">Data : </span>
                                @foreach($label_kategori as $label)
                                <span class="text-info">[ {{$label}} ]</span>
                                @endforeach
                            </marquee>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('script')
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Pengadaan',
                data: <?php echo json_encode($data); ?>,
                borderWidth: 2,
                backgroundColor: '#6777ef',
                borderColor: '#6777ef',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                        return value.toLocaleString('id-ID'); // Format Rupiah
                        }
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
        }
    });
</script>
<script>
    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
        data: <?php echo json_encode($data_kategori); ?>,
        backgroundColor: [
            '#33FFF2', // Cerah - Aqua
            '#A733FF', // Cerah - Ungu Terang
            '#33FF57', // Cerah - Hijau Terang
            '#FF5733', // Cerah - Merah Oranye
            '#3357FF', // Cerah - Biru Terang
            '#FFC733', // Cerah - Kuning
            '#FF33A1', // Cerah - Merah Muda Fuchsia
            '#FF9633', // Cerah - Oranye
            '#FF5733', // Cerah - Merah Oranye
            '#33FFAA'  // Cerah - Hijau Aqua
        ],
        label: 'Persentase'
        }],
        labels: <?php echo json_encode($label_kategori); ?>,
    },
    options: {
        responsive: true,
        legend: {
        position: 'bottom',
        },
        tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var currentValue = dataset.data[tooltipItem.index];
                        var label = data.labels[tooltipItem.index];
                        return label + ': ' + currentValue + '%';
                    }
                }
            }
    }
    });
</script>
@endpush
