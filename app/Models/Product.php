<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function categories(){


        return $this->blongsTo(Category::class,'id_categorie','id');

    }
    function lignecommande(){
        return $this->hasMany(lignecommande::class,'id_produit','id');
    }

}
