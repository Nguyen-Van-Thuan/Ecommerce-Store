@extends('admin.layouts.app')
@section('title', 'Users')

@section('content')
    <div class="card">
        <h1>User list</h1>
        @if (session('message'))
            <h1 class="text-primary">{{ session('message') }}</h1>
        @endif
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>

                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ $item->images->count() > 0 ? asset('upload/' . $item->images->first()->url) : 'upload/default.png' }}" width="100px" height="100px" alt="" style="object-fit: cover"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td class="d-flex gap-3">
                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning ">Edit</a>
                            <form action="{{ route('users.destroy', $item->id) }}" id="form-delete{{ $item->id }}" method="post">
                                @csrf
                                @method('delete')
                            </form>

                            <button class="btn btn-delete btn-danger" data-id={{ $item->id }}>Delete</button>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $users->links() }}

        </div>
    </div>
@endsection




{{-- @method('delete') được sử dụng trong Laravel để xác định rằng một form sẽ sử dụng phương thức HTTP DELETE khi gửi đi. Điều này cần thiết khi trình duyệt không hỗ trợ trực tiếp phương thức DELETE trong form HTML. Điều này giúp Laravel nhận biết và xử lý yêu cầu xóa một cách chính xác. --}}
