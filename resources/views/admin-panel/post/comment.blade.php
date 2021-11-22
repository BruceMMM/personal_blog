@extends('admin-panel.master')

@section('title','Post Comment')

@section('content')

    <div class="container">
        <div class="row">
           <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <div class="card-title">Comments</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered talble-hover">
                           @if($comments->count() < 1)
                                No Comment
                           @else
                                @foreach($comments as $index => $comment )
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $comment->text }}</td>
                                    <td>
                                        <form action="{{ url('admin/comments/'.$comment->id.'/show_hide') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm
                                            {{ $comment->status == 'show' ? 'btn-danger' : 'btn-success' }}">
                                                <i class="far fa-edit">
                                                    {{ $comment->status == 'show' ? 'Hide' : 'Show'}}
                                                </i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
           </div>
        </div>
    </div>

@endsection
