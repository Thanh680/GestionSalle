<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfoRequest;
use App\Models\Salle;
use App\Models\User;
use App\Models\Type_User;
use App\Models\Option;
use Illuminate\Http\Request;

class TechController extends Controller
{
    public function showSalle()
    {
        $salles = Salle::all();
        return view('tech.ajoutInfo', compact('salles'));
    }

    public function addInfo(StoreInfoRequest $request)
    {
        $options = Option::create($request->validated());
        return redirect(route('tech.ajoutInfo'))->with('success', 'L\'option a bien été ajouté !');
        ;
    }
}
