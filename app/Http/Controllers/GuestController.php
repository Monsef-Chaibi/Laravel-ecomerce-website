<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function home(){
        $produits= Product::all();
        $categories=Category::all();
        return view('guest/home')->with('produits',$produits)->with('categories',$categories);
    }
    public function ProduitsDetail($id)
    {
        $produit=Product::find($id);
        $produits=Product::where('id', "!=",$id)->get();
        $categories=Category::all();
        return view("guest/produitDetail")->with('categories',$categories)->with('produit',$produit)->with('produits',$produits);
    }
    public function Shop($idcategorie)
    {
        $categories=Category::find($idcategorie);
        $produit= Product::where('id_categorie', $idcategorie)->get();
        return view("guest/categorieProduit")->with('categories',$categories)->with('produit',$produit);
    }
    public function Search(Request $request)
    {   $categories=Category::all();
        $produits= Product::where('name','LIKE','%'.$request->search_name.'%')->get();
        return view("guest/categorieProduit")->with('categories',$categories)->with('produit',$produits);
        
    }
}
