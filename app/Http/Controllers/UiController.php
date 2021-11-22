<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use App\{Project,Category,Post,LikesDislike,Comment};
use Auth;

class UiController extends Controller
{
    public function index(){
        $skills =Skill::paginate(10);
        $projects = Project::all();
        $posts = Post::latest()->take(3)->get();
        return view('ui-panel.index',compact('skills', 'projects','posts'));
    }
    public function postindex(){
        $categories = Category::all();
        $posts = Post::latest()->paginate(5);
        return view('ui-panel.posts',compact('categories','posts'));
    }
    public function post_deatailIndex($id){

        if(!Auth::check()){
            return redirect()->route('login');
        }

        $post = Post::find($id);
        $likes = LikesDislike::where('post_id',$id)->where('type','like')->get();
        $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get();

        $LikeStatus = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();
        $comments = Comment::where('post_id',$id)->where('status','show')->get();

        return view('ui-panel.post-details',compact('post', 'likes', 'dislikes', 'LikeStatus', 'comments'));
    }
    public function search(Request $request){
        $categories = Category::all();

        $searchData = $request->search;
        $posts =Post::where('title','like',"%".$searchData."%")
        ->orWhere('content','like',"%".$searchData."%")
        ->orWhereHas('category', function($category) use($searchData){
            $category->where('name','like',"%".$searchData."%");
        })
        ->paginate(5);
        return view('ui-panel.posts',compact('posts','categories'));
    }
    public function search_category($catId){
        $categories = Category::all();
        $posts = Post::where('category_id','=',$catId)->paginate(5);
        return view('ui-panel.posts',compact('categories','posts'));
    }
}
