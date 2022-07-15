<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $file1 = file_get_contents(base_path('/susenas2020.sql'));
        $file2 = file_get_contents(base_path('/nama_wilayah.sql'));

        DB::unprepared($file2);
        DB::unprepared($file1);
        $this->command->info('Country table seeded!');
    }
}
