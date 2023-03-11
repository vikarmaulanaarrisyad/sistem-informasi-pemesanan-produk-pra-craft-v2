<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // deklarasi variabel roles menampung semua role yang ada
        $roles = ['admin', 'user'];

        // looping data dengan collect
        collect($roles)->map(function ($name) {
            Role::query()->updateOrCreate(compact('name'), compact('name'));
        });
    }
}
