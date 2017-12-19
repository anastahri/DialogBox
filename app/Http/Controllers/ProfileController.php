<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
	public function profile($username) 
	{
		$user = User::whereUsername($username)->first();
		if ($user) return view('user.profile', compact('user'));
		abort(404);
	}

	public function edit($username) 
	{
		$user = User::whereUsername($username)->first();
		if ($user) {
			if (Auth::id() == $user->id) return view('user.edit', compact('user', $username));
			abort(401,'Unauthorized access.');
		}
		abort(404);
	}

    public function update(Request $request, $username)
    {
		$user = User::whereUsername($username)->first();
		if (Auth::id() != $user->id) abort(401,'Unauthorized access.');
		$validator = Validator::make($request->all(), [
		    'name' => 'required|string|max:255',
		    'email' => [
		        'required',
		        Rule::unique('users')->ignore($user->id),
		    ],
		])->validate();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        return redirect('/profile/' .$username)->with('success', 'Profile updated!');
    }
    
    public function edit_password($username) 
	{
		$user = User::whereUsername($username)->first();
		if ($user) {
			if (Auth::id() == $user->id) return view('user.password', compact('user', $username));
			abort(401,'Unauthorized access.');
		}
		abort(404);
	}

    public function update_password(Request $request, $username)
    {
		$user = User::whereUsername($username)->first();
		if (Auth::id() != $user->id) abort(401,'Unauthorized access.');
        $this->validate(request(), [
			'old_password' => 'required', 
			'new_password' => 'required|string|min:6|confirmed'
        ]);
        if (!Hash::check($request->get('old_password'), $user->password))
        	return back()->with('error', 'Current password was incorrect!');	
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect('/profile/' .$username)->with('success', 'Password updated!');
    }
}