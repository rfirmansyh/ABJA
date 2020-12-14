@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')

@section('header', 'Dashboard Mitra')
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
        <div class="col-lg col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Pekerja</h4>
                </div>
                <div class="card-body">
                    {{ $totalPekerja }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                <i class="fas fa-map"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Tempat Budidaya</h4>
                </div>
                <div class="card-body">
                    {{ $totalBudidaya }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Kumbung</h4>
                </div>
                <div class="card-body">
                    {{ $totalKumbung }}
                </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Produksi Selesai</h4>
                </div>
                <div class="card-body">
                    {{ $totalProduksi }}
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    {{-- end of widget --}}

    {{-- statistic chart --}}
    <div class="row">
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistik Hasil Bersih Bulanan</h4>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="dashboard-chart-1" height="182"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistik Hasil Panen Bulanan</h4>
          </div>
          <div class="card-body">
            <div class="chart-container">
              <canvas id="dashboard-chart-2" height="182"></canvas>
            </div>
          </div>
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

      var keuangan_datasets = JSON.parse('{!! json_encode($keuangans) !!}');

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
                            labelString: 'Rp..'
                        },
                    }]
                }
              }
          });
      }
      var parseKeuanganChart = function(actual_color, actual_data, type) {
        if (type === 'panen') {
          return {
              labels: actual_data.map(data => data.month_year),
              datasets: [
                {
                    label: 'Hasil Panen',
                    borderColor: actual_color,
                    fill: false,
                    data: actual_data.map(data => data.panen_total),
                }
              ]
          };
        } else {
          return {
              labels: actual_data.map(data => data.month_year),
              datasets: [
                {
                    label: 'Data Penghasilan',
                    borderColor: actual_color,
                    fill: false,
                    data: actual_data.map(data => data.hasil_bersih),
                }
              ]
          };
        }
      }
        var chart_pemasukan = chartKeuangan(
          document.getElementById("dashboard-chart-1").getContext('2d'), 
          parseKeuanganChart('#47c363', keuangan_datasets, 'hasil'),
          'Grafik Penghasilan Bersih'
        );
        var chart_pemasukan = chartKeuangan(
          document.getElementById("dashboard-chart-2").getContext('2d'), 
          parseKeuanganChart('#6777ef', keuangan_datasets, 'panen'),
          'Grafik Hasil Panen'
        );
    </script>
@endsection