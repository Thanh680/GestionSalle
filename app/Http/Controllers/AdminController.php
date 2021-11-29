<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalleRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StorePhotoRequest;
use App\Models\Salle;
use App\Models\User;
use App\Models\Photo;
use App\Models\Typeuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    // Gestion des salles
    public function showSalle()
    {
        $salles = Salle::all();
        return view('admin.gestionSalle', compact('salles'));
    }

    public function addSalle(StoreSalleRequest $request)
    {
        $salles = Salle::create($request->validated());
        return response()->json(['success'=>'Data is successfully added']);
    }

    public function editSalleAJAX($id)
    {
        $salles = Salle::all();
        $salle = $salles->where('id','=',$id);
        return compact('salle');
    }

    public function updateSalle(Request $request)
    {
        $salle_id = $request->input('id');
        $salle_num = $request->input('num');
        $salle_nom = $request->input('nom');
        $salle_batiment = $request->input('batiment');
        $salle_etage = $request->input('etage');

        $salle = Salle::find($salle_id);
        $salle->update([
            'num' => $salle_num,
            'nom' => $salle_nom,
            'batiment' => $salle_batiment,
            'etage' => $salle_etage,
        ]
        );
        return response()->json(['success'=>'Data is successfully edited']);
    }
    
    public function importSalle()
    {
        $salles = Salle::paginate();
        return view('admin.importSalle', compact('salles'));
    }

    public function deleteSalle($id)
    {
        $salle = Salle::where('id','=',$id)->first();
        $salle->photos()->delete();
        $salle->delete();
        return redirect()->route('admin.gestionSalle');
    }

    public function searchSalle(Request $request)
    {
        $salles = Salle::all();
        if (request('term')) {
            $salles = Salle::where([
                ['nom','like','%'.request('term').'%']
            ])->get();
        }
        return view('admin.gestionSalle', compact('salles'));
    }

    public function searchBat($batiment)
    {
        $salles = Salle::where('batiment',$batiment)->orderBy('num')->get();
        return view('admin.gestionSalle', compact('salles'));
    }

    /*---------------------------------*/

    public function showPhoto($id)
    {
        $allPhotos = Photo::all();
        $photos = $allPhotos->where('idSalle','=',$id);
        return view('admin.showPhoto', compact('id','photos'));
    }

    public function addPhoto($id)
    {
        return view('admin.addPhoto', compact('id'));
    }

    public function storePhoto(Request $request, $id)
    {
        $photo = new Photo;
        $photo->nom = $request->input('nom');
        $file = $request->file('image');
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

    public function searchPhoto(Request $request,$id)
    {
        $allPhotos = Photo::all();
        $photos = $allPhotos->where('idSalle','=',$id);
        if (request('term')) {
            $photos = Photo::where([
                ['idSalle','=',$id],
                ['nom','like','%'.request('term').'%']
            ])->get();
        }
        return view('admin.showPhoto', compact('id','photos'));
    }

    public function editSelectedPhoto($id, $fileName)
    {
        $photos = Photo::all();
        $photo = $photos->where('id','=',$id);
        return view('admin.editPhoto', compact('photo','id','fileName'));
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
                return view('admin.editPhoto', compact('photo','id','fileName'));
            case 'right':
                $img->rotate(90);
                $img->save();
                return view('admin.editPhoto', compact('photo','id','fileName'));
        }
        
        return view('admin.editPhoto', compact('photo','id','fileName'));
    }

    public function updatePhoto(Request $request, $id,$fileName)
    {
        $photos = Photo::all();
        $photo = $photos->where('id','=',$id);
        $photo_nom = $request->input('nom');

        $affected = DB::table('photos')
              ->where('id', $id)
              ->update(['nom' => $photo_nom]);
        return view('admin.editPhoto', compact('photo','id','fileName'));
    }

    // FIN Gestion des salles

    // Gestion des catégories
    // FIN Gestion des catégories

    // Gestion des utilisateurs
    public function showUser()
    {
        $users = User::all();
        $roles = Typeuser::all();
        return view('admin.gestionUser', compact('users','roles'));
    }

    public function pageAddUser()
    {
        $roles = Typeuser::all();
        return view('admin.addUser', compact('roles'));
    }

    public function addUser(StoreUserRequest $request)
    {
        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'idType_users' => implode(",",$request->get('idType_users')),
        ]);

        return response()->json(['success'=>'Data is successfully created']);
    }

    public function deleteUser($id)
    {
        $users = User::all();
        $user = $users->where('id','=',$id);
        $user->each->delete();
        return redirect()->route('admin.gestionUser');
    }

    public function editSelectedUser($id)
    {
        $roles = Typeuser::all();
        $users = User::all();
        $user = $users->where('id','=',$id);
        return view('admin.editUser', compact('user','id','roles'));
    }

    public function updateUser(Request $request)
    {
        $user_id = $request->input('id');
        $user_name = $request->input('name');
        $user_email = $request->input('email');
        $user_password = Hash::make($request->input('password'));
        $user_role = implode(",",$request->get('idType_users'));

        $affected = DB::table('users')
              ->where('id', $user_id)
              ->update(['name' => $user_name,
              'email' => $user_email,
              'password' => $user_password,
              'idType_users' => $user_role]);
            return response()->json(['success'=>'Data is successfully created']);
    }

    public function roleIdentify(user $user)
    {
        $query = DB::table('typeusers')
        ->join('users', 'typeusers.id', '=', 'users.idType_users')
        ->select('typeusers.libelle')
        ->where('typeusers.id','=',$user->idType_users)
        ->value('typeusers.libelle');
        return $query;
    }
    // FIN Gestion des utilisateurs
}
