<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePhotoRequest;

class GestController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('gest.index', compact('photos'));
    }

    public function store(Request $request)
    {
        $photo = new Photo;
        $photo->nom = $request->input('nom');
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/photo/', $filename);
        $photo->fileName = $filename;

        $photo->save();
        return redirect()->back()->with('status','Image ajouté');
    }
}
