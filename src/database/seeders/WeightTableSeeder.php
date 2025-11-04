<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightLog;
use Carbon\Carbon;

class WeightTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $latestDate = Carbon::create(2025, 1, 35);

        for ($i = 0; $i < 35; $i++) {
            WeightLog::factory()->create([
                'user_id' => $user->id,
                'date' => $latestDate->copy()->subDays($i)->format('Y-m-d'), 
                
            ]);
        }
    }
}
