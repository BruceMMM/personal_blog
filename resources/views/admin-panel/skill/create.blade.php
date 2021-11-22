@extends('admin-panel.master')

@section('title' ,'Skill Create')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Skill Create</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/skills') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="" >Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Skill Name">
                                @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Percent</label>
                                <input type="text" name="percent" class="form-control @error('percent')is-invalid @enderror" value="{{ old('percent') }}" placeholder="Enter Skill Percent">
                                @error('percent')
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
