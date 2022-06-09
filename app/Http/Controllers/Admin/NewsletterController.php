<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter =  Newsletter::orderBy('created_at', 'ASC')->get();
        return view('admin.newsletter.index', compact('newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate(
            [
                'message' => 'required'

            ]
        );
        $details = [
            'Message' => $request->message,
        ];
        try {
            if ($request->chk == null) {
                $newsletter = Newsletter::get();
                foreach ($newsletter as $item) {
                    \Mail::to($item->email)->send(new \App\Mail\NewsletterMail($details));
                }
            } else {
                
                foreach ($request->chk as $item) {
                    $newsletter = Newsletter::find($item);
                    \Mail::to($newsletter->email)->send(new \App\Mail\NewsletterMail($details));
                }
            }
            return back()->with('success', 'Your Email sent!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $newsletter = Newsletter::find($request->id);
        $newsletter->delete();
        return response(['message' => 'Newsletter delete successfully']);
    }
}
