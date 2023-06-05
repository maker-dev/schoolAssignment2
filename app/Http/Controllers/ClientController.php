<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::where("admin", "==", 0)->paginate(10);
        return view("client.index", compact("clients"));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("client.index");
    }

    public function create()
    {
        return view("client.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "cin" => "bail|required",
            "firstname" => "bail|required",
            "lastname" => "bail|required",
            "email" => "bail|required",
            "password" => "bail|required|confirmed",
        ]);

        Client::create($request->all());

        return redirect()->route("client.index");
    }
}
