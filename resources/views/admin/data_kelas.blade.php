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
                    <h4>Data Siswa Berdasarkan Kelas</h4>
                </div>
                <div class="card-body">
                    <table class="datatab table table-striped table-hover text-center rounded">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ route('data_kelas.show', ['data_kela' => $item->id ]) }}">{{ $item->nama }} <i class="fas fa-eye"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</script>
@endsection