@extends('admin-panel.master')

@section('title', 'Skill index')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-6">
                            <h5>Category</h5>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('admin/categories/create') }}" class="btn btn-primary btn-sm float-right">
                                <i class="fa fa-plus-circle"> Add New</i>
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session('successMsg'))
                        <div class="alert alert-dismissible show fade alert-success">
                            <div>{{ Session('successMsg') }}</div>
                            <button class="close" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th></th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + $categories->firstItem() }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <a href="{{ url('admin/categories/'.$category->id.'/edit') }}" class="btn btn-success">
                                                    <i class="far fa-edit"> Edit</i>
                                                </a>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"> Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $categories->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
