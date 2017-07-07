<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(GrupoSeeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(JugadorSeeder::class);
    }
}
