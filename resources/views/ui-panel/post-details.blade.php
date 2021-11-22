@extends('ui-panel.master')

@section('title','Post Detail')

@section('content')

    <div class="post-details row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <img src="{{asset('storage/post-images/'.$post->image)}}" alt="" style="width:100%; height:400px; border:1px solid gray">
            <br><br>
            <small>
                <strong>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    Posted On:
                </strong>
                    {{ date('d-M-Y',strtotime($post->created_at)) }}
            </small>
            <br>

            <small>
                <strong>
                    <i class="fa fa-list"></i> Category:
                </strong>
                {{ $post->category->name }}
            </small>
            <br><br>
            <h5><strong>{{ $post->title }}</strong></h5>
            <p style="text-align: justify;">
            {{ $post->content }}
            </p>
            <div>
                <form action="" method="POST">
                    @csrf
                    <div>
                        <span>{{ $likes->count() }} like</span> &nbsp;&nbsp;
                        <span>{{ $dislikes->count() }} dislike</span>&nbsp;&nbsp;
                        <span>{{ count($comments) }} comment</span>
                    </div>
                    <button type="submit" formaction="{{ url('/post/like/'.$post->id) }}" class="btn btn-sm btn-success like"
                    @if($LikeStatus)
                        @if($LikeStatus->type == 'like')
                        disabled
                        @endif
                    @endif>
                    <i class="far fa-thumbs-up"></i> Like
                    </button>
                    <button type="submit" formaction="{{ url('/post/dislike/'.$post->id) }}" class="btn btn-sm btn-danger dislike"
                    @if($LikeStatus)
                        @if($LikeStatus->type == 'dislike')
                        disabled
                        @endif
                    @endif>
                        <i class="far fa-thumbs-down"></i> Disike
                    </button>
                    <button type="button" class="btn btn-sm btn-info comment" data-toggle="collapse" data-target="#collapseExample">
                        <i class="far fa-comment"></i> Comment
                    </button>
                </form>
            </div>
            <br>
            <div class="comment-form">
                <div class="collapse" id="collapseExample">
                    <form action="{{ url('/post/comment/'.$post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="text" id="" cols="30" rows="3" required></textarea>
                            <br>
                            <button type='submit' class="btn btn-primary btn-sm" >
                                <i class="far fa-paper-plane"></i> Submit
                            </button>
                        </div>
                    </form>
                    <br>
                    @foreach($comments as $comment)
                    <div class="comment-show">
                        <img src="https://pluspng.com/img-png/user-png-icon-male-user-icon-512.png" alt="" width="30px">
                        {{ $comment->user->name }}
                        <div class=" comment-box mt-2">
                            {{ $comment->text }}
                        </div>
                    </div>
                    <br>
                    @endforeach
                    </div>
            </div>
        </div>
    </div>

@endsection
