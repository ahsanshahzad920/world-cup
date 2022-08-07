<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::orderBy('id', 'ASC')->get();
        return view('admin/media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/media.create');
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
                'name' => 'required|max:255',
                'link' => 'required|max:255',
                'icon' => 'required|max:255'
            ]
        );
        $media = new Media;
        $media->name = $request->name;
        $media->link = $request->link;
        $media->icon = $request->icon;
        $media->save();
        return redirect('admin/media')->with('success', 'Social Media has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::find($id);
        return view('admin/media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'link' => 'required|max:255',
                'icon' => 'required|max:255'
            ]
        );
        $media = Media::find($id);
        $media->name = $request->name;
        $media->link = $request->link;
        $media->icon = $request->icon;
        $media->update();
        return redirect('admin/media')->with('success', 'Social Media has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $media = Media::find($request->id);
        $media->delete();

        return back()->with('success', 'Social Media has deleted!');
    }
}
