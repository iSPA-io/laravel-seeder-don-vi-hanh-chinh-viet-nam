# Laravel Seeder - Đơn vị hành chính Việt Nam

## Install
- Copy `2021_08_11_062631_create_province_table.php` into `database/migrations/`
- Run command `php artisan migrate`
- Create your own model name `Province`
- Setup `App/Models/Province.php`
```php
protected $dates = [
    'created_at', 'updated_at', 'deleted_at'
];

protected $cast = [
    'config' => 'json',
    'status' => 'boolean',
];
```
- Copy `ProvincesTableSeeder.php` and folder `sql` into `database/seeders/`
- Run command `php artisan db:seed --class=ProvincesTableSeeder` (You can view documents at: https://laravel.com/docs/8.x/seeding#running-seeders)

**Provinces Type**
- 0: National (Quốc gia)
- 1: Province (Tỉnh/Bang)
- 2: City (Thành phố)
- 3: District (Quận/Huyện)
- 4: Ward (Phường/Xã)

## Contribute
- We used this seed for our private project so if you want to contribute please contact me at `malayvuong(at)gmail.com`
