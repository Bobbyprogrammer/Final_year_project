<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function dashboard(){
    
        if(Auth::user()->user_type==1){
    return view('admin.dashboard');
   }
   else if(Auth::user()->user_type==2){
    return view('supervisor.dashboard');
}
else if(Auth::user()->user_type==3){
    return view('admin.dashboard');
   
}
 }
}
