<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Auditar atenciones']);
        Permission::create(['name' => 'Ver producción']);
        Permission::create(['name' => 'Ver reportes']);
        Permission::create(['name' => 'Atencion de paciente']);
        Permission::create(['name' => 'Editar atenciones']);
        Permission::create(['name' => 'Gestionar citas']);
        Permission::create(['name' => 'Ver agenda']);
        Permission::create(['name' => 'Gestionar permisos']);
        Permission::create(['name' => 'Gestionar roles']);
        Permission::create(['name' => 'Gestionar usuarios']);
        Permission::create(['name' => 'Gestionar seguros']);
        Permission::create(['name' => 'Gestionar prestadores']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Auditor']);
        $role1->givePermissionTo('Auditar atenciones');
        $role1->givePermissionTo('Ver producción');
        $role1->givePermissionTo('Editar atenciones');
        $role1->givePermissionTo('Gestionar citas');
        $role1->givePermissionTo('Ver reportes');
        $role1->givePermissionTo('Ver agenda');
        

        $role2 = Role::create(['name' => 'Operador']);
        $role2->givePermissionTo('Gestionar citas');
        $role2->givePermissionTo('Ver reportes');
        $role2->givePermissionTo('Ver agenda');
        $role2->givePermissionTo('Atencion de paciente');

        $role3 = Role::create(['name' => 'Seguro']);
        $role3->givePermissionTo('Ver agenda');
        $role3->givePermissionTo('Ver reportes');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
    }
}
