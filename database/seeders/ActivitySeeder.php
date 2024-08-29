<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            [
                'user_id' => 1,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-08-24'
            ],
            [
                'user_id' => 1,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-08-24'
            ],
            [
                'user_id' => 1,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-08-24'
            ],
            [
                'user_id' => 2,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-08-24'
            ],
            [
                'user_id' => 2,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-08-24'
            ],
           
            [
                'user_id' => 3,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-08-24'
            ],
            [
                'user_id' => 3,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-08-24'
            ],

            [
                'user_id' => 4,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-08-24'
            ],
            [
                'user_id' => 4,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-08-24'
            ],
            [
                'user_id' => 4,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-07-24'
            ],
            [
                'user_id' => 4,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-07-24'
            ],
            
            [
                'user_id' => 5,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-07-24'
            ],
            [
                'user_id' => 5,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-08-28'
            ],
            [
                'user_id' => 5,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-08-28'
            ],

            [
                'user_id' => 6,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-08-26'
            ],
            [
                'user_id' => 6,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-08-28'
            ],
            [
                'user_id' => 6,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-07-20'
            ],
            [
                'user_id' => 6,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-07-21'
            ],
            [
                'user_id' => 6,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-08-26'
            ],

            [
                'user_id' => 11,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-08-26'
            ],
            [
                'user_id' => 11,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-06-24'
            ],
            [
                'user_id' => 11,
                'type' => 'cycling',
                'point' => 30,
                'created_at' => '2024-08-25'
            ],
            [
                'user_id' => 11,
                'type' => 'running',
                'point' => 20,
                'created_at' => '2024-08-26'
            ],
            [
                'user_id' => 11,
                'type' => 'jumping',
                'point' => 10,
                'created_at' => '2024-08-25'
            ],
        ]);
    }
}
