@extends('layouts.app',['title' => 'Role'])

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i></i> Role User</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.role.index') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @can('roles.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                                            <!-- SVG icon from http://tabler-icons.io -->
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-user-plus" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                <path d="M16 19h6"></path>
                                                <path d="M19 16v6"></path>
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                            </svg> --}}
                                            <i class="fa fa-plus"></i> <span class="ms-2"> Tambah Role
                                        </a>
                                    </div>
                                    @endcan
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th scope=" col" style="text-align: center;width: 6%">NO.</th>
                                        <th scope="col" style="width: 15%">NAMA ROLE</th>
                                        <th scope="col">PERMISSIONS</th>
                                        <th scope="col" style="width: 30%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $no => $role)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no +
                                            ($roles->currentPage()-1) *
                                            $roles->perPage() }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach($role->getPermissionNames() as $permission)
                                            <button class="btn btn-sm btn-success mb-1 mt-1 mr-1">{{ $permission
                                                }}</button>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @can('roles.edit')

                                            <a href="{{ route('admin.role.edit', $role->id) }}" type="button"
                                                class="btn btn-warning mx-2">
                                                Edit
                                                </button>
                                                @endcan

                                                @can('roles.delete')
                                                <x-button-delete id="{{ $role->id }}" title="Hapus Data"
                                                    url="{{ route('admin.role.destroy', $role->id) }}" />
                                                @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">{{ $roles->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>


@stop
