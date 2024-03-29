@extends('admin.layouts.app')
@section('title', 'Roles')

@section('content')
    <div class="card">
        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <h1>Role list</h1>
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Action</th>
                </tr>

                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td class="d-flex gap-3">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning ">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" id="form-delete{{ $role->id }}"
                                method="post">
                                @csrf
                                @method('delete')
                            </form>

                            <button class="btn btn-delete btn-danger" data-id={{ $role->id }}>Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $roles->links() }}

        </div>
    </div>
@endsection



{{-- @method('delete') được sử dụng trong Laravel để xác định rằng một form sẽ sử dụng phương thức HTTP DELETE khi gửi đi. Điều này cần thiết khi trình duyệt không hỗ trợ trực tiếp phương thức DELETE trong form HTML. Điều này giúp Laravel nhận biết và xử lý yêu cầu xóa một cách chính xác. --}}
