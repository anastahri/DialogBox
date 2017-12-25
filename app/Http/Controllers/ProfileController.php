<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
	public function profile($username) 
	{
		$user = User::whereUsername($username)->first();
		if ($user) {
            $group_array = array();
            $gid = $user->group_id;
            while ($gid) {
                $group = Group::find($gid);
                array_unshift($group_array, $group);
                $gid = $group->group_id;
            }
            $group_count = count($group_array);
            return view('user.profile', compact('user', 'group_array', 'group_count'));
        }
		abort(404);
	}

	public function edit() 
	{
		$user = Auth::user();
		return view('user.edit', compact('user'));
	}

    public function update(Request $request)
    {
		$user = Auth::user();
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
        return redirect('/profile/' .$user->username)->with('success', 'Profile updated!');
    }
    
    public function edit_password() 
	{
		$user = Auth::user();
		return view('user.password', compact('user'));
	}

    public function update_password(Request $request)
    {
		$user = Auth::user();
        $this->validate(request(), [
			'old_password' => 'required', 
			'new_password' => 'required|string|min:6|confirmed'
        ]);
        if (!Hash::check($request->get('old_password'), $user->password))
        	return back()->with('error', 'Current password was incorrect!');	
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect('/profile/' .$user->username)->with('success', 'Password updated!');
    }

    public function update_avatar(Request $request)
    {
    	if($request->hasFile('avatar')){
            $user = Auth::user();
            // Delete current image before uploading new image
            if ($user->avatar !== 'no_img.png') {
                $file = public_path('images/avatars/' . $user->avatar);
                if (File::exists($file)) {
                    unlink($file);
                }
            }
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		$img = Image::make($avatar);
            if ($img->height() > $img->width()) $img->crop($img->width(), $img->width());
            elseif ($img->height() < $img->width()) $img->crop($img->height(), $img->height());
            $img->resize(150, 150);
            $img->save( public_path('/images/avatars/' . $filename ) );
    		
    		$user->avatar = $filename;
    		$user->save();
    		return redirect('/profile/' .$user->username)->with('success', 'Avatar updated!');
    	}
    	return view('/');
    }
}