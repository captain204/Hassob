<?php

namespace Database\Seeders;

use App\Models\AssetAssighment;
use Illuminate\Database\Seeder;

class AssetAssighmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssetAssighment::factory()
                        ->count(20)
                        ->create();
    }                   

}
