<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $country = Country::orderBy('name', 'ASC')->get();
        return view('admin/users.profile', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'profession' => 'required|max:255',
                'address' => 'required|max:255',
                'city' => 'required|max:255',
                'postcode' => 'required|max:255',
                'bio' => 'required'
            ]
        );
        //dd('asdsad');
        $user = User::find($id);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $upload = 'uploads';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload . $filename);
            $user->image =  $upload . $filename;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->website = $request->website;
        $user->profession = $request->profession;
        $user->address = $request->address;
        $user->city = $request->city;
        // $user->country_id = $request->country;
        $user->postcode = $request->postcode;
        $user->bio = $request->bio;
        // 
        // $user->level = $request->level;
        // $user->active_flag = $request->active_flag;
        // $user->id_ERP_customer_1 = $request->id_ERP_customer_1;
        // $user->id_ERP_customer_2 = $request->id_ERP_customer_2;
        // $user->id_ERP_customer_3 = $request->id_ERP_customer_3;
        // $user->RFC = $request->RFC;
        // $user->business_name = $request->business_name;
        // $user->user_ip = $request->user_ip;
        $user->update();
        return back()->with('success', 'Profile has updated!');
    }
}
