<?php

namespace App\Http\Controllers;
use App\Models\Comandes;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function UserDashboard(){
        return view('user/dashboard');
    }
    public function UserProfile(){
        return view('user/profile');
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
        return redirect('/ProfileUser')->with('success','User modifie avec succes .....');
}     
public function Cart(){
    $categorie=Category::all();
    $commande=Comandes::where('id_user', Auth::user()->id)->where('etat','en cours')->first();
    return view('user/cart')->with('categorie',$categorie)->with('commande',$commande);
}
public function Check(Request $request){
    $commande=Comandes::find($request->commande);
    $commande->etat="payee";
    $commande->update();
    return redirect('/')->with('success','Succes Paid');

}
}
