<?php

namespace Database\Seeders;

use App\Models\Plandetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plandetail::create([
            'plan_id' => 1,  // ID from the `plans` table
            'description' => 'Free Plan with limited features.',
            'price' => 0,
        ]);

        Plandetail::create([
            'plan_id' => 2,
            'description' => 'Silver Plan with additional features.',
            'price' => 100,
        ]);
        Plandetail::create([
            'plan_id' => 3,
            'description' => 'Gold Plan with all features.',
            'price' => 500,
        ]);
    }
}
