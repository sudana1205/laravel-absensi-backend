<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Made Sudana',
            'email' => 'sudana@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        //data dumy for company

        \App\Models\Company::create([
            'name'=> 'PT. SELALU SUKSES',
            'email' => 'saya@selalusukses.com',
            'address' => 'Jln. Kesuksesan Abadi',
            'latitude' => '-7.747033',
            'longitude' => '110.3553998',
            'radius_km' => '0.5',
            'time_in' => '08:00',
            'time_out' => '17:00',
        ]);

        $this->call([
            AttendanceSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
