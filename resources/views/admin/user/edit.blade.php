@extends('layouts.app',['title' => 'Edit User'])

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
                    <h4 class="mb-0">Edit User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama User -->
                        <div class="form-group">
                            <label for="name">Nama User</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}"
                                class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Avatar -->
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" id="avatar" name="avatar"
                                class="form-control @error('avatar') is-invalid @enderror" required>
                            @error('avatar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input type="password" id="password" name="password"
                                        placeholder="Masukkan Password Baru"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        placeholder="Masukkan Konfirmasi Password" class="form-control">
                                </div>
                            </div>
                        </div>


                        {{-- <!-- Role -->
                        {{-- <div class="form-group"> --}}
                            {{-- {{-- <label class="font-weight-bold">ROLE</label> --}}
                            <div class="form-group">
                                <label class="font-weight-bold">ROLE</label>
                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->name }}"
                                    id="check-{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="check-{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>   

                        <!-- Submit Button -->
                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Ubah
                            </button>
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                                <i></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
