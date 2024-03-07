<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create();

        \App\Models\Estado::factory()->create();

        \App\Models\Municipio::factory()->create();
        \App\Models\Municipio::factory()->losCabos()->create();
        \App\Models\Municipio::factory()->loreto()->create();
        \App\Models\Municipio::factory()->comondu()->create();
        \App\Models\Municipio::factory()->mulege()->create();
        
        // \App\Models\Distrito::factory()->create();
        // \App\Models\Distrito::factory()->distrito2()->create();
        // \App\Models\Distrito::factory()->distrito3()->create();
         \App\Models\Distrito::factory()->distrito4()->create();
        // \App\Models\Distrito::factory()->distrito5()->create();
        // \App\Models\Distrito::factory()->distrito6()->create();
        // \App\Models\Distrito::factory()->distrito7()->create();
        // \App\Models\Distrito::factory()->distrito8()->create();
        // \App\Models\Distrito::factory()->distrito9()->create();
        // \App\Models\Distrito::factory()->distrito10()->create();
        // \App\Models\Distrito::factory()->distrito11()->create();
        // \App\Models\Distrito::factory()->distrito12()->create();
        // \App\Models\Distrito::factory()->distrito13()->create();
        // \App\Models\Distrito::factory()->distrito14()->create();
        // \App\Models\Distrito::factory()->distrito15()->create();
        // \App\Models\Distrito::factory()->distrito16()->create();

        \App\Models\Brigada::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
