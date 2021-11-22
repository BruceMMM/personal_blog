<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin-panel.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin-panel.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' =>'required',
        ]);
        $image =$request->image;
        $imageName = uniqid().'_'.$image->getClientOriginalName();

        $image->storeAs('public/post-images',$imageName);
        Post::create([
            'category_id' => $request->category_id,
            'image' => $imageName,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect('admin/posts')->with('successMsg', 'You have successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments =Comment::where('post_id',$id)->get();
        return view('admin-panel.post.comment',compact('comments'));
    }

    public function showHideComment($id)
    {
        $comment = Comment::find($id);
        if($comment->status == 'show'){
            $comment->update([
                'status' => 'hide',
            ]);
        }else{
            $comment->update([
                'status' => 'show',
            ]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post =Post::find($id);
        return view('admin-panel.post.edit',compact('categories','post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        if($request->hasFile('image')){
            $postimage =$post->image;

            File::delete('storage/post-images/'.$postimage);
            $image = $request->image;
            $imageName = uniqid().'_'.$image->getClientOriginalName();

            $image->storeAs('public/post-images',$imageName);
            $data['image'] = $imageName;
        }
        $post->update($data);
        return redirect('admin/posts')->with('successMsg', 'You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $postimage = $post->image;
        File::delete('storage/post-images/'.$postimage);

        $post->delete();
        return redirect('admin/posts')->with('successMsg', 'You have successfully deleted!');
    }

}
