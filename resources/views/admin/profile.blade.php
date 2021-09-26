@extends('layouts.admin')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">User</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card author-box card-primary">
                    <div class="card-body">
                        <div class="author-box-left">
                            @if ($data->photo)
                            <img alt="image" src="{{ asset('img/'. $data->photo) }}"
                                class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            @else
                            <img alt="image" src="{{ asset('img/undraw_profile.svg') }}"
                                class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            @endif
                        </div>
                        <div class="author-box-details">
                            <form method="post" action="{{ route('profile.update', ['profile' => $data->id ]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="{{ $data->name }}" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ $data->email }}" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection