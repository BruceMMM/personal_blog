@extends('admin-panel.master')

@section('title', 'Edit User')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User Edit</div>
                    </div>
                    <div class="card-body">
                    <form action="{{ url('admin/users/'.$user->id.'/update') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value=" {{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="admin"
                                @if($user->status == 'admin') selected @endif
                                >Admin</option>
                                <option value="user"
                                @if($user->status == 'user') selected @endif>User</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection
