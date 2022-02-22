<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
            'title' => 'Wifi Santai',
            'slug' => 'wifi-santai',
            'location' => 'Kampung Sembung',
            'price' => 160000,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
            'title' => 'Wifi Hemat',
            'slug' => 'wifi-hemat',
            'location' => 'Kampung Sembung',
            'price' => 220000,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
            'title' => 'Wifi Mantap',
            'slug' => 'wifi-mantap',
            'location' => 'Kampung Sembung',
            'price' => 260000,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
            'title' => 'Wifi Gacor',
            'slug' => 'wifi-gacor',
            'location' => 'Kampung Sembung',
            'price' => 320000,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        Package::insert($packages);
    }
}
