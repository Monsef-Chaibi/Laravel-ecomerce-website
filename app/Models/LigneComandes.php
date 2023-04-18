<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneComandes extends Model
{
    use HasFactory;
    function commande(){
        return $this->belongsTo(Commandes::class,'id_commande','id');
    }
    function produit(){
        return $this->belongsTo(Product::class,'id_produit','id');
    }
}
