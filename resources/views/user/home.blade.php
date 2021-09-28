@extends('layouts.user')

@section('content')
<div class="section wallet-card-section pt-1">
    <div class="wallet-card">

        <div class="balance">
            <div class="left">
                <span class="title"> Selamat Datang</span>
                <h1 class="total">{{ Auth::user()->name }}</h1>
            </div>
        </div>

        <div class="wallet-footer">
            <div class="item">
                <a href="/absen">
                    <div class="icon-wrapper bg-danger">
                        <ion-icon name="camera-outline"></ion-icon>
                    </div>
                    <strong>Absen</strong>
                </a>
            </div>

            <div class="item">
                <a href="/riwayat">
                    <div class="icon-wrapper bg-success">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </div>
                    <strong>History</strong>
                </a>
            </div>

            <div class="item">
                <a href="">
                    <div class="icon-wrapper bg-primary">
                        <ion-icon name="id-card-outline"></ion-icon>
                    </div>
                    <strong>ID Card</strong>
                </a>
            </div>

            <div class="item">
                <a href="/profile">
                    <div class="icon-wrapper bg-warning">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <strong>Profil</strong>
                </a>
            </div>

        </div>
        <!-- * Wallet Footer -->
    </div>
</div>
<!-- Wallet Card -->

<div class="section mt-2 mb-2">
    <div class="section-title">Absen Terbaru</div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-dark table-striped table-hover rounded bg-secondary text-center">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->time_in }}</td>
                        <td>{{ $data->activity }}</td>
                        <td>
                            @switch($data->attedance)
                            @case('hadir')
                            <span class="badge bg-primary">{{ $data->attedance }}</span>
                            @break
                            @case('izin')
                            <span class="badge bg-success">{{ $data->attedance }}</span>
                            @break
                            @default
                            <span class="badge bg-warning">{{ $data->attedance }}</span>
                            @endswitch
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection