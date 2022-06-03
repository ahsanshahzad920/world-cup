<?php

namespace App\Http\Controllers\Admin;

use App\Guideline;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuidelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guideline = Guideline::orderBy('id', 'ASC')->get();
        return view('admin/guideline.index', compact('guideline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/guideline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guideline = new Guideline;
        $guideline->heading = $request->heading;
        $guideline->description = $request->description;
        $guideline->save();
        return redirect('admin/guideline')->with('success', 'Play & guideline has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guideline  $guideline
     * @return \Illuminate\Http\Response
     */
    public function show(Guideline $guideline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guideline  $guideline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guideline = Guideline::find($id);
        return view('admin/guideline.edit', compact('guideline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guideline  $guideline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $guideline = Guideline::find($id);
        $guideline->heading = $request->heading;
        $guideline->description = $request->description;
        $guideline->update();
        return redirect('admin/guideline')->with('success', 'Play & Guideline has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guideline  $guideline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guideline $guideline)
    {
        $guideline->delete();

        return back()->with('success', 'Play & Guideline has deleted!');
    }
}
