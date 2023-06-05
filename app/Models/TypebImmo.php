<?php

namespace App\Models;

use App\Models\Immobilier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypebImmo extends Model
{
    use HasFactory;

    protected $fillable = ["libelle"];

    public function immobiliers()
    {
        return $this->hasMany(Immobilier::class);
    }
}
