<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        $user = new User();
        $user->name='Julio Alejandro';
        $user->last_name='Gonzalez Peñaloza';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='julio@gmail.com';
        $user->password=Hash::make('12345678');
        $user->is_admin=1;
        $user->save();

        $user = new User();
        $user->name='Alexander';
        $user->last_name='Cantero';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='alex@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='Andres';
        $user->last_name='Gonzalez';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='andres@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='Carlos';
        $user->last_name='Cantero';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='carlos@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='David';
        $user->last_name='Henriquez';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='david@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='Leonardo';
        $user->last_name='Lorenzo';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='leo@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='Luis';
        $user->last_name='El puma';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='luis@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name='Javier';
        $user->last_name='Rivas';
        $user->id_card=28195303;
        $user->birth_date=date_create('now');
        $user->photo='Julio';
        $user->direction='Poblado de San Diego';
        $user->state='Carabobo';
        $user->city='San Diego';
        $user->email='javier@gmail.com';
        $user->password=Hash::make('12345678');
        $user->save();

    }
}
