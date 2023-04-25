<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    // affiche la list des produits
    public function index(){
        $produits= Product::all();
        $categories=Category::all();
        return view('admin/produits/index')->with('produits',$produits)->with('categories',$categories);
    }
    // add categorie 
    public function AddProduit(Request $request){
        $request->validate([
          'name' => 'required',
          'description'=> 'required' ,
          'categorie_select'=>'required',
          'prix'=> 'required' , 
          'qte'=> 'required'  ,
          'image'=> 'required'  
        ]);

        $produit = new Product();
        $produit->name=$request->name;
        $produit->description=$request->description;
        $produit->prix=$request->prix;
        $produit->qte=$request->qte;
        $produit->id_categorie=$request->categorie_select;
        // image upload
        $newname = uniqid();
        $image = $request->file('image');
        $newname.=".". $image->getClientOriginalExtension();
        $destinationPath='Image_upload';
        $produit->image=$newname;
        
        if($produit->save())
        {
            $image->move($destinationPath, $newname);
            return redirect()->back();
        } 
        else {
            echo 'Error';
        }
    }
    // delete PRODUITS
    public function DeleteProduit($id){
        $produit=Product::find($id);
        $file_path = public_path().'/Image_upload/'.$produit->image;
        unlink($file_path);
        if( $produit->delete()){
            return redirect()->back();
        }
        else {
            echo 'Error';
        }
    }
    public function ModifierProduit(Request $request){
        $request->validate([
          'name' => 'required',
          'description'=> 'required' ,
          'prix'=> 'required' , 
          'qte'=> 'required'  ,
        ]);
        $id=$request->id_produit;
        $produit=Product::find($id);
        $produit->name=$request->name;
        $produit->description=$request->description;
        $produit->qte=$request->qte;
        $produit->prix=$request->prix;
        $produit->id_categorie=$request->categorie_select;
        // dd($request->image);
        if( $request->image){
            //suprimer encien photo
            $file_path = public_path().'/Image_upload/'.$produit->image;
            unlink($file_path);
            // uploade new image
            $newname = uniqid();
            $image = $request->file('image');
            $newname.=".".$image->getClientOriginalExtension();
            $destinationPath='Image_upload';
            $image->move($destinationPath, $newname);
            $produit->image=$newname;
        }
        if($produit->update())
        {
            return redirect()->back();
        } 
        else {
            echo 'Error';
        }
    }
}
