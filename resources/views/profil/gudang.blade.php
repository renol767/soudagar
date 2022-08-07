@extends ('layouts.adminGudang.template')
@section('content')
@if (session('failed'))
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">GAGAL</h4>
    <div class="alert-body">
        {{ session('failed') }}
    </div>
</div>
@endif
@if (session('success'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">SUKSES</h4>
    <div class="alert-body">
        {{ session('success') }}
    </div>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <h4 class="alert-heading">ERROR</h4>
    <div class="alert-body">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="col-md-12">
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('images/profil/'.$user->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">{{ $user->email }}</p>
                            <p class="text-muted mb-4">{{ $user->role }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form class="form-group" method="POST" enctype="multipart/form-data" action="{{ route('updateprofil') }}">
                                <div class="row">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nama</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" value="{{ $user->name }}" placeholder="{{ $user->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="{{ $user->email }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">No Telp</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_telp" class="form-control" value="{{ $user->no_telp }}" placeholder="{{ $user->no_telp }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Password</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" placeholder="***************">
                                        <small>* abaikan jika tidak ingin mengubah password</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Avatar</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" class="form-control" value="{{ $user->image }}">
                                        <small>* abaikan jika tidak ingin mengubah avatar</small>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endSection()
@section('script')



@endSection()