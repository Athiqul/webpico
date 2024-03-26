<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validate=Validator::make($request->all(),[
            'current_password' => ['required'],
            'password' => ['required', Password::defaults(),'confirmed'],
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput()->with(['toast-type'=>'warning','toast-message'=>'Some issue! please fix and try again!']);
        }

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with(['toast-type'=>'success','toast-message'=>'Password has been updated']);
    }
}
