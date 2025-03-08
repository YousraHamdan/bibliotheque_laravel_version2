<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'annee_publication', 'nombre_pages', 'auteur_id']; 

    // Define the relationship with the Auteur model
    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function histories()
    {
        return $this->hasMany(LivreHistory::class);
    }
}
