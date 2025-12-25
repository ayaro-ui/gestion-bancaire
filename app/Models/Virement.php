<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Virement extends Model
{
    protected $fillable = [
        'compte_source_id',
        'compte_destination_id',
        'montant',
        'motif',
        'date_virement'
    ];

    public function source()
    {
        return $this->belongsTo(Compte::class, 'compte_source_id');
    }

    public function destination()
    {
        return $this->belongsTo(Compte::class, 'compte_destination_id');
    }
}
