<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;

    // Champs autorisés pour créer ou modifier un compte
    protected $fillable = ['type', 'solde', 'rib','client_id'];

    // Relation : un compte appartient à un client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    Public function virementsEnvoyes()
    {
        return $this->hasMany(Virement::class, 'compte_source_id');
    }

    public function virementsRecus()
    {
        return $this->hasMany(Virement::class, 'compte_destination_id');
    }
}
