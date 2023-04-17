<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // affiche la list des categorie
    public function index(){
        $categories= Category::all();
        return view('admin/categories/index')->with('categories',$categories);
    }
    // add categorie 
    public function AddCategorie(Request $request){
        $request->validate([
          'name' => 'required',
          'description'=> 'required'  
        ]);

        $category = new Category();
        $category->name=$request->name;
        $category->description=$request->description;
        if($category->save())
        {
            return redirect()->back();
        } 
        else {
            echo 'Error';
        }
    }
    // delete categorie
    public function DeleteCategorie($id){
        $categorie = Category::find($id);
        if( $categorie->delete() ){
            return redirect()->back();
        }
        else {
            echo 'Error';
        }
    }
    public function ModifierCategorie(Request $request){
        $request->validate([
          'name' => 'required',
          'description'=> 'required'  
        ]);
        $id=$request->id_categorie;
        $categorie=Category::find($id);
        $categorie->name=$request->name;
        $categorie->description=$request->description;
        if($categorie->update())
        {
            return redirect()->back();
        } 
        else {
            echo 'Error';
        }
    }
}
