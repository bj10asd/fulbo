<?php
use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();
       
        $role = new Role();
        $role->name = 'canchero';
        $role->description = 'Canchero';
        $role->save();
       
        $role = new Role();
        $role->name = 'cliente';
        $role->description = 'Cliente';
        $role->save();
       
        $role = new Role();
        $role->name = 'visitante';
        $role->description = 'Visitante';
        $role->save();
    }
}
