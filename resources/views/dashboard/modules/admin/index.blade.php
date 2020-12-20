@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Dashboard Admin')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item">Activities</div>
@endsection
@section('content-header')
  <h2 class="section-title">Rincian Data Terbaru</h2>
@endsection

@section('content')
    {{-- widget --}}
    <div class="row">
        <div class="col-md col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Mitra</h4>
                </div>
                <div class="card-body">
                    {{ $users->count() }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-md col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Budidaya</h4>
                </div>
                <div class="card-body">
                  {{ $budidayas->count() }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-md col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Produksi</h4>
                </div>
                <div class="card-body">
                    {{ $productions->count() }}
                </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of widget --}}

    {{-- statistic chart --}}
    <div class="card">
      <div class="card-header">
        <h4>Statistik Mitra</h4>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="dashboard-chart" height="182"></canvas>
        </div>
      </div>
    </div>
    {{-- end of statistic chart --}}
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>

    <script>
      "use strict";
      var keuangan_datasets = JSON.parse('{!! json_encode($users_bulanan) !!}');
      var chartKeuangan = function(el, data, title) {
          return new Chart(el, {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: false,
                title: {
                    display: true,
                    text: title,
                    fontSize: 24
                },
                scales: {
                    beginAtZero: true,
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                          display: true,
                          labelString: 'Month'
                        }
                      }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Total User',
                        },
                        ticks: {
                          min: 0,
                          stepSize: 1,
                        },
                    }]
                }
              }
          });
      }

      var parseKeuanganChart = function(actual_color, actual_data) {
        return {
            labels: actual_data.map(data => data.month_year),
            datasets: [
              {
                  label: 'Total Mitra',
                  borderColor: actual_color,
                  fill: false,
                  data: actual_data.map(data => data.total_user),
              }
            ]
        };
      }

      var chart_pemasukan = chartKeuangan(
        document.getElementById("dashboard-chart").getContext('2d'), 
        parseKeuanganChart('#6777ef', keuangan_datasets),
        'Grafik Mitra Setiap Bulan'
      );
    </script>
@endsection