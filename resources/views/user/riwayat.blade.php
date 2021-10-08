@extends('layouts.user')

@section('content')
<div>
    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <div class="input-group">
                                    <input type="date" id="from" class="form-control datepicker start_date"
                                        placeholder="Tanggal Awal" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4  col-md-4">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <div class="input-group">
                                    <input type="date" id="to" name="end_date" class="form-control datepicker end_date">
                                </div>

                            </div>
                        </div>
                    </div>
                    @if ($user_jurus)
                    <input type="text" value="{{ $user_jurus->jurusan_id }}" id="project" hidden>
                    <div class="col-sm-4 col-md-4">
                        <a class="col-md-12 btn btn-warning mt-1"
                            onclick="this.href='/pdf/'+ document.getElementById('from').value + '/' + document.getElementById('to').value + '/' + document.getElementById('project').value"
                            target="_blank">
                            <ion-icon name="print-outline"></ion-icon> Cetak
                        </a>
                    </div>
                    @else
                    <div class="col-sm-4 col-md-4">
                        <a class="col-md-12 btn btn-secondary mt-1">
                            <ion-icon name="print-outline"></ion-icon> Data Kosong
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="section my-2">
        <div class="section-title">Data Absensi</div>
        <div class="card">
            <div class="table-responsive">
                <div class="loaddata">
                    <table id="dataTable" class="table table-hover rounded dataTable no-footer ml-1 table-striped">
                        <thead>
                            <tr role="row">
                                <th scope="col" class="align-middle text-center sorting_asc">No</th>
                                <th scope="col" class="align-middle sorting text-center">Tanggal</th>
                                <th scope="col" class="align-middle sorting text-center">Hari</th>
                                <th scope="col" class="align-middle sorting text-center">Waktu</th>
                                <th scope="col" class="align-middle sorting text-center">Activity</th>
                                <th scope="col" class="align-middle sorting text-center">Status</th>
                                <th scope="col" class="align-middle sorting text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody role="row" class="odd">
                            @foreach ($datas as $item => $value)
                            <tr>
                                <td class="text-center sorting_1">{{ $item+1 }}</td>
                                <td class="text-center">{{ $value->date }}</td>
                                <td class="text-center">{{ $value->day }}</td>
                                <td class="text-center">{{ $value->time_in }}</td>
                                <td class="text-center">
                                    @if ($value->attedance == 'hadir')
                                    {{ $value->activity }}
                                    @else
                                    <a class="badge bg-primary" href="{{ asset('uploads/'. $value->activity) }}"
                                        target="_blank" style="text-decoration: none"><i class="fas fa-paper-plane"></i>
                                        {{ $value->activity }}</a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @switch($value->attedance)
                                    @case('hadir')
                                    <span class="badge bg-primary">{{ $value->attedance }}</span>
                                    @break
                                    @case('izin')
                                    <span class="badge bg-success">{{ $value->attedance }}</span>
                                    @break
                                    @default
                                    <span class="badge bg-warning">{{ $value->attedance }}</span>
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    {{-- <button type="button" class="btn btn-success btn-sm modal-update"
                                        data-toggle="modal" data-target="#modal-show"><i class="fas fa-pencil-alt"
                                            aria-hidden="true"></i></button> --}}
                                    <button type="button" class="btn btn-success btn-sm modal-update"
                                        onclick="event.preventDefault(); document.getElementById('hapus_{{ $value->id }}').submit();"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                                <form id="hapus_{{ $value->id }}"
                                    action="{{ route('riwayat.destroy', ['riwayat' => $value->id]) }}" method="POST"
                                    class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <p>Hadir : <span class="badge badge-success">{{ $hadir }}</span></p>
                        </div>

                        <div class="col-md-3">
                            <p>Izin : <span class="label badge badge-danger">{{ $izin }}</span></p>
                        </div>


                        <div class="col-md-3">
                            <p>Sakit : <span class="badge badge-warning">{{ $sakit }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection