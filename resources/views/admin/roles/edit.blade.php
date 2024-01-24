@extends('admin.layouts.app')
@section('title', 'Edit Roles ' . $role->name)

@section('content')
    <div class="card">
        <h2>Edit Role</h2>

        <div>
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="input-group input-group-static mb-4">
                    <label>Name</label>
                    <input type="text" value="{{ old('name') ?? $role->name }}" name="name" class="form-control">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label>Display Name</label>
                    <input type="text" value="{{ old('display_name') ?? $role->display_name }}" name="display_name"
                        class="form-control">

                    @error('display_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group input-group-static mb-4">
                    <label class="ms-0">Group</label>
                    <select name="group" class="form-control" value = "{{ $role->group }}">
                        <option value="system">System</option>
                        <option value="user">User</option>
                    </select>

                    @error('group')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <h4>Permission</h4>
                    <div class="row">
                        @foreach ($permissions as $groupName => $permission)
                            <div class="col-6">
                                <h6>{{ $groupName }}</h6>
                                <div>
                                    @foreach ($permission as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                                {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                                value="{{ $item->id }}">
                                            <label class="custom-control-label" for="customCheck1">
                                                {{ $item->display_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <button type="submit" class="btn btn-submit btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
@endsection



{{-- name="permision_id[]" là cách đặt tên cho các ô checkbox trong form. Khi người dùng chọn nhiều ô, dữ liệu sẽ được gửi về server dưới dạng một mảng, giúp bạn dễ dàng xử lý và lưu trữ nhiều giá trị cùng một lúc. --}}
