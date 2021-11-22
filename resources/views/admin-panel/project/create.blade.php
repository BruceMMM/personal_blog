@extends('admin-panel.master')

@section('title' ,'Project')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Project Create</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/projects') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="" >Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Project Name">
                                @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">URL</label>
                                <input type="text" name="url" class="form-control @error('url')is-invalid @enderror" value="{{ old('url') }}" placeholder="Enter Project URL">
                                @error('url')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
