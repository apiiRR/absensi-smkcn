@extends('layouts.user')

@section('content')
@php
date_default_timezone_set('Asia/Jakarta');
$hari = date("l");
$tanggal = date("Y-m-d");

$month_num = date("m");
$month_name = date("F", mktime(0, 0, 0, $month_num, 10));
@endphp

<div>
    <div class="section wallet-card-section pt-1">
        <div class="wallet-card">
            <div class="text-center">
                <h3><span id="tanggal_sekarang"></span> || <span id="waktu">00:00:00</span></h3>
            </div>
            <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="wallet-footer">
                    <select name="jurusan" class="form-control custom-select @error('jurusan') is-invalid @enderror"
                        required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                        @endforeach
                    </select>
                    @error('jurusan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                @if ($data == null)
                <div class="text-center">
                    <div class="webcam-capture-body text-center">
                        <div class="form-group basic">
                            <button type="submit" class="btn btn-success btn-lg btn-block" value="masuk" name="simpan">
                                <ion-icon name="checkmark-circle-outline"></ion-icon>Masuk
                            </button>
                        </div>
                        <div class="form-group basic">
                            <button type="button" class="btn btn-warning btn-lg btn-block modal-update"
                                data-toggle="modal" data-target="#modal-izin">
                                <ion-icon name="document-outline"></ion-icon>Izin
                            </button>
                        </div>
                        <div class="form-group basic">
                            <button type="button" class="btn btn-danger btn-lg btn-block modal-update"
                                data-toggle="modal" data-target="#modal-sakit">
                                <ion-icon name="fitness-outline"></ion-icon>Sakit
                            </button>
                        </div>
                    </div>
                </div>
                @elseif($data['activity'] == null)
                <div class="form-group basic">
                    <button type="button" class="btn btn-success btn-lg btn-block modal-update" data-toggle="modal"
                        data-target="#modal-show">
                        <ion-icon name="checkmark-circle-outline"></ion-icon>Keluar
                    </button>
                </div>
                @endif

        </div>
    </div>

    <div class="modal fade action-sheet inset" id="modal-izin" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" style="z-index:10000">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Keterangan Izin <span class="status-date badge badge-success"></span>
                    </h5>
                    <a href="javascript:void(0);" class="close" style="position: absolute;right:15px;top: 10px;"
                        data-dismiss="modal" aria-hidden="true">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">

                        <div class="form-group basic">
                            <label class="label">Surat Keterangan Izin</label>
                            <input type="file" name="izin"
                                class="form-control border-bottom @error('izin') is-invalid @enderror">
                            @error('izin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group basic">
                            <button type="submit" value="izin" name="simpan"
                                class="btn btn-primary btn-block btn-lg">Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade action-sheet inset" id="modal-sakit" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" style="z-index:10000">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Keterangan Sakit <span class="status-date badge badge-success"></span>
                    </h5>
                    <a href="javascript:void(0);" class="close" style="position: absolute;right:15px;top: 10px;"
                        data-dismiss="modal" aria-hidden="true">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content">

                        <div class="form-group basic">
                            <label class="label">Surat Keterangan Sakit</label>
                            <input type="file" name="sakit"
                                class="form-control border-bottom @error('sakit') is-invalid @enderror">
                            @error('sakit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group basic">
                            <button type="submit" value="sakit" name="simpan"
                                class="btn btn-primary btn-block btn-lg">Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>

    @if ($data)
    <form action="{{ route('absen.update', ['absen' => $data->id ]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="modal fade action-sheet inset" id="modal-show" tabindex="-1" role="dialog" data-backdrop="static"
            data-keyboard="false" style="z-index:10000">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Keterangan Kehadiran <span
                                class="status-date badge badge-success"></span>
                        </h5>
                        <a href="javascript:void(0);" class="close" style="position: absolute;right:15px;top: 10px;"
                            data-dismiss="modal" aria-hidden="true">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">

                            <div class="form-group basic">
                                <label class="label">Aktivitas</label>
                                <input type="text" name="activity"
                                    class="form-control border-bottom @error('activity') is-invalid @enderror">
                                @error('activity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group basic">
                                <button type="submit" value="keluar" name="simpan"
                                    class="btn btn-primary btn-block btn-lg">Simpan</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endif

</div>


<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    setInterval(showTime, 1000);

    function showTime() {
        let time = new Date();
        let hr = time.getHours();
        let min = time.getMinutes();
        let sec = time.getSeconds();
        AMPM = 'AM';

        if (hr > 12) {
            hr -= 12;
            AMPM = "PM";
        }
        if (hr == 0) {
            hr = 12;
            AMPM = "AM";
        }

        hr = hr < 10 ? "0" + hr : hr;
        min = min < 10 ? "0" + min : min;
        sec = sec < 10 ? "0" + sec : sec;

        let curentTime = hr + ":" + min + ":" + sec + " " + AMPM;

        document.getElementById('waktu').innerHTML = curentTime;

    }
    showTime();

    Date.prototype.toJSONLocal = (function () {
        function addZ(n) {
            return (n < 10 ? '0' : '') + n;
        }
        return function () {
            return this.getFullYear() + '-' +
                addZ(this.getMonth() + 1) + '-' +
                addZ(this.getDate());
        };
    }())

    function ubahTanggal() {
        let mydate = new Date;
        // let jakarta = new Date().toLocaleString("en-US", {timeZone: "Asia/Jakarta"});
        // let mydate = new Date(jakarta);
        console.log(mydate);
        // let tanggalJakarta = mydate.toString();
        // console.log(tanggalJakarta)
        // let dateNow = document.querySelector('#tanggal_in').value;
        // document.querySelector('#tanggal_out').value = weekDayName;
        let date = mydate.toJSONLocal().slice(0, 10);
        console.log(date);
        let nDate = date.slice(0, 4) + '-' +
            date.slice(5, 7) + '-' +
            date.slice(8, 10);
        console.log(nDate);
        document.querySelector('#tanggal_sekarang').innerHTML = nDate;
        document.getElementById('tanggal_hadir').value = nDate;
        document.getElementById('tanggal_sakit').value = nDate;
        document.getElementById('tanggal_izin').value = nDate;
        let weekDayName = moment(date).format('dddd');
        let minutes = mydate.getMinutes();
        minutes = minutes > 9 ? minutes : '0' + minutes;
        let hours = mydate.getHours();
        hours = hours > 9 ? hours : '0' + hours;
        let timeNow = hours + ":" + minutes;
        document.getElementById('waktu_hadir').value = timeNow;
        document.getElementById('waktu_sakit').value = timeNow;
        document.getElementById('waktu_izin').value = timeNow;
        // console.log(timeNow);
        // document.querySelector('#tanggal_out').value = nDate;
        document.getElementById('hari_hadir').value = weekDayName;
        document.getElementById('hari_sakit').value = weekDayName;
        document.getElementById('hari_izin').value = weekDayName;
        // let weekDayNameOut = moment(mydate).format('dddd');
        // document.querySelector('#hari_out').value = weekDayNameOut;
    }

    ubahTanggal();
</script>
@endsection