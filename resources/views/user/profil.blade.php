@extends('layouts.user')

@section('content')
<div>
    <form action="{{ route('profil.update', ['profil' => $user->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class=" section mt-3 text-center">
            <div class="avatar-section">
                @if ($user->photo)
                <img src="{{ asset('img/'. Auth::user()->photo) }}" alt="image" class="imaged w100 rounded">
                @else
                <img src="{{ asset('img/undraw_profile.svg') }}" alt="image" class="imaged w100 rounded">
                @endif
            </div>
        </div>

        <div class="section mt-2 mb-2">
            <div class="section-title">Profil</div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email4">Nama</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" required name="name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email4">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" required name="email"
                                readonly>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email4">Kelas</label>
                            <input type="text" class="form-control" value="{{ $user->nama }}" name="kelas" readonly>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="email4">Foto</label>
                            <input type="file" class="form-control" id="avatar" accept=".jpg, .jpeg, ,gif, .png"
                                name="photo">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" name="update" value="data"
                        class="btn btn-primary mr-1 btn-lg btn-block btn-profile">Simpan</button>

                </div>
            </div>
        </div>

        {{-- <div class="section mt-2 mb-2">
            <div class="section-title">Update Password</div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4">Email</label>
                            <input value="{{ $user->email }}" type="email" class="form-control"
        style="background:#eeeeee" readonly>
        <i class="clear-input">
            <ion-icon name="close-circle"></ion-icon>
        </i>
</div>
</div>

<div class="form-group boxed">
    <div class="input-wrapper">
        <label class="label" for="email4">Password baru</label>
        <input type="password" class="form-control" name="password">
    </div>
</div>
<hr>
<button type="submit" name="update" value="pass" class="btn btn-primary mr-1 btn-lg btn-block">Simpan</button>

</div>
</div>
</div> --}}
</form>
</div>
@endsection