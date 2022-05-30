<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('id', 'ASC')->get();
        return view('admin/slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/slider.create');
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
                'heading' => 'required',
                'link' => 'required',
                'description' => 'required',
                'image' => 'required|max:10248'
            ]
        );
        $slider = new Slider;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'uploads/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $slider->image =  $upload . $filename;
        }
        $slider->heading = $request->heading;
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->save();
        return redirect('admin/slider')->with('success', 'Slider has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin/slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'heading' => 'required',
                'link' => 'required',
                'description' => 'required',
            ]
        );
        $slider = Slider::find($id);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'uploads/';
            $filename = time() . $file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $slider->image =  $upload . $filename;
        }
        $slider->heading = $request->heading;
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->update();
        return redirect('admin/slider')->with('success', 'Slider has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return back()->with('success', 'Slider has deleted!');
    }
}
