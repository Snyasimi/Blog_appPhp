<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comments;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blog::all();

	    return view('Blog.index',['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Blog $blog)
    {
        
        $request->validate([
            'title'=>['required','max:255'],
            'description'=>'required',
            'blog_body'=>'required'
        ]);
       
        $user = $request->user();
    	$blog->user_id = $user->id;
        $blog->blog_title = $request->input('title');
	    $blog->blog_description = $request->input('description');
	    $blog->blog_body = $request->input('blog_body');
        $blog->likes = 0;
	    $blog->save();

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        
        $blog = Blog::findorfail($id);
        $comments = Blog::findorfail($id)->comment;

            return view('Blog.show',['blog'=>$blog,'comments'=>$comments]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //EDITING BLOG
        
        return view('Blog.edit',['blog'=>Blog::findorfail($id)]);
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
        $request->validate([
            'blog_title'=>['required','max:255'],
            'blog_description'=>'required',
            'blog_body'=>'required'
        ]);

        $blog = Blog::findorfail($id);
        $blog->blog_title = $request->input('blog_title');
        $blog->blog_description = $request->input('blog_description');
        $blog->blog_body = $request->input('blog_body');

        $blog->save();
        return redirect(route('profile.show',$request->user()->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findorfail($id);
        $blog->delete();

        return redirect(route('profile.index'));

    }
}
