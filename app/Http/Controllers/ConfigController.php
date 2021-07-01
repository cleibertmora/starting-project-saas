<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Classes\Config;
use App\Http\Classes\HttpClient;

class ConfigController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->config = new Config();
        $this->HttpClient = new HttpClient();
    }

    public function update_rol(Request $request){
        $role = Role::findByName($request->role);
        
        if(boolval($request->asignado)){
            $action = $role->givePermissionTo($request->permiso);
            $response = 'Permiso: '.$request->permiso.' asignado al rol: '.$request->role;
        }else{
            $action = $role->revokePermissionTo($request->permiso);
            $response = 'Permiso: '.$request->permiso.' removido del rol: '.$request->role;
        }

        return response()->json($response);
    }
}
