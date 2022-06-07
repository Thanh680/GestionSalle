<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\User;
use App\Models\Photo;
use App\Models\Typeuser;
use App\Models\Option;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\StoreInfoRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CommonController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Gestion des photos
    |--------------------------------------------------------------------------
    */
        public function showPhoto($id)
        {
            $allPhotos = Photo::all();
            $photos = $allPhotos->where('idSalle','=',$id);
            return view('common.showPhoto', compact('id','photos'));
        }
    
        public function addPhoto($id)
        {
            return view('common.addPhoto', compact('id'));
        }
    
        public function storePhoto(StorePhotoRequest $request, $id)
        {
            $photo = new Photo;
            $photo->nom = $request->input('nom');
            $file = $request->file('fileName');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/photo/', $filename);
            $photo->fileName = $filename;
            $photo->idSalle = $id;
            
            $validator = Validator::make($photo->toArray(),[
                'nom'  => [
                    'required',
                    'max:32'
                ]
            ]);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }else{
                $photo->save();
            return redirect()->route('showPhoto',$id)->with('status','Image ajouté');
            }
        }
    
        public function destroyPhoto($id)
        {
            $photos = Photo::all();
            $photo = $photos->where('id','=',$id);
            $photo->each->delete();
            return redirect()->back();
        }
    
        public function searchPhoto(Request $request,$id) //Rechercher une photo
        {
            $allPhotos = Photo::all(); //on récupère toutes les photos
            $photos = $allPhotos->where('idSalle','=',$id); //on récupère les photos correspondant à une salle 
            if (request('term')) { //on vérifie si 'term' contient une valeur
                $photos = Photo::where([
                    ['idSalle','=',$id],
                    ['nom','like','%'.request('term').'%']
                ])->get(); // on récupère les photos qui ont un nom similaire à la valeur 'term'
            }
            return view('common.showPhoto', compact('id','photos'));
        }
    
        public function editSelectedPhoto($id, $fileName)
        {
            $photos = Photo::all();
            $photo = $photos->where('id','=',$id);
            return view('common.editPhoto', compact('photo','id','fileName'));
        }
    
        public function orientate(Request $request,$id,$fileName)
        {
            $photos = Photo::all();
            $photo = $photos->where('id','=',$id);
            $img = Image::make('uploads/photo/'.$fileName);
    
            switch ($request->input('action')) {
                case 'left':
                    $img->rotate(-90);
                    $img->save();
                    return view('editPhoto', compact('photo','id','fileName'));
                case 'right':
                    $img->rotate(90);
                    $img->save();
                    return view('editPhoto', compact('photo','id','fileName'));
            }
            
            return view('common.editPhoto', compact('photo','id','fileName'));
        }
    
        public function updatePhoto(Request $request, $id,$fileName)
        {
            $photos = Photo::all();
            $photo = $photos->where('id','=',$id);
            $photo_nom = $request->input('nom');
    
            $affected = DB::table('photos')
                  ->where('id', $id)
                  ->update(['nom' => $photo_nom]);
    
            $idSalle = Photo::select('idSalle')->where('id',$id)->value('idSalle');
            return redirect()->route('showPhoto',$idSalle);
        }

    /*
    |--------------------------------------------------------------------------
    | FIN Gestion des photos
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Gestion des Infos
    |--------------------------------------------------------------------------
    */
    public function showInfo($id)
    {
        $allInfos = Option::all();
        $infos = $allInfos->where('idSalle','=',$id);
        return view('common.showInfo', compact('id','infos'));
    }

    public function storeInfo(StoreInfoRequest $request, $id)
    {
        $option = new Option;
        $option->libelle = $request->input('libelle');
        $option->idSalle = $id;
        $file = $request->file('fileName');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads/photoOption/', $filename);
        $option->fileName = $filename;
        
        $validator = Validator::make($option->toArray(),[
            'libelle'  => [
                'required',
                'max:32'
            ]
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $option->save();
            return redirect()->route('showInfo',$id)->with('status','Info ajouté');
        }
    }

    public function destroyInfo($id)
    {
        $infos = Option::all();
        $info = $infos->where('id','=',$id);
        $info->each->delete();
        return redirect()->back();
    }
    /*
    |--------------------------------------------------------------------------
    | FIN Gestion des Infos
    |--------------------------------------------------------------------------
    */
}
