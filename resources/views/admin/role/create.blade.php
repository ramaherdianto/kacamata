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
                    <h4 class="mb-0">Buat Role Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.role.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Role</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Masukkan Nama Role"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="permissions" class="font-weight-bold">Permissions</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($permissions as $permission)
                                <div class="form-check form-check-inline mr-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                        value="{{ $permission->name }}" id="check-{{ $permission->id }}">
                                    <label class="form-check-label" for="check-{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary mr-1 btn-submit" type="submit">
                                <i></i> Simpan
                            </button>
                             <a href="{{ route('admin.role.index') }}" class="btn btn-secondary">
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
