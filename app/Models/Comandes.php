<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comandes extends Model
{
    use HasFactory;
    public function lignecommandes(){
        return $this->hasMany(LigneComandes::class,'id_commande','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    
}
public function Totalprix(){
            $total=0;
        foreach($this->lignecommandes as $lc){
            $total+=$lc->produit->prix*$lc->qte;
        }
        return $total;
}
}
