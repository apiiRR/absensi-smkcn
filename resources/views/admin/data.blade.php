@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Absen Siswa</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Siswa Berdasarkan Jurusan</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs active" id="myTab" role="tablist">
                        @foreach ($jurusan as $item)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link bos" id="tab-{{ $item->id }}" data-toggle="tab"
                                href="#jurusan-{{ $item->id }}" role="tab" aria-controls="jurusan-{{ $item->id }}"
                                aria-selected="false">{{ $item->nama }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($jurusan as $jurus)
                        <div class="tab-pane fade p-2" id="jurusan-{{ $jurus->id }}" role="tabpanel"
                            aria-labelledby="home-{{ $jurus->id }}">
                            <table id="jurusan-{{ $jurus->id }}"
                                class="datatab table table-striped table-hover text-center rounded" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Hari</th>
                                        <th>Aktivitas</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $item => $value)
                                    @if ($jurus->id == $value->jurusan_id)
                                    <tr>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ $value->date }}</td>
                                        <td>{{ $value->day }}</td>
                                        <td>{{ $value->activity }}</td>
                                        <td>
                                            @switch($value->attedance)
                                            @case('hadir')
                                            <span class="badge badge-primary">{{ $value->attedance }}</span>
                                            @break
                                            @case('izin')
                                            <span class="badge badge-success">{{ $value->attedance }}</span>
                                            @break
                                            @default
                                            <span class="badge badge-warning">{{ $value->attedance }}</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        $('.datatab').DataTable();
    });

    function active()
	{
        pertama = document.querySelectorAll('.bos');
        pertama[0].classList.add('active');

		first = document.querySelectorAll('.tab-pane');
		first[0].classList.add('active', 'show');
	}

    active()
</script>
@endsection