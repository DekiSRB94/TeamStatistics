<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogStore;
use App\Blog;
use App\Comment;
use App\Http\Requests\CommentStore;
use App\Http\Requests\CommentReplyStore;
use App\Comment_reply;

class TeamController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin')->only(['create_blog','store_blog','edit_blog','update_blog', 'destroy_blog', 'destroy_reply']);
    }


    public function index()
    {    
        $blog = Blog::all();

        return view('team.index', compact('blog'));
    }


    public function create_blog()
    {
        return view('team.create_blog');
    }


    public function store_blog(BlogStore $request)
    {
        Blog::create($request->all());

        return redirect('/');
    }


    public function show_blog(Blog $blog_id){
        return view('team.show_blog', ['blog'=>$blog_id]);
    }


    public function edit_blog(Blog $blog_id){
        return view('team.edit_blog', ['blog'=>$blog_id]);
    }


    public function update_blog(BlogStore $request, $blog_id){
        $blog = BLog::findorFail($blog_id);

        $blog->update($request->all());

        return redirect('/show/blog/'. $blog_id);
    }


    public function destroy_blog(Blog $blog_id){
        $blog_id->delete();

        return redirect('/');
    }


    public function store_comment(CommentStore $request, $blog_id)
    {
        $data = $request->all();
        $data['blog_id'] = $blog_id;
        Comment::create($data);

        return redirect('/show/blog/'. $blog_id);
    }


    public function delete_comment(Comment $comment_id, $blog_id){
        $comment_id->delete();

        return redirect('/show/blog/'. $blog_id);
    }


    public function create_reply(Comment $comment_id, $blog_id){
        $blog = Blog::findorFail($blog_id);

        return view('team.create_reply', ['comment'=>$comment_id], compact('blog'));
    }


    public function store_reply(CommentReplyStore $request, $comment_id, $blog_id){
        $data = $request->all();
        $data['comment_id'] = $comment_id;
        Comment_reply::create($data);

        $comment = Comment::where('id', $comment_id)->first();
        $blog_id = $comment->blog_id;

        return redirect('/show/blog/'. $blog_id);
    }


    public function destroy_reply(Comment_reply $reply_id, $blog_id){
        $reply_id->delete();

        return redirect('/show/blog/'. $blog_id);
    }

   
}
