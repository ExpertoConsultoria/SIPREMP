<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['id' => 1,'guard_name' => 'sanctum','name' => 'ver usuarios'])->syncRoles('admin');
        Permission::create(['id' => 2,'guard_name' => 'sanctum','name' => 'crear usuario'])->syncRoles('admin');
        Permission::create(['id' => 3,'guard_name' => 'sanctum','name' => 'editar usuario'])->syncRoles('admin');
        Permission::create(['id' => 4,'guard_name' => 'sanctum','name' => 'borrar usuario'])->syncRoles('admin');
        Permission::create(['id' => 5,'guard_name' => 'sanctum','name' => 'admin usuarios'])->syncRoles('admin');
        Permission::create(['id' => 6,'guard_name' => 'sanctum','name' => 'ver roles'])->syncRoles('admin');
        Permission::create(['id' => 7,'guard_name' => 'sanctum','name' => 'crear rol'])->syncRoles('admin');
        Permission::create(['id' => 8,'guard_name' => 'sanctum','name' => 'editar rol'])->syncRoles('admin');
        Permission::create(['id' => 9,'guard_name' => 'sanctum','name' => 'borrar rol'])->syncRoles('admin');
        Permission::create(['id' => 10,'guard_name' => 'sanctum','name' => 'admin roles'])->syncRoles('admin');
        Permission::create(['id' => 11,'guard_name' => 'sanctum','name' => 'ver sedes'])->syncRoles('admin');
        Permission::create(['id' => 12,'guard_name' => 'sanctum','name' => 'crear sede'])->syncRoles('admin');
        Permission::create(['id' => 13,'guard_name' => 'sanctum','name' => 'editar sede'])->syncRoles('admin');
        Permission::create(['id' => 14,'guard_name' => 'sanctum','name' => 'borrar sede'])->syncRoles('admin');
        Permission::create(['id' => 15,'guard_name' => 'sanctum','name' => 'admin sedes'])->syncRoles('admin');
        Permission::create(['id' => 16,'guard_name' => 'sanctum','name' => 'ver areas'])->syncRoles('admin');
        Permission::create(['id' => 17,'guard_name' => 'sanctum','name' => 'crear area'])->syncRoles('admin');
        Permission::create(['id' => 18,'guard_name' => 'sanctum','name' => 'editar area'])->syncRoles('admin');
        Permission::create(['id' => 19,'guard_name' => 'sanctum','name' => 'borrar area'])->syncRoles('admin');
        Permission::create(['id' => 20,'guard_name' => 'sanctum','name' => 'admin areas'])->syncRoles('admin');
        Permission::create(['id' => 21,'guard_name' => 'sanctum','name' => 'ver puestos'])->syncRoles('admin');
        Permission::create(['id' => 22,'guard_name' => 'sanctum','name' => 'crear puesto'])->syncRoles('admin');
        Permission::create(['id' => 23,'guard_name' => 'sanctum','name' => 'editar puesto'])->syncRoles('admin');
        Permission::create(['id' => 24,'guard_name' => 'sanctum','name' => 'borrar puesto'])->syncRoles('admin');
        Permission::create(['id' => 25,'guard_name' => 'sanctum','name' => 'admin puestos'])->syncRoles('admin');
        Permission::create(['id' => 26,'guard_name' => 'sanctum','name' => 'ver empleados'])->syncRoles('admin');
        Permission::create(['id' => 27,'guard_name' => 'sanctum','name' => 'crear empleado'])->syncRoles('admin');
        Permission::create(['id' => 28,'guard_name' => 'sanctum','name' => 'editar empleado'])->syncRoles('admin');
        Permission::create(['id' => 29,'guard_name' => 'sanctum','name' => 'borrar empleado'])->syncRoles('admin');
        Permission::create(['id' => 30,'guard_name' => 'sanctum','name' => 'admin empleados'])->syncRoles('admin');
        Permission::create(['id' => 31,'guard_name' => 'sanctum','name' => 'ver empresas'])->syncRoles('admin');
        Permission::create(['id' => 32,'guard_name' => 'sanctum','name' => 'crear empresa'])->syncRoles('admin');
        Permission::create(['id' => 33,'guard_name' => 'sanctum','name' => 'editar empresa'])->syncRoles('admin');
        Permission::create(['id' => 34,'guard_name' => 'sanctum','name' => 'borrar empresa'])->syncRoles('admin');
        Permission::create(['id' => 35,'guard_name' => 'sanctum','name' => 'admin empresas'])->syncRoles('admin');
        Permission::create(['id' => 36,'guard_name' => 'sanctum','name' => 'ver comprobantes'])->syncRoles('admin');
        Permission::create(['id' => 37,'guard_name' => 'sanctum','name' => 'crear comprobante'])->syncRoles('admin');
        Permission::create(['id' => 38,'guard_name' => 'sanctum','name' => 'editar comprobante'])->syncRoles('admin');
        Permission::create(['id' => 39,'guard_name' => 'sanctum','name' => 'borrar comprobante'])->syncRoles('admin');
        Permission::create(['id' => 40,'guard_name' => 'sanctum','name' => 'admin comprobantes'])->syncRoles('admin');
        Permission::create(['id' => 41,'guard_name' => 'sanctum','name' => 'ver clcs'])->syncRoles('admin');
        Permission::create(['id' => 42,'guard_name' => 'sanctum','name' => 'crear clc'])->syncRoles('admin');
        Permission::create(['id' => 43,'guard_name' => 'sanctum','name' => 'editar clc'])->syncRoles('admin');
        Permission::create(['id' => 44,'guard_name' => 'sanctum','name' => 'borrar clc'])->syncRoles('admin');
        Permission::create(['id' => 45,'guard_name' => 'sanctum','name' => 'solicitar clc'])->syncRoles('admin');
        Permission::create(['id' => 46,'guard_name' => 'sanctum','name' => 'elaborar clc'])->syncRoles('admin');
        Permission::create(['id' => 47,'guard_name' => 'sanctum','name' => 'revisar clcs'])->syncRoles('admin');
        Permission::create(['id' => 48,'guard_name' => 'sanctum','name' => 'validar clcs'])->syncRoles('admin');
        Permission::create(['id' => 49,'guard_name' => 'sanctum','name' => 'vobo clcs'])->syncRoles('admin');
        Permission::create(['id' => 50,'guard_name' => 'sanctum','name' => 'autorizar clcs'])->syncRoles('admin');
        Permission::create(['id' => 51,'guard_name' => 'sanctum','name' => 'ver presupuestos'])->syncRoles('admin');
        Permission::create(['id' => 52,'guard_name' => 'sanctum','name' => 'crear presupuesto'])->syncRoles('admin');
        Permission::create(['id' => 53,'guard_name' => 'sanctum','name' => 'editar presupuesto'])->syncRoles('admin');
        Permission::create(['id' => 54,'guard_name' => 'sanctum','name' => 'borrar presupuesto'])->syncRoles('admin');
        Permission::create(['id' => 55,'guard_name' => 'sanctum','name' => 'admin presupuesto'])->syncRoles('admin');
        Permission::create(['id' => 56,'guard_name' => 'sanctum','name' => 'asignar presupuesto'])->syncRoles('admin');
        Permission::create(['id' => 57,'guard_name' => 'sanctum','name' => 'elaborar adecuaciones'])->syncRoles('admin');
        Permission::create(['id' => 58,'guard_name' => 'sanctum','name' => 'revisar adecuaciones'])->syncRoles('admin');
        Permission::create(['id' => 59,'guard_name' => 'sanctum','name' => 'vobo adecuaciones'])->syncRoles('admin');
        Permission::create(['id' => 60,'guard_name' => 'sanctum','name' => 'autorizar adecuaciones'])->syncRoles('admin');
    }
}
