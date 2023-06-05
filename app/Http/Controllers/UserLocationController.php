<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class UserLocationController extends Controller
{
    public function index()
    {
        $user = Client::find(auth()->id());
        $userlocations = $user->immobiliers;
        return view("home", compact("userlocations"));
    }
}
