<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{
    public function create()
    {
        return view('client.changePassword');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        $validation = $request->validate(
            [
                'password' => 'required|string|min:8|confirmed'
            ]
        );
        $user = User::find(Auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->update();
        // auth()->user()->update(['password' => $request->input('password')]);

        return redirect()->back()->with('success','Password changed successfully.');
    }
}
