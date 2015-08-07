<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\PasswordChangeRequest;
use Auth, Hash;

class ProfileController extends Controller
{
    public function edit() {
        return view('pages.profile.edit');
    }

    public function update(ProfileUpdateRequest $request) {
        Auth::user()->fill($request->only(
            'first_name',
            'last_name',
            'location',
            'phone',
            'show_phone',
            'show_email',
            'newsletter'
        ));

        Auth::user()->save();

        return back()->withSuccess('Profiliniz başarıyla güncellenmiştir');
    }

    public function passwordEdit() {
        return view('pages.profile.password');
    }

    public function passwordUpdate(PasswordChangeRequest $request) {

        if( ! Hash::check($request->input('old_password'), Auth::user()->password)) {
            return redirect()->back()->withErrors(['Şimdiki şifre doğru girilmemiş']);
        }

        Auth::user()->password = $request->input('password');
        Auth::user()->save();
        
        return redirect()->back()->withSuccess('Şifreniz başarıyla güncellenmiştir');       
    }
}
