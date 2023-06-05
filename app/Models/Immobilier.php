<?php

namespace App\Models;

use App\Models\TypebImmo;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobilier extends Model
{
    use HasFactory;

    protected $fillable = ["titre", "adress", "prixlocation", "disponible"];

    public function typeb_immo()
    {
        return $this->belongsTo(TypebImmo::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)->withPivot(["date_debut", "date_fin"]);
    }
}
