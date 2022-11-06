<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        if(isset($_POST['update'])) {
            $users = User::find(auth()->user()->id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->save();
            return redirect()->to('/profile/');
        }
        elseif(isset($_POST['delete'])) {
            $users = User::find(auth()->user()->id);
            $users->delete();
            return redirect()->to('/login/');
        }
        elseif(isset($_POST['cancel'])) {
            return redirect()->to('/profile/');
        }
    }
}
