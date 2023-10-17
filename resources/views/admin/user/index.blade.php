@extends('layouts.app',['title' => 'User'])

@section('content')

<div class="page-header d-print-none">

    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4><i></i> User</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.user.index') }}" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    @can('users.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
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
                                            <i class="fa fa-plus"></i> <span class="ms-2"> Tambah User
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
                                        <th scope=" col" style="text-align: center;width: 6%">NO</th>
                                        <th scope="col" style="width: 15%">NAMA USER</th>
                                        <th scope="col">ROLE</th>
                                        <th scope="col" style="width: 30%;text-align: center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $user)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no +
                                            ($users->currentPage()-1) *
                                            $users->perPage() }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $role)
                                            <label class="badge badge-success">{{ $role }}</label>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @can('users.edit')

                                            <a href="{{ route('admin.user.edit', $user->id) }}" type="button"
                                                class="btn btn-warning mx-2">
                                                Edit
                                                </button>
                                                @endcan

                                                @can('users.delete')
                                                <x-button-delete id="{{ $user->id }}" title="Hapus Data"
                                                    url="{{ route('admin.user.destroy', $user->id) }}" />
                                                @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">{{ $users->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>


@stop
