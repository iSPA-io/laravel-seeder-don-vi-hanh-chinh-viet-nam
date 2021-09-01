<?php

namespace Database\Seeders;

use App\Models\Provinces;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /** Insert default provinces list */
      $path = __DIR__ . '/sql/province.sql';
      DB::unprepared(file_get_contents($path));
      $this->command->info('Province list inserted!');
    }
}
