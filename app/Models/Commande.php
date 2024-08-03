<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'produits_id'];

    public function produits()
    {
        return $this->belongsTo(produits::class);
    }
}
