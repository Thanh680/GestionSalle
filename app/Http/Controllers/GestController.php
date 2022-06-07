<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Salle;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\StoreInfoRequest;

class GestController extends Controller
{
    public function index() //Afficher le tableau des salles
    {
        $salles = Salle::all();
        return view('gest.index', compact('salles'));
    }

    public function searchBat($batiment) //Rechercher salle selon le batiment
    {
        $salles = Salle::where('batiment',$batiment)->orderBy('num')->get();
        return view('gest.index', compact('salles'));
    }

}
