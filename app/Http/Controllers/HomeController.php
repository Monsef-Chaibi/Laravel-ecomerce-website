<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Admindashboard(){
        return view('/admin/Dashboard');
    }
    public function Profile(){
        $user= User::where('is_admin', 1)->get();
        return view('/admin/Profile')->with('user',$user);
    }
    public function ModifierProfil(Request $request){
        $request->validate([
          'name' => 'required',
          'email'=> 'required' ,
        ]); 
        Auth::user()->name=$request->name;
        Auth::user()->email=$request->email;
        if($request->password){
        Auth::user()->password=Hash::make($request->password);
        }
        Auth::user()->update();
        return redirect('/Profile')->with('success','Admin modifie avec succes .....');
}     
    public function User(){
        $user=User::where('is_admin', 0)->get();
        return view('admin/client/index')->with('user',$user);
    }
    public function BlockUser($iduser){
        $user=User::find($iduser);
        $user->is_block=1;
        $user->update();
        return redirect()->back();
    }
    public function ActiveUser($iduser){
        $user=User::find($iduser);
        $user->is_block=0;
        $user->update();
        return redirect()->back();
    }
}
