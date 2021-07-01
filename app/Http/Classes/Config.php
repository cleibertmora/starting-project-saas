<?php

namespace App\Http\Classes;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Config
{
    public function get_roles_with_permissions(){
        $role_permissions = Role::whereNotIn('name', ['super-admin'])->with('permissions')->get();;
        $permissions = Permission::all();
        $arr = array();

        foreach ( $role_permissions as $rol ) {            
            $array = array();

            foreach ( $permissions as $permission ) {
                $can = false;
                foreach ( $rol->permissions as $p ) {
                    if( $permission->name === $p->name )
                        $can = true;
                }
                $array[] = (object) [ "permiso" => $permission->name, "id" => $permission->id, "puede" => $can ];
            }

            $r = (object) [ "name" => $rol->name, "permisos" => $array ];
            $arr[] =  $r;
        }
        
        $permission_per_role = (object) $arr;

        return $permission_per_role;
    }
}
