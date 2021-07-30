<?php

namespace Database\Seeders;

use App\Models\Provinces;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $provinces = [
        [
          'id',
          'uuid',
          'uid',
          'name',
          'global_name',
          'slug',
          'type',
          'parent_id',
          'language_id',
          'maps_id',
          'longitude',
          'latitude',
          'priority',
          'config',
          'status',
          'created_at', 'updated_at', 'deleted_at'
        ],
      ];

      Provinces::insert($provinces);
    }
}
