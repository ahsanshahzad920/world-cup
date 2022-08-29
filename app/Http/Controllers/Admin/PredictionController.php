<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Prediction;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function index()
    {
        $prediction = Prediction::orderBy('tournament_id','DESC')->get();
        return view('admin/prediction.index',compact('prediction'));
    }
    public function update(Request $request, $id)
    {
        $prediction = Prediction::find($id);
        $prediction->allow =0;
        $prediction->update();
        return back();
    }
}
