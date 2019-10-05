<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //ini_set('memory_limit', '-1');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::statement('SET UNIQUE_CHECKS = 0;');
        DB::statement('SET AUTOCOMMIT = 0;');
        DB::statement('set global max_allowed_packet=1000000000;');
        DB::statement('set global net_buffer_length=1000000;');

        DB::unprepared(file_get_contents('database/seeds/Paises.sql'));
        DB::unprepared(file_get_contents('database/seeds/Ciudades.sql'));

        //DB::unprepared(file_get_contents('database/seeds/lokasyon.sql'));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::statement('SET UNIQUE_CHECKS = 1;');
        DB::statement('SET AUTOCOMMIT = 1;');

        $this->call(TipoEventoTableSeeder::class);
        $this->call(TipoCompaniaTableSeeder::class);
        $this->call(TipoDocumentoEmpresaTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(AforoTableSeeder::class);
        $this->call(ArtistaTableSeeder::class);

    }
}
