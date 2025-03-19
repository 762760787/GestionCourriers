<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierSortant extends Model
{
    /** @use HasFactory<\Database\Factories\CourrierSortantFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre_piece',
        'date_envoi',
        'destinataire',
        'objet',
        'pieces_jointes',
        'no_archive',
        'description',
    ];
}
