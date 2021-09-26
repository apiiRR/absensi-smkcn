<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Time Sheet Engineer</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="margin-top: -50px;">
        @if ($datas[0])
            <div class="col-xs text-left">
                <small>Jurusan : {{$datas[0][0]->jurusan->nama}}</small><br />
                <small>Siswa : {{$datas[0][0]->user->name}}</small><br />
            </div>
        @else
            <div class="col-xs text-left">
                <small>Jurusan : -- </small><br />
                <small>Siswa : -- </small><br />
            </div>
        @endif
            <div class="col-xs text-right">
                <div style="margin-right: 65px">
                    <small>18 Office Park Lt.GF Unit 6</small><br />
                    <small>Jl. TB Simatupang No.18 RT.002 RW.001</small><br />
                    <small>Pasar Minggu - DKI Jakarta</small>
                </div>
                <img src="<?php echo $datas[1] ?>" alt="" width="50" style="margin-top: -45px">
            </div>
        </div>
        <div class="row text-center mb-3">
            <h3>Daftar Absen Siswa</h3>
        </div>
        <div class="row">
            <div class="col-xs">
                <table class="table table-striped table-sm table-bordered border border-dark text-center">
                    <thead>
                        <tr class="bg-danger text-white">
                            <th scope="col">Tanggal</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas[0] as $item)
                            <tr>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->day }}</td>
                                <td>{{ $item->activity }}</td>
                                <td>{{ $item->attedance }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xs text-left">
                <small>Employee</small>
                <br>
                <br>
                <br>
                <h6>{{$datas[0][0]->user->name}}</h6>
            </div>
            <div class="col-xs text-center">
                <small>Manager</small>
                <br>
                <br>
                <br>
                <h6>Bayu Hastomo</h6>
            </div>
            <div class="col-xs text-right">
                <small>Director</small>
                <br>
                <br>
                <br>
                <h6>Tedhi Achdiana</h6>
            </div>
        </div> --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>