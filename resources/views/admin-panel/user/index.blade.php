@extends('admin-panel.master')

@section('title', 'User Dashboard')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">User</div>
                    </div>
                    <div class="card-body">
                    @if(Session('successMsg'))

                    <div class="alert alert-success alert-dismissible show fade">
                        <div>{{ Session('successMsg') }}</div>
                        <button class="close" data-dismiss='alert'>&times;</button>
                    </div>

                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->status }}</td>
                            <td>

                                <form action="{{ url('admin/users/'.$user->id.'/delete')}}" method="POST">
                                    @csrf
                                    <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-success"><i class="far fa-edit"></i></a>
                                    <button href="" type="submit" class='btn btn-danger' onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="fas fa-trash"></i>
                                    </button>

                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="card-footer">
                        <!-- {{ $users->links() }} -->

                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
