<?php

namespace App\Http\Controllers;
use App\Models\Comandes;
use App\Models\Category;
use App\Models\Facture;
use PDF;
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
public function CheckView(){
  $categorie=Category::all();
  $commande=Comandes::where('id_user', Auth::user()->id)->where('etat','en cours')->first();
  return view('user/checkout')->with('categorie',$categorie)->with('commande',$commande);
}
public function Check(Request $request){
    $request->validate([
        'name1' => 'required',
        'name2' => 'required',
        'email'=> 'required' ,
        'mob'=> 'required' ,
        'adress'=> 'required' ,
        'country'=> 'required' ,
        'city'=> 'required' ,
      ]); 
      $facture = new Facture();
      $facture->name1=$request->name1;
      $facture->name2=$request->name2;
      $facture->email=$request->email;
      $facture->mob=$request->mob;
      $facture->adress=$request->adress;
      $facture->country=$request->country;
      $facture->city=$request->city;
      $facture->id_commande	=$request->commande;
      $facture->save();
      $commande=Comandes::find($request->commande);
      $commande->etat="payee";
      $commande->update();
      return redirect('/')->with('success','Succes Paid');
    }
    
    public function generatePDF()
       {
        $facture=Facture::latest()->first();
        $commande=Comandes::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->first();
           $data = [
               'title' => 'Facture',
               'date' => date('m/d/Y'),
               'commande'=> $commande,
               'name1'=> $facture->name1,
               'name2'=> $facture->name2,
               'email'=> $facture->email,
               'mob'=> $facture->mob,
               'country'=> $facture->country,
               'adress'=> $facture->adress,
               'city'=> $facture->city,
               
           ];
             
           $pdf = PDF::loadView('myPDF', $data);
       
           return $pdf->download('Facture.pdf');
       }
       public function MessageBlock(){
        return view('user/Block');
       }
}
