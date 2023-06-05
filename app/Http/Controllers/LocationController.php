<?php

namespace App\Http\Controllers;

use App\Models\Immobilier;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled("date")) {
            $date = date("Y-m-d", strtotime($request->date));
            $locations = [];
            $allLocations = Immobilier::all();
            foreach ($allLocations as $location) {
                foreach ($location->clients as $attachment) {
                    if ($attachment->pivot->date_debut <= $date && $date <= $attachment->pivot->date_fin) {
                        array_push($locations, $location);
                        break;
                    }
                }
            }
        } else {
            $locations = Immobilier::all();
        }
        return view("location.index", compact("locations"));
    }
}
