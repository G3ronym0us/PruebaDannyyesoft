<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuario;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'username'              => $faker->userName,
        'email'                 => $faker->email,
        'S_Nombre'              => $faker->firstName('male'),
        'S_Apellido'            => $faker->lastName,
        'S_FotoPerfilUrl'       => $faker->imageUrl(640,480),
        'S_Activo'              => $faker->boolean(),
        'password'              => Hash::make('12345'),
        'verification_token'    => null,
        'verifed'               => $faker->sentence(4, true)
    ];
});
