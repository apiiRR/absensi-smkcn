@extends('layouts.admin')

@section('content')
<div>
    <section class="section">
        <div class="section-header">
            <h1>Pengelolaan Akun</h1>
            <div class="section-header-breadcrumb">
                <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#tambahUser">Tambah User</button>
                <button class="btn btn-primary mr-2" data-toggle="modal" data-target="#importUser">Import User</button>
                <a href="/default" class="btn btn-primary text-white" style="cursor: pointer">Password User Default</a>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Akun</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Kelas</th>
                                            <th>Role</th>
                                            <th>Created_at</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $item => $value)
                                        <tr>
                                            <td>{{ $item+1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->nama }}</td>
                                            <td>
                                                @switch($value->role)
                                                @case('admin')
                                                <span class="badge badge-primary">{{ $value->role }}</span>
                                                @break
                                                @case('user')
                                                <span class="badge badge-success">{{ $value->role }}</span>
                                                @break
                                                @default
                                                <span class="badge badge-warning">{{ $value->role }}</span>
                                                @endswitch
                                            </td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>
                                                <a class="btn btn-info" href="javascript:void(0)" id="editUser"
                                                    data-toggle="modal" data-id="{{ $value->id }}">
                                                    Edit </a>
                                                <button class="btn btn-danger"
                                                    onclick="event.preventDefault(); document.getElementById('hapus_{{ $value->id }}').submit();">Hapus</button>
                                            </td>
                                            <form id="hapus_{{ $value->id }}"
                                                action="{{ route('akun.destroy', ['akun' => $value->id]) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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

    <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('akun.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas">
                                <option>-- Pilih Kelas --</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option value="user">User</option>
                                <option value="guru">Guru</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="importUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Masukkan file excel</label>
                            <input type="file" class="form-control-file" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_User" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/updat" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <input type="text" id="userId" name="userId" required hidden>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" id="kelas" name="kelas">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="user">User</option>
                                <option value="guru">Guru</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $('body').on('click', '#editUser', function () {
        var id = $(this).data('id');
        $.get('/edit/' + id, function (data) {
            $('#edit_User').modal('show');
            $('#name').val(data.name);
            $('#kelas').val(data.kelas_id);
            $('#role').val(data.role);
            $('#email').val(data.email);
            $('#userId').val(data.id);
            console.log(data);
        })
    });
</script>
@endsection