<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PackagesBenefit;

class PackagesBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packagesBenefit = [
            [
                'package_id' => 1,
                'name' => 'Unlimited Quota 24 Jam',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'package_id' => 2,
                'name' => 'Unlimited Quota 24 Jam',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'package_id' => 3,
                'name' => 'Unlimited Quota 24 Jam',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'package_id' => 4,
                'name' => 'Unlimited Quota 24 Jam',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        PackagesBenefit::insert($packagesBenefit);
    }
}
