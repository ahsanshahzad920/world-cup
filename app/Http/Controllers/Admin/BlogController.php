<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('id', 'ASC')->get();
        return view('admin/blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'author' => 'required',
                'author_image' => 'required|max:10248',
                'description' => 'required'
            ]
        );
        $blog = new Blog;
        if ($request->hasfile('author_image')) {
            $file = $request->file('author_image');
            $upload = 'uploads/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $blog->author_image =  $upload . $filename;
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'uploads/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $blog->image =  $upload . $filename;
        }
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->save();
        return redirect('admin/blog')->with('success', 'Blog has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin/blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'author' => 'required',
                'description' => 'required',
            ]
        );
        $blog = Blog::find($id);
        if ($request->hasfile('author_image')) {
            $file = $request->file('author_image');
            $upload = 'uploads/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $blog->author_image =  $upload . $filename;
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'uploads/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $blog->image =  $upload . $filename;
        }
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->update();
        return redirect('admin/blog')->with('success', 'Blog has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back()->with('success', 'Blog has deleted!');
    }
}
