@extends('admin-panel.master')

@section('title', 'Post')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">Post</div>
                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ url('admin/posts/create') }}"class="btn btn-primary btn-sm float-right"><i class="fas fa-plus-circle"> Add New</i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session('successMsg'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div>{{ Session('successMsg') }}</div>
                                <button class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $index => $post)
                                <tr>
                                    <td>{{ $index + $posts->firstItem() }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td><textarea readonly>{{ $post->content }}</textarea></td>
                                    <td>
                                        <form action="{{ url('admin/posts/'.$post->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <a href="{{ url('admin/posts/'.$post->id.'/edit') }}" class="btn btn-sm btn-success"><i class="far fa-edit"> Edit</i></a>
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash"> Delete</i></button>
                                            <a href=" {{ url('admin/posts/'.$post->id) }}" class="btn btn-info btn-sm"><i class="fas fa-comments"> Comment</i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
