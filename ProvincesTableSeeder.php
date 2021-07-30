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
        //  id - uid - name - global_name - slug - type - parent_id - language_id - config - uuid
        $array = [
            [1, 'auHGUvrwDi', 'Việt Nam', 'Viet Nam', 'viet-nam', 0, 0, 1, ['flag' => 'vi.svg', 'timeZone' => 'Asia/Ho_Chi_Minh', 'phoneCode' => '+84'], 'd2119c1a-967e-47f3-ac52-494054d2d153'],
            [2, 'IbEV07x9Af', 'Thành phố Hà Nội', 'Ha Noi Capital', 'ha-noi-capital', 2, 1, 0, ['webDefault' => true, 'webShow' => true, 'areaName' => 'Đồng bằng Sông Hồng'], '4c104755-1445-4848-858e-2ac40e933946'],
            [3, 'V7AOMupeZk', 'Tỉnh Hà Giang', 'Ha Giang Province', 'ha-giang-province', 1, 1, 0, ['areaName' => 'Đông Bắc Bộ'], '02b9e25a-f4ba-478a-bbbc-62d65281712c'],
            [4, 'd9yKU4tVmj', 'Tỉnh Cao Bằng', 'Cao Bang Province', 'cao-bang-province', 1, 1, 0, ['areaName' => 'Đông Bắc Bộ'], '31c0d2ab-f4ea-4c34-9fec-1e67f5a0fd88'],
            [5, 'nlQnS4FUiK', 'Tỉnh Bắc Kạn', 'Bac Kan Province', 'bac-kan-province', 1, 1, 0, ['areaName' => 'Đông Bắc Bộ'], 'e9bfbd09-c28b-4273-8102-0c15a40980a1'],

            [52, '5Z7s2STgEn', 'Thành phố Hồ Chí Minh', 'Ho Chi Minh City', 'ho-chi-minh-city', 2, 1, 0, ['webDefault' => true, 'webShow' => true, 'areaName' => 'Đông Nam Bộ'], '4c104755-1445-4848-858e-2ac40e933946'],
        ];

        //  Analyze data
        $provinces = [];
        foreach ($array as $item) {
            $provinces[] = [
                'id' => $item[0], 'uid' => $item[1] ?? Str::random(10),
                'name' => $item[2], 'global_name' => $item[3], 'slug' => $item[4],
                'type' => $item[5], 'parent_id' => $item[6], 'language_id' => $item[7],
                'config' => $this->merge($item[8]), 'uuid' => $item[9] ?? Str::uuid(),
                //  Default value 'priority' => 0, 'maps_id' => null, 'longitude' => null, 'latitude' => null,
                'status' => true, 'created_at' => now(), 'updated_at' => now(), 'deleted_at' => now(),
            ];
        }

        Provinces::insert($provinces);
    }

    private function merge($array = array())
    {
        $defaultConfig = [
            'flag' => null, 'zipCode' => null, 'webDefault' => false,
            'webShow' => false, 'url' => null, 'organization' => null,
            'timeZone' => null, 'phoneCode' => null, 'areaName' => null
        ];
        return array_merge($defaultConfig, $array);
    }
}
