<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Alert;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexAdmin()
    {
        $user = User::where('id', Auth::user()->id)->first();
		$categories = Category::all();
    	return view('admin.profileAdmin', compact('user', 'categories'));
    }

	public function profilAdmin(Request $request)
    {
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phoneNumber = $request->phoneNumber;
    	$user->address = $request->address;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	alert()->success('Profil berhasil diperbarui', 'Success');
    	return redirect('profileAdmin');
    }
}
