<?php
use App\Menu;
use Illuminate\Database\Seeder;

class SeederTablaMenus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m1 = factory(Menu::class)->create([
            'etiqueta' => 'Home',
            'pagina' => 'home',
            'padre' => 0,
            'orden' => 0,
            'usr_req' => 4,
        ]);
        $m2 = factory(Menu::class)->create([
            'etiqueta' => 'Canchas',
            'pagina' => 'canchas',
            'padre' => 0,
            'orden' => 1,
            'usr_req' => 4,
        ]);
        $m3 = factory(Menu::class)->create([
            'etiqueta' => 'Administrar mi cancha',
            'pagina' => 'administrarmicancha',
            'padre' => 0,
            'orden' => 2,
            'usr_req' => 2,
        ]);
        /*$m4=factory(Menu::class)->create([
            'etiqueta' => 'Registracion',
            'pagina' => 'registracion',
            'padre' => 0,
            'orden' => 3,
        ]);
        $m5=factory(Menu::class)->create([
            'etiqueta' => 'Contacto',
            'pagina' => 'contacto',
            'padre' => 0,
            'orden' => 4,
        ]);
        $m6=factory(Menu::class)->create([
            'etiqueta' => 'La biblioteca',
            'pagina' => 'biblioteca',
            'padre' => 0,
            'orden' => 4,
        ]);
        factory(Menu::class)->create([
            'etiqueta' => 'Libros',
            'pagina' => 'libros',
            'padre' => $m2->id,
            'orden' => 0,
        ]);
        factory(Menu::class)->create([
            'etiqueta' => 'Autores',
            'pagina' => 'autores',
            'padre' => $m2->id,
            'orden' => 1,
        ]);
        factory(Menu::class)->create([
            'etiqueta' => 'Editoriales',
            'pagina' => 'editoriales',
            'padre' => $m2->id,
            'orden' => 2,
        ]);
        factory(Menu::class)->create([
            'etiqueta' => 'Acerca de nosotros',
            'pagina' => 'acercadenosotros',
            'padre' => $m6->id,
            'orden' => 0,
        ]);
        factory(Menu::class)->create([
            'etiqueta' => 'Ubicacion',
            'pagina' => 'ubicacion',
            'padre' => $m6->id,
            'orden' => 1,
        ]);w
        */
    }
}
