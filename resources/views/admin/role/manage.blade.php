@extends('layouts.app')

@section('content')
@section('select_role', 'active')
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Role</h6>
                        <a class="btn btn-primary" href="{{ route('roles.create') }}">Add new</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Name</th>
                                    <th scope="col">Guard</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($roles))
                               @foreach( $roles as $role )
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->guard_name }}</td>
                                    <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('roles.edit', $role->id) }}">Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('role.delete', $role) }}">Delete</a></li>
                                            </ul>
                                        </div>
                                       </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $roles->links('pagination::bootstrap-5') }}
@endsection
