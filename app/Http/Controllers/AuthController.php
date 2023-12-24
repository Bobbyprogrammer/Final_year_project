<?php

namespace App\Http\Controllers;
use Hash;
use Auth;
use App\Models\User;
use Mail;
use Str;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login(){
 //dd(Hash::make(12345));

    return view('auth.login');
    
    }

    public function Auth_login(Request $request){
$request->validate([
'email'=> 'required|email',
'password'=>'required',
]);


    $remember=!empty($request->remember) ? true : false;

    if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
   
   if(Auth::user()->user_type==1){
    return redirect('admin/dashboard');
   }
   else if(Auth::user()->user_type==2){
    return redirect('supervisor/dashboard');
}
else if(Auth::user()->user_type==3){
    return redirect('student/dashboard');
   
}

   

    }
    else{
    return redirect()->back()->with('error','Please Enter Correct Email and Password');
    }
    }
               public function forgot_password(){
                return view('auth.forgot');
                }
                                          
       public function post_forgot_password(Request $request){
         $user=User::getEmailSingle($request->email);
               if(!empty($user))
                 {
  $user->remember_token=Str::random(30);
  $user->save();
    Mail::to($user->email)->send(new ForgotPasswordMail($user));
    return redirect()->back()->with('success',"Please reset your email");
  }
  else{
  return redirect()->back()->with('error',"Email not Found");
  }
    }

    public function reset($remember_token){
        $user=User::getTokenSingle($remember_token);
if(!empty($user))
{
$data['user']=$user;
return view('auth.reset',$data);
}
else{
abort(404);
}
    }

    public function Auth_logout(){
    Auth::logout();
    return redirect(url('login'));
    }


}
