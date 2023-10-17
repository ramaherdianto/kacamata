@extends('layouts.app',['title' => 'Create'])

@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-12">
                <h2 class="text-center"></h2>
            </div>
        </div>
    </div>
</div>

<div class="container-xl mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Buat User Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama User</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Masukkan Nama User"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" id="avatar" name="avatar"
                                class="form-control @error('avatar') is-invalid @enderror">
                            @error('avatar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan Email User"
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        placeholder="Masukkan Password"
                                        class="form-control @error('password') is-invalid @enderror">

                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}"
                                        placeholder="Konfirmasi Password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ROLE</label>

                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}"
                                    id="check-{{ $role->id }}">
                                <label class="form-check-label" for="check-{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Simpan
                            </button>
                             <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"> 
                                <i></i> Batal
                             </a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
