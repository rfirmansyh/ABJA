@extends('dashboard._layouts.app-dashboard')

@section('title', 'Dashboard')
@section('header', 'Keuangan')

@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
@endsection
@section('content-header')
    @if(!empty($message))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @endif
    <form action="" id="select_budidaya_id" method="get">
    <div class="row gutters-xs align-items-center">
        <div class="col-lg"><h2 class="section-title">Analisa Keuangan</h2></div>
        <div class="col-lg-3">
            <select 
                name="bobot" 
                class="selectpicker" 
                data-style="form-control"
                title="Bobot Bulan" 
                data-width="100%">
                    @for ($i = 3; $i <= count($keuangans)-1; $i++)
                        <option value="{{ $i }}" {{ isset($bobot) && $bobot === strval($i) ? 'selected' : '' }}>{{ "$i Bulan Terakhir" }}</option>   
                    @endfor
            </select>
        </div>
        <div class="col-lg-3">
            <select 
                name="next" 
                class="selectpicker" 
                data-style="form-control"
                title="Jumlah Perkiraan" 
                data-width="100%">
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ isset($next) && $next === strval($i) ? 'selected' : '' }}>{{ "$i Bulan Kedepan" }}</option>   
                    @endfor
            </select>
        </div>
        <div class="col-lg-auto">
            <button type="submit" class="btn btn-primary"><i class="fas fa-chart-line mr-2"></i>Analisis Sekarang</button>
        </div>
    </div>
    </form>
@endsection

@section('content')
    <nav class="mb-4">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item mr-3">
              <a class="btn btn-lg btn-block btn-success" id="pemasukan-tab" data-toggle="tab" href="#pemasukan">Pemasukan</a>
            </li>
            <li class="nav-item ml-3">
              <a class="btn btn-lg btn-block btn-warning" id="pengeluaran-tab" data-toggle="tab" href="#pengeluaran">Pengeluaran</a>
            </li>
        </ul>
    </nav>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="pemasukan">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="pemasukan-chart" height="280"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Pemasukan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($forecastedPemasukan as $pemasukan)
                                            <tr>
                                                <td>{{ $pemasukan['month_year'] }}</td>
                                                <td>{{ "Rp. $pemasukan[total]" }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pengeluaran">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="pengeluaran-chart" height="280"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Pengeluaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($forecastedPengeluaran as $pengeluaran)
                                            <tr>
                                                <td>{{ $pengeluaran['month_year'] }}</td>
                                                <td>{{ "Rp. $pengeluaran[total]" }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <link rel="stylesheet" href="{{ asset('vendors/datatable/datatable.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
    <style>
        .dataTables_wrapper .dataTables_length .custom-select {
            padding-right: 45px !important;
        }
        .dataTables_wrapper .select-info {
            margin-left: 10px;
            color: rgb(255, 115, 0);
            font-weight: bold;
        }
        .dataTables_wrapper tr.selected {
            background-color: rgba(63, 63, 63, 0.09);
        }
        .dataTables_wrapper .dataTables_length .custom-select, .dataTables_wrapper .dataTables_filter .form-control {
            margin-left: 20px;
        }
        .dataTables_wrapper .dataTables_length label, .dataTables_wrapper .dataTables_filter label {
            display: flex;
            align-items: center;
        }
        @media screen and (max-width: 768px) {
            .dataTables_wrapper .dataTables_length .custom-select, .dataTables_wrapper .dataTables_filter .form-control {
                margin-left: 0;
            }
            .dataTables_wrapper .dataTables_length label, .dataTables_wrapper .dataTables_filter label {
                display: flex;
                flex-direction: column;
                align-items: stretch;
            }
        }
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script src="{{ asset('vendors/datatable/datatable.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js"></script>
    <script src="{{ asset('vendors/datatable/datatable-bs.min.js') }}"></script>

    <script>
        var keuangan_datasets = JSON.parse('{!! json_encode($keuangans) !!}');
        var forcasted_pemasukan_datasets = JSON.parse('{!! json_encode($forecastedPemasukan) !!}');
        var forcasted_pengeluaran_datasets = JSON.parse('{!! json_encode($forecastedPengeluaran) !!}');
        // console.log(forcasted_data_data.map(data => data));
        console.log(keuangan_datasets.map(data => data.pengeluaran_total));
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
        var parseKeuanganChart = function(actual_color, actual_data, forcasted_data, type) {
            if (type === 'pemasukan') {
                return {
                    labels: forcasted_data.map(data => data.month_year),
                    datasets: [
                    {
                        label: 'Data Aktual',
                        borderColor: actual_color,
                        fill: false,
                        data: actual_data.map(data => data.pemasukan_total),
                    }, 
                    {
                        label: 'Data Perkiraan',
                        borderColor: '#6777ef',
                        fill: false,
                        data: forcasted_data.map(data => data.total),
                    }]
                };
            } else {
                return {
                    labels: forcasted_data.map(data => data.month_year),
                    datasets: [
                    {
                        label: 'Data Aktual',
                        borderColor: actual_color,
                        fill: false,
                        data: actual_data.map(data => data.pengeluaran_total),
                    }, 
                    {
                        label: 'Data Perkiraan',
                        borderColor: '#6777ef',
                        fill: false,
                        data: forcasted_data.map(data => data.total),
                    }]
                };
            }
        }

        var chart_pemasukan = chartKeuangan(
                document.getElementById('pemasukan-chart').getContext('2d'), 
                parseKeuanganChart('#47c363', keuangan_datasets, forcasted_pemasukan_datasets, 'pemasukan'),
                'Grafik Perbandingan Peramalan Pemasukan'
            );
        var chart_pengeluaran = chartKeuangan(
                document.getElementById('pengeluaran-chart').getContext('2d'), 
                parseKeuanganChart('#ffa426', keuangan_datasets, forcasted_pengeluaran_datasets, 'pengeluaran'),
                'Grafik Perbandingan Peramalan Pengeluaran'
            );
    </script>
@endsection