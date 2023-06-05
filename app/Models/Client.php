<?php

namespace App\Models;

use App\Models\Immobilier;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements Authenticatable
{

    use HasFactory;

    protected $fillable = ["cin", "firstname", "lastname", "email", "password"];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function immobiliers()
    {
        return $this->belongsToMany(Immobilier::class)->withPivot(["date_debut", "date_fin"]);
    }
}
