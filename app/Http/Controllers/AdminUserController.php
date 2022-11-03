<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admins.profile.index', ['sided' => false]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg',
            'remove-image' => 'in:true,false',
            'about' => 'required|string',
            'phone_number' => 'required|max:13',
            'email' => 'required|email'
        ]);

        if ($request->get('remove-image') == 'true') {
            dd($user->getFirstMedia('profile-images'));
            $user->getFirstMedia('profile-images')?->delete();
        }

        if ($request->hasFile('image')) {
            if ($user->hasMedia('profile-images'))
                $user->getFirstMedia('profile-images')->delete();
            $user->addMediaFromRequest('image')->toMediaCollection('profile-images');
        }
        $validatedData = Arr::except($validatedData, ['remove-image', 'image']);
        User::where('id', $user->id)->update($validatedData);
        return redirect()->back()->with('alert', ['type' => 'success', 'message' => 'Data updated!']);
    }

    public function change_password(Request $request)
    {
        // dd($request->all());

        $rules = [
            'password' => 'required',
            'newpassword' => 'required',
            'newpassword_confirmation' => 'required|same:newpassword'
        ];

        $messages = [
            'newpassword_confirmation.same' => 'This field must match the password above.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->messages());
        if (!Hash::check($request->password, Auth::user()->getAuthPassword()))
            return redirect()->back()->withErrors(['password' => "The password is not match with our records!"]);
        if (Hash::check($request->newpassword, Auth::user()->getAuthPassword()))
            return redirect()->back()->withErrors(['newpassword' => "The password can not be the same as the old password!"]);
        Auth::user()->update(['password' => Hash::make($request->newpassword)]);
        return back()->with('alert', ['type' => 'success', 'message' => 'Password changed']);
    }
}