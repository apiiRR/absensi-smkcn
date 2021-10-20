@extends('layouts.wali')

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach ($jurusan as $item)
            <li class="nav-item" role="presentation">
                <button class="nav-link bos" id="tab-{{ $item->id }}" data-bs-toggle="tab"
                    data-bs-target="#jurusan-{{ $item->id }}" type="button" role="tab"
                    aria-controls="#jurusan-{{ $item->id }}" aria-selected="false">{{ $item->nama }}</button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content" id="myTabContent">
            @foreach ($jurusan as $jurus)
            <div class="tab-pane fade p-2" id="jurusan-{{ $jurus->id }}" role="tabpanel"
                aria-labelledby="home-{{ $jurus->id }}">
                <table id="jurusan-{{ $jurus->id }}" class="datatab table table-striped table-hover text-center rounded"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
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
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->date }}</td>
                            <td>{{ $value->day }}</td>
                            <td>
                                @if ($value->attedance == 'hadir')
                                {{ $value->activity }}
                                @else
                                <a href="{{ asset('uploads/'. $value->activity) }}" target="_blank"><span
                                        class="badge bg-primary"><i class="fas fa-paper-plane"></i> {{ $value->activity }}</span></a>
                                @endif
                            </td>
                            <td>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        $('.datatab').DataTable();
    });

    function active() {
        pertama = document.querySelectorAll('.bos');
        pertama[0].classList.add('active');

        first = document.querySelectorAll('.tab-pane');
        first[0].classList.add('active', 'show');
    }

    active()
</script>
@endsection