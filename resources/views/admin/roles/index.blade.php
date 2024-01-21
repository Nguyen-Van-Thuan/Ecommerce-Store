{{-- Hiển thị ra các list --}}
@extends('admin.layouts.app')
@section('title', 'Roles')

@section('content')
    <div class="card">
        <h1>Role list</h1>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Display Name</th>
                </tr>

                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                    </tr>
                @endforeach
            </table>
            {{ $roles->links() }}

        </div>
    </div>
@endsection
