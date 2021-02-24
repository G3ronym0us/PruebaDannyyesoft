<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corporativo;
use App\Usuario;
use Faker\Generator as Faker;

$factory->define(Corporativo::class, function (Faker $faker) {
    return [
        'S_NombreCorto'         => $faker->name,
        'S_NombreCompleto'      => $faker->name,
        'S_LogoURL'             => $faker->url,
        'S_DBName'              => $faker->word,
        'S_DBUsuario'           => $faker->userName,
        'S_DBPassword'          => $faker->password,
        'S_SystemUrl'           => $faker->url,
        'S_Activo'              => $faker->boolean,
        'D_FechaIncorporacion'  => $faker->date('Y-m-d','now').' '.$faker->date('H:i:s','now'),
        'tw_usuarios_id'        => $faker->numberBetween(1, Usuario::count())
    ];
});
