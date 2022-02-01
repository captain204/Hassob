<?php

namespace Database\Seeders;

use App\Models\AssetAssighment;
use App\Models\Vendor;
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
        
        $this->call([
            AssetSeeder::class,
            VendorSeeder::class,
            UserSeeder::class,
            AssetAssighmentSeeder::class

        ]);
    }
}
