<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfoRequest;
use App\Models\Salle;
use App\Models\User;
use App\Models\Type_User;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class TechController extends Controller
{
    public function index()
    {
        $salles = Salle::all();
        return view('tech.index', compact('salles'));
    }

    public function searchBat($batiment) //Rechercher salle selon le batiment
    {
        $salles = Salle::where('batiment',$batiment)->orderBy('num')->get();
        return view('tech.index', compact('salles'));
    }
}
