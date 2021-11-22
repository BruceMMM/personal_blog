@extends('admin-panel.master')

@section('title' ,'Skill Create')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Category Create</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/categories') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="" >Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Category Name">
                                @error('name')
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
