@extends('ui-panel.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                @foreach($posts as $post)
                <div class="post">
                    <img src="{{ asset('storage/post-images/'.$post->image) }}" alt="" style="width:100%; height:400px; border:1px solid gray;">

                    <br><br>
                        <h5><strong>{{ $post->title }}</strong></h5>
                    <br>
                    <p>
                        {{ substr($post->content,0,300) }}
                    </p>
                    <a href="{{ url('posts/'.$post->id.'/postdetail') }}">
                        <button class="custom-btn see-more-btn">See More <i class="fas fa-angle-double-right"></i> </button>
                    </a>
                </div>
                @endforeach
                {{ $posts->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="siderbar">
                <form action="{{ url('/search_posts')}}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <button type="submit" class="btn btn-success">
                        <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </form>
                <hr>
                <h5>Categories</h5>
                <ul>
                    @foreach($categories as $category)
                    <li> <a href="{{url('/search_posts_by_category/'.$category->id)}}">{{ $category->name }}</a> </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
<br>
@endsection
