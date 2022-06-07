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
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    // Gestion des salles
    public function showSalle() //Afficher le tableau des salles
    {
        $salles = Salle::all();
        return view('admin.gestionSalle', compact('salles'));
    }

    public function addSalle(StoreSalleRequest $request) //Ajouter une salle à la base de données
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

    public function updateSalle(Request $request) //Enregistrer les modifications d'une salle
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

    public function deleteSalle($id) //Supprimer une salle (avec photos)
    {
        $salle = Salle::where('id','=',$id)->first();
        $photos = Photo::where('idSalle','=',$id)->get();
        foreach($photos as $photo){
            if ( File::exists('uploads/photo/'.$photo->fileName)) {
            File::delete('uploads/photo/'.$photo->fileName);
            }
        };
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

    public function searchBat($batiment) //Rechercher salle selon le batiment
    {
        $salles = Salle::where('batiment',$batiment)->orderBy('num')->get();
        return view('admin.gestionSalle', compact('salles'));
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

    public function updateUser(StoreUserRequest $request)
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
