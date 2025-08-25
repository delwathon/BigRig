<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            SettingsSeeder::class,
            AboutCompanySeeder::class,
            FounderSeeder::class,
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            FaqsSeeder::class,
            ServicesSeeder::class,
            ClientsSeeder::class,
            AchievementsSeeder::class,
            PaymentGatewayConfigSeeder::class,
        ]);
    }
}
