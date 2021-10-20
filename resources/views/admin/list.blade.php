@extends('layouts.admin')

@section('content')
<div>
    <section class="section">
        <div class="section-header">
            <h1>Data Absen Siswa</h1>
            <div class="section-header-breadcrumb">
                <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#cetak">
                    Print <i class="fas fa-print"></i>
                </button>
                <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#filter">
                    Time Filter <i class="far fa-clock"></i>
                </button>
                <a href="{{ route('data_kelas.show', ['data_kela' => $id ]) }}" class="btn btn-primary text-white"
                    style="cursor: pointer">Refresh <i class="fas fa-sync-alt"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Siswa Berdasarkan Kelas {{ $nama->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="datatab table table-striped table-hover text-center rounded">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Time_in</th>
                                    <th>Activity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $item => $value)
                                <tr>
                                    <td>{{ $item+1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->date }}</td>
                                    <td>{{ $value->time_in }}</td>
                                    <td>{{ $value->activity }}</td>
                                    <td>{{ $value->attedance }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="cetak" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cetak Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" id="awal">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" id="akhir">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary text-white" onclick="this.href='/cetak/'+ document.getElementById('awal').value + '/' + document.getElementById('akhir').value + '/{{ $nama->id }}' " target="_blank">Cetak</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="filter" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Filter Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input id="from" type="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input id="end" type="date" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-primary text-white" onclick="this.href='/filter/'+ document.getElementById('from').value + '/' + document.getElementById('end').value + '/{{ $nama->id }}' ">Tampil</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        $('.datatab').DataTable();
    });
</script>
@endsection