<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\post;
use App\Models\comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function showpost()
    {
        // Fetch the posts with formatted created_at date and truncated details
        $posts = DB::table('posts')
                    ->select('id', 'title','catagory','image','slug' ,DB::raw('SUBSTRING(details, 1, 120) as truncated_details'), DB::raw('DATE(created_at) as created_date'))
                    ->paginate(4);
        // dd($posts);
        // Pass the data to the view
        return view('welcome',compact('posts'));
    }
    public function add(){
        return view('form');
    }
    public function postsubmit(Request $request){
        $request->validate([
            'title' => 'required|max:255|unique:posts',
            'catagory'=>'required',
            'details'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        $user=Auth::user();
        $post = new post;
        $post->title = $request->title;
        $post->catagory = $request->catagory;
        $post->details = $request->details;
        $post->user_id = $user->id;
        $post->image = $fileName;
        $post->save();
        if($post){
            $request->session()->flash('status', 'your post submit successfully!');
            return redirect()-> route('home');
        }
        return route('addblog')->flash('status',error);
    }
    

    public function postshow($slug)
    {
        // Fetch the post with the related user using the slug
        $post = Post::with('user','comments.user')->where('slug', $slug)->firstOrFail();
        return view('showpost', compact('post'));
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post_id = $postId;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->route('posts.show',['slug' => Post::findOrFail($postId)->slug]);
    }

    public function deleteComment(Request $request,$commentId)
    {
        $comment = comment::find($commentId);
        $postId = $comment->post_id;
        $comment->delete();
        return redirect()->route('posts.show',['slug' => Post::findOrFail($postId)->slug]);
    }
}
