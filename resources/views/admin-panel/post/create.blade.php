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
                    <form action="{{ url('admin/posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Image</label><br>
                                <input type="file" name="image" class="">
                                <br>
                                @error('image')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Title</label><br>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="Enter Post Title">
                                @error('title')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Content</label><br>
                                <textarea name="content" rows="4" class="form-control @error('content') is-invalid @enderror" placeholder="Message........">{{old('content')}}</textarea>

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
