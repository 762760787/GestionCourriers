<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierEntrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_piece',
        'date_reception',
        'expediteur',
        'objet',
        'pieces_jointes',
        'no_archive',
        'description',
    ];
}
