@extends('admin-panel.master')

@section('title', 'Post')

@section('content')

    <div class="conntainer">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Post Create Form</div>
                    </div>
                    <form action="{{ url('admin/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                    {{ $post->category_id == $category->id ? 'selected' : '' }}
                                    >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Image</label><br>
                                <input type="file" name="image" class="mb-2 @error('image')is-invalid @enderror"><br>
                                <img src="{{ asset('storage/post-images/'.$post->image) }}" style="width:100px; border:1px solid gray" alt="">
                                <br>
                                @error('image')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Title</label><br>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $post->title }}" placeholder="Enter Post Title">
                                @error('title')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Content</label><br>
                                <textarea name="content" rows="4" class="form-control @error('content') is-invalid @enderror" placeholder="Message........">{{old('content')?? $post->content}}</textarea>

                                @error('content')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
