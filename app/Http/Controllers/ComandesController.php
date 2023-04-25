<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Comandes;
use App\Models\LigneComandes;
use Illuminate\Http\Request;

class ComandesController extends Controller
{
    public function AddCommande(Request $request){
        //verify les command en cour
        $commande=Comandes::where('id_user', Auth::user()->id)->where('etat','en cours')->first();
        $countlignecommande = LigneComandes::all();
        $countlignecommande = $countlignecommande->count();
        if($commande){
            //if produits exists
            $ex=false;
            foreach ($commande->lignecommandes as $lc)
            {
                if($lc->id_produit==$request->idproduit)
                {
                    $ex=true;
                    $lc->qte+=$request->quantity;
                    $lc->update();
                }
            }
            if(!$ex)
            {

                $lc=new LigneComandes;
                $lc->qte=$request->quantity;
                $lc->id_produit=$request->idproduit;
                $lc->id_commande=$commande->id;
                $lc->save();
            }

            return redirect()->route('/')->with('success','User modifie avec succes .....')->with('countlignecommande',$countlignecommande);

        }
        else{
        $commande=new Comandes();
        $commande->id_user=Auth::user()->id;
        if($commande->save()){

            //ligneCommande
            $lc=new LigneComandes;
            $lc->qte=$request->quantity;
            $lc->id_produit=$request->idproduit;
            $lc->id_commande=$commande->id;
            $lc->save();
            return redirect()->route('/')->with('success','User modifie avec succes .....')->with('countlignecommande',$countlignecommande);
        }
        else{
            return redirect()->back();
        }
    }
    }
    public function DeleteComande($idc){
        $lc=LigneComandes::find($idc);
        $lc->delete();
        return redirect()->back();
    }
}
