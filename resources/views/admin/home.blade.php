@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User Siswa</h4>
                    </div>
                    <div class="card-body">
                        {{ $totUser }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Jurusan</h4>
                    </div>
                    <div class="card-body">
                        {{ $totJurusan }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Laporan Bulanan</h4>
                    </div>
                    <div class="card-body">
                        {{ $lapBulan }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Laporan Harian</h4>
                    </div>
                    <div class="card-body">
                        {{ $lapHarian }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Rekap Data Siswa Harian</h4>
                </div>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                            aria-controls="nav-home" aria-selected="true">Daftar Siswa Hadir <span
                                class="badge badge-pill badge-success">{{ $totHadir }}</span></a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                            aria-controls="nav-profile" aria-selected="false">Daftar Siswa Sakit <span
                                class="badge badge-pill badge-info">{{ $totSakit }}</span></a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                            aria-controls="nav-contact" aria-selected="false">Daftar Siswa Izin <span
                                class="badge badge-pill badge-warning">{{ $totIzin }}</span></a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active p-2" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="table-responsive">
                            <table id="hadir" class="table table-striped table-hover text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Aktivitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hadir as $item => $value)
                                    <tr>
                                        <td>{{ $item++ }}</td>
                                        <td>{{ $value->user_id }}</td>
                                        <td>{{ $value->jurusan_id }}</td>
                                        <td>{{ $value->activity }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade p-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-responsive">
                            <table id="sakit" class="table table-striped table-hover text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sakit as $item => $value)
                                    <tr>
                                        <td>{{ $item++ }}</td>
                                        <td>{{ $value->user_id }}</td>
                                        <td>{{ $value->jurusan_id }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade p-2" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="table-responsive">
                            <table id="izin" class="table table-striped table-hover text-center rounded" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($izin as $item => $value)
                                    <tr>
                                        <td>{{ $item++ }}</td>
                                        <td>{{ $value->user_id }}</td>
                                        <td>{{ $value->jurusan_id }}</td>
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
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        $('#hadir').DataTable();
    });

    $(document).ready(function () {
        $('#sakit').DataTable();
    });

    $(document).ready(function () {
        $('#izin').DataTable();
    });
</script>
@endsection