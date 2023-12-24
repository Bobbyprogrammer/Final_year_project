<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function change_password(){
    return view('profile.change_password');
    }

    public function update_change_password(Request $request){

  $user=User::getSingle(Auth::user()->id);

  if(Hash::check($request->old_password,$user->password)){

  $user->password=Hash::make($request->new_password);
  $user->save();
    return redirect('admin/change_password')->with('status',' Password successfully updated');
  }
  else{
  return redirect('admin/change_password')->with('status','Old Password is not Correct');
  }
    
    }
}
