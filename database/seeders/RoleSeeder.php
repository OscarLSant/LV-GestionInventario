<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'gerente']);
        $role3 = Role::create(['name' => 'vendedor']);

        Permission::create(['name' => 'categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categorias.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'proveedores.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'clientes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'clientes.pdf'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'productos.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'stocks'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'stocks.pdf'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ventas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'ventas.pdf'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'venta_stocks'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'venta_stocks.pdf'])->syncRoles([$role1, $role2, $role3]);
        
        Permission::create(['name' => 'usuarios'])->syncRoles([$role1]);
    }
}
